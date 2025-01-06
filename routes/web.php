    <?php

    use App\Http\Controllers\Admin\InstructorRequestController;
    use App\Http\Controllers\AffiliatorOrderController;
    use App\Http\Controllers\AffiliatorTransactionController;
    use App\Http\Controllers\BootcampController;
    use App\Http\Controllers\AffiliatorPromocodeController;
    use App\Http\Controllers\SoftwareController;
    use App\Http\Controllers\DigitalProductController;
    use App\Http\Controllers\CartController;
    use App\Http\Controllers\PaymentController;
    use App\Http\Controllers\SoftPaymentController;
    use App\Http\Controllers\Front\HomeController;
    use App\Http\Controllers\PDFController;
    use App\Http\Controllers\CheckoutController;
    use App\Http\Controllers\DigitalServiceController;
    use App\Http\Controllers\Front\AffiliatorController;
use App\Http\Controllers\Front\UserDashboardController;
use App\Http\Controllers\SmsController;
    use App\Http\Controllers\MailSendController;
    use App\Http\Controllers\QuickShopCategoryController;
    use App\Http\Controllers\QuickShopOrderController;
    use App\Http\Controllers\QuickShopProductController;
    use App\Http\Controllers\SslCommerzPaymentController;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('quick_digital.index');
    });

    Route::prefix('/admin')->namespace('App\Http\Controllers\Admin')->group(function () {
        Route::match(['get', 'post'], 'login', 'AdminController@login');

        Route::group(['middleware' => ['admin']], function () {
            Route::get('dashboard', 'AdminController@dashboard');
            Route::post('check_current_password', 'AdminController@checkCurrentPassword');
            Route::match(['get', 'post'], 'update_password', 'AdminController@updatePassword');
            Route::match(['get', 'post'], 'update_admin_details', 'AdminController@updateAdminDetails');
            Route::get('logout', 'AdminController@logout');

            //CMS PAGE
            Route::get('cms-page', 'CmsController@index');
            Route::post('update-cms-page-status', 'CmsController@update');
            Route::match(['get', 'post'], 'add-edit-cms-page/{id?}', 'CmsController@edit');
            Route::get('delete-cms-page/{id?}', 'CmsController@destroy');

            //User
            Route::get('users', 'AdminController@Users');
            Route::match(['get', 'post'], 'add-edit-user/{user_id?}', 'AdminController@addEditUser');
            Route::post('update-user-status', 'AdminController@updateUserStatus');
            Route::get('delete-user/{user_id?}', 'AdminController@deleteUser');

            //instructor
            Route::get('instructors', 'AdminController@Instructors');
            Route::get('instructor-requests', 'InstructorRequestController@instructorRequests');
            Route::get('reject-instructor/{id}', 'InstructorRequestController@rejectInstructor');
            Route::get('approve-instructor/{id}', 'InstructorRequestController@approveInstructor');

            //ebook
            Route::get('ebooks', 'EbookController@ebooks');
            Route::match(['get', 'post'], 'add-edit-ebook/{id?}', 'EbookController@addEditEbook');
            Route::get('delete-ebook/{id?}', 'EbookController@destroy');

            //Order Ebook
            Route::get('orders', 'OrderController@index')->name('admin.order');
            Route::post('order/update-status/{order_id}', 'OrderController@updateStatus')->name('admin.order.updateStatus');
            // Route::get('orders/filter/{status}', 'OrderController@filterByStatus')->name('admin.order.filter');
            Route::get('orders/filter/{status}', 'OrderController@filterByStatus')->name('admin.order.filter');

            //Order Products
            Route::get('product/orders', 'OrderProductController@index')->name('admin.order.product');
            Route::post('product/order/update-status/{order_id}', 'OrderProductController@updateStatus')->name('admin.order.updateStatus.product');
            Route::get('product/orders/filter/{status}', 'OrderProductController@filterByStatus')->name('admin.order.filter.product');

            //subscription packages
            Route::get('subscription', 'SubscriptionController@index');
            Route::match(['get', 'post'], 'add-edit-subscription/{id?}', 'SubscriptionController@edit');
            Route::get('delete-subscription/{id?}', 'SubscriptionController@destroy');

            //mobile video course
            Route::get('mobile-video-course-order', 'AdminController@mobile_video_order')->name('admin.course.order');

            //Quick Shop
            Route::get('product-category', 'QuickShopController@ProductCategory');
            Route::match(['get', 'post'], 'add-edit-product-category/{id?}', 'QuickShopController@addEditCategory');
            Route::get('delete-product-category/{id?}', 'QuickShopController@destroyCategory');

            Route::get('products', 'QuickShopController@product');
            Route::match(['get', 'post'], 'add-edit-product/{id?}', 'QuickShopController@add_edit_product');
            Route::get('delete-product/{id?}', 'QuickShopController@destroyProduct');

            // Digital Sercice
            Route::get('/digital-service', [DigitalServiceController::class, 'getAllOrder'])->name('admin.digialservice.index');
            Route::delete('/digital-service/{digitalService}', [DigitalServiceController::class, 'destroy'])->name('admin.digialservice.destroy');

            ##--------- affiliate ----------##
            // Orders
            Route::get('/affiliate/order', [AffiliatorOrderController::class, 'getAllOrder'])->name('admin.affiliate.order');
            Route::get('/affiliate/{affiliatorOrder}/order', [AffiliatorOrderController::class, 'showOrder'])->name('admin.affiliate.show');
            Route::get('/affiliate-order/{affiliatorOrder}/DownloadOrderPDF', [AffiliatorOrderController::class, 'DownloadOrderPDF'])->name('admin.affiliate.order.DownloadOrderPDF');
            Route::put('/affiliate-order/{affiliatorOrder}/paymentStatus', [AffiliatorOrderController::class, 'paymentStatus'])->name('admin.affiliate.order.paymentStatus');
            Route::put('/affiliate-order/{affiliatorOrder}/orderStatus', [AffiliatorOrderController::class, 'orderStatus'])->name('admin.affiliate.order.orderStatus');
            Route::delete('/affiliate-order/{affiliatorOrder}', [AffiliatorOrderController::class, 'destroy'])->name('admin.affiliate.destroy');

            // Transations
            route::get('/affiliate/transaction', [AffiliatorTransactionController::class, 'getAllTransactions'])->name('admin.affiliate.transaction.index');
            route::get('/affiliate/transaction/{affiliatorTransaction}/status', [AffiliatorTransactionController::class, 'status'])->name('admin.affiliate.transaction.status');
            Route::delete('/affiliate-transaction/{affiliatorTransaction}', [AffiliatorTransactionController::class, 'destroy'])->name('admin.affiliate.transaction.destroy');

            // Promo Code
            Route::get('/affiliate/promocode', [AffiliatorPromocodeController::class, 'index'])->name('admin.affiliate.promocode.index');
            Route::post('/affiliate/promocode', [AffiliatorPromocodeController::class, 'store'])->name('admin.affiliate.promocode.store');
            route::get('/affiliate/promocode/{affiliatorPromocode}/status', [AffiliatorPromocodeController::class, 'status'])->name('admin.affiliate.promocode.status');
            Route::delete('/affiliate-promocode/{affiliatorPromocode}', [AffiliatorPromocodeController::class, 'destroy'])->name('admin.affiliate.promocode.destroy');

            // Software All Route Here
            Route::match(['get', 'post'], 'add_software', 'AdminSoftwareController@add_store_software')->name('software.add');
            Route::get('software-list', 'AdminSoftwareController@software_list')->name('software.list');
            Route::get('update_software/{id?}', 'AdminSoftwareController@update_software');
            Route::post('updating-software', 'AdminSoftwareController@updating_software');
            Route::get('delete-software/{id?}', 'AdminSoftwareController@deleteSoftware');

            // DIGITAL PRODUCT All Route Here
            Route::match(['get', 'post'], 'add_digitalProduct', 'AdminDigitalProductController@add_digProduct')->name('digProduct.add');
            Route::get('digProduct-list', 'AdminDigitalProductController@digProduct_list')->name('digProduct.list');
            Route::get('update_product/{id?}', 'AdminDigitalProductController@update_product');
            Route::post('updating-digProduct', 'AdminDigitalProductController@updating_digProduct');
            Route::get('delete-digProduct/{id?}', 'AdminDigitalProductController@deleteDigProduct');

            // DIGITAL SERVICE All Route Here
            Route::match(['get', 'post'], 'add_digService', 'AdminDigitalServiceController@add_digService')->name('add.digialservice');
            Route::get('digialservice-list', 'AdminDigitalServiceController@digialservice_list')->name('digialservice.list');
            Route::get('update_digitalService/{id?}', 'AdminDigitalServiceController@update_service');
            Route::post('updating-service', 'AdminDigitalServiceController@updating_digService');
            Route::get('delete-digService/{id?}', 'AdminDigitalServiceController@deleteService');


            //subadmin
            Route::group(['middleware' => ['adminAccessOnly']], function () {
                Route::get('subadmins', 'AdminController@subadmins');
                Route::post('update-subadmin-status', 'AdminController@updateSubadminStatus');
                Route::match(['get', 'post'], 'add-edit-subadmin/{id?}', 'AdminController@addEditSubadmin');
                Route::get('delete-subadmin/{id?}', 'AdminController@deleteSubadmin');
                Route::match(['get', 'post'], 'update-permission/{id}', 'AdminController@updatePermission');
            });
        });
    });



    // sms sending to customer
    Route::get('/send-sms',[SmsController::class,'sendSms'])->name('sendSMS');
    Route::get('/send-sms',[SmsController::class,'sendSmsNewUser'])->name('sendNewUserSMS');

    // Mail send to customer for order confirmation
    Route::get('/mailsend/{order_id}/{book_title}/{price}/{email}', [MailSendController::class, 'sendEMail'])->name('mailsend');



    // E-commerce All Route Here
    Route::prefix('/admin')->middleware('admin')->group(function () {

        // Quick Shopping Categories
        Route::get('/quick-shopping-category', [QuickShopCategoryController::class, 'index'])->name('quick-shopping-category.index');
        Route::post('/quick-shopping-category', [QuickShopCategoryController::class, 'store'])->name('quick-shopping-category.store');
        Route::get('/quick-shopping-category/{quickShopCategory}/edit', [QuickShopCategoryController::class, 'edit'])->name('quick-shopping-category.edit');
        Route::post('/quick-shopping-category-update', [QuickShopCategoryController::class, 'update'])->name('quick-shopping-category.update');
        Route::delete('/quick-shopping-category/{quickShopCategory}', [QuickShopCategoryController::class, 'destroy'])->name('quick-shopping-category.destroy');

        // Quick Shopping Products
        Route::resource('/quick-shopping-product', QuickShopProductController::class);

        // Bootcamp
        Route::get('/bootcamp', [BootcampController::class, 'index'])->name('bootcamp.index');
        Route::get('/bootcamp/affiliator', [BootcampController::class, 'affiliators'])->name('bootcamp.affiliators');
        Route::get('/bootcamp/{bootcamp}/show', [BootcampController::class, 'show'])->name('bootcamp.show');
        Route::delete('/bootcamp/{bootcamp}', [BootcampController::class, 'destroy'])->name('bootcamp.destroy');

        // Affiliator search
        Route::post('/search-affiliator', [BootcampController::class, 'searchAffiliate'])->name('affill.search');

        // Convert Affiliator to Bootcamp Request
        Route::get('/create-affiliator/{bootcamp}', [BootcampController::class, 'creatAffiliator'])->name('bootcamp.creatAffiliator');

        // Orders
        Route::get('/quick-shopping-order', [QuickShopOrderController::class, 'index'])->name('quick-shopping-order.index');
        Route::post('/quick-shopping-order', [QuickShopOrderController::class, 'store'])->name('quick-shopping-order.store');
        Route::delete('/quick-shopping-order/{quickShopOrder}', [QuickShopOrderController::class, 'destroy'])->name('quick-shopping-order.destroy');
        Route::get('/quick-shopping-order-details/{quickShopOrder}/details', [QuickShopOrderController::class, 'details'])->name('quick-shopping-order.details');
        Route::get('/quick-shopping-order-details/{quickShopOrder}/DownloadOrderPDF', [QuickShopOrderController::class, 'DownloadOrderPDF'])->name('quick-shopping-order.DownloadOrderPDF');
        Route::put('/quick-shopping-order-details/{quickShopOrder}/paymentStatus', [QuickShopOrderController::class, 'paymentStatus'])->name('quick-shopping-order.paymentStatus');
        Route::put('/quick-shopping-order-details/{quickShopOrder}/orderStatus', [QuickShopOrderController::class, 'orderStatus'])->name('quick-shopping-order.orderStatus');

    });






    // Boot Request Form
    Route::get('/rep', [BootcampController::class, 'requestForm'])->name('rep.requestForm');
    Route::post('/rep', [BootcampController::class, 'store'])->name('rep.store');






