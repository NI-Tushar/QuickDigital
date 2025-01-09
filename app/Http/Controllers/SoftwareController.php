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
        dd($data);
        $request->validate([
            'software_type' => 'required',
        ]);
        $rules = [
            'software_type' => 'required',
        ];
        $customMessages = [
            'software_type.required' => 'Select Software Service Type',
        ];

        $soft_id = $request->soft_id;

        $softData = Software::findOrFail($soft_id); // getting selected software info
        
        $software_type = $request->software_type;
        // __________ getting software_type
        if($software_type == "buy"){
            Session::put('current_price', $softData->current_price);
            session()->forget('subscription_price');
            // __________ hosting or not
            if($request->hosting == "on"){
                session()->forget('current_price');
                Session::put('soft_price', $softData->current_price);
                Session::put('hosting_charge', $softData->hosting_charge);
            }else{
                session()->forget('hosting_charge');
            }

        }else if($software_type == "subscription"){
            Session::put('subscription_price',  $softData->subscription_price);
            session()->forget('current_price');
            session()->forget('hosting_charge');
        }

        
        // __________ now getting price details of selected software
        Session::put('soft_id', $softData->soft_id);
        Session::put('title', $softData->title);
        Session::put('desc', $softData->desc);

        return redirect()->route('checkout');
    }

}
