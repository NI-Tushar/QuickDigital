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
p{
    font-size: 13px;
}
        .email-container {
            max-width: 500px;
            margin: auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border: 2px solid #3A0256;
        }

        .email-header,
        .email-footer {
            text-align: center;
            padding: 10px;
            background-color: #3A0256;
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
        
    
        .email-body h2 {
            color: #01062E;
            margin: 0;
            padding: 0;
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
            background: #3A0256;
            color: #fff;
            text-decoration: none;
        }

        .logo {
            width: 150px;
            height: auto;
        }
        .email-body .details{
            padding: 10px;
            background-color: rgb(224, 224, 224);
            border-radius: 10px;
            box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px;
        }
        .email-body .details .part{
            display: flex;
            width: 100%;
        }
        .email-body .details .part p{
            margin-top: 3px;
            padding-top: 3px;
            padding-bottom: 3px;
            width: 50%;
            border-bottom: 0.5px solid rgba(0, 0, 0, 0.219);
            font-size: 12px;
        }
        .email-body .details .part p strong{
            color: rgba(0, 0, 0, 0.512);
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
            <img class="logo" src="http://127.0.0.1:8000/front/assets/images/primary_logo2.png" alt="">
            <h2>ধন্যবাদ</h2>
            <h2>আপনার অর্ডার কনফার্ম হয়েছে</h2>
        </div>
        <div class="email-body">
            <h4>হ্যালো!</h4>
            <p>আপনার অর্ডারের জন্য ধন্যবাদ।</p>

            <div class="details">
                <div class="part">
                    <p><strong>অর্ডার আইডি</strong></p>
                    <p><strong>:{{ $user_order_id }}</strong></p>
                </div>
                <div class="part">
                    <p><strong>বইয়ের নাম</strong></p>
                    <p><strong>:{{ $order_book_title }}</strong></p>
                </div>
                <div class="part">
                    <p><strong>মূল্য</strong></p>
                    <p><strong>:{{ $user_order_price }}</strong></p>
                </div>
            </div>

            @if(!Auth::guard('user')->check())
                @if(session()->has('default_pass'))
                <div class="details">
                    <div class="part">
                        <p><strong>ইউজার ইমেইলঃ</strong></p>
                        <div>: {{$user_provided_email}}</div>
                    </div>
                    <div class="part">
                        <p><strong>পাসওয়ার্ডঃ</strong></p>
                        <p>: {{session()->get('default_pass')}}</p>
                    </div>
                </div>
                    <p>লগইন করে আপনার এই অটো জেনারেটেড পাসওয়ার্ড পরিবর্তন করে নিন !</p>
                @endif
            @endif

            <p>আপনার অর্ডার সফলভাবে সম্পন্ন হয়েছে।</p>
            <p><strong>আপনার বইয়ের পিডিএফ ডাউনলোড করতে আমাদের ওয়েবসাইটে লগইন করুন</strong></p>
            <p>আমাদের সাথে থাকার জন্য ধন্যবাদ!</p>
            <p>শুভেচ্ছান্তে,</p>
            <hr>
            <p><strong>Quick-Digital - (কুইক ডিজিটাল)</strong></p>
            <p><strong>Address:</strong> H-417, R-7, Baridhara DOHS, Dhaka-1206</p>
            <p><strong>Mobile:</strong> 01973784959</p>
            <p><strong>Email:</strong> quickdigital121@gmail.com</p>
            <p><strong>Website:</strong><a href="https://quickdigital.online/" target="_blank"> www.quickdigital.online</a></p>
        </div>
        <div class="email-footer">
            <p>&copy; 2024 QUICK DIGITAL. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
