<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\DigitalProduct;
use App\Models\Software;
use App\Models\DigitalService;
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

    public function digitalServiceDetailPageView($id)
    {
        Session::put('page', 'details');
        $serviceQuery = DigitalService::query();
        $releventService = $serviceQuery->where('is_populer', '1')->latest()->get();
        $service = DigitalService::findOrFail($id);
        return view('quick_digital.product_details.details_page')->with(compact('service','releventService'));

        
        // যদি প্রথমবার ডিকোড করার পরও স্ট্রিং থাকে, তাহলে আবার ডিকোড করবো

        
        // চেক করা যাতে foreach() তে কোনো সমস্যা না হয়

        
        
        
    }

}
