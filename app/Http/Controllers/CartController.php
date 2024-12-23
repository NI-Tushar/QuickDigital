<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProducts;
use App\Models\CartSubscription;
use App\Models\Ebook;
use App\Models\Order;
use App\Models\OrderProducts;
use App\Models\OrderStatus;
use App\Models\OrderStatusProduct;
use App\Models\OrderSubscription;
use App\Models\Products;
use App\Models\Subscription;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

class CartController extends Controller
{
    private $url;
    private $storeUser;
    private $password;


    /**
     * Payment helpers
     */
    public function __construct()
    {
        $this->url = env('API_URL');
        $this->storeUser = env('STORE_USER');
        $this->password = env('STORE_PASSWORD');
        $this->prefix = env('MERCHANT_KEY_PREFIX');

        // dd($this->url);
    }

    /**
     * Create token
     */
    private function _token()
    {
        $url = $this->url . '/get_token';
        $credentials = [
            'username' => $this->storeUser,
            'password' => $this->password
        ];
        return $this->_curl($url, json_encode($credentials));
    }
    /**
     * Make curl request
     */
    private function _curl($url, $data, $token = NULL, $type = 'json')
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $headers = array();
        if ($token) {
            $headers[] = 'Authorization: Bearer ' . $token;
        }
        if ($type == 'json') {
            $headers[] = 'Content-Type: application/json';
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        return $result;
    }

    //cart create for e-book
    public function create(Request $request, $id)
    {
        if (!Auth::guard('user')->check()) {
            return redirect()->route('user.login')->with('error_message', 'অর্ডার করার আগে লগইন করুন');
        }
        
        $user = Auth::guard('user')->user();

        // dd($user);
        $subscriptionExpireDate = Carbon::parse($user->subscription_expire_date);

        if ($user->subscription_id != null && $user->download_count > 0 && !$subscriptionExpireDate->isPast()) {
            // dd("I AM IN");
            return redirect()->route('ebook-with-subscription', $id);
        }

        try {
            $ebook = Ebook::findOrFail($id);
        } catch (\Throwable $th) {
            abort(404);
        }

        $userId = Auth::guard('user')->id();

        $cart = [];
        $cart['user_id'] = $userId;
        $cart['ebook_id'] = $ebook->id;
        $cart['ebook_title'] = $ebook->title;
        $cart['price'] = $ebook->price;
        
        try {
            $cart = Cart::create($cart);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error_message', "Cant create cart. Please try again");
        }

        return redirect()->route('cart.checkout', $cart->id);
    }
    /**
     * create cart for subscription
     */
    public function create_cart_subscription(Request $request, $id)
    {

        //dd('create_cart_subscription method hit');

        if (!Auth::guard('user')->check()) {
            return redirect()->route('user.login')->with('error_message', 'অর্ডার করার আগে লগইন করুন');
        }

        try {
            $subscription = Subscription::findOrFail($id);
        } catch (\Throwable $th) {
            abort(404);
        }

        $userId = Auth::guard('user')->id();

        $cart = [];
        $cart['user_id'] = $userId;
        $cart['subscription_id'] = $subscription->id;
        $cart['subscription_package'] = $subscription->name;
        $cart['price'] = $subscription->price;

        //dd($subscription->id);

        try {
            $cart = CartSubscription::create($cart);
        } catch (\Throwable $th) {
            return redirect()->back()->with('error_message', "Cant create cart. Please try again");
        }

        return redirect()->route('cart.checkoutSubscription', $cart->id);
    }
    /**
     * cart for product
     */
    public function create_cart_product(Request $request, $id)
    {

        if (!Auth::guard('user')->check()) {
            return redirect()->route('user.login')->with('error_message', 'অর্ডার করার আগে লগইন করুন');
        }

        try {
            $product = Products::findOrFail($id);
        } catch (\Throwable $th) {
            abort(404);
        }

        $userId = Auth::guard('user')->id();

        $cart = [];
        $cart['user_id'] = $userId;
        $cart['product_id'] = $product->id;
        $cart['product_title'] = $product->name;
        $cart['price'] = $product->discount_price;

        try {
            $cart = CartProducts::create($cart);
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->back()->with('error_message', "Cant create cart. Please try again");
        }

        return redirect()->route('cart.checkout.products', $cart->id);
    }
    /**
     * Checkout for ebook
     */
    public function checkout(Request $request, $cartId)
    {

        $request->session()->put('user_book_id',$cartId);
        $carts = Cart::where('id', $cartId)->get();

        return view('quick_digital.ebook_checkout', compact('carts'));

        // try {
        //     $cartDetails = cart::findOrFail($cartId);
        //     print_r($cartDetails);
        // } catch (\Throwable $th) {
        //     abort(404);
        // }
    }

