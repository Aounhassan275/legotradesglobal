<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyAccount extends Model
{
    protected $fillable = [
        'balance','name'
    ];
    public static function company_account()
    {
        return (New static)::where('name','Company Account')->first();
    }
    public static function expense_account()
    {
        return (New static)::where('name','Expense Account')->first();
    }
    public static function reward_account()
    {
        return (New static)::where('name','Reward Account')->first();
    }
    public static function inloss_account()
    {
        return (New static)::where('name','Inloss Account')->first();
    }
    public static function roi_account()
    {
        return (New static)::where('name','Roi Account')->first();
    }
}
