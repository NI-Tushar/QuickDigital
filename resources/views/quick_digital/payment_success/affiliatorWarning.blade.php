<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>এফিলিয়েটর ওয়ার্নিং | কুইক ডিজিটাল</title>
    <link rel="stylesheet" href="{{ url('front/styles/successPage.css') }}">
    <link rel="stylesheet" href="/public/front/styles/successPage.css">
    <link rel="icon" href="{{ url('icon.png') }}" type="image/png">
</head>
<body>
    <div class="success-message">
        <svg viewBox="0 0 76 76" class="success-message__icon icon-checkmark warning_icon">
            <circle cx="38" cy="38" r="36" />
            <path fill="none" stroke="#FFFFFF" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M17.7,40.9l10.9,10.9l28.7-28.7" />
        </svg>
         
        <h1 class="success-message__title warning">Warning!</h1>
        <div style="padding-bottom:25px;" class="success-message__content">
            <p>আপনি একজন এফিলিয়েটর।</p>
            <p>অর্ডার করতে হলে আপনার ড্যাশবোর্ড এ যান</p>
            <div class="button_section warning">
                <a href="{{ route('user.dashboard') }}"><button>ড্যাশবোর্ড</button></a>
            </div>
        </div>
    </div>
    <script src="/public/front/js/successPage.js"></script>
    <script src="{{ url('front/js/successPage.js') }}"></script>
</body>
</html>