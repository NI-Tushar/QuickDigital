
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>রিসেট পাসওয়ার্ড | Quick Digital</title>
    <link rel="stylesheet" href="{{ url ('front/styles/user_login.css') }}">
    <link rel="stylesheet" href="{{ url('front/styles/color.css') }}">
    <link rel="icon" href="{{ url('icon.PNG') }}" type="image/x-icon">
</head>

<body>

<style>
    .title_container h2{
        text-shadow: 1px 1px 1px black;
        color:rgb(2, 197, 2);
        font-size:20px;
    }
    .centered_login .clearfix {
        padding-top:3rem;
        /* padding-bottom:3rem; */
    }
    .centered_login .clearfix label{
        font-size:12px;
    }
    .centered_login .clearfix p{
        color:red;
    }
    /* .centered_login .clearfix .resend:hover{
        color:red;
    } */
    
    .centered_login .clearfix .message p{
        text-align:center;
        padding:0;
        margin:0;
        font-size:14px;
        font-weight:600;
        color:rgb(2, 197, 2);
        margin:auto;
    }
</style>

    <div class="user_login_section">

    <div class="centered_login">
        <!-- ________________________________________________________________________ login -->
        <div class="update_form_wrapper">
            <div class="form_container">

                <a href="{{ url('quick-digital/index') }}">
                    <div class="logo_section">
                        <img src="{{ asset('front/assets/images/primary_logo2.png') }}" alt="Wise-Corporation" style="width: 150px;">
                    </div>
                </a>

                <div class="title_container">
                  <h2>পাসওয়ার্ড রিসেট করুন</h2>
                </div>


                <div class="row clearfix">

                  <div class="">
                    <form method="POST" action="{{ url('user/forgot/password') }}" method="POST">
                      @csrf

                        <label for="">নাম্বার দিয়ে রিসেট করুন</label>
                        <div class="input_field">
                            <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                                <path d="M6.62 10.79a15.05 15.05 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 .94-.27 11.36 11.36 0 0 0 3.58.57 1 1 0 0 1 1 1v3.44a1 1 0 0 1-1.1 1A19.91 19.91 0 0 1 3 4.1 1 1 0 0 1 4 3h3.44a1 1 0 0 1 1 1 11.36 11.36 0 0 0 .57 3.58 1 1 0 0 1-.27.94z" />
                            </svg>
                        </span>
                            <input type="number" name="reset_phone" id="passInput" placeholder="মোবাইল নাম্বারঃ" value="{{ old('reset_phone') }}" />
                        </div>
                        <p style="font-size:13px;color:red;text-align:left;width:100%;padding:0;margin:0;margin-top:-15px;">@error('reset_phone'){{$message}}@enderror</p>

                        @if (Session::has('pass_send_message'))

                            @if(Session::get('pass_send_message')=='এই নাম্বারটি রেজিস্টার্ড নয়')
                                <div class="message"><p style="color:red">{{ Session::get('pass_send_message') }}</p></div>
                            @else
                                <div class="message"><p>{{ Session::get('pass_send_message') }}</p></div>
                            @endif
                            <a href="{{ url('user/login') }}"><input class="button" value="লগইন"></a>
                            <a href=""><p class="resend">আবার পাঠান</p></a>
                        @else
                            <input class="button" type="submit" value="সাবমিট" />
                        @endif

                </form>
            </div>
            </div>
        </div>
    </div>
    <!-- ________________________________________________________________________ login -->
     
    </div>



    </div>

        <!--  Custom JS-->
    <script src="{{ url('front/js/login.js') }}"></script> 
</body>
</html>



