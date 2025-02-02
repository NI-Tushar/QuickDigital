<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DigitalProduct;
use App\Models\Software;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class ProductPageController extends Controller
{
    public function softwareDetailPageView($id)
    {
        Session::put('page', 'details');
        $software = Software::findOrFail($id);
        return view('quick_digital.product_details.details_page')->with(compact('software'));
    }

    public function digitalProductDetailPageView($id)
    {
        Session::put('page', 'details');
        $product = DigitalProduct::findOrFail($id);
        return view('quick_digital.product_details.details_page')->with(compact('product'));
    }

}
