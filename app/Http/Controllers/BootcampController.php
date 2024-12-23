<?php

namespace App\Http\Controllers;

use App\Models\Bootcamp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class BootcampController extends Controller
{
    public function requestForm()
    {
        return view('quick_digital.boot_camp.request_form');
    }

    public function index()
    {
        $bootcamps = Bootcamp::where('type', 'normal')->latest()->paginate(50);
        return view('quick_digital.boot_camp.index', compact('bootcamps'));
    }

    public function affiliators()
    {
        $bootcamps = Bootcamp::where('type', 'affiliator')->latest()->paginate(50);
        return view('quick_digital.boot_camp.affiliator', compact('bootcamps'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'min:11', 'max:11'],
            'profession' => ['required', 'string', 'min:2', 'max:255'],
            'institute' => ['required', 'string', 'min:2', 'max:255'],
            'gender' => ['required', 'string', 'min:2', 'max:255'],
            'interests' => ['nullable', 'array'],
            'division' => ['required', 'string', 'min:2', 'max:255'],
            'district' => ['required', 'string', 'min:2', 'max:255'],
            'address' => ['required', 'string', 'min:2', 'max:255'],
            'agree' => ['required'],
        ]);

        $bootcamp = new Bootcamp();
        $bootcamp->name = $request->name;
        $bootcamp->email = $request->email;
        $bootcamp->phone = $request->phone;
        $bootcamp->profession = $request->profession;
        $bootcamp->institute = $request->institute;
        $bootcamp->gender = $request->gender;

        // Ensure the interests array is converted to a string (JSON encoding)
        $bootcamp->interests = $request->interests ? json_encode($request->interests) : null;

        $bootcamp->division = $request->division;
        $bootcamp->district = $request->district;
        $bootcamp->address = $request->address;
        $bootcamp->agree = $request->agree;
        $bootcamp->save();

        return redirect()->back()->with('success', 'আপনার রিকোয়েস্ট সফলভাবে সাবমিট হয়েছে!');
    }

    public function show(Bootcamp $bootcamp)
    {
        return response()->json($bootcamp);
    }

    public function destroy(Bootcamp $bootcamp)
    {
        $bootcamp->delete();

        return redirect()->back()->with('success', 'Delete Record successfully!');
    }

    // Crate Affiliator
    public function creatAffiliator($id)
    {
        $bootcamp = Bootcamp::find($id);

        if (!$bootcamp) {
            return response()->json(['error' => 'Bootcamp data not found'], 404);
        }

        $userExists = User::where('email', $bootcamp->email)
            ->where('mobile', $bootcamp->phone)
            ->exists();

        if ($userExists) {
            return response()->json(['error' => 'This data already exists in the User table'], 409);
        }

        $user = new User;
        $user->name = $bootcamp->name;
        $user->user_type = 'affiliator';
        $user->mobile = $bootcamp->phone;
        $user->email = $bootcamp->email;
        $user->password = bcrypt('123456');
        $user->address = $bootcamp->address;
        $user->status = 1;
        $user->is_instructor = 0;
        $user->save();

        if($user){
            $bootcamp->type = 'affiliator';
            $bootcamp->save();
        }

        // Send Email or SMS Affiliator
        //

        return response()->json($user, 201);
    }

}
