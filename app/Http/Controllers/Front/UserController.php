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
use App\Services\MimSmsService;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Session;

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
                    if ($user->user_type == 'affiliator'){
                        Session::put('dashboard_page', 'affiliator');
                    }
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

 
    public function forgotPasswordInitiate(Request $request)
    {
        $data = $request->all();
        
        $request->validate([
            'reset_phone' => [
                'required',
                'regex:/^(?:\+?88)?01[3-9]\d{8}$/',
            ]
        ], [
            'reset_phone.required' => 'মোবাইল নম্বর দিন',
            'reset_phone.regex' => 'সঠিক বাংলাদেশি মোবাইল নম্বর দিন',
        ]);

        $phone =  $request->input('reset_phone');
        $user = User::where('mobile', $phone)->first();
        if ($user) {
            // creating reset password
            $length = 4;
            $characters = '0123456789';
            $charactersLength = strlen($characters);
            $randomPassword = '';
            for ($i = 0; $i < $length; $i++) {
                $randomPassword .= $characters[random_int(0, $charactersLength - 1)];
            }
            $randomPassword = $user->email.$randomPassword;

            // __________________________updating new password into user table password
            $user->password = bcrypt($randomPassword);; // Update password field
            $user->save(); 
            // __________________________updating this password into affiliator list if user is affiliator
            $affiliate = Quickbusiness::where([
                ['email', '=', $user->email],
                ['phone', '=', $phone]
            ])->first(); // Use first() to get a single record
            
            if ($affiliate) {
                $affiliate->password = $randomPassword; // Update the password field
                $affiliate->save(); // Save the changes
            }            

            // __________________________ sending reset password to phone number
            $user_email = $user->email;
            $smsController = new UserController();
            $smsSent = $smsController->sendResetPassword($phone, $user_email, $randomPassword);

            if($smsSent==true){ // after seccess of sending password
                return redirect()->back()->with("pass_send_message", "আপনার মোবাইল নাম্বারে একটি পাসওয়ার্ড পাঠানো হয়েছে। লগইন করতে পাসওয়ার্ডটি ব্যবহার করুন");
            }else{ 
                return redirect()->back()->with("pass_send_message", "দুক্ষিত, সার্ভার সমস্যা। আবার চেস্টা করুন");
            }

        }else{
            return redirect()->back()->with("pass_send_message", "এই নাম্বারটি রেজিস্টার্ড নয়");
        }

        
        dd($data);
        
        // if (Hash::check($data['current_password_user'], Auth::guard('user')->user()->password)) {
        //     return "true";
        // } else {
        //     return "false";
        // }
    }

     // ============================================================ FOR RESET PASSWORD SENDING
     public function sendResetPassword($phone, $user_email, $randomPassword)
     {
         // ___________ sending sms to customer start
         $phone = "88".$phone; // Example phone number
         // $new_otp = rand(100000, 999999); // Example OTP generation
 
         $message = "কুইক-ডিজিটাল। রিসেট পাসওয়ার্ড। ইউজারঃ $user_email নতুন পাসওয়ার্ডঃ $randomPassword";
         $queryParams = [
                 "UserName" => "neoshah121@gmail.com", // MiMSMS registered email
                 "Apikey" => "81GE7QJJS4KIGIY",        // MiMSMS API Key
                 "MobileNumber" => $phone,             // Must be in international format
                 "CampaignId" => "null",               // Keep it 'null' unless required
                 "SenderName" => "BOOTCAMP",           // Provided by "Company Name"
                 "TransactionType" => "T",             // 'T' for transactional messages
                 "Message" =>  $message,  // Valid message
         ];
 
 
         $url = "https://api.mimsms.com/api/SmsSending/Send";
 
         try {
             $client = new Client();
             $response = $client->get($url, [
                 'query' => $queryParams, // Send query parameters
             ]);
 
             // Decode the response body
             $responseBody = json_decode($response->getBody(), true);
 
             $smsSent = true;
             return $smsSent;
 
             // return response()->json([
             //     'success' => true,
             //     'response' => $responseBody,
             // ]);
             
         } catch (\Exception $e) {
             // Handle exceptions
             return response()->json([
                 'success' => false,
                 'error' => $e->getMessage(),
             ], 500);
         }
         // ___________ sending sms to customer start
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
        $user = Auth::guard('user')->user();
        if ($user->user_type == 'affiliator'){
            Session::forget('dashboard_page');
        }
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
