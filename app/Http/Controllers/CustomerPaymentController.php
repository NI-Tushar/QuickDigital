<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\CustomerOrder;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use App\Models\AffiliatorPromocode;
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
            $isPromoCode = AffiliatorPromocode::where('code', $request->input('promocode'))
            ->where('status', 'active')
            ->where('end_date', '>', now())
            ->get();

            $promo = $isPromoCode->first(); // Get the first record
            if ($promo) {
                Session::put('promocode_id', $promo->id);
                $price = Session::get('price');
                $discountedPrice = $price - ($price * 0.25);
                Session::put('price', $discountedPrice);

            } else {
                // did not get any active promocode
            }
        }else{
            // did not get any input promocode
        }
    

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
        session()->put('service_id', $service_id);
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
                "return_url": "'.route('cust.payment.success').'",
                "cancel_url": "'.route('cust.payment.cancel').'",
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

    public function success(Request $request)
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

                    // dd(Session::get('promocode_id'));
                    // dd($resObject[0]);

                    session()->forget('token');
                    // __________________________________________________ STORING USER ORDER DATA INTO TABLE AFTER COMPLETING ORDER START
                    $phone_no = $resObject[0]['phone_no'];
                    $email = $resObject[0]['email'];
                    $price = Session::get('price');
                    $service_id = Session::get('service_id');
                    $service_type = Session::get('service_type');
                    $promocode_id = Session::get('promocode_id');



                    // _______________________Genereting a default or random password to store and mail
                    if (!Auth::guard('user')->check()) { // if not login
                        $existing_user = User::where('email', $email)->first();

                        if ($existing_user) {  // WHEN UESR ALREADY REGISTERED
                                $user_id = $existing_user->id;
                                $phone = $existing_user->mobile;
                                $email = $existing_user->email;

                                session()->put('user_id', $user_id);
                                session()->put('phone', $phone);
                                session()->put('email', $email);

                                // Call the SMS controller method
                                $smsController = new SmsController();
                                $smsSent = $smsController->sendSms($phone, $book_title);
                            }else{
                                // creating default pass
                                $length = 12;
                                $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
                                $charactersLength = strlen($characters);
                                $randomPassword = '';
                                    for ($i = 0; $i < $length; $i++) {
                                        $randomPassword .= $characters[random_int(0, $charactersLength - 1)];
                                    }
                                session()->put('default_pass', $randomPassword);  //=========== send this password in user email and number
                                $add_user= new User();
                                $add_user->mobile= $phone;
                                $add_user->email= $email;
                                $add_user->password= bcrypt($randomPassword);
                                $add_user->status = 1;
                                $add_user->save(); // save newly created user_id into session

                                $user_id = $add_user->id;
                                session()->put('user_id', $user_id);
                                // Call the SMS controller method
                                $smsController = new SmsController();
                                $smsSent = $smsController->sendSmsNewUser($phone, $book_title);
                            }
                        }else{
                            // logged in
                            $userId = Auth::guard('user')->id();
                        }


                    // __________________ here data will be store in order page

                    $add_order= new CustomerOrder();
                    $add_order->user_id = $userId;
                    $add_order->order_id = $resObject[0]['order_id'];
                    $add_order->sub_total = $price;
                    $add_order->total= $price;
                    $add_order->service_id = $service_id;
                    $add_order->service_type = $service_type;
                    $add_order->payment_status = 'Paid';
                    $add_order->payment_method = $resObject[0]['method'];
                    $add_order->promocode_id = $promocode_id;
                    $add_order->bank_trx_id= $resObject[0]['bank_trx_id'];
                    $add_order->invoice_no= $resObject[0]['invoice_no'];
                    $add_order->save();
                    return view('quick_digital.payment_success.successPage');

                }else{

                    return view('quick_digital.payment_pages.cancelPay');

                    // GO TO THE FAILED PAGE
                    session()->forget('token');

                }

                // if (!$resObject) {
                //     dd("Invalid JSON response: ", $res); // Log raw response
                // }

            }
        }catch (\Exception $exception){
            return $exception->getMessage();
        }
    }

    public function cancel()
    {
        dd('payment cancel or failed');
        return view('quick_digital.payment_pages.cancelPay');
    }

}
