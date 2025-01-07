
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>রেজিস্ট্রেশন | Quick Digital</title>
    <link rel="stylesheet" href="{{ url ('front/styles/user_login.css') }}">
    <link rel="stylesheet" href="{{ url('front/styles/color.css') }}">
    <link rel="icon" href="{{ url('icon.PNG') }}" type="image/x-icon">
</head>

<body>

    <div class="user_login_section">

    <div class="centered_login">
        <!-- ________________________________________________________________________ login -->
        <div class="update_form_wrapper active">
            <div class="form_container">

                <a href="{{ url('quick-digital/index') }}">
                    <div class="logo_section">
                        <img src="{{ asset('front/assets/images/primary_logo2.png') }}" alt="Wise-Corporation" style="width: 150px;">
                    </div>
                </a>

                <div class="title_container">
                  <h2>রেজিস্ট্রেশন করুন</h2>
                </div>

                @if (Session::has('error_message'))
                    <div class="error_msg" role="alert">
                        <strong>Oh snap! </strong>{{ Session::get('error_message') }}
                    </div>
                @endif

                <div class="row clearfix">

                  <div class="">
                    <form method="POST" action="{{ route('user.register') }}" method="post" novalidate>
                      @csrf

                      <div class="input_field"> 
                        <!-- Icon on the left -->
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                                <circle cx="12" cy="8" r="4" />
                                <path d="M12 14c-5.33 0-8 2.67-8 6v1h16v-1c0-3.33-2.67-6-8-6z" />
                            </svg>
                        </span>
                        <!-- Email input field -->
                        <input type="text" id="emailInput" name="name" placeholder="আপনার নাম লিখুনঃ" value="{{ old('name') }}" />
                    </div>

                      <div class="input_field"> 
                        <!-- Icon on the left -->
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                            <path d="M6.62 10.79a15.72 15.72 0 0 0 6.59 6.59l2.2-2.2a1 1 0 0 1 1.11-.23 11.72 11.72 0 0 0 3.64 1.17 1 1 0 0 1 .86.99v3.12a1 1 0 0 1-.91 1c-8.42.48-15.2-6.3-14.72-14.72a1 1 0 0 1 1-.91h3.12a1 1 0 0 1 1 .86 11.72 11.72 0 0 0 1.17 3.64 1 1 0 0 1-.23 1.11l-2.2 2.2z" />
                            </svg>
                        </span>
                        <!-- Email input field -->
                        <input type="number" id="emailInput" name="mobile" placeholder="আপনার মোবাইল নম্বর লিখুনঃ" value="{{ old('mobile') }}" />
                    </div>

                      <div class="input_field"> 
                        <!-- Icon on the left -->
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                                <path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4.06-8 4.99-8-4.99V6l8 5 8-5v2.06z" />
                            </svg>
                        </span>
                        <!-- Email input field -->
                        <input type="email" id="emailInput" name="email" placeholder="আপনার ইমেইলঃ" value="{{ old('email') }}" />
                    </div>

                

                      <div class="input_field">
                        <span>
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                                <path d="M12.65 10a5.5 5.5 0 1 0-1.65 1.65L15 16v2h2v-2h2v-2h-2v-2h-2l-4.35-4.35zM7 9a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                          </svg>
                      </span>
                        <input type="password" name="password" id="passInput" placeholder="পাসওয়ার্ড দিন" value="{{ old('password') }}" required />
                         <!-- Eye icon on the right -->
                         <span class="toggle-icon" id="passwordInput">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                                <path d="M12 4.5C7.26 4.5 3.23 7.11 1.5 12c1.73 4.89 5.76 7.5 10.5 7.5s8.77-2.61 10.5-7.5c-1.73-4.89-5.76-7.5-10.5-7.5zm0 12.5c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.65 0-3 1.35-3 3s1.35 3 3 3 3-1.35 3-3-1.35-3-3-3z"/>
                            </svg>
                        </span>
                      </div>
    
                  <a href="{{ url('user/forgot-password') }}">পাসওয়ার্ড ভুলে গিয়েছেন?</a>

                    <input class="button" type="submit" value="সাবমিট করুন" />
                </form>
            </div>
            </div>

            <div class="new_reg active">
                <p>অলরেডি একাউন্ট আছে?</p>
                <a href="{{ url('user/login') }}"><button>লগইন করুন</button></a>
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



