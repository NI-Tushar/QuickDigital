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
        $softwareQuery = Software::query();
        $releventSoftware = $softwareQuery->where('is_populer', '1')->latest()->get();
        $software = Software::findOrFail($id);
        return view('quick_digital.product_details.details_page')->with(compact('software','releventSoftware'));
    }

    public function digitalProductDetailPageView($id)
    {
        Session::put('page', 'details');
        $productQuery = DigitalProduct::query();
        $releventProduct = $productQuery->where('is_populer', '1')->latest()->get();
        $product = DigitalProduct::findOrFail($id);
        return view('quick_digital.product_details.details_page')->with(compact('product','releventProduct'));
    }

}
