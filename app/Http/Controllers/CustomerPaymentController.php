<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class CustomerPaymentController extends Controller
{
    public function paymentInitial(Request $request)
    {
        $request->validate([
            'service_id' => 'required',
            'name' => 'required|string',
            'phone' => [
                'required',
                'regex:/^(?:\+?88)?01[3-9]\d{8}$/',
            ],
            'email' => [
                'required',
                'regex:/^[a-zA-Z0-9._%+-]+@gmail\.com$/',
                'max:255'
            ],
            'is_checked' => 'required|string',
        ], [
            'name.required' => 'আপনার নাম লিখুন',
            'phone.required' => 'মোবাইল নম্বর দিন',
            'phone.regex' => 'সঠিক বাংলাদেশি মোবাইল নম্বর দিন',
            'email.required' => 'ইমেইল এড্রেস দিন',
            'email.regex' => 'সঠিক ইমেইল এড্রেস দিন',
            'is_checked.required' => 'শর্তাবলি গুলো চেক করুন',
        ]);

        if($request->input('promocode')!=null){
            dd($request->input('promocode'));
        }else{
            dd('number');
        }
      
        // dd($request->all());

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
                    $res = $this->createPayment($responseObject, $request);
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

    }



    protected function createPayment($response, Request $request)
    {

        $phone =  $request->input('phone');
        $email =  $request->input('email');
        $service_id =  $request->input('service_id');
        $price = Session::get('price');
        $service_type = Session::get('service_type');

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
                "return_url": "'.route('payment.success').'",
                "cancel_url": "'.route('payment.cancel').'",
                "store_id": "'.$store_id.'",
                "amount": "'.$price.'",
                "order_id": "'.$order_id.'",
                "currency": "BDT",
                "customer_name": "Name, Not Provided",
                "customer_address": "Address, Not Provided",
                "customer_phone": "'.$phone.'",
                "customer_city": "City, Not provided",
                "customer_post_code": "none",
                "client_ip": "102.101.1.1",
                "discount_amount": "0",
                "disc_percent": "",
                "customer_email": "'.$email.'",
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
}