//front - user
// ____________________________________________________________________ user middle ware
    Route::prefix('/user')->namespace('App\Http\Controllers\Front')->group(function () {
        Route::match(['get', 'post'], 'login', 'UserController@loginUser')->name('user.login');
        Route::match(['get', 'post'], 'register', 'UserController@registerUser')->name('user.register');
        Route::match(['get', 'post'], 'forgot-password', 'UserController@forgotPassword');
        Route::match(['get', 'post'], 'reset-password/{code?}', 'UserController@resetPassword');
        Route::middleware('user')->group(function () {
            Route::get('index', 'UserController@index')->name('user.index');
            //  Route::match(['get','post'], '')
            Route::post('check_current_password', 'UserController@checkCurrentPassword');
            Route::get('logout', 'UserController@logoutUser');
        });

        // _______________ CUSTOMER/USER DASHBOARD CONTROLLER
        Route::get('/dashboard', 'UserDashboardController@index')->name('user.dashboard');
        Route::get('/update-info', 'UserDashboardController@update_info')->name('user.update');
        Route::match(['get', 'post'], 'update_user_details', 'UserDashboardController@updateUserDetails');
        Route::get('update-password', 'UserDashboardController@update_password')->name('password.update');
        Route::match(['get', 'post'], 'update_password', 'UserDashboardController@updatePassword');

        Route::get('your-ebook', 'UserDashboardController@your_ebook')->name('user.ebook');

        // _______________ AFFILIATOR USER PANEL DASHBOARD CONTROLLER
        Route::get('software', 'AffiliatorController@software')->name('affilator.software');
        Route::get('digital-product', 'AffiliatorController@digitalProduct')->name('affilator.digitalProduct');

    });

    ##---------- Affialiators -----------------##
    Route::prefix('/affiliate')->name('affiliate.')->group(function(){

        // Account Manage
        Route::get('account-setup', [UserDashboardController::class, 'accountSetup'])->name('account.setup');
        Route::post('account-setup', [UserDashboardController::class, 'accountSetupStore'])->name('account.setup.store');

        // Digital Sercice
        Route::get('/digital-service', [DigitalServiceController::class, 'index'])->name('digialservice.index');
        Route::get('/digital-service/create', [DigitalServiceController::class, 'create'])->name('digialservice.create');
        Route::get('/digital-service/{digitalService}/show', [DigitalServiceController::class, 'show'])->name('digialservice.show');
        Route::post('/digital-service', [DigitalServiceController::class, 'store'])->name('digialservice.store');

        // Order
        route::get('order', [AffiliatorOrderController::class, 'index'])->name('order.index');
        route::get('order/create', [AffiliatorOrderController::class, 'create'])->name('order.create');
        route::post('order/store', [AffiliatorOrderController::class, 'store'])->name('order.store');
        route::get('order/{id}/show', [AffiliatorOrderController::class, 'show'])->name('order.show');
        Route::get('/order/{affiliatorOrder}/DownloadOrderPDF', [AffiliatorOrderController::class, 'DownloadPDF'])->name('order.DownloadOrderPDF');

        // Payemt
        Route::get('/order/{id}/payment', [AffiliatorOrderController::class, 'payment'])->name('order.payment');
        Route::get('/order/{affiliatorOrder}/make-payment', [AffiliatorOrderController::class, 'paymentStore'])->name('order.payment.store');
        Route::get('/affiliate-pay-success/{affiliatorOrder}', [AffiliatorOrderController::class, 'success'])->name('payment.success');
        Route::get('/affiliate-pay-cancel', [AffiliatorOrderController::class, 'cancel'])->name('payment.cancel');

        // Transations
        route::get('/transaction', [AffiliatorTransactionController::class, 'index'])->name('transaction.index');
        route::post('/transaction', [AffiliatorTransactionController::class, 'store'])->name('transaction.store');


        Route::get('/get-software-details/{id}', [AffiliatorOrderController::class, 'getSoftwareDetails']);
        Route::get('/get-digitalService-details/{id}', [AffiliatorOrderController::class, 'getDigitalServiceDetails']);
        Route::get('/get-digitalProduct-details/{id}', [AffiliatorOrderController::class, 'getDigitalProductDetails']);

    });


    Route::middleware('user')->group(function () {
        Route::get('/checkout/{id}', [CartController::class, 'checkout'])->name('cart.checkout');
    });




    //front- QUICK DIGITAL
    Route::prefix('/quick-digital')->namespace('App\Http\Controllers\Front')->group(function () {
        Route::get('index', 'HomeController@index')->name('quick-digital.index');
        Route::get('contact-us', 'HomeController@contact_us')->name('quick-digital.contact');

        // _______________ STATIC BOOK PAGE VIEW START
        Route::get('paikari_bazar', 'HomeController@ebook1');
        Route::get('14-days-online-business', 'HomeController@ebook2');
        Route::get('100-business-idea', 'HomeController@ebook3');
        // _______________ STATIC BOOK PAGE VIEW END

        Route::get('digital-services', 'HomeController@digital_services');
        Route::get('digital-products', 'HomeController@digital_products');
        Route::get('courses', 'HomeController@course');
        Route::get('terms-condition', 'HomeController@terms');
        Route::get('privacy-policy', 'HomeController@privacy_policy');
        Route::get('refund-policy', 'HomeController@refund_policy');
        Route::get('ebook-list', 'HomeController@ebook_list');
        Route::get('ebook/{id?}', 'HomeController@individual_ebook');

         // CHECKOUT
        Route::get('/your_book/{id?}', 'HomeController@ebook_checkout'); // REDIRECT TO CHECKOUT | SKIPPING BOOK VIEW PAGE
        Route::get('/checkout', 'HomeController@all_checkout')->name('checkout'); // SOFTWARE CHECKOUT PAGE

        // Route::get('ebook-checkout', 'HomeController@ebook_checkout');
        Route::get('mobile-video-checkout', 'HomeController@mobile_video_checkout');
        Route::post('mobile-video-order-submit', 'HomeController@submit_mobile_video_checkout');
        Route::get('order-success/{orderId}', 'HomeController@order_success')->name('order.success');
        Route::get('order-success-product/{orderId}', 'HomeController@product_order_success')->name('product.order.success');
        Route::get('order-success-subscription/{orderId}', 'HomeController@order_success_subscription')->name('order.successSubscription');

        //Product Order Tracking // OLD ROUTER FOR USER UPDATE
        // Route::get('track-order/{id}', 'HomeController@track_order_product')->name('track.order');
        // Route::get('update-password', 'HomeController@update_password');
        // Route::get('update-profile', 'HomeController@update_profile');
        // Route::get('my-orders', 'HomeController@my_orders');
        // Route::get('my-courses', 'HomeController@my_courses');
        // Route::get('my-order-product', 'HomeController@my_order_products');

        //subscription
        Route::get('subscription', 'HomeController@subscription');

        //generate pdf with watermark
        Route::get('generate-pdf/{orderId}', [PDFController::class, 'generatePDF'])->name('generate.pdf');

        //quick-shop
        Route::get('quick-shop', 'HomeController@quickShop');
        Route::get('quick-shop/product/{id}', 'HomeController@getProductById');

        Route::get('/success-ebook-with-subscription/{orderId}', [HomeController::class, 'success_ebook_with_subscription'])->name('success-ebook-with-subscription');
        Route::get('/ebook-with-subscription/{id}', [CartController::class, 'purchaseEbookWithSubscription'])->name('ebook-with-subscription');

        Route::get('/video', function () {
            // Return the view for the 403 error page
            return view('quick_digital.course_play');
        })->name('quick_digital.video');

        Route::get('search-product', [HomeController::class, 'search_product'])->name('search.product');
        Route::get('product/checkout', [CartController::class, 'checkout_product'])->name('product_checkout');
        //course
        Route::get('course-details/{id}', 'HomeController@course_details')->name('course.details');
        Route::get('all-course', 'HomeController@show_all_courses')->name('course.all');
        Route::get('/checkout/{id}', [CartController::class, 'checkout'])->name('user_checkout');



        // _______________________________ SOFTWARE
        Route::get('/software', [SoftwareController::class, 'index'])->name('quick.software');
        Route::post('/software-order', [SoftwareController::class, 'softwareOrder'])->name('software.order');

        // _______________________________ DIGITAL PRODUCT
        Route::get('/digital-product', [DigitalProductController::class, 'index'])->name('quick.digitalProduct');

    });

    //ebook
    Route::get('/carts/{id}', [CartController::class, 'create'])->name('cart.create');

    // ___________________Payment routes
    // For Books
    Route::post('/payment', [PaymentController::class, 'payment'])->name('initiate_payment');
    Route::get('/success', [PaymentController::class, 'success'])->name('payment.success');
    Route::get('/cancel', [PaymentController::class, 'cancel'])->name('payment.cancel');
    Route::get('/successful/{order_id}/{book_id}/{book_title}/{price}/{email}',[PaymentController::class, 'successPay'])->name('successPay');
    // For Software
    // Route::post('/payment', [SoftPaymentController::class, 'softwarePayment'])->name('softwarePayment');
    // Route::get('/success', [SoftPaymentController::class, 'success'])->name('softPay.success');
    // Route::get('/cancel', [SoftPaymentController::class, 'cancel'])->name('softPay.cancel');


    // test pay pruduct
    Route::get('/test_order', function () {
        return view('quick_digital.static_product_page.test_product_pay');
    });
    Route::get('/test_pay',[HomeController::class, 'testPay']);



    //subscription
    Route::get('/subscription/carts/{id}', [CartController::class, 'create_cart_subscription'])->name('cartSubscription.create');
    Route::get('/subscription/checkout/{id}', [CartController::class, 'checkoutSubscription'])->name('cart.checkoutSubscription');
    Route::post('subscription/payment', [CartController::class, 'paymentSubscription'])->name('cart.paymentSubscription');
    Route::get('/subscription/success', [CartController::class, 'successSubscription'])->name('payment.successSubscription');
    // product
    Route::get('/product/carts/{id}', [CartController::class, 'create_cart_product'])->name('cart.create.product');
    Route::get('/product/checkout/{id}', [CartController::class, 'checkout_product'])->name('cart.checkout.products');
    Route::post('/product/payment', [CartController::class, 'payment_product'])->name('cart.product.payment');
    Route::get('/product/success', [CartController::class, 'product_payment_success'])->name('product.payment.success');


    Route::get('/cancel-fail', [CartController::class, 'fail'])->name('payment.cancel.fail');

    Route::get('/admin/errors/error_403', function () {
        // Return the view for the 403 error page
        return view('admin.errors.error_403');
    })->name('admin.errors.error_403');

    //Instructor
    //user instructor request
    Route::post('/request-instructor', [InstructorRequestController::class, 'requestInstructor'])->name('request.instructor');
    //instructor
    Route::prefix('/instructor')->namespace('App\Http\Controllers\Instructor')->group(function () {
        Route::group(['middleware' => ['instructor']], function () {
            Route::get('dashboard', 'InstructorController@dashboard');

            //course
            Route::get('manage-courses', 'CourseController@Courses');
            Route::match(['get', 'post'], 'add-edit-course/{id?}', 'CourseController@add_edit_course');
            Route::match(['get', 'post'], 'add-edit-course-topic/{id?}', 'CourseController@add_edit_course_topic');
            Route::match(['get', 'post'], 'add-edit-course-lesson/{id?}', 'CourseController@add_edit_course_lesson');
            Route::get('topic-with-lesson/{id}', 'CourseController@topics_with_lessons')->name('topic.with.lessons');

            Route::get('courses/filter/category', 'CourseController@filterByCategory')->name('instructor.courses.filter.category');
            Route::get('courses/filter/status', 'CourseController@filterByStatus')->name('instructor.courses.filter.status');
            Route::get('courses/filter/price', 'CourseController@filterByPrice')->name('instructor.courses.filter.price');

            //course category
            Route::get('course-category', 'CourseController@CourseCategory');
            Route::match(['get', 'post'], 'add-edit-course-category/{id?}', 'CourseController@addEditCategory');
            Route::get('delete-course-category/{id?}', 'CourseController@destroyCategory');
        });
    });






    //_______________________ SSLCOMMERZ Start
    // Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
    // Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

    // Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
    // Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

    // Route::post('/success', [SslCommerzPaymentController::class, 'success']);
    // Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
    // Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

    // Route::post('/ipn', [SslCommerzPaymentCon~troller::class, 'ipn']);
    ////_______________________SSLCOMMERZ END




    // ____________________________________________________ ecommerce | single page with payment
    Route::get('/ecommerce', function () {
        return view('ecommerce.ecommerce_site');
    });
    Route::post('/payment/user', [PaymentController::class, 'payment'])->name('quick.payment');






    // ______________________________________________________________
    // Route::get('/checkout_form', function () {
    //     return view('ecommerce.checkout');
    // });
    // Route::post('/checkout', [CheckoutController::class, 'processCheckout']);
