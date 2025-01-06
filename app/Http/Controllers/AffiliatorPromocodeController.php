<?php

namespace App\Http\Controllers;

use App\Models\AffiliatorPromocode;
use App\Models\User;
use Illuminate\Http\Request;

class AffiliatorPromocodeController extends Controller
{
    public function index()
    {
        $promocodes = AffiliatorPromocode::latest()->get();

        $affiliators = User::with('promocode')
        ->where('user_type', 'affiliator')
        ->doesntHave('promocode')
        ->orderBy('name', 'asc')
        ->get();


        return view('admin.affiliate.promocode.index', compact('promocodes', 'affiliators'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'affiliator' => ['required']
        ]);

        // Generate unique proposal_id (proposal number)
        $last_code = AffiliatorPromocode::orderBy('id', 'desc')->first();
        $promocode = $last_code ? 'QD-' . sprintf('%06d', intval($last_code->id) + 1) : 'QD-000001';

        AffiliatorPromocode::create([
            'user_id' => $request->affiliator,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'code' => $promocode,
        ]);

        return redirect()->back()->with('success', 'Promo Code Generate successfully!');
    }

    public function status(AffiliatorPromocode $affiliatorPromocode, Request $request)
    {
        $affiliatorPromocode->status = $request->status;
        $affiliatorPromocode->save();

        return redirect()->back()->with('success', "Status Update Successfully!");
    }

    public function destroy(AffiliatorPromocode $affiliatorPromocode)
    {
        $affiliatorPromocode->delete();
        return redirect()->back()->with('success', 'Delete Record successfully!');
    }
}
