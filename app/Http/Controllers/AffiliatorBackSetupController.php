<?php

namespace App\Http\Controllers;

use App\Models\AffiliatorBackSetup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AffiliatorBackSetupController extends Controller
{
    // Affiliator Account Setup
    public function accountSetup()
    {
        return view('front.users.user_dashboard.affiliate.dashboard.account_setup');
    }

    public function accountSetupStore(Request $request)
    {
        $validated = $request->validate([
            'account_type' => 'required|string',
            'holder_name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'bank_name' => 'nullable|string|max:255',
            'account_number' => 'nullable|string|max:255',
            'branch_name' => 'nullable|string|max:255',
            'routing_number' => 'nullable|string|max:15',
            'mobile_banking_type' => 'nullable|string',
            'mobile_banking_number' => 'nullable|string|max:15',
        ]);

        // Get the authenticated user ID
        $userId = Auth::guard('user')->user()->id;

        // Check if the setup exists for the authenticated user
        $setup = AffiliatorBackSetup::where('user_id', $userId)->first();

        if ($setup) {
            // Update existing setup
            $setup->update($validated);
            $message = 'Affiliator account setup updated successfully.';
        } else {
            // Create a new setup
            AffiliatorBackSetup::create(array_merge($validated, ['user_id' => $userId]));
            $message = 'Affiliator account setup created successfully.';
        }

        return redirect()->back()->with('success', $message);
    }

}
