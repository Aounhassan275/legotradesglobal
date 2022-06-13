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
    public static function referral($user)
    {
        $refer_by = User::find($user->refer_by);
        $package = $user->package;
        if($user->referral == null)
        {
            //Replacing Fake User with this user in tree or placement in Tree
            $referral_account = User::where('referral',null)->first();
            $referral_account->update([
                'referral' => $user->id
            ]);
        }
        //Give it Main Refer By and add money in Total Income of Refer By User
        ReferralIncome::directIncome($package,$refer_by,$user);
        //Give it to Parents of your Direct Referral Remaining goes to company Account named Flush Income
        //add money in Total Income
        ReferralIncome::indirectTeamIncome($package,$refer_by,$user);
        //Give it to Upline Tree Member and it in total income and remaining goes to flush Account
        ReferralIncome::TradeIncome($package->price,$package,$refer_by,$user);
        ReferralIncome::CompanyIncome($package->price,$package,$type = 'Arrival');
        PackageHistory::create([
            'package_id' => $package->id,
            'user_id' => $user->id
        ]);
    } 
    public static  function directIncome($package,$refer_by,$due_to)
    {
        $direct_income = $package->price / 100 * $package->direct_income;
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
    public static  function indirectTeamIncome($package,$user,$due_to)
    {
        $direct_team_income = $package->price / 100 * $package->indirect_income;
        info("Direct Team Income Amount : $direct_team_income"); 
        $per_person_amount = $direct_team_income/4;
        info("Direct Team Income Amount Per Person : $per_person_amount"); 
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
                    'type' => 'direct_team_income'
                ]);
                $direct_team->update([
                    'total_income' => $direct_team->total_income + $per_person_amount
                ]);
                info("Direct Team Income Amount Added to $direct_team->name : $per_person_amount"); 
                $direct_team_income = $direct_team_income - $per_person_amount;
            }else{
                info("Direct Team Income Amount For $direct_team->name added to Flush Account as it is not in tree"); 
            }
        }
        if($direct_team_income > 0)
        {
            $flush_account = CompanyAccount::where('name','Flush Income')->first();
            $flush_account->update([
                'balance' => $flush_account->balance + $direct_team_income,
            ]);
            info("Direct Team Income Remaining Amount $direct_team_income Added to flush company Account"); 
        }
    } 
    public static function CompanyIncome($price,$package,$type)
    {
        $company_income = $price / 100 * $package->company_income;
        info("Total Company Income Amount : $company_income");
        $company_account= CompanyAccount::where('name','Income')->first();
        $employees = Admin::employee();
        foreach($employees as $employee)
        {
            if($type == 'Community')
            {
                $employee_income = $price / 100 * $employee->community_income;
            }else{
                $employee_income = $price / 100 * $employee->new_arrival_income;
            }

            $employee->update([
                'balance' => $employee->balance + $employee_income,
            ]);
            info("Employee Income Amount : $employee_income added to  $employee->name");
            $company_income = $company_income - $employee_income;
        }
        $gift= CompanyAccount::where('name','Gift')->first();
        $gift->update([
            'balance' => $gift->balance + $employee_income,
        ]);
        $company_income = $company_income - $employee_income;
        info("Company Income Amount : $employee_income added to Gift Account");
        $leader= CompanyAccount::where('name','Team Leader')->first();
        $leader->update([
            'balance' => $leader->balance + $employee_income,
        ]);
        $company_income = $company_income - $employee_income;
        info("Company Income Amount : $employee_income added to Leader Account");
        $company_account->update([
            'balance' => $company_account->balance + $company_income,
        ]);
        info("Company Income Amount : $company_income added to Company Account");

    } 
}