    /**
     * Checkout for subscription
     */
    public function checkoutSubscription(Request $request, $cartId)
    {
        try {
            $cartDetails = CartSubscription::findOrFail($cartId);
        } catch (\Throwable $th) {
            abort(404);
        }
        return view('quick_digital.subscription_checkout', compact('cartDetails'));
    }

    /**
     * Checkout for products
     */
    public function checkout_product(Request $request, $cartId)
    {
        try {
            $cartDetails = CartProducts::findOrFail($cartId);
        } catch (\Throwable $th) {
            abort(404);
        }
        return view('quick_digital.product_checkout', compact('cartDetails'));
    }

    /**
     * Payment for e-book
     */
    public function payment(Request $request)
    {
        // dd('Reached payment method');
        // dd($request->cart_id);

        // Ensure the user is authenticated using the 'user' guard
        if (!Auth::guard('user')->check()) {
            return Redirect::route('user.login')->with('error_message', 'You must be logged in to proceed.');
        }

        // Retrieve authenticated user's information using the 'user' guard
        $user = Auth::guard('user')->user();

        // Prepare customer details from the authenticated user
        $customerDetails = [
            'name' => $user->name,
            'email' => $user->email,
            'mobile' => $user->mobile, // Ensure this field exists in your users table
        ];
        // try {
        //     $cartDetails = Cart::findOrFail($request->cart_id);
        // } catch (\Throwable $th) {

        //     abort(404);
        // }

        // $cartDetails->customer_info = json_encode($customerDetails);    
        // $cartDetails->save();

        // Create payment
        $tokenInfo = json_decode($this->_token(), true);
        dd( $tokenInfo);
        // $token = $tokenInfo['token'];
        // $execute_url = $tokenInfo['execute_url'];
        // $store_id = $tokenInfo['store_id'];
        // $postData = [];

        // Payment information
        // $postData['prefix']     = 'NOK';
        // $postData['token']      = $token;
        // $postData['return_url'] = route('payment.success');
        // $postData['cancel_url'] = route('payment.cancel.fail');
        // $postData['store_id']   = $store_id;
        // $postData['amount']     = $cartDetails->price;
        // $postData['order_id']   = 'quick-' . rand(100000, 999999);
        // $postData['currency']   = 'BDT';
        // // Customer information
        // $postData['customer_name'] = $user->name;
        // $postData['customer_address'] = 'Dhaka';
        // $postData['customer_phone'] = $user->mobile;
        // $postData['customer_city'] = 'Dhaka';
        // $postData['client_ip'] = $_SERVER['REMOTE_ADDR'];
        // $postData['value1'] = $cartDetails->id;

        // Go to checkout
        // $res = $this->_curl($execute_url, $postData, $token, NULL);
        // $urlData = json_decode($res);
        // header('Location: ' . $urlData->checkout_url);
        // exit();
    }

