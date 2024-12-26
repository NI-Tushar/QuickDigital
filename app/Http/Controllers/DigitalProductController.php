<?php

namespace App\Http\Controllers;
use App\Models\Software;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DigitalProductController extends Controller
{
    public function index()
    {
        // $softwares = Software::all();
        // return view('quick_digital.digital_product.digital_product')->with(compact('softwares'));
        return view('quick_digital.digital_product.digital_product');
    }

}
