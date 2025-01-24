<?php

namespace App\Http\Controllers;

use App\Models\Quickbusiness;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class BootcampController extends Controller
{
    public function requestForm()
    {
        Session::put('page', 'quickBusiness_req');
        return view('quick_digital.boot_camp.request_form');
    }

    public function index()
    {
        Session::put('page', 'affiliator');
        $totalCount = Quickbusiness::where('type', 'normal')->count();
        $bootcamps = Quickbusiness::where('type', 'normal')->latest()->paginate($totalCount);
        return view('quick_digital.boot_camp.index', compact('bootcamps','totalCount'));
    }

    public function affiliators()
    {
        $totalCount = Quickbusiness::where('type', 'affiliator')->count();
        $bootcamps = Quickbusiness::where('type', 'affiliator')->latest()->paginate(25);
        return view('quick_digital.boot_camp.affiliator', compact('bootcamps','totalCount'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'email', 'max:255','unique:quickbusiness,email'],
            'phone' => ['required', 'min:11', 'max:11','unique:quickbusiness,phone'],
            // 'profession' => ['required', 'string', 'min:2', 'max:255'],
            // 'institute' => ['required', 'string', 'min:2', 'max:255'],
            'gender' => ['required', 'string', 'min:2', 'max:255'],
            // 'interests' => ['nullable', 'array'],
            // 'division' => ['required', 'string', 'min:2', 'max:255'],
            // 'district' => ['required', 'string', 'min:2', 'max:255'],
            // 'address' => ['required', 'string', 'min:2', 'max:255'],
            // 'agree' => ['required'],
        ]);

        $bootcamp = new Quickbusiness();
        $bootcamp->name = $request->name;
        $bootcamp->email = $request->email;
        $bootcamp->phone = $request->phone;
        // $bootcamp->profession = $request->profession;
        // $bootcamp->institute = $request->institute;
        $bootcamp->gender = $request->gender;

        // Ensure the interests array is converted to a string (JSON encoding)
        // $bootcamp->interests = $request->interests ? json_encode($request->interests) : null;

        // $bootcamp->division = $request->division;
        // $bootcamp->district = $request->district;
        // $bootcamp->address = $request->address;
        // $bootcamp->agree = $request->agree;
        $bootcamp->save();

        return redirect()->back()->with('success', 'আপনার রিকোয়েস্ট সফলভাবে সাবমিট হয়েছে!');
    }

    public function show(Quickbusiness $bootcamp)
    {
        return response()->json($bootcamp);
    }

    public function destroy(Quickbusiness $bootcamp)
    {
        $bootcamp->delete();

        return redirect()->back()->with('success', 'Delete Record successfully!');
    }

    // Crate Affiliator
    public function creatAffiliator($id)
    {
        $bootcamp = Quickbusiness::find($id);

        if (!$bootcamp) {
            return response()->json(['error' => 'Bootcamp data not found'], 404);
        }

        $userExists = User::where('email', $bootcamp->email)
        ->where('mobile', $bootcamp->phone);

        if ($userExists->exists()) {
            $userExists->delete(); // Delete the record
        }

        $randomNumber = rand(1000, 9999);
        $default_pass = $bootcamp->email.$randomNumber;

        $user = new User;
        $user->name = $bootcamp->name;
        $user->user_type = 'affiliator';
        $user->mobile = $bootcamp->phone;
        $user->email = $bootcamp->email;
        $user->password = bcrypt($default_pass);
        $user->address = $bootcamp->address;
        $user->status = 1;
        $user->is_instructor = 0;
        $user->save();

        if($user){
            $bootcamp->type = 'affiliator';
            $bootcamp->password = $default_pass;
            $bootcamp->save();
        }

        // Send Email or SMS Affiliator
        //

        return response()->json($user, 201);
    }

    // search affiliator
    public function searchAffiliate(Request $request)
    {
        $data = $request->all();
        $id = Quickbusiness::where(function ($query) use ($data) {
            $query->where('email', $data['email_phone'])
            ->orWhere('phone', $data['email_phone']);
        })
        ->where('type', 'affiliator') // Additional condition
        ->value('id');
        $totalCount = Quickbusiness::where('type', 'affiliator')->count();
        $bootcamps = Quickbusiness::where('id', $id)->latest()->latest()->paginate(25);
        return view('quick_digital.boot_camp.affiliator', compact('bootcamps','totalCount'));
    }

}
