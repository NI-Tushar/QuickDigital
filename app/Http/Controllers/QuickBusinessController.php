<?php

namespace App\Http\Controllers;

use App\Models\Quickbusiness;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class QuickBusinessController extends Controller
{
    public function requestForm()
    {
        return view('quick_digital.boot_camp.request_form');
    }

    public function index()
    {
        $quickbusiness = Quickbusiness::where('type', 'normal')->latest()->paginate(50);
        return view('quick_digital.boot_camp.index', compact('quickbusiness'));
    }

    public function affiliators()
    {
        $quickbusiness = Quickbusiness::where('type', 'affiliator')->latest()->paginate(50);
        return view('quick_digital.boot_camp.affiliator', compact('quickbusiness'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'min:11', 'max:11'],
            'gender' => ['required', 'string', 'min:2', 'max:255'],
            // 'profession' => ['required', 'string', 'min:2', 'max:255'],
            // 'institute' => ['required', 'string', 'min:2', 'max:255'],
            // 'interests' => ['nullable', 'array'],
            // 'division' => ['required', 'string', 'min:2', 'max:255'],
            // 'district' => ['required', 'string', 'min:2', 'max:255'],
            // 'address' => ['required', 'string', 'min:2', 'max:255'],
            // 'agree' => ['required'],
        ]);

        $quickbusiness = new Quickbusiness();
        $quickbusiness->name = $request->name;
        $quickbusiness->email = $request->email;
        $quickbusiness->phone = $request->phone;
        $quickbusiness->gender = $request->gender;
        $quickbusiness->save();

        // $quickbusiness->profession = $request->profession;
        // $quickbusiness->institute = $request->institute;

        // Ensure the interests array is converted to a string (JSON encoding)
        // $quickbusiness->interests = $request->interests ? json_encode($request->interests) : null;

        // $quickbusiness->division = $request->division;
        // $quickbusiness->district = $request->district;
        // $quickbusiness->address = $request->address;
        // $quickbusiness->agree = $request->agree;

        return redirect()->back()->with('success', 'আপনার রিকোয়েস্ট সফলভাবে সাবমিট হয়েছে!');
    }

    public function show(Quickbusiness $quickbusiness)
    {
        return response()->json($quickbusiness);
    }

    public function destroy(Quickbusiness $quickbusiness)
    {
        $quickbusiness->delete();
        return redirect()->back()->with('success', 'Delete Record successfully!');
    }

    // Crate Affiliator
    public function creatAffiliator($id)
    {
        $quickbusiness = Quickbusiness::find($id);

        if (!$quickbusiness) {
            return response()->json(['error' => 'Bootcamp data not found'], 404);
        }

        $userExists = User::where('email', $quickbusiness->email)
            ->where('mobile', $quickbusiness->phone)
            ->exists();

        if ($userExists) {
            return response()->json(['error' => 'This data already exists in the User table'], 409);
        }

        $user = new User;
        $user->name = $quickbusiness->name;
        $user->user_type = 'affiliator';
        $user->mobile = $quickbusiness->phone;
        $user->email = $quickbusiness->email;
        $user->password = bcrypt('123456');
        $user->address = $quickbusiness->address;
        $user->status = 1;
        $user->is_instructor = 0;
        $user->save();

        if($user){
            $quickbusiness->type = 'affiliator';
            $quickbusiness->save();
        }

        // Send Email or SMS Affiliator
        //

        return response()->json($user, 201);

    }

}
