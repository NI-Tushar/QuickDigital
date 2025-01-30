<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DigitalProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class ProductPageController extends Controller
{
    public function index()
    {
        Session::put('page', 'details');
        return view('quick_digital.product_details.details_page');
    }

}
