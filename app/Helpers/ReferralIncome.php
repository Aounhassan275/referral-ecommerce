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
        ReferralIncome::directPoolIncome($package->price,$package,$refer_by,$user);
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
        ReferralIncome::TradeIncome($package->price,$package,$refer_by,$user);
        ReferralIncome::CompanyIncome($package->price,$package,$type = 'Arrival');
        ReferralIncome::rebirthAndAsscoaiteIncome($package->price,$package,$refer_by,$user);
        PackageHistory::create([
            'package_id' => $package->id,
            'user_id' => $user->id
        ]);
        return true;
    } 
    public static  function FakeAccount($fake_account,$user)
    {
        $transfer_amount = $fake_account->total_income;
        if($transfer_amount > $user->package->price)
        {
            $transfer_amount = $user->package->price;
        }
        if($transfer_amount > 0)
        {
            $user->update([
                'for_pool' => $user->for_pool + 3,
            ]);
            $pool_account= CompanyAccount::where('name','Pool Income')->first();
            $pool_account->update([
                'balance' => $pool_account->balance + $transfer_amount,
            ]);
            $pool_account->update([
                'balance' => $pool_account->balance - 3,
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
        $direct_income = $price / 100 * $package->direct_income;
        info("Direct Income adding $direct_income $user->total_income to $user->name");
        $referral_account = User::where('referral',$user->id)->first();
        if($referral_account)
        {
            info("Direct Income User have Refferral Account $referral_account->name");
            if($user->type == "Field Manager" && !$user->fm_direct_income)
            {
                if($user->salary_type == 1 || $user->salary_type == 0)
                {
                    $user->update([
                        'cash_wallet' => $user->cash_wallet + $direct_income
                    ]);
                    info("Direct Income Transfer Successfully to Cash Wallet $user->cash_wallet");
                }elseif($user->salary_type == 2 || $user->salary_type == 3)
                {
                    $salary_account= CompanyAccount::find(1);
                    $salary_account->update([
                        'balance' => $salary_account->balance + $direct_income,
                    ]);
                    info("Direct Income Transfer Successfully to Salary Account");
                }
                Earning::create([
                    'price' => $direct_income,
                    'user_id' => $user->id,
                    'due_to' => $due_to->id,
                    'type' => 'ranking_income'
                ]);
            }else{
                if($user->salary_type == 1 || $user->salary_type == 0)
                {
                    $user->update([
                        'cash_wallet' => $user->cash_wallet + $direct_income
                    ]);
                    info("Direct Income Transfer Successfully to Cash Wallet $user->cash_wallet");
                }elseif($user->salary_type == 2 || $user->salary_type == 3)
                {
                    $salary_account= CompanyAccount::find(1);
                    $salary_account->update([
                        'balance' => $salary_account->balance + $direct_income,
                    ]);
                    info("Direct Income Transfer Successfully to Salary Account");
                }
                Earning::create([
                    'price' => $direct_income,
                    'user_id' => $user->id,
                    'due_to' => $due_to->id,
                    'type' => 'direct_income'
                ]);
             }
             $user->update([
                'fm_direct_income' => true
            ]);
        }else{
            if($user->package->price == $price)
            {
                Earning::create([
                    'price' => $direct_income,
                    'user_id' => $user->id,
                    'due_to' => $due_to->id,
                    'type' => 'direct_income'
                ]);
                if($user->salary_type == 1 || $user->salary_type == 0)
                {
                    $user->update([
                        'cash_wallet' => $user->cash_wallet + $direct_income
                    ]);
                    info("Direct Income Transfer Successfully to Cash Wallet $user->cash_wallet");
                }elseif($user->salary_type == 2 || $user->salary_type == 3)
                {
                    $salary_account= CompanyAccount::find(1);
                    $salary_account->update([
                        'balance' => $salary_account->balance + $direct_income,
                    ]);
                    info("Direct Income Transfer Successfully to Salary Account");
                }
            }else{
                $tree_account = $due_to->getUprPackageReferral();
                Earning::create([
                    'price' => $direct_income,
                    'user_id' => $tree_account->id,
                    'due_to' => $due_to->id,
                    'type' => 'direct_income'
                ]);
                if($tree_account->salary_type == 1 || $tree_account->salary_type == 0)
                {
                    $tree_account->update([
                        'cash_wallet' => $tree_account->cash_wallet + $direct_income
                    ]);
                    info("Direct Income To $user->name Refferal $tree_account->name : $user->cash_wallet");
                }elseif($tree_account->salary_type == 2 || $tree_account->salary_type == 3)
                {
                    $salary_account= CompanyAccount::find(1);
                    $salary_account->update([
                        'balance' => $salary_account->balance + $direct_income,
                    ]);
                    info("Direct Income To $user->name Refferal $tree_account->name to Salary Account");
                }
            }
        }
    } 
    public static  function directTeamIncome($price,$package,$user,$due_to)
    {
        $direct_team_income = $price / 100 * $package->direct_team_income;
        info("Direct Team Income Amount : $direct_team_income"); 
        $per_person_amount = $direct_team_income/20;
        info("Direct Team Income Amount Per Person : $per_person_amount"); 
        $direct_teams = $user->directTeamParents();
        foreach($direct_teams as $direct_team)
        {
            $referral_account = User::where('referral',$direct_team->id)->first();
            if($referral_account)
            {
                Earning::create([
                    'price' => $per_person_amount,
                    'user_id' => $direct_team->id,
                    'due_to' => $due_to->id,
                    'type' => 'direct_team_income'
                ]);
                if($direct_team->salary_type == 3)
                {
                    $salary_account= CompanyAccount::find(1);
                    $salary_account->update([
                        'balance' => $salary_account->balance + $per_person_amount,
                    ]);
                    info("Direct Team Income Amount Added to Salary Account $direct_team->name : $per_person_amount"); 
                }else{
                    $direct_team->update([
                        'total_income' => $direct_team->total_income + $per_person_amount/2,
                        'cash_wallet' => $direct_team->cash_wallet + $per_person_amount/2
                    ]);
                    info("Direct Team Income Amount Added to $direct_team->name : $per_person_amount"); 
                }
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
                    'type' => 'upline_income'
                ]);
                $upline->update([
                    'total_income' => $upline->total_income + $per_person_amount/2,
                    'cash_wallet' => $upline->cash_wallet + $per_person_amount/2,
                ]);
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
                    'type' => 'down_line_income'
                ]);
                $downline->update([
                    'total_income' => $downline->total_income + $per_person_amount/2,
                    'cash_wallet' => $downline->cash_wallet + $per_person_amount/2,
                ]);
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
                        'type' => 'upline_placement_income'
                    ]);
                    $refer_by->update([
                        'total_income' => $refer_by->total_income + $per_person_amount/2,
                        'cash_wallet' => $refer_by->cash_wallet + $per_person_amount/2
                    ]);
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
                        'type' => 'down_line_placement_income'
                    ]);
                    $refer_by->update([
                        'total_income' => $refer_by->total_income + $per_person_amount/2,
                        'cash_wallet' => $refer_by->cash_wallet + $per_person_amount/2
                    ]);
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
        info("Self Rebirth Amount : $self_rebirth");
        Earning::create([
            'price' => $self_rebirth,
            'user_id' => $user->id,
            'due_to' => $user->id,
            'type' => 'rebirth_income'
        ]);
        $user->update([
            'for_pool' => $user->for_pool + $self_rebirth,
        ]);
        $direct_rebirth = $price / 100 * $package->direct_rebirth;
        info("Direct Rebirth Amount : $direct_rebirth");
        Earning::create([
            'price' => $direct_rebirth,
            'user_id' => $referBy->id,
            'due_to' => $user->id,
            'type' => 'rebirth_income'
        ]);
        $referBy->update([
            'for_pool' => $referBy->for_pool + $direct_rebirth,
        ]);
        $self_associate = $price / 100 * $package->self_associate;
        info("Self Associate Amount : $self_associate");
        Earning::create([
            'price' => $self_associate,
            'user_id' => $user->id,
            'due_to' => $user->id,
            'type' => 'associate_income'
        ]);
        $user->update([
            'community_pool' => $user->community_pool + $self_associate,
        ]);
        $direct_associate = $price / 100 * $package->direct_associate;
        info("Direct Associate Amount : $direct_associate");
        Earning::create([
            'price' => $direct_associate,
            'user_id' => $referBy->id,
            'due_to' => $user->id,
            'type' => 'rebirth_income'
        ]);
        $referBy->update([
            'community_pool' => $referBy->community_pool + $direct_associate,
        ]);
       
    } 
    public static function CompanyIncome($price,$package,$type)
    {
        $company_income = $price / 100 * $package->company_income;
        info("Total Company Income Amount : $company_income");
        $company_account= CompanyAccount::find(1);
        $company_account->update([
            'balance' => $company_account->balance + $company_income,
        ]);
        // $employees = Admin::employee();
        // foreach($employees as $employee)
        // {
        //     if($type == 'Community')
        //     {
        //         $employee_income = $price / 100 * $employee->community_income;
        //     }else{
        //         $employee_income = $price / 100 * $employee->new_arrival_income;
        //     }

        //     $employee->update([
        //         'balance' => $employee->balance + $employee_income,
        //     ]);
        //     info("Employee Income Amount : $employee_income added to  $employee->name");
        //     $company_income = $company_income - $employee_income;
        // }
        // $gift= CompanyAccount::where('name','Gift')->first();
        // $gift->update([
        //     'balance' => $gift->balance + $employee_income,
        // ]);
        // $company_income = $company_income - $employee_income;
        // info("Company Income Amount : $employee_income added to Gift Account");
        // $leader= CompanyAccount::where('name','Team Leader')->first();
        // $leader->update([
        //     'balance' => $leader->balance + $employee_income,
        // ]);
        // $company_income = $company_income - $employee_income;
        // info("Company Income Amount : $employee_income added to Leader Account");
        // $company_account->update([
        //     'balance' => $company_account->balance + $company_income,
        // ]);
        info("Company Income Amount : $company_income added to Company Account");

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