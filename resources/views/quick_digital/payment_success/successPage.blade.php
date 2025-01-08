<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>পেমেন্ট সাকসেস | কুইক ডিজিটাল</title>
    <link rel="stylesheet" href="{{ url('front/styles/successPage.css') }}">
    <link rel="stylesheet" href="{{ url('front/styles/color.css') }}">
    <link rel="stylesheet" href="/public/front/styles/color.css">
    <link rel="stylesheet" href="/public/front/styles/successPage.css">
</head>
<body>
    <div class="success-message">
        <a href="{{ url('quick-digital/index') }}">
            <div class="logo_section">
                <img src="{{ asset('front/assets/images/primary_logo2.png') }}" alt="Wise-Corporation" style="width: 150px;">
                 <!-- <img src="/public/front/assets/images/primary_logo2.png" alt=""> -->
            </div>
        </a>
        <div class="msg_body">
            <svg viewBox="0 0 76 76" class="success-message__icon icon-checkmark">
                <circle cx="38" cy="38" r="36" />
                <path fill="none" stroke="#FFFFFF" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M17.7,40.9l10.9,10.9l28.7-28.7" />
            </svg>
            <h1 class="success-message__title">পেমেন্ট সাকসেস</h1>

            <!-- if new customer -->
            @if($user=='new_user')
                <div class="success-message__content">
                    <div class="msg">
                        <p>আপনি সফলভাবে পেমেন্ট করেছেন।
                            <br>
                            লগ-ইন করে আপনার অর্ডার সম্পর্কে জানতে আপনার মোবাইলের মেসেজ অথবা ই-মেইল চেক করুন।
                        </p>
                    </div>
                    <div class="button_section">
                        <a href="{{ url('user/login') }}"><button>লগ-ইন</button></a>
                    </div>
                </div>

            <!-- if registered customer (not login in)-->
            @elseif($user=='registered')
                <div class="success-message__content">
                    <div class="msg">
                        <p>আপনি সফলভাবে পেমেন্ট করেছেন, অর্ডার সম্পর্কে জানতে ক্লিক করুন</p>
                    </div>
                    <div class="button_section">
                        <a href="{{ url('user/login') }}"><button>লগ-ইন</button></a>
                    </div>
                </div>

            <!-- if logged in customer -->
            @elseif($user=='logged_user')



                <div class="success-message__content">
                    <div class="msg">
                        <p>আপনি সফলভাবে পেমেন্ট করেছেন, অর্ডার সম্পর্কে জানতে ক্লিক করুন</p>
                    </div>
                    <div class="button_section">
                        <a href="{{ route('user.dashboard') }}"><button>আপনার অর্ডার</button></a>
                    </div>
                </div>
            @endif

        </div>
    </div>
    <script src="/public/front/js/successPage.js"></script>
    <script src="{{ url('front/js/successPage.js') }}"></script>
</body>
</html>