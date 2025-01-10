<?php

namespace App\Http\Controllers;
use App\Models\Software;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SoftwareController extends Controller
{
    public function index()
    {
        $softwares = Software::where('customer_enabled', '1')->get();
        return view('quick_digital.software.software_view')->with(compact('softwares'));
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

}