    /**
     * Payment for subscription
     */
    public function paymentSubscription(Request $request)
    {
        // Ensure the user is authenticated using the 'user' guard
        if (!Auth::guard('user')->check()) {
            return Redirect::route('user.login')->with('error_message', 'You must be logged in to proceed.');
        }

        // Retrieve authenticated user's information using the 'user' guard
        $user = Auth::guard('user')->user();

        // Prepare customer details from the authenticated user
        $customerDetails = [
            'name' => $user->name,
            'email' => $user->email,
            'mobile' => $user->mobile, // Ensure this field exists in your users table
        ];
        // dd($customerDetails);
        try {
            $cartDetails = CartSubscription::findOrFail($request->cart_id);
            // dd($cartDetails);
        } catch (\Throwable $th) {
            abort(404);
        }

        $cartDetails->customer_info = json_encode($customerDetails);
        $cartDetails->save();

        // Create payment
        $tokenInfo = json_decode($this->_token(), true);
        $token = $tokenInfo['token'];
        $execute_url = $tokenInfo['execute_url'];
        $store_id = $tokenInfo['store_id'];
        $postData = [];

        // Payment information
        $postData['prefix'] = 'NOK';
        $postData['token'] = $token;
        $postData['return_url'] = route('payment.successSubscription');
        $postData['cancel_url'] = route('payment.cancel.fail');
        $postData['store_id'] = $store_id;
        $postData['amount'] = $cartDetails->price;
        $postData['order_id'] = 'quick-' . rand(100000, 999999);
        $postData['currency'] = 'BDT';

        // Customer information
        $postData['customer_name'] = $user->name;
        $postData['customer_address'] = 'Dhaka';
        $postData['customer_phone'] = $user->mobile;
        $postData['customer_city'] = 'Dhaka';
        $postData['client_ip'] = $_SERVER['REMOTE_ADDR'];
        $postData['value1'] = $cartDetails->id;

        // Go to checkout
        $res = $this->_curl($execute_url, $postData, $token, NULL);
        $urlData = json_decode($res);
        // dd($res);
        header('Location: ' . $urlData->checkout_url);
        exit();
    }

    /**
     * payment to purchase product
     */
    public function payment_product(Request $request)
    {
        // dd('Reached payment method');
        // dd($request->cart_id);
        try {
            $cartDetails = CartProducts::findOrFail($request->cart_id);
        } catch (\Throwable $th) {

            abort(404);
        }
        $customerDetails = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'district' => $request->district,
            'police_station' => $request->police_station,
        ];
        $cartDetails->customer_info = json_encode($customerDetails);
        $cartDetails->save();

