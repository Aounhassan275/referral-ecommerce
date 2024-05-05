<?php

namespace App\Helpers;

use App\Models\Admin;
use App\Models\CompanyAccount;
use App\Models\Earning;
use App\Models\User;

class RenewReferralIncome
{
    public static function referral($user)
    {
        $refer_by = User::find($user->refer_by);
        $package = $user->package;
        $total_amount = $user->total_amount;
        //Give it Main Refer By and add money in Total Income of Refer By User
        ReferralIncome::directIncome($total_amount,$package,$refer_by,$user);
        ReferralIncome::directPoolIncome($total_amount,$package,$refer_by,$user);
        //Give it to Parents of your Direct Referral Remaining goes to company Account named Flush Income
        //add money in Total Income
        ReferralIncome::directTeamIncome($total_amount,$package,$refer_by,$user);
        //Give it to Upline Tree Member and it in total income and remaining goes to flush Account 
        ReferralIncome::UplineIncome($total_amount,$package,$user);
        //Give it to Downline Tree and remaining goes to flush Account 
        ReferralIncome::DownlineIncome($total_amount,$package,$user);
        //Give it to Upline Tree members refer by and remaining goes to flush Account 
        ReferralIncome::UplinePlacementIncome($total_amount,$package,$user);
        //Give it to Downline Tree members refer by and remaining goes to flush Account 
        ReferralIncome::DownLinePlacementIncome($total_amount,$package,$user);
        //If the Refer By is leader then give him this also otherwise  goes to flush Account 
        ReferralIncome::TradeIncome($total_amount,$package,$refer_by,$user);
        ReferralIncome::rebirthAndAsscoaiteIncome($total_amount,$package,$refer_by,$user);
        ReferralIncome::CompanyIncome($total_amount,$package,$type = 'Arrival');
        return true;
    } 
    public static  function directIncome($price,$package,$user,$due_to)
    {
        $direct_income = $price / 100 * $package->renew_direct_income;
        info("Direct Income adding $direct_income $user->total_income to $user->name");
        if($user)
        {
            $user->update([
                'cash_wallet' => $user->cash_wallet + $direct_income
            ]);
            Earning::create([
                'price' => $direct_income,
                'user_id' => $user->id,
                'due_to' => $due_to->id,
                'type' => 'ranking_income'
            ]);
        }else{
            $companyAccount = CompanyAccount::find(1);
            $companyAccount->update([
                'balance' => $companyAccount->balance + $direct_income,
            ]);
        }
    } 
    public static  function directTeamIncome($price,$package,$user,$due_to)
    {
        $direct_team_income = $price / 100 * $package->renew_direct_team_income;
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
                $direct_team->update([
                    'total_income' => $direct_team->total_income + $per_person_amount/2,
                    'cash_wallet' => $direct_team->cash_wallet + $per_person_amount/2,
                ]);
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
        $upline_income = $price / 100 * $package->renew_upline_income;
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
        $down_line_income = $price / 100 * $package->renew_down_line_income;
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
        $upline_placement_income = $price / 100 * $package->renew_upline_placement_income;
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
                        'cash_wallet' => $refer_by->cash_wallet + $per_person_amount/2,
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
        $down_line_placement_income = $price / 100 * $package->renew_down_line_placement_income;
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
                        'cash_wallet' => $refer_by->cash_wallet + $per_person_amount/2,
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
        $trade_income = $price / 100 * $package->renew_trade_income;
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
            $trade_account = CompanyAccount::find(1);
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
    public static function CompanyIncome($price,$package,$type)
    {
        $company_income = $price / 100 * $package->renew_company_income;
        info("Total Company Income Amount : $company_income");
        $account= CompanyAccount::find(1);
        $account->update([
            'balance' => $account->balance + $company_income,
        ]);
        info("Company Income Amount : $company_income added to Company Account");

    } 
    
    public static  function directPoolIncome($price,$package,$user,$due_to)
    {
        $direct_income = $price / 100 * $package->renew_direct_pool_income;
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
    public static function rebirthAndAsscoaiteIncome($price,$package,$referBy,$user)
    {
        $self_rebirth = $price / 100 * $package->renew_self_rebirth;
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
        $direct_rebirth = $price / 100 * $package->renew_direct_rebirth;
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
        $self_associate = $price / 100 * $package->renew_self_associate;
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
        $direct_associate = $price / 100 * $package->renew_direct_associate;
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
}