<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index($status = null)
    {
        Session::put('page', 'order');

        $query = Order::with('latestStatus');

        // If a status is provided, filter orders by that status
        if ($status) {
            $query->whereHas('latestStatus', function ($query) use ($status) {
                $query->where('status', $status);
            });
        }

        $orders = $query->get();

        return view('admin.orders.orders', compact('orders'));
    }


    public function updateStatus(Request $request, $order_id)
    {
        $request->validate([
            'status' => 'required|string',
        ]);

        $orderStatus = new OrderStatus();
        $orderStatus->status = $request->status; // corrected method call
        $orderStatus->date = now();
        $orderStatus->order_id = $order_id;
        $orderStatus->save();

        return redirect()->back()->with('success_message', 'Order status updated successfully.');
    }

    public function filterByStatus($status)
    {
        Session::put('page', 'order');

        $orders = Order::select('orders.*')
                       ->leftJoin('order_statuses', 'orders.id', '=', 'order_statuses.order_id')
                       ->where('order_statuses.id', function($query) {
                           $query->select(DB::raw('MAX(id)'))
                                 ->from('order_statuses')
                                 ->whereColumn('order_id', 'orders.id');
                       })
                       ->where('order_statuses.status', $status)
                       ->with('latestStatus')
                       ->get();

        return view('admin.orders.orders', compact('orders'));
    }
}