        // Create payment
        $tokenInfo = json_decode($this->_token(), true);
        // dd( $tokenInfo);
        $token = $tokenInfo['token'];
        $execute_url = $tokenInfo['execute_url'];
        $store_id = $tokenInfo['store_id'];
        $postData = [];
        // Payment information
        $postData['prefix']     = 'NOK';
        $postData['token']      = $token;
        $postData['return_url'] = route('product.payment.success');
        $postData['cancel_url'] = route('payment.cancel.fail');
        $postData['store_id']   = $store_id;
        $postData['amount']     = $cartDetails->price;
        $postData['order_id']   = 'quick-' . rand(100000, 999999);
        $postData['currency']   = 'BDT';
        // Customer information
        $postData['customer_name']    = $request->name;
        $postData['customer_address'] = 'Dhaka';
        $postData['customer_phone']   = $request->phone;
        $postData['customer_city']    = 'Dhaka';
        $postData['client_ip']        = $_SERVER['REMOTE_ADDR'];
        $postData['value1']           = $cartDetails->id;
        // Go to checkout
        $res = $this->_curl($execute_url, $postData, $token, NULL);
        $urlData = json_decode($res);
        header('Location: ' . $urlData->checkout_url);
        exit();
    }
    /**
     * Payment success
     */
    public function success(Request $request)
    {

        $url = $this->url . '/verification';
        $tokenInfo = json_decode($this->_token(), true);
        $token = $tokenInfo['token'];

        $orderArray['order_id'] = $request->order_id;
        $res = $this->_curl($url, json_encode($orderArray), $token);

        $json_data = trim($res, '[]');
        $paymentResponse = json_decode($json_data, true);


        //  dd($paymentResponse);

        try {
            $cartDetails = cart::findOrFail($paymentResponse['value1']);
        } catch (\Throwable $th) {
            abort(404);
        }

        // Create customer from cart Data
        // $this->_createCustomer();

        // Create order details and payment details
        $order = [];

        $order['user_id']       = $cartDetails->user_id;
        $order['ebook_id']    = $cartDetails->ebook_id;
        $order['ebook_title'] = $cartDetails->ebook_title;
        $order['price']         = $cartDetails->price;
        $order['customer_info'] = $cartDetails->customer_info;
        $order['payment_info']  = json_encode($paymentResponse);

        $order = Order::create($order);

        // Add initial status as PENDING
        $orderStatus = new OrderStatus();
        $orderStatus->status = 'PENDING';
        $orderStatus->date = now();
        $orderStatus->order_id = $order->id;
        $orderStatus->save();

        // Send email success text and the form link
        $this->_sendEmail($order);

        // Delete cart
        $cartDetails->delete();

        //dd('Order Completed.');

        // redirect to Thank you page, where user filable form should be present with order id
        return redirect()->route('order.success', ['orderId' => $order->id])->with('success_message', 'Order Completed.');
    }

    /**
     * Subscription Payment success
     */
    public function successSubscription(Request $request)
    {
        //dd('ok');
        $url = $this->url . '/verification';
        $tokenInfo = json_decode($this->_token(), true);
        $token = $tokenInfo['token'];
        $orderArray['order_id'] = $request->order_id;
        $res = $this->_curl($url, json_encode($orderArray), $token);
        $json_data = trim($res, '[]');
        $paymentResponse = json_decode($json_data, true);
        // dd($paymentResponse);
        try {
            $cartDetails = CartSubscription::findOrFail($paymentResponse['value1']);
        } catch (\Throwable $th) {
            abort(404);
        }
        // Create customer from cart Data
        // $this->_createCustomer();
        // Create order details and payment details
        $order = [];
        $order['user_id']       = $cartDetails->user_id;
        $order['subscription_id']    = $cartDetails->subscription_id;
        $order['subscription_package'] = $cartDetails->subscription_package;
        $order['price']         = $cartDetails->price;
        $order['customer_info'] = $cartDetails->customer_info;
        $order['payment_info']  = json_encode($paymentResponse);
        try {
            $order = OrderSubscription::create($order);
            $user = User::findOrFail($order->user_id);
            $subscription = Subscription::findOrFail($order->subscription_id);
            $user->subscription_id = $order->subscription_id;
            $user->download_count = $subscription->count;
            $duration = (int)$subscription->duration;
            $user->subscription_expire_date = Carbon::now()->addMonths($duration);
            $user->save();
        } catch (\Exception $e) {
            // Log the error or handle it appropriately
            dd($e->getMessage()); // This will output the error message for debugging
        }

        // Send email success text and the form link
        // $this->_sendEmail($order);
        // Delete cart
        $cartDetails->delete();
        //dd('Order Completed.');
        // redirect to Thank you page, where user filable form should be present with order id
        return redirect()->route('order.successSubscription', ['orderId' => $order->id])->with('success_message', 'Order Completed.');
    }

    /**
     * Product Payment success
     */
    public function product_payment_success(Request $request)
    {

        $url = $this->url . '/verification';
        $tokenInfo = json_decode($this->_token(), true);
        $token = $tokenInfo['token'];

        $orderArray['order_id'] = $request->order_id;
        $res = $this->_curl($url, json_encode($orderArray), $token);

        $json_data = trim($res, '[]');
        $paymentResponse = json_decode($json_data, true);


        //  dd($paymentResponse);

        try {
            $cartDetails = CartProducts::findOrFail($paymentResponse['value1']);
        } catch (\Throwable $th) {
            abort(404);
        }

        // dd($cartDetails);

        // Create customer from cart Data
        // $this->_createCustomer();

        // Create order details and payment details
        $order = [];

        $order['user_id']       = $cartDetails->user_id;
        $order['product_id']    = $cartDetails->product_id;
        $order['product_title'] = $cartDetails->product_title;
        $order['price']         = $cartDetails->price;
        $order['customer_info'] = $cartDetails->customer_info;
        $order['payment_info']  = json_encode($paymentResponse);

        $order = OrderProducts::create($order);


        // Add initial status as PENDING
        $orderStatus = new OrderStatusProduct();
        $orderStatus->status = 'PENDING';
        $orderStatus->date = now();
        $orderStatus->order_id = $order->id;
        $orderStatus->save();

        // Send email success text and the form link
        $this->_sendEmailProduct($order);

        // Delete cart
        $cartDetails->delete();

        //dd('Order Completed.');
        // redirect to Thank you page, where user filable form should be present with order id
        return redirect()->route('product.order.success', ['orderId' => $order->id])->with('success_message', 'Order Completed.');
    }

    /**
     * purchase ebook using subscription
     * if user has subscription only then it will work
     *
     * perameter ebook id
     * */
    public function purchaseEbookWithSubscription($id)
    {
        $authuser = Auth::guard('user')->user();
        $user = User::findOrFail($authuser->id);

        $ebook = Ebook::findOrFail($id);
        if ($user != null && $ebook != null) {
            // user details
            $customer_info = [];
            $customer_info['name'] = $user->name;
            $customer_info['email'] = $user->email;
            $customer_info['phone'] = $user->mobile;
            if ($user->download_count > 0) {
                // order details
                $order = [];
                $order['user_id']       = $user->id;
                $order['ebook_id']    = $ebook->id;
                $order['ebook_title'] = $ebook->title;
                $order['price']         = $ebook->price;
                $order['customer_info'] = json_encode($customer_info);
                $order['payment_info']  = 'purchased through subscription';

                // create order
                $order = Order::create($order);
                // dd($order);

                $user->download_count -= 1;
                $user->save();

                return redirect()->route('success-ebook-with-subscription', ['orderId' => $order->id]);
            }
        }
    }

    /**
     * Fail or cancel
     */
    public function fail(Request $request)
    {
        // redirect to error page
    }

    /**
     * Customer
     */
    private function _createCustomer($data)
    {
    }

    /**
     * Send Emaikl
     */

    private function _sendEmail($order)
    {
        $customerInfo = json_decode($order->customer_info, true);
        $email = $customerInfo['email'];
        $name = $customerInfo['name'];
        $orderDetails = [
            'name' => $name,
            'email' => $email,
            'order_id' => $order->id,
            'ebook_title' => $order->ebook_title,
            'price' => $order->price,
            'form_link' => route('generate.pdf', ['orderId' => $order->id])  // Ensure 'orderId' is passed correctly
        ];

        Mail::send('emails.order_confirm_email', $orderDetails, function ($message) use ($email) {
            $message->to($email)->subject('Order Confirmation - Quick Digital');
        });
    }

    private function _sendEmailProduct($order)
    {
        $customerInfo = json_decode($order->customer_info, true);
        $email = $customerInfo['email'];
        $name = $customerInfo['name'];
        $orderDetails = [
            'name' => $name,
            'email' => $email,
            'order_id' => $order->id,
            'product_title' => $order->product_title,
            'price' => $order->price,
            // 'form_link' => route('generate.pdf', ['orderId' => $order->id])  // Ensure 'orderId' is passed correctly
        ];

        Mail::send('emails.product_order_confirm_email', $orderDetails, function ($message) use ($email) {
            $message->to($email)->subject('Order Confirmation - Quick Digital');
        });
    }
}
