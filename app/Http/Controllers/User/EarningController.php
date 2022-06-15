<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EarningController extends Controller
{
    public function direct_income(Request $request)
    {
        return view('user.earning.direct_income');
    } 
    public function indirect_income(Request $request)
    {
        return view('user.earning.direct_team_income');
    } 
    public function roi_income(Request $request)
    {
        return view('user.earning.roi_income');
    } 
}
