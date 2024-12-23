<?php

namespace App\Http\Controllers;
use App\Services\PaymentGatewayService;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentGatewayService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function processCheckout(Request $request)
    {
        $request->validate([
            'order_id' => 'required|string',
            'amount' => 'required|numeric',
        ]);

        $paymentResponse = $this->paymentService->createPayment($request->order_id, $request->amount);

        if ($paymentResponse['success']) {
            // Handle successful payment
            print_r('payment success');
            // return redirect()->route('payment.success');
        } else {
            // Handle failed payment
            return $paymentResponse['message'];
            // return redirect()->route('payment.failed')->withErrors(['message' => $paymentResponse['message']]);
        }
    }

}
