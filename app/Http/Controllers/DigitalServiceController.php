<?php

namespace App\Http\Controllers;

use App\Models\DigitalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DigitalServiceController extends Controller
{
    public function getAllOrder()
    {
        $orders = DigitalService::latest()->paginate(10);
        return view('admin.digital_service.index', compact('orders'));
    }
    public function index()
    {
        $orders = DigitalService::where('user_id', Auth::guard('user')->user()->id)->latest()->paginate(10);
        return view('front.users.user_dashboard.affiliate.digital_service_index', compact('orders'));
    }

    public function create()
    {
        return view('front.users.user_dashboard.affiliate.digital_service_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'phone' => ['required', 'numeric'],
            'email' => ['nullable', 'email'],
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date'],
            'services' => ['nullable', 'array'],
            'address' => ['required', 'string', 'min:2', 'max:255'],
        ]);

        $user = Auth::guard('user')->user();
        $last_order = DigitalService::orderBy('id', 'desc')->first();

        $order = new DigitalService();
        $order->user_id = $user->id;
        $order->order_number = $last_order ? sprintf('%06d', intval($last_order->id) + 1) : '000001';
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->email = $request->email;
        $order->start_date = $request->start_date;
        $order->end_date = $request->end_date;
        $order->services = $request->services ? json_encode($request->services) : null;
        $order->address = $request->address;
        $order->save();

        return redirect()->back()->with('success', 'আপনার রিকোয়েস্ট সফলভাবে সাবমিট হয়েছে!');
    }

    public function show($id)
    {
        $digitalService = DigitalService::with(['user'])->find($id);
        return response()->json($digitalService);
    }

    public function destroy(DigitalService $digitalService)
    {
        $digitalService->delete();
        return redirect()->back()->with('success', 'Delete Record successfully!');
    }
}
