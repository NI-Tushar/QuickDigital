<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseOrder;
use App\Models\Ebook;
use App\Models\Order;
use App\Models\OrderProducts;
use App\Models\OrderStatus;
use App\Models\OrderStatusProduct;
use App\Models\OrderSubscription;
use App\Models\Products;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index()
    {
        // Session::put('page', 'index');
        $user = Auth::user();
        return view('quick_digital.index', compact('user'));
    }
    public function contact_us()
    {
       return view('quick_digital.contact_us');
    }

    //old one
    // ____________________STATIC BOOK PAGE VIEW START
    public function ebook1()
    {
        // Session::put('page', 'ebook');
        return view('quick_digital.static_product_page.paikari_bazar');
    }
    public function ebook2()
    {
        // Session::put('page', 'ebook');
        return view('quick_digital.static_product_page.14_days_onlne_business');
    }
    public function ebook3()
    {
        // Session::put('page', 'ebook');
        return view('quick_digital.static_product_page.100_business_idea');
    }

    // ____________________STATIC BOOK PAGE VIEW END

    //new one individual ebook
    public function individual_ebook($id)
    {
        $ebook = Ebook::findOrFail($id);
        $ebooks = Ebook::all();
        return view('quick_digital.ebook_single')->with(compact('ebook', 'ebooks'));
    }

    // DIRECT TO CHECKOUT PAGE
    public function ebook_checkout($id)
    {
        $book = Ebook::findOrFail($id);
        return view('quick_digital.ebook_checkout')->with(compact('book'));
    }

    // ALL CHECKOUT
    public function all_checkout()
    {
        if(session()->has('subscription_price')){
            session()->forget('total_price');
        }else{   
            if(session()->has('hosting_charge')){
                $hosting_charge = session('hosting_charge');
                $current_price = session('soft_price');
                $total_price = number_format($hosting_charge, 2) + number_format($current_price, 2);
                Session::put('total_price', $total_price);  
            }
        }
        return view('quick_digital.checkout.all_checkout');
    }

    // DIRECT TO CHECKOUT PAGE FOR TEST PAY
    public function testPay()
    {
        $book = (object) [
            'id' => '4',
            'title' => "লাভের খনি পাইকারি বাজার",
            'price' => 1,
        ];
        return view('quick_digital.ebook_checkout')->with(compact('book'));
    }


    public function digital_services()
    {
        // Session::put('page', 'digital_services');

        return view('quick_digital.digital_services');
    }

    public function digital_products()
    {
        // Session::put('page', 'digital_products');

        return view('quick_digital.digital_products');
    }

    public function course()
    {
        // Session::put('page', 'course');

        return view('quick_digital.course');
    }
    public function terms()
    {
        // Session::put('page', 'terms');

        return view('quick_digital.terms');
    }
    public function privacy_policy()
    {
        // Session::put('page', 'privacy_policy');

        return view('quick_digital.privacy_policy');
    }
    public function refund_policy()
    {
        // Session::put('page', 'refund_policy');

        return view('quick_digital.refund_policy');
    }

    public function onlne_business()
    {
        // Session::put('page', '14_days_onlne_business');


    }

    public function business_idea()
    {
        // Session::put('page', 'refund_policy');

        // return view('quick_digital.100_business_idea');
    }

    public function ebook_list()
    {
        $ebooks = Ebook::all();

        return view('quick_digital.ebook_list', compact('ebooks'));
    }



    public function mobile_video_checkout()
    {
        return view('quick_digital.mobile_video_checkout');
    }

    public function submit_mobile_video_checkout(Request $request)
    {
        $data = $request->all();

        // Validate the incoming request data
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|digits:11',
            'payment_option' => 'required|string',
            'did_you_pay' => 'required|string',
            'confirm_number' => 'required|digits:11',
        ];

        $customMessage = [
            'name.required' => 'অনুগ্রহ করে প্রকল্পের নাম প্রদান করুন।',
            'email.required' => 'অনুগ্রহ করে ইমেল ঠিকানা প্রদান করুন।',
            'email.email' => 'অনুগ্রহ করে একটি বৈধ ইমেল ঠিকানা প্রদান করুন।',
            'phone.required' => 'অনুগ্রহ করে ফোন নম্বর প্রদান করুন।',
            'phone.digits' => 'ফোন নম্বরটি ১১ সংখ্যা দীর্ঘ হতে হবে।',
            'payment_option.required' => 'অনুগ্রহ করে কোর্স ফি পরিশোধের মাধ্যম নির্বাচন করুন।',
            'did_you_pay.required' => 'কোর্স ফি পরিশোধ করলে "হ্যা", আর না করলে "নাহ" নির্বাচন করুন',
            'confirm_number.required' => 'অনুগ্রহ করে যেই নাম্বার থেকে কোর্স ফি পরিশোধ করেছেন সেটা প্রদান করুন।',
            'confirm_number.digits' => 'যেই নাম্বার থেকে কোর্স ফি পরিশোধ করেছেন সেটা ১১ সংখ্যা দীর্ঘ হতে হবে।',
        ];

        $validator = Validator::make($data, $rules, $customMessage);

        if ($validator->fails()) {
            return redirect()->back()->with('error_message', $validator->errors()->first());
        }


        try {

            $courseOrder = new CourseOrder;
            $courseOrder->name = $data['name'];
            $courseOrder->email = $data['email'];
            $courseOrder->phone = $data['phone'];
            $courseOrder->payment_option = $data['payment_option'];
            $courseOrder->did_you_pay = $data['did_you_pay'];
            $courseOrder->confirm_number = $data['confirm_number'];

            // Save the project form data
            $courseOrder->save();

            // Redirect with a success message
            return redirect()->route('quick-digital.index')->with('success_message', 'Course Enroll Order Submission Send');
        } catch (\Exception $e) {
            // Log the error message
            Log::error($e->getMessage());

            // Redirect back with an error message
            return redirect()->back()->with('error_message', 'An error occurred while submitting the course enrollment order. Please try again later.');
        }
    }
    // public function ebook_single()
    // {
    //     // Session::put('page', 'refund_policy');

    //     return view('quick_digital.ebook_single');
    // }


    /**
     * return view after payment success
     */
    public function order_success($orderId)
    {
        $order = Order::find($orderId);

        if (!$order) {
            abort(404);
        }

        Session::put('page', 'order_success');
        return view('quick_digital.order_success', compact('order'));
    }

    /**
     * return view after subscription payment success
     */
    public function order_success_subscription($orderId)
    {
        // dd('mthrfkr');
        $order = OrderSubscription::find($orderId);

        if (!$order) {
            abort(404);
        }

        return view('quick_digital.order_success_subscription', compact('order'));
    }

    // public function track_order(Request $request)
    // {
    //     $data = $request;

    //     $withoutPrefix = substr($data['id'], 6);
    //     $originalOrderId = substr($withoutPrefix, 0, -14);

    //     $orderStatus = OrderStatus::with('order')->where('order_id', $originalOrderId)->get()->groupBy('order_id');

    //     // dd($orderStatus);
    //     return view('quick_digital.track_order', compact('orderStatus'));
    // }

    public function track_order_product(Request $request, $id)
    {
        // $data = $request;

        // $withoutPrefix = substr($data['id'], 6);
        // $originalOrderId = substr($withoutPrefix, 0, -14);

        $orderStatus = OrderStatusProduct::with('order')->where('order_id', $id)->get()->groupBy('order_id');

        // dd($orderStatus);
        return view('quick_digital.track_order', compact('orderStatus'));
    }

 





    //my order ebook
    public function my_orders()
    {
        if (!Auth::guard('user')->check()) {
            return redirect()->route('user.login')->with('error_message', 'আপনার অর্ডার দেখতে আগে লগইন করুন');
        }

        $userId = Auth::guard('user')->id();

        $orders = Order::where('user_id', $userId)->with('latestStatus')->get();

        return view('quick_digital.my_orders', compact('orders'));
    }

    public function my_courses()
    {
        return view('quick_digital.my_courses');
    }

    //my order product
    public function my_order_products()
    {
        if (!Auth::guard('user')->check()) {
            return redirect()->route('user.login')->with('error_message', 'আপনার অর্ডার দেখতে আগে লগইন করুন');
        }

        $userId = Auth::guard('user')->id();

        $orders = OrderProducts::where('user_id', $userId)->with('latestStatus')->get();

        return view('quick_digital.my_order_products', compact('orders'));
    }


    public function subscription()
    {
        $subscriptions = Subscription::all();

        return view('quick_digital.subscription', compact('subscriptions'));
    }

    public function success_ebook_with_subscription($orderId)
    {
        $order = Order::findOrFail($orderId);
        return view('quick_digital.order_success_ebook_with_subscription')->with(compact('order'));
    }

    public function quickShop()
    {
        $products = Products::all(); // Fetch all products from the database
        return view('quick_digital.quick_shop', compact('products'));
    }

    public function getProductById($id)
    {
        try {
            // Fetch the product by its ID
            $product = Products::with('category')->findOrFail($id);
            $product->features = json_decode($product->features, true); // Decode the features JSON

            // If the product is found, return the view with the product data
            return view('quick_digital.product_individual', compact('product'));
        } catch (\Exception $e) {
            // If an exception occurs (e.g., product not found), return an error view
            return view('error_page', ['message' => 'Product not found.']);
        }
    }

    public function search_product(Request $request)
    {
        $phrase = $request->query('search');
        $products = Products::where('name', 'LIKE', "%{$phrase}%")->get();
        if ($products != null) {
            return $products;
        } else {
            return null;
        }
    }

    /**
     * return view after payment success
     */
    public function product_order_success($orderId)
    {
        $order = OrderProducts::find($orderId);

        if (!$order) {
            abort(404);
        }

        Session::put('page', 'order_success');
        return view('quick_digital.order_success_products', compact('order'));
    }

    /**
     * return indevidual course landing page
    */
    public function course_details($course_id)
    {
        // Fetch the course along with the instructor, topics, and lessons
        $course = Course::with(['instructor', 'topics.lessons'])->withCount('topics')->findOrFail($course_id);
        
        // Decode the JSON fields
        $course->what_will_i_learn = json_decode($course->what_will_i_learn, true);
        $course->tageted_audience = json_decode($course->tageted_audience, true);
        $course->materials_included = json_decode($course->materials_included, true);
        $course->requirements = json_decode($course->requirements, true);
    
        // Calculate the total duration of lessons
        $totalDurationInSeconds = $course->getTotalDuration();
    
        // Pass the total duration to the view
        return view('quick_digital.course_details', compact('course', 'totalDurationInSeconds'));
    }
    

    /**
     * show all courses
    */
    public function show_all_courses(){

        $courses = Course::with('category')->get();
        $categories = CourseCategory::all();

        return view('quick_digital.all_courses')->with(compact('courses', 'categories'));
    }
}
