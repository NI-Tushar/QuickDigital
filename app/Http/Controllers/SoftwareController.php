<?php

namespace App\Http\Controllers;
use App\Models\Software;
use App\Models\User;
use App\Models\CustomOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SoftwareController extends Controller
{
    public function index(Request $request)
    {
        Session::put('page', 'software');
        $query = Software::query();

        // Apply filters based on query parameters
        if ($request->filled('name')) {
            $query->where('title', 'like', '%' . $request->input('name') . '%');
        }

        $softwares = $query->where('customer_enabled', '1')->latest()->paginate(10);
        return view('quick_digital.software.software_view', compact('softwares'))->with('request', $request);

    }
    
    public function suggestion(Request $request)
    {
        // Validate the request input to ensure a query is provided.
        $request->validate([
            'query' => 'required|string|min:1'
        ]);

        // Retrieve the query from the request.
        $query = $request->input('query');

        // Fetch unique client names that match the query.
        $product = Software::where('title', 'LIKE', '%' . $query . '%')
            ->select('title')
            ->distinct()
            ->limit(10)
            ->get();

        // Return the unique client names as a JSON response.
        return response()->json($product);
    }


    public function softwareOrder(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'software_type' => 'required',
        ]);
        $rules = [
            'software_type' => 'required',
        ];
        $customMessages = [
            'software_type.required' => 'সফটওয়্যার সার্ভিস টাইপ সিলেক্ট করুন',
        ];

        $software_id = $request->software_id;
        $software_type = $request->software_type;

        $product = Software::findOrFail($software_id); // getting selected software info
        // dd($sofwaretData);
        
  
        // __________ getting software_type
        if($software_type == "subscription"){
            Session::put('service_type', 'software');
            Session::put('software_type', 'subscription');
            Session::put('price', $product->price);
            return view('quick_digital.checkout.all_checkout')->with(compact('product'));
        }else if($software_type == "custom"){
            Session::put('service_type', 'software');
            Session::put('software_type', 'custom');
            Session::put('price', $product->price);
            return view('quick_digital.checkout.all_checkout')->with(compact('product'));
        }

        
        // __________ now getting price details of selected software
        Session::put('soft_id', $softData->soft_id);
        Session::put('title', $softData->title);
        Session::put('desc', $softData->desc);

        return redirect()->route('checkout');
    }

    public function customOrderForm($id)
    {
        Session::put('page', 'custom_form');
        $data = Software::find($id); // or any other method to fetch the data
        if ($data) {   
            $title = $data->title;
            return view('quick_digital.custom_order.custom_software_form',compact('title', 'id'));
        }
    }
    public function customOrderPost(Request $request)
    {
        Session::put('page', 'custom_form');
        $data = $request->all();
        
        $rules = [
            'item_id' => 'required|max:255',
            'title' => 'required|max:255',
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'number' => ['required', 'numeric', 'digits:11'],
        ];
        
        $customMessages = [
            'name.required' => 'নাম লিখুন',
            'number.required' => 'মোবাইল নম্বর লিখুন',
            'number.numeric' => 'মোবাইল নম্বর অবশ্যই সংখ্যামূলক হতে হবে।',
            'number.digits' => 'মোবাইল নম্বর ১১ টি সংখ্যা হতে হবে',
            'email.required' => 'ইমেইল লিখুন',
            'email.email' => 'Invalid email format',
            'email.unique' => 'ইমেইলটি ইতোমদ্ধেই ব্যবহৃত হয়েছে',
        ];
        
        $validator = Validator::make($data, $rules, $customMessages);
        
        if ($validator->fails()) {
            return redirect()->back()->with('error_message', $validator->errors()->first());
        }else{
            // ______________ put these custom form data into session
            session()->put('custom_form_data', $data);
        }
        
        // creating OTP
        $length = 4;
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $otp = '';
        for ($i = 0; $i < $length; $i++) {
            $otp .= $characters[random_int(0, $charactersLength - 1)];
        }
        
        $number = $data['number'];
        
        // Sending user credentials to customer phone number
        $smsController = new SmsController(); // Call the SMS controller method
        $smsSent = $smsController->sendOTP($number, $otp);
        
        if($smsSent == true){
            return view('quick_digital.custom_order.otpVarificationPage',compact('number', 'otp'));
        }
        
    }
    
    public function otpVarified(){
        $orderData = session()->get('custom_form_data');

        if ($orderData) {
            // Create and save the custom order
            $order = new CustomOrder();
            $order->user_id = $orderData['user_id'] ?? null;
            $order->item_id = $orderData['item_id'] ?? null;
            $order->item_type = 'software';
            $order->title = $orderData['title'] ?? null;
            $order->description = $orderData['details'] ?? null;
            $order->name = $orderData['name'] ?? null;
            $order->email = $orderData['email'] ?? null;
            $order->mobile = $orderData['number'] ?? null;
            $order->status = 'Pending';
            $order->save();
    
            // Clear session after saving
            session()->forget('custom_form_data');

            return view('quick_digital.custom_order.successPage'); 
    
        }
    }

}
