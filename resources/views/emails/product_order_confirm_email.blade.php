<!DOCTYPE html>
<html>

<head>
    <title>অর্ডার নিশ্চিতকরণ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .email-header,
        .email-footer {
            text-align: center;
            padding: 10px;
            background-color: #01062E;
            color: #ffffff;
            border-radius: 8px 8px 0 0;
        }

        .email-footer {
            border-radius: 0 0 8px 8px;
            font-size: 12px;
        }

        .email-body {
            padding: 20px;
            color: #333333;
        }

        .email-body h1 {
            color: #01062E;
        }

        .email-body p {
            line-height: 1.6;
        }

        .email-body strong {
            color: #333333;
        }

        .btn_container {
            display: flex;
            justify-content: center;
        }

        .btn {
            padding: 12px 8px;
            border-radius: 8px;
            background: #01062E;
            color: #fff;
            text-decoration: none;
        }

        .logo {
            width: 150px;
            height: auto;
        }

        @media screen and (max-width: 600px) {
            .email-container {
                width: 100%;
                padding: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="email-header">
            <img class="logo" src="https://quickdigital.online/wp-content/themes/quick-digital/assets/images/logo.png" alt="">
            <h1>আপনার অর্ডার কনফার্ম হয়েছে</h1>
        </div>
        <div class="email-body">
            <h1>হ্যালো, {{ $name }}!</h1>
            <p>আপনার অর্ডারের জন্য ধন্যবাদ।</p>
            @php
                $currentDateTime = date('YmdHis');
                $modifiedOrderId = 'QUICK-' . $order_id . $currentDateTime;
            @endphp

            <p><strong>অর্ডার আইডি:</strong> {{ $modifiedOrderId }}</p>
            <p><strong>সার্ভিস:</strong> {{ $product_title }}</p>
            <p><strong>মূল্য:</strong> {{ $price }} BDT</p>
            <p>আপনার অর্ডার সফলভাবে সম্পন্ন হয়েছে।</p>
            <a href="{{ route('track.order', $order_id) }}" class="btn btn-dark d-flex gap-1 align-items-center"><svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M17 8H20L23 12.0557V18H20.9646C20.7219 19.6961 19.2632 21 17.5 21C15.7368 21 14.2781 19.6961 14.0354 18H8.96456C8.72194 19.6961 7.26324 21 5.5 21C3.73676 21 2.27806 19.6961 2.03544 18H1V6C1 5.44772 1.44772 5 2 5H16C16.5523 5 17 5.44772 17 6V8ZM17 10V13H21V12.715L18.9917 10H17Z"></path></svg> ট্র্যাক</a>
            <p>আমাদের সাথে কেনাকাটা করার জন্য ধন্যবাদ!</p>
            <p>শুভেচ্ছান্তে,</p>
            <p>Wise টিম</p>
        </div>
        <div class="email-footer">
            <p>&copy; 2024 QUICK DIGITAL. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
