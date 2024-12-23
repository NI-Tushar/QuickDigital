<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderProducts;
use App\Models\OrderStatusProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderProductController extends Controller
{
    public function index($status = null)
{
    Session::put('page', 'order_product');

    $query = OrderProducts::with(['latestStatus' => function ($query) use ($status) {
        if ($status) {
            $query->where('status', $status);
        }
        $query->orderBy('created_at', 'desc');
    }]);

    $orders = $query->get();

    return view('admin.orders.order_products', compact('orders'));
}

public function updateStatus(Request $request, $order_id)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $orderStatus = new OrderStatusProduct();
        $orderStatus->status = $request->status;
        $orderStatus->date = now();
        $orderStatus->order_id = $order_id;
        $orderStatus->save();

        return redirect()->back()->with('success_message', 'Order status updated successfully.');
    }

    public function filterByStatus($status)
    {
        Session::put('page', 'order_product');

        $orders = OrderProducts::select('order_products.*')
                       ->leftJoin('order_status_products', 'orders.id', '=', 'order_status_products.order_id')
                       ->where('order_status_products.id', function($query) {
                           $query->select(DB::raw('MAX(id)'))
                                 ->from('order_status_products')
                                 ->whereColumn('order_id', 'orders.id');
                       })
                       ->where('order_status_products.status', $status)
                       ->with('latestStatus')
                       ->get();

        return view('admin.orders.order_products', compact('orders'));
    }
}
