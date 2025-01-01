<?php

namespace App\Http\Controllers;

use App\Models\AffiliatorAccount;
use App\Models\AffiliatorTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AffiliatorTransactionController extends Controller
{
    public function index()
    {
        $account = AffiliatorAccount::where('user_id', Auth::guard('user')->user()->id)->first();

        // Check if account exists
        if ($account) {
            $transactions = $account->transactions()->orderBy('created_at', 'desc')->paginate(10);
        } else {
            $transactions = collect(); // Empty collection for transactions
        }

        return view('front.users.user_dashboard.affiliate.account.index', compact('account', 'transactions'));
    }



}
