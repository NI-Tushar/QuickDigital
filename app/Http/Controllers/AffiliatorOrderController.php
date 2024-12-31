<?php

namespace App\Http\Controllers;

use App\Models\AffiliatorOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AffiliatorOrderController extends Controller
{
    public function index()
    {
        $orders = AffiliatorOrder::where('user_id', Auth::guard('user')->user()->id)->latest()->paginate(10);
        return view('front.users.user_dashboard.affiliate.order.index', compact('orders'));
    }

    public function create()
    {
        $data = [];

        return view('front.users.user_dashboard.affiliate.order.create', $data);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'products' => 'required|array',
            'products.*.id' => 'required|exists:quick_shop_products,id',
            'products.*.color' => 'required|string',
            'products.*.size' => 'required|string',
            'products.*.qty' => 'required|integer|min:1',
            'coupon_code' => 'nullable|string', // Optional coupon code
        ]);

        // Generate a unique order code
        $lastOrder = QuickShopOrder::orderBy('id', 'desc')->first();
        $orderCode = $lastOrder ? sprintf('%06d', intval($lastOrder->id) + 1) : '000001';

        // Create the order
        $order = new QuickShopOrder();
        $order->user_id = $request->user()->id;
        $order->order_code = $orderCode;
        $order->sub_total = 0; // will be calculated below when order items save
        $order->shipping = 120; // Fixed shipping cost. but it will dynamic
        $order->coupon = null; // Will be updated if a valid coupon is applied
        $order->total = 0; // will be calculated below hen order items save
        $order->delivery_status = 'pending';
        $order->payment_status = 'unpaid';
        $order->payment_method = $request->payment_method ?? 'cash';
        $order->save();

        $subTotal = 0;

        // Save order items and calculate subtotal
        foreach ($validated['products'] as $productData) {
            $product = QuickShopProduct::find($productData['id']); // Fetch the product to get details

            $item = new QuickShopOrderItem();
            $item->quick_shop_order_id = $order->id;
            $item->product_name = $product->name;
            $item->product_image = $product->image;
            $item->color = $productData['color'];
            $item->size = $productData['size'];
            $item->qty = $productData['qty'];
            $item->price = $product->price;
            $item->discount = $product->discount ?? 0; // Apply product discount if available
            $item->total = ($product->price - $item->discount) * $productData['qty'];

            $subTotal += $item->total; // Accumulate subtotal
            $item->save();
        }

        // Check and apply coupon
        $couponDiscount = 0;
        if (!empty($request->coupon_code)) {
            $coupon = QuickShopCoupon::where('code', $request->coupon_code)->where('is_active', 'active')->first();
            if ($coupon) {
                $order->coupon = $coupon->amount; // Apply coupon discount amount
                $couponDiscount = $coupon->amount;
            }
        }

        // Calculate total
        $order->sub_total = $subTotal;
        $order->total = $subTotal + $order->shipping - $couponDiscount;
        $order->save();

        return redirect()->back()->with('success', 'Order created successfully!');
    }
}
