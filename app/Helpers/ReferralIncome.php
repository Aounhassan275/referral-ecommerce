<?php

namespace App\Helpers;

use App\Models\Admin;
use App\Models\CompanyAccount;
use App\Models\Earning;
use App\Models\Package;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use App\Models\PackageHistory;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;

class ReferralIncome
{
    public static function referral($user)
    {
        $refer_by = User::find($user->refer_by);
        $package = $user->package;
        if($user->referral == null)
        {
            $fake_account = User::where('type','fake')->first();
            //Replacing Fake User with this user in tree or placement in Tree
            $referral_account = User::where('referral',$fake_account->id)->first();
            if($referral_account)
            {
                $referral_account->update([
                    'referral' => $user->id
                ]);
            }else{
                return false;
            }
            ReferralIncome::FakeAccount($fake_account,$user);
        }
        //Give it Main Refer By and add money in Total Income of Refer By User
        ReferralIncome::directIncome($package->price,$package,$refer_by,$user);
        // ReferralIncome::directPoolIncome($package->price,$package,$refer_by,$user);
        //Give it to Parents of your Direct Referral Remaining goes to company Account named Flush Income
        //add money in Total Income
        ReferralIncome::directTeamIncome($package->price,$package,$refer_by,$user);
        //Give it to Upline Tree Member and it in total income and remaining goes to flush Account 
        ReferralIncome::UplineIncome($package->price,$package,$user);
        //Give it to Downline Tree and remaining goes to flush Account 
        ReferralIncome::DownlineIncome($package->price,$package,$user);
        //Give it to Upline Tree members refer by and remaining goes to flush Account 
        ReferralIncome::UplinePlacementIncome($package->price,$package,$user);
        //Give it to Downline Tree members refer by and remaining goes to flush Account 
        ReferralIncome::DownLinePlacementIncome($package->price,$package,$user);
        //If the Refer By is leader then give him this also otherwise  goes to flush Account 
        // ReferralIncome::TradeIncome($package->price,$package,$refer_by,$user);
        ReferralIncome::CompanyIncome($package->price,$package,$type = 'Arrival');
        ReferralIncome::rebirthAndAsscoaiteIncome($package->price,$package,$refer_by,$user);
        PackageHistory::create([
            'package_id' => $package->id,
            'user_id' => $user->id
        ]);
        // ReferralIncome::directStockIncome($package->price,$package,$refer_by,$user);
        if($refer_by){
            $earnings = Earning::where('status',0)
                ->where('user_id',$refer_by->id)->get();
            foreach($earnings as $earning){
                $refer_by->update([
                    'cash_wallet' => $refer_by->cash_wallet + $earning->price,
                    'company_reward' => $refer_by->company_reward + $earning->price,
                ]);
                $earning->delete();
            }
        }
        if($package->flush_income > 0 ){
            $flush_account = CompanyAccount::find(1);
            $flush_account->update([
                'balance' => $flush_account->balance + $package->flush_income,
            ]);
        }
        return true;
    } 
    public static  function FakeAccount($fake_account,$user)
    {
        $transfer_amount = $fake_account->cash_wallet;
        if($transfer_amount > 0)
        {
            $companyAccount= CompanyAccount::find(1);
            $companyAccount->update([
                'balance' => $companyAccount->balance + $transfer_amount,
            ]);
        }
        $user->update([
            'referral' => $fake_account->referral,
        ]);
        info("Deleting Fake Account : $fake_account->name"); 
        $fake_account->delete();
        $account = User::where('type','fake')->where('referral',null)->first();
        $k = $account->id +1;
        $new_fake_account = User::create([
            'name' => 'fake'.$k,
            'email' => 'fake'.$k.'@'.Setting::siteEmail(),
            'password' => Hash::make('1234'),
            'temp_password' =>'1234',
            'package_id' => '9',
            'status' => 'active',
            'code' => uniqid(),
            'refer_by' => $account->id,
            'type' => 'fake',
            'a_date' =>  Carbon::today(),
        ]);
        $account->update([
            'referral' => $new_fake_account->id
        ]);
        info("Create New Fake Account : $new_fake_account->name"); 
    }  
    public static  function directIncome($price,$package,$user,$due_to)
    {
        $direct_teams = $due_to->directParentsForDirectIncome();
        info("Direct Income To Accounts : ".count($direct_teams)); 
        $totalDirectIncomeValues = $package->direct_income + $package->direct_income_2 + $package->direct_income_3 + $package->direct_income_4 + $package->direct_income_5;
        $totalDirectIncome = $price / 100 * $totalDirectIncomeValues;
        foreach($direct_teams as $index => $direct_team)
        {
            if($index == 0){
                $direct_income = $price / 100 * $package->direct_income;
                info("Direct Income Level 1 adding $direct_income $direct_team->cash_wallet to $direct_team->name");    
            } 
            if($index == 1){
                $direct_income = $price / 100 * $package->direct_income_2;
                info("Direct Income Level 2 adding $direct_income $direct_team->cash_wallet to $direct_team->name");    
            } 
            if($index == 2){
                $direct_income = $price / 100 * $package->direct_income_3;
                info("Direct Income Level 3 adding $direct_income $direct_team->cash_wallet to $direct_team->name");    
            } 
            if($index == 3){
                $direct_income = $price / 100 * $package->direct_income_4;
                info("Direct Income Level 4 adding $direct_income $direct_team->cash_wallet to $direct_team->name");    
            } 
            if($index == 4){
                $direct_income = $price / 100 * $package->direct_income_5;
                info("Direct Income Level 5 adding $direct_income $direct_team->cash_wallet to $direct_team->name");    
            } 
            Earning::create([
                'price' => $direct_income,
                'user_id' => $direct_team->id,
                'due_to' => $due_to->id,
                'level' => $index+1,
                'type' => 'direct_income'
            ]);
            $direct_team->update([
                'cash_wallet' => $direct_team->cash_wallet + $direct_income
            ]);
            $totalDirectIncome = $totalDirectIncome - $direct_income;
        }
        if($totalDirectIncome > 0 ){
            $flush_account = CompanyAccount::find(1);
            $flush_account->update([
                'balance' => $flush_account->balance + $totalDirectIncome,
            ]);
        }
    }  
    public static  function directStockIncome($price,$package,$refer_by,$user)
    {
        // $flush_account = CompanyAccount::find(1);
        // $self_loan_limit = $package->price / 100 * $package->self_loan_limit;
        // if($user->loan_limit > Setting::loanLimit()){
        //     $flush_account->update([
        //         'balance' => $flush_account->balance + $self_loan_limit,
        //     ]);
        // }else{
        //     $user->update([
        //         'loan_limit' => $user->loan_limit +  $self_loan_limit
        //     ]);
        // }
        // $for_stock = $package->price / 100 * $package->for_stock;
        // if($user->loan_limit > Setting::stockLimit()){
        //     $flush_account->update([
        //         'balance' => $flush_account->balance + $for_stock,
        //     ]);
        // }else{
        //     $user->update([
        //         'for_stock' => $user->for_stock +  $for_stock
        //     ]);
        // }
        // $direct_teams = $user->directParentsForDirectIncome();
        // $direct_for_stock = $package->price / 100 * $package->direct_for_stock;
        // $direct_loan_limit = $package->price / 100 * $package->direct_loan_limit;
        // $direct_for_stock_per_person  = $direct_for_stock/5;
        // $direct_loan_limit_per_person  = $direct_loan_limit/5;
        // foreach($direct_teams as  $direct_team)
        // {
        //     if($direct_team->for_stock < Setting::stockLimit()){
        //         $direct_team->update([
        //             'for_stock' => $direct_team->for_stock +  $direct_for_stock_per_person
        //         ]);
        //         $direct_for_stock = $direct_for_stock - $direct_for_stock_per_person;
        //     }
        //     if($direct_team->loan_limit < Setting::loanLimit()){
        //         $direct_team->update([
        //             'loan_limit' => $direct_team->loan_limit +  $direct_loan_limit_per_person
        //         ]);
        //         $direct_loan_limit = $direct_loan_limit - $direct_loan_limit_per_person;
        //     }
        // }
        // if($direct_loan_limit > 0 ){
        //     $flush_account->update([
        //         'balance' => $flush_account->balance + $direct_loan_limit,
        //     ]);
        // }
        // if($direct_for_stock > 0 ){
        //     $flush_account->update([
        //         'balance' => $flush_account->balance + $direct_for_stock,
        //     ]);
        // }
        // $health_limit = $package->price / 100 * $package->health_limit;
        // if($user->health_limit > Setting::healthLimit()){
        //     $flush_account->update([
        //         'balance' => $flush_account->balance + $health_limit,
        //     ]);
        // } else {
        //     $user->update([
        //         'health_limit' => $user->health_limit +  $health_limit
        //     ]);
        // }
        // $purchase_limit = $package->price / 100 * $package->purchase_limit;
        // if($user->purchase_limit > Setting::purchaseLimit()){
        //     $flush_account->update([
        //         'balance' => $flush_account->balance + $purchase_limit,
        //     ]);
        // }else{
        //     $user->update([
        //         'purchase_limit' => $user->purchase_limit +  $purchase_limit
        //     ]);
        // }
        // $direct_teams = $user->directParentsForDirectIncome();
        // $direct_health_limit = $package->price / 100 * $package->direct_health_limit;
        // $direct_purchase_limit = $package->price / 100 * $package->direct_purchase_limit;
        // $direct_health_limit_per_person  = $direct_health_limit/5;
        // $direct_purchase_limit_per_person  = $direct_purchase_limit/5;
        // foreach($direct_teams as  $direct_team)
        // {
        //     if($direct_team->health_limit < Setting::healthLimit()){
        //         $direct_team->update([
        //             'health_limit' => $direct_team->health_limit +  $direct_health_limit_per_person
        //         ]);
        //         $direct_health_limit = $direct_health_limit - $direct_health_limit_per_person;
        //     }
        //     if($direct_team->purchase_limit < Setting::purchaseLimit()){
        //         $direct_team->update([
        //             'purchase_limit' => $direct_team->purchase_limit +  $direct_purchase_limit_per_person
        //         ]);
        //         $direct_purchase_limit = $direct_purchase_limit - $direct_purchase_limit_per_person;
        //     }
        // }
        // if($direct_purchase_limit > 0 ){
        //     $flush_account->update([
        //         'balance' => $flush_account->balance + $direct_purchase_limit,
        //     ]);
        // }
        // if($direct_health_limit > 0 ){
        //     $flush_account->update([
        //         'balance' => $flush_account->balance + $direct_health_limit,
        //     ]);
        // }
    } 
    public static  function directTeamIncome($price,$package,$user,$due_to)
    {
        $direct_team_income = $price / 100 * $package->direct_team_income;
        info("Direct Team Income Amount : $direct_team_income"); 
        $per_person_amount = $direct_team_income/20;
        info("Direct Team Income Amount Per Person : $per_person_amount"); 
        $direct_teams = $user->directTeamParents();
        foreach($direct_teams as $index => $direct_team)
        {
            $referral_account = User::where('referral',$direct_team->id)->first();
            if($referral_account)
            {
                $direct_team->update([
                    // 'total_income' => $direct_team->total_income + $per_person_amount/2,
                    'cash_wallet' => $direct_team->cash_wallet + $per_person_amount,
                    'direct_team_income' => $direct_team->direct_team_income + $per_person_amount
                ]);
                info("Direct Team Income Amount Added to $direct_team->name : $per_person_amount"); 
                $direct_team_income = $direct_team_income - $per_person_amount;
            }else{
                info("Direct Team Income Amount For $direct_team->name added to Flush Account as it is not in tree"); 
            }
        }
        if($direct_team_income > 0)
        {
            $flush_account = CompanyAccount::find(1);
            $flush_account->update([
                'balance' => $flush_account->balance + $direct_team_income,
            ]);
            info("Direct Team Income Remaining Amount $direct_team_income Added to flush company Account"); 
        }
    } 
    public static  function UplineIncome($price,$package,$user)
    {
        $upline_income = $price / 100 * $package->upline_income;
        info("Upline Income Amount : $upline_income"); 
        $per_person_amount = $upline_income/20;
        info("Upline Income Amount Per Person : $per_person_amount"); 
        $uplines = $user->uplineUserIncome();
        foreach($uplines as $upline)
        {
            $response = $upline->CompareDownlineuser($upline,$user);
            if($response)
            {
                Earning::create([
                    'price' => $per_person_amount,
                    'user_id' => $upline->id,
                    'due_to' => $user->id,
                    'type' => 'upline_income',
                    'status' => 0,
                ]);
                // $upline->update([
                //     'total_income' => $upline->total_income + $per_person_amount/2,
                //     'cash_wallet' => $upline->cash_wallet + $per_person_amount/2,
                // ]);
                info("Upline Income Amount Added to $upline->name : $per_person_amount"); 
                $upline_income = $upline_income - $per_person_amount;
            }else{
                $flush_account = CompanyAccount::find(1);
                $flush_account->update([
                    'balance' => $flush_account->balance + $per_person_amount,
                ]);
                info("Upline Income For $upline->name Amount $per_person_amount Added to flush company Account"); 
            }
          
        }
    } 
    public static  function DownlineIncome($price,$package,$user)
    {
        $down_line_income = $price / 100 * $package->down_line_income;
        info("Downline Income Amount : $down_line_income"); 
        $per_person_amount = $down_line_income/20;
        info("Downline Income Amount Per Person : $per_person_amount"); 
        $downlines = $user->downlineUsersForDowlineIncome();
        foreach($downlines as $downline)
        {
            // $response = $downline->ComparUplineuser($downline,$user);
            $response =true;
            if($response)
            {
                Earning::create([
                    'price' => $per_person_amount,
                    'user_id' => $downline->id,
                    'due_to' => $user->id,
                    'status' => 0,
                    'type' => 'down_line_income'
                ]);
                // $downline->update([
                //     'total_income' => $downline->total_income + $per_person_amount/2,
                //     'cash_wallet' => $downline->cash_wallet + $per_person_amount/2,
                // ]);
                info("Downline Income Amount Added to $downline->name : $per_person_amount"); 
            }else{
                $flush_account = CompanyAccount::find(1);
                $flush_account->update([
                    'balance' => $flush_account->balance + $per_person_amount,
                ]);
                info("Downline Income For $downline->name Added to flush company Account :  $per_person_amount"); 
            }
            
        }
    } 
    public static  function UplinePlacementIncome($price,$package,$user)
    {
        $upline_placement_income = $price / 100 * $package->upline_placement_income;
        info("Upline Placement Income Amount : $upline_placement_income"); 
        $per_person_amount = $upline_placement_income/20;
        info("Upline Placement Income Amount Per Person : $per_person_amount"); 
        $uplines = $user->uplineUserIncome();
        foreach($uplines as $upline)
        {
            $response = $upline->CompareDownlineuser($upline,$user);
            $referral_account = User::where('referral',$upline->id)->first();
            if($response && $referral_account)
            {
                $refer_by = User::find($upline->refer_by);
                if($refer_by)
                {
                    Earning::create([
                        'price' => $per_person_amount,
                        'user_id' => $refer_by->id,
                        'due_to' => $user->id,
                        'status' => 0,
                        'type' => 'upline_placement_income'
                    ]);
                    // $refer_by->update([
                    //     'total_income' => $refer_by->total_income + $per_person_amount/2,
                    //     'cash_wallet' => $refer_by->cash_wallet + $per_person_amount/2
                    // ]);
                    info("Upline Placement Income Amount Added to $refer_by->name : $per_person_amount"); 
                }else{
                    $flush_account = CompanyAccount::find(1);
                    $flush_account->update([
                        'balance' => $flush_account->balance + $per_person_amount,
                    ]);
                    info("Upline Placement Income For $upline->name Amount $per_person_amount Added to flush company Account");     
                }
            }
            else{
                $flush_account = CompanyAccount::find(1);
                $flush_account->update([
                    'balance' => $flush_account->balance + $per_person_amount,
                ]);
                info("Upline Placement Income For $upline->name Amount $per_person_amount Added to flush company Account");          
            }
        }
    } 
    public static  function DownLinePlacementIncome($price,$package,$user)
    {
        $down_line_placement_income = $price / 100 * $package->down_line_placement_income;
        info("Downline Placement Income Amount : $down_line_placement_income"); 
        $per_person_amount = $down_line_placement_income/20;
        info("Downline Placement Income Amount Per Person : $per_person_amount"); 
        $downlines = $user->downlineUsersForDowlineIncome();
        foreach($downlines as $downline)
        {
            // $response = $downline->ComparUplineuser($downline,$user);
            $response =true;
            $referral_account = User::where('referral',$downline->id)->first();
            if($response && $referral_account)
            {
                $refer_by = User::find($downline->refer_by);
                if($refer_by)
                {
                    Earning::create([
                        'price' => $per_person_amount,
                        'user_id' => $refer_by->id,
                        'due_to' => $user->id,
                        'status' => 0,
                        'type' => 'down_line_placement_income'
                    ]);
                    // $refer_by->update([
                    //     'total_income' => $refer_by->total_income + $per_person_amount/2,
                    //     'cash_wallet' => $refer_by->cash_wallet + $per_person_amount/2
                    // ]);
                    info("Downline Placement Income Amount Added to $refer_by->name : $per_person_amount"); 
                }else{
                    $flush_account = CompanyAccount::find(1);
                    $flush_account->update([
                        'balance' => $flush_account->balance + $per_person_amount,
                    ]);
                    info("Downline Placement Income For $downline->name Amount $per_person_amount Added to flush company Account"); 
                }
            }else{
                $flush_account = CompanyAccount::find(1);
                $flush_account->update([
                    'balance' => $flush_account->balance + $per_person_amount,
                ]);
                info("Downline Placement Income For $downline->name Amount $per_person_amount Added to flush company Account"); 
          
            }
            
        }
    } 
    public static function TradeIncome($price,$package,$user,$due_to)
    {
        $trade_income = $price / 100 * $package->trade_income;
        info("Trade Income Amount : $trade_income");
        if($user->id == $due_to->id)
        {
            $new_trade_income = $trade_income/2;
            Earning::create([
                'price' => $new_trade_income,
                'user_id' => $user->id,
                'due_to' => $due_to->id,
                'type' => 'trade_income'
            ]);
            $user->update([
                'total_income' => $user->total_income + $new_trade_income/2,
                'cash_wallet' => $user->cash_wallet + $new_trade_income/2,
            ]);
            info("Trade Income Amount Added to $user->name : $new_trade_income"); 
            $trade_account = CompanyAccount::where('name','Trade Income')->first();
            $trade_account->update([
                'balance' => $trade_account->balance + $new_trade_income,
            ]);
        }else{
            if($user->type == 'Leader')
            {
                Earning::create([
                    'price' => $trade_income,
                    'user_id' => $user->id,
                    'due_to' => $due_to->id,
                    'type' => 'ranking_income'
                ]);
                $user->update([
                    'total_income' => $user->total_income + $trade_income/2,
                    'cash_wallet' => $user->cash_wallet + $trade_income/2,
                ]);
                info("Trade Income Amount Added to $user->name : $trade_income"); 
            }
            else{
                $flush_account = CompanyAccount::find(1);
                $flush_account->update([
                    'balance' => $flush_account->balance + $trade_income,
                ]);
                info("Trade Income Remaining Amount $trade_income Added to flush company Account"); 
            }
        }
       
    } 
    public static function rebirthAndAsscoaiteIncome($price,$package,$referBy,$user)
    {
        $self_rebirth = $price / 100 * $package->self_rebirth;
        info("Self Renew Amount : $self_rebirth");
        $user->update([
            'for_renew' => $user->for_renew + $self_rebirth,
        ]);
        $direct_rebirth = $price / 100 * $package->direct_rebirth;
        info("Direct Renew Amount : $direct_rebirth");
        $referBy->update([
            'for_renew' => $referBy->for_renew + $direct_rebirth,
        ]);
        $self_salary = $price / 100 * $package->self_salary;
        info("Self Salary Amount : $self_salary");
        $user->update([
            'salary_reward' => $user->salary_reward + $self_salary,
        ]);
        $direct_salary = $price / 100 * $package->direct_salary;
        info("Direct Salary Amount : $direct_salary");
        $referBy->update([
            'salary_reward' => $referBy->salary_reward + $direct_salary,
        ]);
        // $self_associate = $price / 100 * $package->self_associate;
        // info("Self Associate Amount : $self_associate");
        // $user->update([
        //     'community_pool' => $user->community_pool + $self_associate,
        // ]);
        // $direct_associate = $price / 100 * $package->direct_associate;
        // info("Direct Associate Amount : $direct_associate");
        // $referBy->update([
        //     'community_pool' => $referBy->community_pool + $direct_associate,
        // ]);
       
    } 
    public static function CompanyIncome($price,$package,$type)
    {
        $company_income = $price / 100 * $package->company_income;
        info("Total Company Income Amount : $company_income");
        $company_account= CompanyAccount::find(1);
        $company_account->update([
            'balance' => $company_account->balance + $company_income,
        ]);
        $trade_income = $price / 100 * $package->trade_income;
        info("Total Trade Income Amount : $trade_income");
        $tradeAccount= CompanyAccount::where('name','Trade Account')->first();
        if($tradeAccount && $trade_income > 0){
            $tradeAccount->update([
                'balance' => $tradeAccount->balance + $trade_income,
            ]);
        }
        $company_new_account_income = $price / 100 * $package->company_new_account_income;
        info("Total Company New Account Income Amount : $company_new_account_income");
        $new_account= CompanyAccount::where('name','New Account')->first();
        if($new_account && $company_new_account_income > 0){
            $new_account->update([
                'balance' => $new_account->balance + $company_new_account_income,
            ]);
        }
        $company_employee_account_income = $price / 100 * $package->company_employee_account_income;
        info("Total Company employee Account Income Amount : $company_employee_account_income");
        $employee_account= CompanyAccount::where('name','Employee Account')->first();
        if($employee_account && $company_employee_account_income > 0){
            $employee_account->update([
                'balance' => $employee_account->balance + $company_employee_account_income,
            ]);
        }

        // $company_renew_income = $price / 100 * $package->company_renew_income;
        // info("Total Company Renew Account Income Amount : $company_renew_income");
        // $renew_account= CompanyAccount::where('name','Renew Account')->first();
        // if($renew_account && $company_renew_income > 0){
        //     $renew_account->update([
        //         'balance' => $renew_account->balance + $company_renew_income,
        //     ]);
        // }
        $renew_all_account_income = $price / 100 * $package->renew_all_accounts;
        info("Total Renew All Accounts Income Amount : $renew_all_account_income");
        $renew_all_account= CompanyAccount::where('name','Renew All Account')->first();
        if($renew_all_account && $renew_all_account_income > 0){
            $renew_all_account->update([
                'balance' => $renew_all_account->balance + $renew_all_account_income,
            ]);
        }
        // $all_assoicate_income = $price / 100 * $package->all_assoicate;
        // info("Total All Assoicate Income Amount : $all_assoicate_income");
        // $all_assoicate_account= CompanyAccount::where('name','All Assoicate Account')->first();
        // if($all_assoicate_account && $all_assoicate_income > 0){
        //     $all_assoicate_account->update([
        //         'balance' => $all_assoicate_account->balance + $all_assoicate_income,
        //     ]);
        // }
        // $company_assoicate_income = $price / 100 * $package->company_assoicate;
        // info("Total Company Assoicate Income Amount : $all_assoicate_income");
        // $company_assoicate_account= CompanyAccount::where('name','Company Assoicate Account')->first();
        // if($company_assoicate_account && $company_assoicate_income > 0){
        //     $company_assoicate_account->update([
        //         'balance' => $company_assoicate_account->balance + $company_assoicate_income,
        //     ]);
        // }
        // $for_medicine_income = $price / 100 * $package->for_medicine;
        // info("Total For Medicine Income Amount : $for_medicine_income");
        // $for_medicine_account= CompanyAccount::where('name','For Medicine Account')->first();
        // if($for_medicine_account && $for_medicine_income > 0){
        //     $for_medicine_account->update([
        //         'balance' => $for_medicine_account->balance + $for_medicine_income,
        //     ]);
        // }
        // $for_purchase_all_income = $price / 100 * $package->for_purchase_all;
        // info("Total For Purchase All Income Amount : $for_purchase_all_income");
        // $ffor_purchase_all_account= CompanyAccount::where('name','For Purchase All Account')->first();
        // if($ffor_purchase_all_account && $for_purchase_all_income > 0){
        //     $ffor_purchase_all_account->update([
        //         'balance' => $ffor_purchase_all_account->balance + $for_purchase_all_income,
        //     ]);
        // }
        // $monthly_draw_income = $price / 100 * $package->monthly_draw;
        // info("Total Monthly Draw Income Amount : $monthly_draw_income");
        // $monthly_draw_account= CompanyAccount::where('name','Monthly Draw Account')->first();
        // if($monthly_draw_account && $monthly_draw_income > 0){
        //     $monthly_draw_account->update([
        //         'balance' => $monthly_draw_account->balance + $monthly_draw_income,
        //     ]);
        // }
        // $company_products_income = $price / 100 * $package->company_products;
        // info("Total Company Products Income Amount : $company_products_income");
        // $company_products_account = CompanyAccount::where('name','Company Products Account')->first();
        // if($company_products_account && $company_products_income > 0){
        //     $company_products_account->update([
        //         'balance' => $company_products_account->balance + $company_products_income,
        //     ]);
        // }
        // info("Company Income Amount : $company_income added to Company Account");

    } 
    public static function CommunityPoolIncome($user,$price)
    {
        $refer_by = User::find($user->refer_by);
        $package = $user->package;
        if($refer_by)
        {
            //Give it Main Refer By and add money in Total Income of Refer By User
            ReferralIncome::directIncome($price,$package,$refer_by,$user);
            //Give it to Parents of your Direct Referral Remaining goes to company Account named Flush Income
            //add money in Total Income
            ReferralIncome::directTeamIncome($price,$package,$refer_by,$user);
        }
        //Give it to Upline Tree Member and it in total income and remaining goes to flush Account 
        ReferralIncome::UplineIncome($price,$package,$user);
        //Give it to Downline Tree and remaining goes to flush Account 
        ReferralIncome::DownlineIncome($price,$package,$user);
        //Give it to Upline Tree members refer by and remaining goes to flush Account 
        ReferralIncome::UplinePlacementIncome($price,$package,$user);
        //Give it to Downline Tree members refer by and remaining goes to flush Account 
        ReferralIncome::DownLinePlacementIncome($price,$package,$user);
        //If the Refer By is leader then give him this also otherwise  goes to flush Account    
        ReferralIncome::TradeIncome($price,$package,$user,$user); 
        ReferralIncome::CompanyIncome($price,$package,$type = 'Community');
    } 
    public static  function transferAmountToUpline($amount,$user)
    {
        $remaining_amount = $amount;
        $per_person_amount = $amount/20;
        info("Upline Income Amount Per Person : $per_person_amount"); 
        $uplines = $user->uplineUserIncome();
        foreach($uplines as $upline)
        {
            $response = $upline->CompareDownlineuser($upline,$user);
            if($response)
            {
                $upline->update([
                    'total_income' => $upline->total_income + $per_person_amount,
                ]);
                Earning::create([
                    'price' => $per_person_amount,
                    'user_id' => $upline->id,
                    'due_to' => $user->id,
                    'type' => 'reward_income'
                ]);
                info("Upline Income Amount Added to $upline->name : $per_person_amount"); 
            }else{
                $flush_account = CompanyAccount::find(1);
                $flush_account->update([
                    'balance' => $flush_account->balance + $per_person_amount,
                ]);
                info("Upline Income For $upline->name Amount $per_person_amount Added to flush company Account"); 
            }
            $remaining_amount = $remaining_amount - $per_person_amount;
        }
        if($remaining_amount > 0)
        {
            $flush_account = CompanyAccount::find(1);
            $flush_account->update([
                'balance' => $flush_account->balance + $remaining_amount,
            ]);
        }

    } 
    
    public static  function directPoolIncome($price,$package,$user,$due_to)
    {
        $direct_income = $price / 100 * $package->direct_pool_income;
        info("Direct Pool Income adding $direct_income $user->for_pool to $user->name");
        $user->update([
            'for_pool' => $user->for_pool + $direct_income
        ]);
        info("Direct Income Transfer Successfully to Total For Pool $user->for_pool");
        Earning::create([
            'price' => $direct_income,
            'user_id' => $user->id,
            'due_to' => $due_to->id,
            'type' => 'pool_income'
        ]);
    } 
}