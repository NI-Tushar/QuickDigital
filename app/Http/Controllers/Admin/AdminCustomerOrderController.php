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
        Session::put('page', 'customer_order');
        // $order_softwares = CustomerOrder::all();
        $order_softwares = CustomerOrder::where('service_type', 'software')->latest()->paginate(10);
        return view('admin.customer_orders.software_order.softwareOrderList')->with(compact('order_softwares'));
    }
    public function updateOrderedSoftware($id){
        Session::put('page', 'customer_order');
        return view('admin.customer_orders.software_order.orderDetails');
    }
}