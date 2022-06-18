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
use Illuminate\Support\Facades\Auth;

class ReferralIncome
{
    public static function referral($user,$package)
    {
        $refer_by = User::find($user->refer_by);
        if($user->referral == null)
        {
            //Replacing Fake User with this user in tree or placement in Tree
            $referral_account = User::where('referral',null)->first();
            $referral_account->update([
                'referral' => $user->id
            ]);
        }
        $direct_income = $package->price / 100 * $package->direct_income;
        $in_direct_team_income = $package->price / 100 * $package->indirect_income;
        $total_income = $package->price - $direct_income - $in_direct_team_income;
        //Give it Main Refer By and add money in Total Income of Refer By User
        ReferralIncome::directIncome($direct_income,$refer_by,$user);
        //Give it to Parents of your Direct Referral Remaining goes to company Account named Flush Income
        //add money in Total Income
        ReferralIncome::indirectTeamIncome($in_direct_team_income,$refer_by,$user);
        //Give it to Upline Tree Member and it in total income and remaining goes to flush Account
        ReferralIncome::CompanyIncome($total_income);
        PackageHistory::create([
            'package_id' => $package->id,
            'user_id' => $user->id
        ]);
    } 
    public static  function directIncome($direct_income,$refer_by,$due_to)
    {
        info("Direct Income adding ($direct_income) to  $refer_by->cash_wallet of $refer_by->name");
        Earning::create([
            'price' => $direct_income,
            'user_id' => $refer_by->id,
            'due_to' => $due_to->id,
            'type' => 'direct_income'
        ]);
        $refer_by->update([
            'cash_wallet' => $refer_by->cash_wallet + $direct_income
        ]);
        info("Direct Income Transfer Successfully to Total Income $refer_by->cash_wallet");
       
    } 
    public static  function indirectTeamIncome($in_direct_team_income,$user,$due_to)
    {
        info("InDirect Team Income Amount : $in_direct_team_income"); 
        $per_person_amount = $in_direct_team_income/3;
        info("InDirect Team Income Amount Per Person : $per_person_amount"); 
        $direct_teams = $user->indirectTeamParents();
        foreach($direct_teams as $direct_team)
        {
            $referral_account = User::where('referral',$direct_team->id)->first();
            if($referral_account)
            {
                Earning::create([
                    'price' => $per_person_amount,
                    'user_id' => $direct_team->id,
                    'due_to' => $due_to->id,
                    'type' => 'in_direct_team_income'
                ]);
                $direct_team->update([
                    'cash_wallet' => $direct_team->cash_wallet + $per_person_amount
                ]);
                info("InDirect Team Income Amount Added to $direct_team->name : $per_person_amount"); 
                $in_direct_team_income = $in_direct_team_income - $per_person_amount;
            }else{
                info("InDirect Team Income Amount For $direct_team->name added to Company Account as it is not in tree"); 
            }
        }
        if($in_direct_team_income > 0)
        {
            $company_account= CompanyAccount::company_account();
                $company_account->update([
                    'balance' => $company_account->balance + $in_direct_team_income,
                ]);
            info("InDirect Team Income Remaining Amount $in_direct_team_income Added to flush company Account"); 
        }
    } 
    public static function CompanyIncome($price)
    {
        $company_income = $price / 100 * 1;
        info("Total Company Income Amount : $company_income");
        $company_account= CompanyAccount::company_account();
        $company_account->update([
            'balance' => $company_account->balance + $company_income,
        ]);
        info("Expense Account Amount : $company_income");
        $expense_account= CompanyAccount::expense_account();
        $expense_account->update([
            'balance' => $expense_account->balance + $company_income,
        ]);
        info("Reward Account Amount : $company_income");
        $reward_account= CompanyAccount::reward_account();
        $reward_account->update([
            'balance' => $reward_account->balance + $company_income,
        ]);
        info("In loss Account Amount : $company_income");
        $inloss_account= CompanyAccount::inloss_account();
        $inloss_account->update([
            'balance' => $inloss_account->balance + $company_income,
        ]);
        info("Reward Account Amount : $company_income");
        $roi_income = $price / 100 * 96;
        $roi_account= CompanyAccount::roi_account();
        $roi_account->update([
            'balance' => $roi_account->balance + $roi_income,
        ]);

    } 
}