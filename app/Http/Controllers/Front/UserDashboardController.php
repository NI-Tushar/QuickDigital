<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Quickbusiness;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class UserDashboardController extends Controller
{

    public function index()
    {
        return view('front.users.user_dashboard.index');
    }



    // UPDATE INFO
    public function update_info()
    {         
        return view('front.users.user_dashboard.update_info');
    }

    public function updateUserDetails(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'user_name' => 'required|max:255',
                'user_mobile' => ['required', 'numeric', 'digits:11'],
                'user_image' => 'image',
                'user_address' => 'required',
                'user_city' => 'required',
                'user_state' => 'required',
                'user_country' => 'required',
                'user_zipcode' => 'required',

            ];

            $customMessage = [
                'user_name.required' => "নাম খালি রাখা যাবে না",
                'user_mobile.required' => 'মোবাইল নম্বর খালি রাখা যাবে না',
                'user_mobile.numeric' => 'মোবাইল নম্বর অবশ্যই সংখ্যামূলক হতে হবে।',
                'user_mobile.digits' => 'মোবাইল নম্বর ১১ টি সংখ্যা হতে হবে',
                'user_image.image' => "সঠিক ইমেজ সিলেক্ট করুন",
                'user_address.required' => "ঠিকানা দিন",
                'user_city.required' => "সিটি/শহর এর নাম দিন",
                'user_state.required' => "স্টেইট (State) দিন",
                'user_country.required' => "দেশের নাম লিখুন",
                'user_zipcode.required' => "Zipcode (জিপকোড)/Postal code (পোস্টাল কোড) দিন",
            ];

            $validator = Validator::make($data, $rules, $customMessage);

            if ($validator->fails()) {
                return redirect()->back()->with('error_message', $validator->errors()->first());
            }

            // Upload images
            if ($request->hasFile('user_image')) {
                $image_tmp = $request->file('user_image');
                if ($image_tmp->isValid()) {
                    // Get image extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // Generate new image name
                    $image_name = rand(111, 99999) . '.' . $extension;
                    // Save image
                    $image_path = 'admin/images/user_images/' . $image_name;
                    Image::make($image_tmp)->save($image_path);
                    // Update image field in database
                    User::where('email', Auth::guard('user')->user()->email)->update([
                        'image' => $image_name, // Assuming 'image' is the field in your database
                    ]);
                }
            }

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }


            // Update User Details
            User::where('email', Auth::guard('user')->user()->email)->update([
                'name' => $data['user_name'],
                'address' => $data['user_address'],
                'city' => $data['user_city'],
                'state' => $data['user_state'],
                'country' => $data['user_country'],
                'zipcode' => $data['user_zipcode'],
                'mobile' => $data['user_mobile'],
            ]);
            return redirect()->back()->with('success_message', 'আপনার প্রোফাইল সফলভাবে আপডেট হয়েছে!');
        }
        return view('front.users.user_dashboard.update_info');
    }



    // UPDATE PASSWORD
    public function update_password()
    {
        return view('front.users.user_dashboard.update_password');
    }
    public function updatePassword(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            // dd($data);
            
            // Check if the new password matches the confirmation password
            if ($data['new_password'] !== $data['confirm_password']) {
                return redirect()->back()->with('error_message', 'নতুন এবং কনফার্ম পাসওয়ার্ড এক হয়নি');
            }

            // Define validation rules
            $rules = [
                'current_password_user' => 'required',
                'new_password' => 'required|string|min:6|max:30',
                'confirm_password' => 'required',
            ];

            // Define custom error messages
            $messages = [
                'new_password.min' => 'পাসওয়ার্ড নুন্যতম ৬ অক্ষরের হতে হবে',
                'new_password.max' => 'পাসওয়ার্ড সর্বোচ্চ ৩০ অক্ষরের হতে হবে',
            ];
            
            // Validate the request data
            $validator = Validator::make($data, $rules, $messages);

            // Check if validation fails
            if ($validator->fails()) {
                // If validation fails, set error message and redirect back
                return redirect()->back()->with('error_message', $validator->errors()->first());
            }
            
            // Check current password
            if (Hash::check($data['current_password_user'], Auth::guard('user')->user()->password)) {
                // Update password
                User::where('id', Auth::guard('user')->user()->id)->update([
                    'password' => bcrypt($data['new_password'])
                ]);

                Quickbusiness::where('email', Auth::guard('user')->user()->email)->update([
                    'password' => $data['new_password']
                ]);
                return redirect()->back()->with('success_message', 'আপনার পাসওয়ার্ড সফলভাবে আপডেট হয়েছে');
            } else {
                return redirect()->back()->with('error_message', 'আপনার আগের পাসওয়ার্ড সঠিক নয়');             
            }
        }
        return view('front.users.update_password');
    }



    // CUSTOMER EBOOK
    public function your_ebook()
    {
        return view('front.users.user_dashboard.user_ebook');
    }

}