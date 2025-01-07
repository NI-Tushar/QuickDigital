<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>পেমেন্ট সাকসেস | কুইক ডিজিটাল</title>
    <link rel="stylesheet" href="{{ url('front/styles/successPage.css') }}">
    <!-- <link rel="stylesheet" href="/public/front/styles/successPage.css"> -->
</head>
<body>
    <div class="success-message">
        <svg viewBox="0 0 76 76" class="success-message__icon icon-checkmark">
            <circle cx="38" cy="38" r="36" />
            <path fill="none" stroke="#FFFFFF" stroke-width="5" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="M17.7,40.9l10.9,10.9l28.7-28.7" />
        </svg>
        <h1 class="success-message__title">পেমেন্ট সাকসেস</h1>
        <div class="success-message__content">
            <p>আপনি সফলভাবে পেমেন্ট করেছেন, অর্ডার সম্পর্কে জানতে ক্লিক করুন</p>
            <div class="button_section">
                @if()
                <a href="{{ route('user.dashboard') }}"><button>আপনার অর্ডার</button></a>
            </div>
        </div>
    </div>
    <!-- <script src="/public/front/js/successPage.js"></script> -->
    <script src="{{ url('front/js/successPage.js') }}"></script>
</body>
</html>