@extends('quick_digital.layout.layout')
@extends('front.users.user_dashboard.sidebar')

@section('content')
<link rel="stylesheet" href="{{ url ('front/styles/update_password.css') }}">


<section class="home-section">
      <div class="home-content">

      <div class="update_pass_section">


              <div class="update_form_wrapper">
                <div class="form_container">
                  <div class="title_container">
                  <h2>পাসওয়ার্ড আপডেট করুন</h2>
                </div>

                @if (Session::has('error_message'))
                    <div class="error_message" role="alert">
                        <strong></strong>{{ Session::get('error_message') }}
                    </div>
                @endif
                @if (Session::has('success_message'))
                    <div class="success_message" role="alert">
                           <strong></strong> {{ Session::get('success_message') }}
                    </div>
                @endif

                <div class="row clearfix">
                  <div class="">
                    <form method="POST" action="{{ url('user/update_password') }}">
                      @csrf

                      <div class="input_field"> 
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                              <circle cx="12" cy="8" r="4" />
                              <path d="M12 14c-5.33 0-8 2.67-8 4v2h16v-2c0-1.33-2.67-4-8-4z" />
                            </svg>
                        </span>
                        <input type="email" name="email" placeholder="Email" value="{{ Auth::guard('user')->user()->email }}" readonly="" />
                      </div>



                      <div class="input_field" style="position: relative;">
                        <!-- Lock Icon -->
                        
                        <!-- Eye Icon -->
                        <span style="position: absolute; top: 50%; right: 10px; transform: translateY(-50%); cursor: pointer;">
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                                <path d="M12.65 10a5.5 5.5 0 1 0-1.65 1.65L15 16v2h2v-2h2v-2h-2v-2h-2l-4.35-4.35zM7 9a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                          </svg>
                        </span>
                        <!-- Input Field -->
                        <input type="password" name="current_password_user" id="passInput1" placeholder="বর্তমান পাসওয়ার্ড দিন" required style="padding-right: 40px;"/>
                         <!-- Eye icon on the right -->
                         <span class="toggle-icon" id="passwordInput1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                                <path d="M12 4.5C7.26 4.5 3.23 7.11 1.5 12c1.73 4.89 5.76 7.5 10.5 7.5s8.77-2.61 10.5-7.5c-1.73-4.89-5.76-7.5-10.5-7.5zm0 12.5c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.65 0-3 1.35-3 3s1.35 3 3 3 3-1.35 3-3-1.35-3-3-3z"/>
                            </svg>
                        </span>

                      </div>



                      <div class="input_field"> 
                        <span >
                          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                            <path d="M12 2C9.24 2 7 4.24 7 7v3H6c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2v-8c0-1.1-.9-2-2-2h-1V7c0-2.76-2.24-5-5-5zm-3 7V7c0-1.65 1.35-3 3-3s3 1.35 3 3v2H9zm3 8c-.83 0-1.5-.67-1.5-1.5S11.17 14 12 14s1.5.67 1.5 1.5S12.83 17 12 17z" />
                          </svg>
                        </span>
                        <input type="password" name="new_password" id="passInput2" placeholder="নতুন পাসওয়ার্ড দিন" required />
                         <!-- Eye icon on the right -->
                         <span class="toggle-icon" id="passwordInput2">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                                <path d="M12 4.5C7.26 4.5 3.23 7.11 1.5 12c1.73 4.89 5.76 7.5 10.5 7.5s8.77-2.61 10.5-7.5c-1.73-4.89-5.76-7.5-10.5-7.5zm0 12.5c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.65 0-3 1.35-3 3s1.35 3 3 3 3-1.35 3-3-1.35-3-3-3z"/>
                            </svg>
                        </span>
                      </div>


                      <div class="input_field">
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                                  <path d="M12.65 10a5.5 5.5 0 1 0-1.65 1.65L15 16v2h2v-2h2v-2h-2v-2h-2l-4.35-4.35zM7 9a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
                            </svg>
                        </span>

                        <input type="password" name="confirm_password" id="passInput3" placeholder="পুনরায় পাসওয়ার্ড দিন" required />
                          <!-- Eye icon on the right -->
                          <span class="toggle-icon" id="passwordInput3">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                                <path d="M12 4.5C7.26 4.5 3.23 7.11 1.5 12c1.73 4.89 5.76 7.5 10.5 7.5s8.77-2.61 10.5-7.5c-1.73-4.89-5.76-7.5-10.5-7.5zm0 12.5c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.65 0-3 1.35-3 3s1.35 3 3 3 3-1.35 3-3-1.35-3-3-3z"/>
                            </svg>
                        </span>

                      </div>
     

           
              <input class="button" type="submit" value="আপডেট করুন" />
            </form>
          </div>
        </div>
      </div>
  </div>
</div>



</div>
</section>


<script src="{{ url('front/js/show_hide_pass.js') }}"></script> 
<script>
document.querySelectorAll('.toggle_eye').forEach((toggle) => {
  toggle.addEventListener('click', function () {
    const passwordInput = this.previousElementSibling; // Find the input field preceding the toggle button
    if (passwordInput.type === 'password') {
      passwordInput.type = 'text';
    } else {
      passwordInput.type = 'password';
    }
  });
});
</script>



@endsection
