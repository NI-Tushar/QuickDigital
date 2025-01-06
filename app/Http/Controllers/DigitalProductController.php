<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DigitalProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class DigitalProductController extends Controller
{
    public function index()
    {
        $products = DigitalProduct::all();
        return view('quick_digital.digital_product.digital_product')->with(compact('products'));
    }
}
