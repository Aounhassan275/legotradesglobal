<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\ReferralIncome;
use App\Helpers\UserHepler;
use App\Models\CompanyAccount;
use App\Models\Earning;
use App\Models\Package;
use Carbon\Carbon;

class AuthController extends Controller
{
    public function login(Request $request){
        $creds = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if(Auth::guard('admin')->attempt($creds))
        {
            toastr()->success('You Login Successfully');
            return redirect()->intended(route('admin.dashboard.index'));
        } else {
            return redirect()->back();
        }
    }
    
    public function logout()
    {
        Auth::logout();
        toastr()->success('You Logout Successfully');
        return redirect('/');
    }
    public function roi_distrubtion(Request $request) {
		info("Roi Distrubtion CRONJOB CALLED AT " . date("d-M-Y h:i a"));
		$payment_distrubtion_days = 365;
		$payment_distrubtion_days = date('Y-m-d', strtotime("-$payment_distrubtion_days days"));
		info("Roi Distrubtion CRONJOB:   $payment_distrubtion_days");
        $users = User::whereDate('created_at','>=',$payment_distrubtion_days)
                ->where('status','active')
                ->get();
		if ($users) {
            $total_users = $users->count();
            info("Roi Distrubtion CRONJOB Total Users : $total_users");
            foreach($users as $user)
            {
                $amount_to_distribute = $request->amount/100 * $user->package->price;
                $roi_account = CompanyAccount::roi_account();
                $roi_account->update([
                    'balance' => $roi_account->balance -= $amount_to_distribute,
                ]);
                $user->update([
                    'roi_account' => $user->roi_account += $amount_to_distribute
                ]);
                
                Earning::create([
                    'price' => $amount_to_distribute,
                    'user_id' => $user->id,
                    'type' => 'roi_income'
                ]);
                info("Roi Distrubtion CRONJOB For User $user->name : Amount $amount_to_distribute Added to flush company Account");  
            }

		} else {
			info("Roi Distrubtion CRONJOB: Users not found. ");
		}
		info("Roi Distrubtion CRONJOB END AT " . date("d-M-Y h:i a"));
        toastr()->success('Amount Distributed Successfully');
        return redirect()->back();
	}
    public function roi_distrubtion_transfer(Request $request) {
        $users = User::where('roi_account', '>' ,0)
                ->get();
		if ($users) {
            $total_users = $users->count();
            foreach($users as $user)
            {
                $amount = $user->roi_account;
                $user->update([
                    'roi_account' => 0,
                    'cash_wallet' => $user->cash_wallet += $amount,
                ]);
            }

		} 
        toastr()->success('Amount Distributed Successfully');
        return redirect()->back();
	}
}
