<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminsPermission;
use Illuminate\Http\Request;
use App\Models\Software;
use App\Models\CustomerOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class AdminCustomerOrderController extends Controller
{
    public function software_order_list()
    {
        Session::put('page', 'software');
        // $order_softwares = CustomerOrder::all();
        $order_softwares = CustomerOrder::where('service_type', 'software')->latest()->paginate(10);
        // dd($order_softwares);
        return view('admin.customer_orders.software_order.softwareOrderList')->with(compact('order_softwares'));
    }
}