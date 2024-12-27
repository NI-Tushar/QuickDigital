<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{

    public function index()
    {
        return view('front.users.index');
    }


    public function loginUser(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'email' => 'required|email|max:255',
                'password' => 'required|max:255|min:6',
            ];

            $customMessage = [
                'email.required' => "আপনার ই-মেইল দিন",
                'email.email' => "সঠিক ই-মেইল দিন",
                'password.required' => 'পাসওয়ার্ড দিন'
            ];

            $request->validate($rules, $customMessage);

            $remember = $request->filled('remember_me');

            if (Auth::guard('user')->attempt(['email' => $data['email'], 'password' => $data['password']], $remember)) {
                $user = Auth::guard('user')->user();
                if ($user->status == 1) {
                    return redirect()->route('user.dashboard');
                } else {
                    Auth::guard('user')->logout();
                    return redirect()->back()->with("error_message", "আপনার একাউন্ট এখনও এক্টিভ হয়নি.");
                }
            } else {
                return redirect()->back()->with("error_message", "ই-মেইল অথবা পাসওয়ার্ড ভুল");
            }
        }
        return view('front.users.login');
    }



    public function registerUser(Request $request)
    {
        if ($request->isMethod('post')) {
            // Process POST request for registration
            $data = $request->all();

            $rules = [
                'name' => 'required|max:255',
                'mobile' => ['required', 'numeric', 'digits:11'],
                'email' => 'required|email|unique:users|max:255',
                'password' => 'required|string|min:6',
            ];

            $customMessages = [
                'name.required' => 'নাম লিখুন',
                'mobile.required' => 'মোবাইল নম্বর লিখুন',
                'mobile.numeric' => 'মোবাইল নম্বর অবশ্যই সংখ্যামূলক হতে হবে।',
                'mobile.digits' => 'মোবাইল নম্বর ১১ টি সংখ্যা হতে হবে',
                'email.required' => 'ইমেইল লিখুন',
                'email.email' => 'Invalid email format',
                'email.unique' => 'ইমেইলটি ইতোমদ্ধেই ব্যবহৃত হয়েছে',
                'password.required' => 'পাসওয়ার্ড দিন',
                'password.min' => 'পাসওয়ার্ড অবশ্যই ৬ টি লেটারের বেশি হতে হবে',
            ];

            $validator = Validator::make($data, $rules, $customMessages);

            if ($validator->fails()) {
                return redirect()->back()->with('error_message', $validator->errors()->first());
            }

            // Validation passed, proceed with user creation
            $user = new User;
            $user->name = $data['name'];
            $user->mobile = $data['mobile'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->address = '';
            $user->city = '';
            $user->state = '';
            $user->country = '';
            $user->zipcode = '';
            $user->status = 1;
            $user->is_instructor = 0;
            $user->save();

            // Redirect to the login page
            return redirect()->route('user.login')->with('reg_success_message', 'আপনি সফল ভাবে রেজিস্ট্রেশন করেছেন, লগইন করুন.');
        } else {
            // Handle GET request for displaying the registration form
            return view('front.users.register');
        }
    }

 
    public function checkCurrentPassword(Request $request)
    {
        $data = $request->all();
        if (Hash::check($data['current_password_user'], Auth::guard('user')->user()->password)) {
            return "true";
        } else {
            return "false";
        }
    }

    public function logoutUser(Request $request)
    {
        Auth::guard('user')->logout();

        return redirect()->route('quick-digital.index')->with('success_message', 'Logged out successfully.');
    }

    public function forgotPassword(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->all();
            $validator = Validator::make($request->all(), [
                'email' => 'required|email|exists:users',
            ], [
                'email.exists' => 'Email does not exist'
            ]);

            if ($validator->fails()) {
                return response()->json(['status' => false, 'type' => 'error', 'errors' => $validator->errors()]);
            } else {
                // Email exists, handle password reset logic here
                $email = $data['email'];
                $code = base64_encode($email);
                $messageData = ['email' => $data['email'], 'code' => $code];
                Mail::send('emails.reset_password', $messageData, function ($message) use ($email) {
                    $message->to($email)->subject('Reset Your Password - QuickDigital');
                });
                return response()->json(['status' => true, 'type' => 'success', 'message' => 'Password reset link sent successfully']);
            }
        } else {
            return view('front.users.forgot_password');
        }
    }

    public function resetPassword(Request $request, $code = null)
    {
        if ($request->ajax()) {
            $data = $request->all();

            $email = base64_decode($data['code']);
            $userCount = User::where('email', $email)->count();

            if ($userCount > 0) {
                // Update New Password
                User::where('email', $email)->update(['password' => bcrypt($data['password'])]);

                // Send confirmation mail to user
                $messageData = ['email' => $email];
                Mail::send('emails.reset_password_confirmation', $messageData, function ($message) use ($email) {
                    $message->to($email)->subject('Password Updated - QuickDigital');
                });

                // Show success message
                return response()->json(['type' => 'success', 'message' => 'Password reset for your account. You can login with your new password now.']);
            } else {
                abort(404);
            }
        } else {
            // If the request is not AJAX, return the view for the reset password form
            return view('front.users.reset_password')->with(compact('code'));
        }
    }
}
