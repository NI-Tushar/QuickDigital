@extends('quick_digital.layout.layout')
@section('content')
<link rel="stylesheet" href="{{ url('front/styles/custom_order/otp_varification_custom_order.css') }}">

    <div class="otp_form_section">
        <!-- _______________________________ FORM START -->
        <div class="centered_option">

                <div class="otp_section">
                <h5>আপনার মোবাইল নাম্বারে একটি OTP পাঠানো হয়েছে</h5>
                <h4>OTP দিন<h4>
                    <!-- <h4>{{$otp}}</h4> -->
                <form id="otp_form" onsubmit="checkForm(); return false;">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="" id="actual_otp" value="{{$otp}}">
                    <input type="hidden" name="user_id" value="">

                    <div class="otp-input">
                        <input class="input" name="dig1" type="number" min="0" max="9" required>
                        <input class="input" name="dig2" type="number" min="0" max="9" required>
                        <input class="input" name="dig3" type="number" min="0" max="9" required>
                        <input class="input" name="dig4" type="number" min="0" max="9" required>
                    </div>

                    <div id="verify_btn" class="verify_btn">
                        <button type="submit">ভেরিফাই করুন</button>
                    </div>

                <div class="varify_button">
                    @error('otp')
                        <span style="color:red;font-weight:700;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="varify_button">
                    <a href="javascript:history.back();" id="resend_btn" class="resend_btn">আবার পাঠান</a>
                </div>

                    <div class="otp_text">
                        <p><span id="time" class="time"></span> সেকেন্ডের মদ্ধে OTP দিন.</p>
                        <p> আপনি আপনার মোবাইল নাম্বারে মেসেজের মাদ্ধমে OTP পাবেন.
                        <span>{{$number}}</span> <a href="javascript:history.back();">পরিবর্তন করুন</a></p>
                    </div>
                </div>

                </form>
            </div>

            </div>
        <!-- _______________________________ FORM END -->
    </div>

@endsection

@push('script')
<script>


    // ____________________________________ pass otp input after fillup one by one
    const inputs = document.querySelectorAll(".otp-input input");
    inputs.forEach((input, index) => {
      input.addEventListener("input", (e) => {
        if (e.target.value.length > 1) {
          e.target.value = e.target.value.slice(0, 1);
        }
        if (e.target.value.length === 1) {
          if (index < inputs.length - 1) {
            inputs[index + 1].focus();
          }
        }
      });

      input.addEventListener("keydown", (e) => {
        if (e.key === "Backspace" && !e.target.value) {
          if (index > 0) {
            inputs[index - 1].focus();
          }
        }
        if (e.key === "e") {
          e.preventDefault();
        }
      });
    });



    // __________________________________ otp timer
    const timerDisplay = document.getElementById('time');
    const resend_btn = document.getElementById('resend_btn');
    const verify_btn = document.getElementById('verify_btn');

    let timeLeft = 120; // 2 minutes in seconds
    let timerId;
    let canResend = true;
    function startTimer() {
        timerId = setInterval(() => {
            if (timeLeft <= 0) {
                clearInterval(timerId);
                resend_btn.style.display="flex";
                verify_btn.style.display="none";
                timerDisplay.textContent = "Code expired";
                timerDisplay.classList.add('expired');
                inputs.forEach(input => input.disabled = true);
                canResend = false;
            } else {
                const minutes = Math.floor(timeLeft / 60);
                const seconds = timeLeft % 60;
                timerDisplay.textContent = `(${minutes}:${seconds.toString().padStart(2, '0')})`;
                timeLeft--;
            }
        }, 1000);
    }
    startTimer();


        // _______________________________ checking all otp field
        const form = document.getElementById('otp_form');

        function checkForm() {

             const inputs = document.querySelectorAll('input');

            let enteredOtp = '';

            inputs.forEach(input => {
                enteredOtp += input.value;
            });

            let inputOTP = enteredOtp.slice(-4);

            const actualOtp = document.getElementById('actual_otp').value;

            if (inputOTP === actualOtp) {
                window.location.href = '/quick-digital/otp-varified/custom/software/order/';
            } else {
                alert('Invalid OTP. Please try again.');
            }

        }

    </script>
@endpush