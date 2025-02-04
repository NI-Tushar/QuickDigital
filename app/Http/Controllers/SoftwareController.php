<?php

namespace App\Http\Controllers;
use App\Models\Software;
use App\Models\User;
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
            'mobile' => ['required', 'numeric', 'digits:11'],
        ];

        $customMessages = [
            'name.required' => 'নাম লিখুন',
            'mobile.required' => 'মোবাইল নম্বর লিখুন',
            'mobile.numeric' => 'মোবাইল নম্বর অবশ্যই সংখ্যামূলক হতে হবে।',
            'mobile.digits' => 'মোবাইল নম্বর ১১ টি সংখ্যা হতে হবে',
            'email.required' => 'ইমেইল লিখুন',
            'email.email' => 'Invalid email format',
            'email.unique' => 'ইমেইলটি ইতোমদ্ধেই ব্যবহৃত হয়েছে',
        ];

        $validator = Validator::make($data, $rules, $customMessages);

        if ($validator->fails()) {
            return redirect()->back()->with('error_message', $validator->errors()->first());
        }
        
        $number = $data['mobile'];
        return view('quick_digital.custom_order.otpVarificationPage',compact('number'));
    }


    

}
