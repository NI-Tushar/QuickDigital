<?php

namespace App\Http\Controllers;

use App\Models\AffiliatorAccount;
use App\Models\AffiliatorTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AffiliatorTransactionController extends Controller
{
    // For Admin
    public function getAllTransactions()
    {
        $transactions = AffiliatorTransaction::latest()->get();
        return view('admin.affiliate.transaction.index', compact('transactions'));
    }

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

    public function store(Request $request)
    {
        $request->validate([
            'amount' => ['required', 'numeric']
        ]);

        if($request->amount >=500){

            $account = Auth::guard('user')->user()->account;;

            if($account->balance >= 500){
                $transaction = new AffiliatorTransaction();
                $transaction->user_id = Auth::guard('user')->user()->id;
                $transaction->affiliator_account_id  = $account->id;
                $transaction->amount = $request->amount;
                $transaction->save();

                // Its worked when use withdrawl system automatic
                if ($transaction->status === 'Complete') {
                    $transaction->account->decrement('balance', $transaction->amount);

                    return redirect()->back()->with('success', "Your Balance was Successfully Transferred to your provided account. Kindly Check your Bank Account");
                }

                return redirect()->back()->with('success', "Your request has been submitted. Within 24 hours your transaction will completed. We will confirm with a message.");

            }else{

                return redirect()->back()->with('error', "Sorry, You do not have enough balance. If you withdraw your balance you need a minimum 500 BDT on your account.");
            }

        }else{

            return redirect()->back()->with('error', "Sorry, Our business policy you a minimum 500 BDT withdrawal on your account.");
        }
    }

    // For Admin
    public function status(AffiliatorTransaction $affiliatorTransaction, Request $request)
    {
        $affiliatorTransaction->status = $request->status;
        $affiliatorTransaction->save();

        // Its worked when use withdrawl system automatic
        if ($affiliatorTransaction->status === 'Complete') {
            $affiliatorTransaction->account->decrement('balance', $affiliatorTransaction->amount);

            return redirect()->back()->with('success', "Balance was Successfully Transferred on Affiliate provided account.");
        }
        return redirect()->back()->with('success', "Status Update Successfully!");
    }

    // For Admin
    public function destroy(AffiliatorTransaction $affiliatorTransaction)
    {
        $affiliatorTransaction->delete();
        return redirect()->back()->with('success', 'Delete Record successfully!');
    }


}
