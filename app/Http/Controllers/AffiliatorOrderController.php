<?php

namespace App\Http\Controllers;

use App\Models\AffiliatorOrder;
use App\Models\AffiliatorOrderItem;
use App\Models\DigitalProduct;
use App\Models\DigitalService;
use App\Models\Software;
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
        $data['softwares'] = Software::select(['id', 'title', 'description', 'price'])->orderBy('title', 'asc')->get();
        $data['digitalServices'] = DigitalService::select(['id', 'title', 'description', 'price'])->orderBy('title', 'asc')->get();
        $data['digitalProducts'] = DigitalProduct::select(['id', 'title', 'description', 'price'])->orderBy('title', 'asc')->get();
        return view('front.users.user_dashboard.affiliate.order.create', $data);
    }

    public function getSoftwareDetails($id)
    {
        $service = Software::find($id);

        if ($service) {
            return response()->json([
                'ser_type' => 'Software',
                'ser_id' => $service->id,
                'title' => $service->title,
                'description' => $service->description,
                'rate' => $service->price,
                'tax_rate' => $service->tax ?? 0, // Adjust this according to your database schema
            ]);
        }
    }

    public function getDigitalServiceDetails($id)
    {
        $service = DigitalService::find($id);

        if ($service) {
            return response()->json([
                'ser_type' => 'DigitalService',
                'ser_id' => $service->id,
                'title' => $service->title,
                'description' => $service->description,
                'rate' => $service->price,
                'tax_rate' => $service->tax ?? 0, // Adjust this according to your database schema
            ]);
        }
    }

    public function getDigitalProductDetails($id)
    {
        $service = DigitalProduct::find($id);

        if ($service) {
            return response()->json([
                'ser_type' => 'DigitalProduct',
                'ser_id' => $service->id,
                'title' => $service->title,
                'description' => $service->description,
                'rate' => $service->price,
                'tax_rate' => $service->tax ?? 0, // Adjust this according to your database schema
            ]);
        }
    }

    public function store(Request $request)
    {

        // Validate request data
        $validatedData = $request->validate([
            'service_type' => 'required|string',

            'start_date' => 'required|date',
            'end_date' => 'nullable|date',
            'discount_type' => 'nullable|string',
            'user_id' => 'nullable|integer',
            'sub_total' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'adjustment' => 'nullable|numeric|min:0',
            'sale_items' => 'required|array',
            'sale_items.*.title' => 'required|string',
            'sale_items.*.description' => 'nullable|string',
            'sale_items.*.quantity' => 'required|integer|min:1',
            'sale_items.*.rate' => 'required|numeric|min:0',
            'sale_items.*.tax' => 'nullable|numeric|min:0',
        ]);

        // Generate unique proposal_id (proposal number)
        $last_order = AffiliatorOrder::orderBy('id', 'desc')->first();
        $orderId = $last_order ? 'AFF-' . sprintf('%06d', intval($last_order->id) + 1) : 'AFF-000001';

        $order = AffiliatorOrder::create([
            'order_id' => $orderId,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'discoutn_type' => $request->discoutn_type,
            'user_id' => Auth::guard('user')->user()->id,
            'sub_total' => $request->sub_total,
            'total' => $request->total,
            'discount' => $request->discount,
            'adjustment' => $request->adjustment,
        ]);


        // Create associated sale items
        foreach ($request->sale_items as $itemData) {
            $item = new AffiliatorOrderItem($itemData);
            $order->items()->save($item);
        }

        // Check if the order was created successfully
        if ($order) {
            // Return a JSON response with redirect_url
            return response()->json([
                'success' => true,
                'redirect_url' => route('affiliate.order.payment', ['id' => $order->id]),
                'message' => 'Proposal saved successfully',
            ]);
        } else {
            // Return an error response if something went wrong
            return response()->json([
                'success' => false,
                'message' => 'Error saving Proposal',
            ], 500);
        }
    }

    public function show($id)
    {
        $orderDetails = AffiliatorOrder::with('items')->find($id);
        return view('front.users.user_dashboard.affiliate.order.show', compact('orderDetails'));
    }

    public function payment($id)
    {
        $order = AffiliatorOrder::with('items')->find($id);
        return view('front.users.user_dashboard.affiliate.order.payment', compact('order'));
    }
}
