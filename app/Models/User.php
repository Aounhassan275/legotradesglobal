<?php

namespace App\Models;

use App\Helpers\ImageHelper;
use App\Models\Withdraw;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','phone', 'email', 'password','city','status','balance','refer_by',
        'address','cash_wallet','total_income','package_id', 'a_date','image', 
        'verification','referral','code','type','email_verified','associated_with',
        'temp_password','last_login','roi_account'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'a_date' => 'date',
        'last_login' => 'date',
    ];
    public function setPasswordAttribute($value){
        if (!empty($value)){
            $this->attributes['password'] = Hash::make($value);
        }
    }
    public function setImageAttribute($value){
        $this->attributes['image'] = ImageHelper::saveAImage($value,'/profile/');
    }
    public function refers()
    {
        return $this->hasMany('App\Models\User','refer_by')->where('status','active');
    }
    public static function status(){
        return (new static)::where('status','active')->get();
    }
    public function package()
    {
        return $this->belongsTo('App\Models\Package');
    }
    public static function active(){
        return (new static)::where('status','active')->get();
    } 
    public static function pending(){
        return (new static)::where('status','pending')->get();
    }
    
    public function withdraws()
    {
        return $this->hasMany(Withdraw::class);
    }
    public function packagehistory()
    {
        return $this->hasMany(PackageHistory::class);
    }

    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }

    public function c_deposits()
    {
        return $this->hasMany(C_deposit::class);
    }

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
    
    public function todayEarning()
    {
        return $this->hasMany(Earning::class)->whereDate('created_at',Carbon::today())->sum('price');
    }
    
    public function totalEarning()
    {
        return $this->hasMany(Earning::class)->sum('price');
    }
    public function directIncome()
    {
        return $this->hasMany(Earning::class)->where('type','direct_income');
    }
    public function indirectTeamIncome()
    {
        return $this->hasMany(Earning::class)->where('type','in_direct_team_income');
    }
    
    public function roiIncome()
    {
        return $this->hasMany(Earning::class)->where('type','roi_income');
    }
    
    public function totalWithdraw()
    {
        return $this->hasMany(Withdraw::class)->sum('payment');
    }
    public function completedWithdraw()
    {
        return $this->hasMany(Withdraw::class)->where('status','Completed')->sum('payment');
    }
    public function onHoldWithdraw()
    {
        return $this->hasMany(Withdraw::class)->where('status','On Hold')->sum('payment');
    }
    public function inProcessWithdraw()
    {
        return $this->hasMany(Withdraw::class)->where('status','in process')->sum('payment');
    }
    public function rejectedWithdraw()
    {
        return $this->hasMany(Withdraw::class)->where('status','Rejected')->sum('payment');
    }
    public function checkStatus(){
        if($this->a_date){
            return true;
        } else {
            return false;
        }
    }
	public function mrefers()
    {
        return $this->where('refer_by',$this->id)->get();
    }
	public function total_referrals()
    {
        $total_referrals = $this->mrefers()->where('status','active')->where('associated_with',null);
        $amount = 0;
        foreach($total_referrals as $referral)
        {
            $amount = $referral->package->price + $amount;
        }
        return $amount;
    }
	public function associatedUsersPackages()
    {
        $total_referrals = $this->where('associated_with',$this->id)->get();
        $amount = 0;
        foreach($total_referrals as $referral)
        {
            $amount = $referral->package->price + $amount;
        }
        return $amount;
    }
	public function associatedUsersIncome()
    {
        $total_referrals = $this->where('associated_with',$this->id)->get();
        $amount = 0;
        foreach($total_referrals as $referral)
        {
            $amount = $referral->cash_wallet + $amount;
        }
        return $amount/2;
    }
	public function associatedUsers()
    {
        $total_referrals = $this->where('associated_with',$this->id)->get();
        return $total_referrals;
    }

	public function placement()
    {
        $placement =   $this->where('referral',$this->id)->first();
        if($placement)
            return $placement->name;
        return null;
    }
	public function uplineUser()
    {
        $upline = [];
        $upper = $this;
        for($i = 0; $i < 4;$i++)
        {
            $upper = User::where('referral',$upper->id)->first();
            if(!$upper)
                break;
            $upline[] = $upper;
        }
        return $upline;
    }
	public function WithdrawLimits()
    {
        $withdraw_limit = $this->package->withdraw_limit;
        $referral_count = User::where('refer_by',$this->id)->where('type','!=','fake')->count();
        if($referral_count >= $withdraw_limit)
        {
            return true;
        }
        return false;
    }
	public function FundTransferLimits()
    {
        $fund_limit = $this->package->fund_limit;
        $referral_count = User::where('refer_by',$this->id)->where('type','!=','fake')->count();
        if($referral_count >= $fund_limit)
        {
            return true;
        }
        return false;
    }
	public function ComparUplineuser($downline,$upline)
    {
        $minimum_limit = $downline->package->min_limit;
        $users = [];
        $upper = $downline;
        for($i = 0; $i < $minimum_limit;$i++)
        {
            $upper = User::where('referral',$upper->id)->first();
            if(!$upper)
                break;
            $users[] = $upper;
        }
        foreach($users as $user)
        {

            if($user->id == $upline->id)
            {
                return true;
            }
        }
        return false;
    }
	public function downlineUsersForDowlineIncome()
    {
        $downline = [];
        $down = $this;
        for($i = 0; $i < 20;$i++)
        {
            $down = User::where('id',$down->referral)->first();
            if(!$down)
                break;
            $downline[] = $down;
        }
        return $downline;
    }
	public function indirectTeamParents()
    {
        $parents = [];
        $parent = $this;
        for($i = 0; $i < 4;$i++)
        {
            $parent = User::where('id',$parent->refer_by)->first();
            if(!$parent)
                break;
            $parents[] = $parent;
        }
        return $parents;
    }
	public function refer_by_name($id)
    {
        $user = User::find($id);
        if($user)
        {
            if($user->type != 'fake')
                return $user->name;
            else 
                return '';

        }else{
            return '';
        }
    }
    public function refer_by_user($id)
    {
        $user = User::find($id);
        return $user;
    }
    public function transcations()
    {
        return $this->hasMany('App\Models\Transcation');
    }
    public function earnings()
    {
        return $this->hasMany(Earning::class,'user_id');
    }
    public function pins()
    {
        return $this->hasMany(Pin::class,'user_id');
    }
    public function pin_used()
    {
        return $this->hasMany(PinUsed::class,'user_id');
    }
    public function getUprPackageReferral()
    {
        $parent = $this;
        for($i = 0; $i < 100;$i++)
        {
            $parent = User::where('id',$parent->refer_by)->first();
            if($parent)
            {
                if($parent->package->price >= 50)
                {
                    return $parent;
                }
            }
            if(!$parent)
                break;
        }
        return null;
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function chats()
    {
        return $this->hasMany(Chat::class);
    }  
    public function messages()
    {
        return $this->hasMany(ChatMessage::class,'user_id');
    }
    public function checkLimitForProducts()
    {
        if($this->package->max_limit > $this->products->count())
        {
            return true;
        }else{
            return false;
        }
    }
}
