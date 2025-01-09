<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Software;
use App\Models\CustomerOrder;
use App\Models\DigitalProduct;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class CustomerController extends Controller
{
    public function software()
    {
        $softwares = Software::all();
        return view('front.users.user_dashboard.software')->with(compact('softwares'));
    }
    public function digitalProduct()
    {
        $orderedProducts = CustomerOrder::where([
            ['user_id', '=', Auth::guard('user')->user()->id],   
            ['service_type', '=', 'digital_product'],
        ])->get();
        return view('front.users.user_dashboard.digital_product')->with(compact('orderedProducts'));
    }
}