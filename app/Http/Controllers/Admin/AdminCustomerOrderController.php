<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminsPermission;
use Illuminate\Http\Request;
use App\Models\Software;
use App\Models\CustomOrder;
use App\Models\CustomerOrder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class AdminCustomerOrderController extends Controller
{
    // _____________________________________________________ FOR SOFTWARE ORDER MANAGEMENT
    public function software_order_list()
    {
        $totalCount = CustomerOrder::where('service_type', 'software')->count();
        Session::put('page', 'customer_order');
        $order_softwares = CustomerOrder::where('service_type', 'software')->latest()->paginate(10);
        return view('admin.customer_orders.software_order.softwareOrderList')->with(compact('order_softwares','totalCount'));
    }
    public function updateOrderedSoftware($id){
        Session::put('page', 'customer_order');
        $order = CustomerOrder::where('id', $id)->first();
        return view('admin.customer_orders.software_order.orderDetails')->with(compact('order'));
    }
    public function updateStatusSoftwareOrder(Request $request){
        $data = $request->all();
        CustomerOrder::where('id', $data['order_id'])->update([
            'delivery_status' => $data['delivery_status'],
        ]);
        return redirect()->route('software.order.list');    
    }
    public function customSoftwareOrder()
    {
        $totalCount = CustomOrder::where('item_type', 'software')->count();
        Session::put('page', 'customer_order');
        $custom_software_order = CustomOrder::where('item_type', 'software')->latest()->paginate(10);
        return view('admin.customer_orders.software_order.customSoftwareOrderList')->with(compact('custom_software_order','totalCount'));
    }

    public function updateStatus($status, $orderId)
    {
    
        CustomOrder::where('id', $orderId)->update([
            'status' => $status,
        ]);

        return redirect()->back()->with('success_message', 'Order status updated successfully.');
    }

    // _____________________________________________________ FOR DIGITAL PRODUCT ORDER MANAGEMENT
    public function digitalProduct_order_list()
    {
        $totalCount = CustomerOrder::where('service_type', 'digital_product')->count();
        Session::put('page', 'customer_order');
        $order_softwares = CustomerOrder::where('service_type', 'digital_product')->latest()->paginate(10);
        return view('admin.customer_orders.digital_product_order.digitalProductOrderList')->with(compact('order_softwares','totalCount'));
    }

    // _____________________________________________________ FOR DIGITAL SERVICE ORDER MANAGEMENT
    public function digitalService_order_list()
    {
        $totalCount = CustomerOrder::where('service_type', 'digital_service')->count();
        Session::put('page', 'customer_order');
        $order_service = CustomerOrder::where('service_type', 'digital_service')->latest()->paginate(10);
        return view('admin.customer_orders.digital_service_order.digitalServiceOrderList')->with(compact('order_service','totalCount'));
    }
}