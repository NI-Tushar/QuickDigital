<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation | QuickDigital</title>
    <link rel="icon" href="{{ url ('icon.ico') }}" type="image/x-icon">
    <head>
        <title>অর্ডার নিশ্চিতকরণ</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: aliceblue;
                margin: 0;
                padding: 0;
                display: flex;
                height: 100vh;
            }
            .email-container {
                max-width: 600px;
                margin: auto;
                background-color: #ffffff;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border:2px solid #01062E;
                height: auto;
            }
            .checkmark {
                font-size: 40px;
                color: #34a853;
                margin-bottom: 10px;
                border:3px solid  #34a853;
                width: 60px;
                height: 60px;
                margin:auto;
                border-radius:50%;
                text-align: center;
            }
            .email-header h1{
                font-size: 20px;
                padding-bottom: 5px;
                margin: 0px;
                color: #ffffff;
            }
            .email-header, .email-footer {
                padding-top: 20px;
                text-align: center;
                padding: 5px;
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
                text-align: center;
            }
            .email-body p {
                line-height: 1.5;
                text-align: center;
                color: rgb(255, 94, 25);
                font-weight: 600;
            }

            .email-body .user,
            .email-body .pass{
                font-weight:700;
            }
            .email-body strong {
                color: #333333;
            }
          .btn_container{
            display: flex;
            justify-content: center;
            padding-top: 15px;
          }
          .btn{
            margin: auto;
            padding: 12px 8px;
            border-radius: 8px;
            color: white;
            text-decoration: none;
          }
          .logo{
            width:100px;
            height:auto;
          }

          .order_details{
              border: 1px solid gray;
              background-color: #dfdfdf;
              height: auto;
              padding: 10px;
              border-radius: 8px;

            }
            p a{
                text-decoration:none;
                color: black;
            }
            .order_details .item{
                display: flex;
                width: 100%;
                padding-top: 10px;
                padding-bottom: 10px;
                border-bottom: 1px solid  gray;
                font-size: 13px;
            }
            .order_details .item>div{
                width: 50%;
            }

            .order_details .item>div strong{
                font-weight: 700;
            }
            .btn-home {
                margin-top: 10px;
                padding: 5px 20px;
                font-size: 16px;
                border:2px solid green;
                color:green;
                font-weight:600;
            }
            .btn-home:hover{
                background-color:green;
                color:aliceblue;
            }


            @media screen and (max-width: 600px) {
                .email-container {
                    width: 100%;
                    padding: 10px;
                }
            }
            .header{
                padding-top: 5px;
                padding-bottom: 5px;
            }
            .header h4,
            .header h1{
                margin: 0;
                padding: 0;
            }
        </style>
    </head>

    <body>
        <div class="email-container">
            <div class="email-header">
                <img class="logo" src="http://127.0.0.1:8000/front/assets/images/primary_logo2.png" alt="">
                <div class="header">
                    <h1>ধন্যবাদ!</h1>
                    <h4>আপনার অর্ডারের জন্য</h4>
                </div>
            </div>
            <div class="email-body">
                <div class="checkmark">✔</div>
                <h2>আপনার অর্ডার সম্পর্কে জানতে আমাদের Whatsapp এ যোগাযোগ করুন অথবা কল করুন</h2>

                <h2>আপনার অর্ডার কনফার্ম হয়েছে</h2>
                <p>আপনার {{ $email }} এই ই-মেইলে একটি করফারমেশন মেইল পাঠানো হয়েছে।</p>
                    
                        <div class="order_details">
                            <div class="item">
                                <div><strong>অর্ডার আইডি</strong></div>
                                <div>: {{ $order_id }}</div>
                            </div>
                            <div class="item">
                                <div><strong>বইয়ের নাম</strong></div>
                                <div>: {{ $book_title }}</div>
                            </div>      
                            <div class="item">
                                <div><strong>সর্বমোট</strong></div>
                                <div>: {{ $price }} BDT</div>
                            </div> 
                       
                   
                        @if(!Auth::guard('user')->check())
                            @if(session()->has('default_pass'))
                                <div class="item">
                                    <div><strong>ইউজার ইমেইলঃ</strong></div>
                                    <div>: {{$email}}</div>
                                </div>
                                <div class="item">
                                    <div><strong>পাসওয়ার্ডঃ</strong></div>
                                    <div>: {{session()->get('default_pass')}}</div>
                                </div>
                                <p>লগইন করে আপনার এই অটো জেনারেটেড পাসওয়ার্ড পরিবর্তন করে নিন !</p>
                            @endif
                        @endif
                    </div>

                <!-- <div class="btn_container">
                    <a href="{{ url('user/your_order') }}" class="btn btn-home">অর্ডার পেইজ</a>
                </div> -->
                <div class="btn_container">
                    <a href="{{ url('/') }}" class="btn btn-home">হোম পেইজ</a>
                </div>

            </div>
            <div class="email-footer">
                <p>&copy; 2024 Quick Digital. All rights reserved.</p>
            </div>
        </div>
    </body>
    </html>
