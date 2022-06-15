<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Deposit;
use App\Models\Earning;
use App\Models\Package;
use App\Models\Payment;
use App\Models\ReferralLog;
use App\Models\CompanyAccount;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ReferralController extends Controller
{
    public function showTree()
    {
        $user = Auth::user();
        $refers = $user->refers();
        return view('user.refer.user_tree',compact('user','refers',));
    }    
}