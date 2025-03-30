<?php

namespace App\Helpers;

use App\Models\CompanyAccount;
use App\Models\Earning;
use App\Models\User;

class FundTransferHelper
{
    public static function transfer($fund_fee,$user,$paymentPolicy,$receiver)
    {
        $sale_reward_for_users = $fund_fee/100*$paymentPolicy->sender_twenty_team_level;
        FundTransferHelper::directTeamIncome($sale_reward_for_users,$user,$user);

        $sale_reward_for_receiver = $fund_fee/100*$paymentPolicy->receiver_twenty_team_level;
        FundTransferHelper::directTeamIncome($sale_reward_for_receiver,$receiver,$user);
        
        $sale_reward_for_trade = $fund_fee/100*$paymentPolicy->company_trade_income;
        $trade_income= CompanyAccount::where('name','Trade Income')->first();
        $trade_income->update([
            'balance' => $trade_income->balance += $sale_reward_for_trade
        ]);

        $company_products = $fund_fee/100*$paymentPolicy->company_products;
        $company_products_account = CompanyAccount::where('name','Company Products Account')->first();
        if($company_products_account && $company_products > 0){
            $company_products_account->update([
                'balance' => $company_products_account->balance + $company_products,
            ]);
        }

        $for_purchase_all_income = $fund_fee / 100 * $paymentPolicy->purchase_reward;
        info("Total For Purchase All Income Amount : $for_purchase_all_income");
        $ffor_purchase_all_account= CompanyAccount::where('name','For Purchase All Account')->first();
        if($ffor_purchase_all_account && $for_purchase_all_income > 0){
            $ffor_purchase_all_account->update([
                'balance' => $ffor_purchase_all_account->balance + $for_purchase_all_income,
            ]);
        }
        
        $monthly_draw_income = $fund_fee / 100 * $paymentPolicy->draw_monthly;
        info("Total Monthly Draw Income Amount : $monthly_draw_income");
        $monthly_draw_account= CompanyAccount::where('name','Monthly Draw Account')->first();
        if($monthly_draw_account && $monthly_draw_income > 0){
            $monthly_draw_account->update([
                'balance' => $monthly_draw_account->balance + $monthly_draw_income,
            ]);
        }
        return true;
    }
    public static  function directTeamIncome($reward,$user,$due_to)
    {
        if($user){
            $per_person_amount = $reward/20;
            $direct_teams = $user->directTeamParents();
            foreach($direct_teams as $index => $direct_team)
            {
                $referral_account = User::where('referral',$direct_team->id)->first();
                if($referral_account)
                {
                    Earning::create([
                        'price' => $per_person_amount,
                        'user_id' => $direct_team->id,
                        'due_to' => $due_to->id,
                        'level' => $index+1,
                        'type' => 'sale_reward_income'
                    ]);
                    $direct_team->update([
                        'cash_wallet' => $direct_team->cash_wallet + $per_person_amount
                    ]);
                    info("Direct Team Income Amount Added to $direct_team->name : $per_person_amount"); 
                    $reward = $reward - $per_person_amount;
                }else{
                    info("Direct Team Income Amount For $direct_team->name added to Flush Account as it is not in tree"); 
                }
            }
        }
        if($reward > 0)
        {
            $flush_account = CompanyAccount::find(1);
            $flush_account->update([
                'balance' => $flush_account->balance + $reward,
            ]);
            info("Direct Team Income Remaining Amount $reward Added to flush company Account"); 
        }
    } 
}