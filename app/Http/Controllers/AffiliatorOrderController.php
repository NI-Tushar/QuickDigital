<?php

namespace App\Http\Controllers;

use App\Models\AffiliatorAccount;
use App\Models\AffiliatorCommission;
use App\Models\AffiliatorOrder;
use App\Models\AffiliatorOrderItem;
use App\Models\DigitalProduct;
use App\Models\DigitalService;
use App\Models\Software;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class AffiliatorOrderController extends Controller
{
    // For Admin Dashboard
    public function getAllOrder()
    {
        $orders = AffiliatorOrder::latest()->paginate(50);
        return view('admin.affiliate.index', compact('orders'));
    }

    // For Admin Dashboard
    public function showOrder(AffiliatorOrder $affiliatorOrder)
    {
        $order = $affiliatorOrder->load('items');
        return view('admin.affiliate.show', compact('order'));
    }

    // For Admin Dashboard
    public function DownloadOrderPDF(AffiliatorOrder $affiliatorOrder)
    {
        $order = $affiliatorOrder->load('items');


        // Generate PDF using the specified view
        $pdf = Pdf::loadView('admin.affiliate.order_pdf', compact('order'));

        // Return the PDF as a stream
        return $pdf->stream();
        return $pdf->download('order.pdf');
    }

    public function DownloadPDF(AffiliatorOrder $affiliatorOrder)
    {
        $order = $affiliatorOrder->load('items');


        // Generate PDF using the specified view
        $pdf = Pdf::loadView('front.users.user_dashboard.affiliate.order.order_pdf', compact('order'));

        // Return the PDF as a stream
        return $pdf->stream();
        return $pdf->download('order.pdf');
    }

    // For Admin Dashboard
    public function paymentStatus(Request $request, AffiliatorOrder $affiliatorOrder)
    {
        $affiliatorOrder->payment_status = $request->payment_status;
        $affiliatorOrder->save();

        return redirect()->back()->with('success', 'Payment Status updated successfully!');
    }

    // For Admin Dashboard
    public function orderStatus(Request $request, AffiliatorOrder $affiliatorOrder)
    {
        $affiliatorOrder->delivery_status = $request->delivery_status;
        $affiliatorOrder->save();

        return redirect()->back()->with('success', 'Order Status updated successfully!');
    }

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


    public function payment($id)
    {
        $order = AffiliatorOrder::with('items')->find($id);
        return view('front.users.user_dashboard.affiliate.order.payment', compact('order'));
    }

    public function paymentStore(AffiliatorOrder $affiliatorOrder)
    {
        // return $affiliatorOrder->total;
        // return $affiliatorOrder->user;
        // return $affiliatorOrder->user->email;
        #Apply Here Payment Get Way
        // your code.....
        // ___________________________________________________ initial payment start
        try {
            $merchant_name = config('surjopay.merchant_name');
            $merchant_password = config('surjopay.merchant_password');
            $merchant_prefix = config('surjopay.merchant_prefix');
            $get_token_url = config('surjopay.get_token_url');


            $data = [
                'username' => $merchant_name,
                'password' => $merchant_password,
            ];


            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $get_token_url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    'Content-Type: application/json',
            ]);

            $response = curl_exec($ch);
            $error = curl_error($ch);
            curl_close($ch);

            $responseObject = json_decode($response, true);

            if ($error) {
                echo 'cURL Error: ' . $error;
            } else {
                $response_data = json_decode($response, true);
                if (isset($response_data['token'])) {
                    // echo 'Token: ' . $response_data['token'];
                    $res = $this->createPayment($responseObject, $affiliatorOrder);
                    if (isset($res['checkout_url']) && $res['checkout_url'] != null) {
                        return redirect()->away($res['checkout_url']);
                        //For Inertia Js, Use this to avoid whole tab opening as modal
                        return inertia()->location($res['checkout_url']);
                    }else{
                        // return redirect()->route('home')->with('error','Payment Generation Failed');
                        print_r('Payment Generation Failed');
                    }
                } else {
                    echo 'Token Generation Failed: ' . $response;
                }
            }

        }catch (\Exception $exception){
            return $exception->getMessage();
        }
        // ___________________________________________________ initial payment end

    }



    // ________________________________ payment function start
    protected function createPayment($response, AffiliatorOrder $affiliatorOrder)
    {
          try {

            $token = $response['token'];
            $store_id   = $response['store_id'];
            $authorizationToken = "Bearer $token";
            $order_id = rand(000000000000,999999999999);

            session()->put('token', $token);

            $curl = curl_init();

            $secretpay_url = config('surjopay.secretpay_url');
            $merchant_prefix = config('surjopay.merchant_prefix');


            curl_setopt_array($curl, array(
                CURLOPT_URL => $secretpay_url,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS =>'{
                "prefix": "'.$merchant_prefix.'",
                "token": "'.$token.'",
                "return_url": "'.route('affiliate.payment.success',$affiliatorOrder->id).'",
                "cancel_url": "'.route('affiliate.payment.cancel').'",
                "store_id": "'.$store_id.'",
                "amount": "'.$affiliatorOrder->total.'",
                "order_id": "'.$affiliatorOrder->order_id.'",
                "currency": "BDT",
                "customer_name": "Name, Not Provided",
                "customer_address": "Address, Not Provided",
                "customer_phone": "'.$affiliatorOrder->user->mobile.'",
                "customer_city": "City, Not provided",
                "customer_post_code": "none",
                "client_ip": "102.101.1.1",
                "discount_amount": "0",
                "disc_percent": "",
                "customer_email": "'.$affiliatorOrder->user->email.'",
                "customer_state": "Bangladesh",
                "customer_postcode": "7200",
                "customer_country": "Bangladesh",
                "shipping_address": "Jhenaidah, Khulna, Bangladesh",
                "shipping_city": "Jhenaidah",
                "shipping_country": "Bangladesh",
                "received_person_name": "Reciver Name",
                "shipping_phone_number": "01700000000",
                "value1": "test value1",
                "value2": "",
                "value3": "",
                "value4": "",
                "type": "json"
            }',
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "Authorization: $authorizationToken",
                ),
            ));

            $res = curl_exec($curl);

            curl_close($curl);
            $resObject = json_decode($res, true);

            return $resObject;

        }catch (\Exception $e){
            return $e->getMessage();
        }
    }

    // ________________________________ payment function end

    public function success(Request $request, AffiliatorOrder $affiliatorOrder)
    {
        try {
            if (isset($request['order_id']) && $request['order_id'] != null) {

                $verific_url = config('surjopay.verific_url');

                $token = session()->get('token');
                $order_id = $request['order_id'];
                $authorizationToken = "Bearer $token";

                $curl = curl_init();

                curl_setopt_array($curl, array(
                    CURLOPT_URL => $verific_url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS =>'{
                        "order_id": "'.$order_id.'",
                        "type": "json"
                    }',
                    CURLOPT_HTTPHEADER => array(
                        "Content-Type: application/json",
                        "Authorization: $authorizationToken",
                    ),
                ));

                $res = curl_exec($curl);

                curl_close($curl);

                $resObject = json_decode($res, true);

                if($resObject[0]['sp_message']=="Success"){

                    // _________________________________ update data after payment start
                    $affiliatorOrder->update([
                        'payment_status' => 'Paid',
                        'delivery_status' => 'Confirmed',
                        'payment_method' => $resObject[0]['method'],
                        'bank_trx_id' => $resObject[0]['bank_trx_id'],
                        'invoice_no' => $resObject[0]['invoice_no'],
                    ]);

                    if ($affiliatorOrder->payment_status == 'Paid') {
                        $userId = Auth::guard('user')->user()->id;

                        // Find or create the account
                        $account = AffiliatorAccount::firstOrCreate(
                            ['user_id' => $userId], // Find by user ID
                            ['balance' => 0]       // Default values for a new account
                        );

                        $commission = 0.25;
                        // Calculate the affiliator's share (25% of the total order amount)
                        $affiliatorShare = $affiliatorOrder->total * $commission;

                        // Update the account balance by adding the affiliator's share
                        $account->update([
                            'balance' => $account->balance + $affiliatorShare
                        ]);

                        // Comission Save
                        $commission = new AffiliatorCommission();
                        $commission->user_id = $userId;
                        $commission->purpose = 'Own';
                        $commission->order_id = $affiliatorOrder->order_id;
                        $commission->amount = $affiliatorShare;
                        $commission->save();
                    }

                    return redirect()->route('affiliate.order.show', $affiliatorOrder->id)->with('success', 'Your Payment Complete successfully!');
                    // _________________________________ update data after payment end
                }else{

                    dd('payment failed');

                }

            }
        }catch (\Exception $exception){
            return $exception->getMessage();
        }
    }

    public function show($id)
    {
        $order = AffiliatorOrder::with('items')->find($id);
        return view('front.users.user_dashboard.affiliate.order.show', compact('order'));
    }


    public function destroy(AffiliatorOrder $affiliatorOrder)
    {
        $affiliatorOrder->delete();
        return redirect()->back()->with('success', 'Delete Record successfully!');
    }
}
