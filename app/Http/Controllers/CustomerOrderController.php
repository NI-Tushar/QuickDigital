<?php

namespace App\Http\Controllers;
use App\Models\DigitalProduct;
use App\Models\Software;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerOrderController extends Controller
{
    // ______________________________________ DIGITAL PRODUCT ORDER
    public function digitalProductDetails($id)
    {
        $product = DigitalProduct::where('id', $id)->first();
        Session::put('service_type', 'digital_product');
        Session::put('price', $product->price);
        if ($product) {
            Session::put('page', 'checkout');
            return view('quick_digital.digital_product.digitalProductDesc')->with(compact('product'));
        } else {
            dd('No product found for this ID.');
        }

    }
    public function digitalProductOrder($id)
    {
        $product = DigitalProduct::where('id', $id)->first();
        Session::put('service_type', 'digital_product');
        Session::put('price', $product->price);
        if ($product) {
            Session::put('page', 'checkout');
            return view('quick_digital.checkout.all_checkout')->with(compact('product'));
        } else {
            dd('No product found for this ID.');
        }
    }
    // ______________________________________ SORTWARE ORDER
    public function softwareOrder($id)
    {
        $product = Software::where('id', $id)->first();
        Session::put('service_type', 'software');
        Session::put('price', $product->price);
        if ($product) {
            Session::put('page', 'checkout');
            return view('quick_digital.checkout.all_checkout')->with(compact('product'));
        } else {
            dd('No product found for this ID.');
        }
    }
}
