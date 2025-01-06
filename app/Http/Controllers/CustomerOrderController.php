<?php

namespace App\Http\Controllers;
use App\Models\DigitalProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerOrderController extends Controller
{
    public function digitalProductOrder($id)
    {
        $product = DigitalProduct::where('id', $id)->first();

        Session::put('service_type', 'digital_product');
        Session::put('price', $product->price);

        if ($product) {
            return view('quick_digital.checkout.all_checkout')->with(compact('product'));
        } else {
            dd('No product found for this ID.');
        }

    }
}
