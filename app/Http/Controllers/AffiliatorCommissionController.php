<?php

namespace App\Http\Controllers;

use App\Models\AffiliatorCommission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AffiliatorCommissionController extends Controller
{
    public function index()
    {
        $commissions = AffiliatorCommission::where('user_id', Auth::guard('user')->user()->id)->latest()->paginate(20);
        $totalCommission = $commissions->sum('amount');
        return view('front.users.user_dashboard.affiliate.commission.index', compact('commissions', 'totalCommission'));
    }
}
