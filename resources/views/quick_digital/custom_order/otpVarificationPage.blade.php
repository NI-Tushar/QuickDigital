@extends('quick_digital.layout.layout')
@section('content')
<link rel="stylesheet" href="{{ url('front/styles/custom_order/otp_varification_custom_order.css') }}">

    <div class="otp_form_section">
        <!-- _______________________________ FORM START -->
        <div class="centered_option">

                <div class="otp_section">
                <h5>আপনার মোবাইল নাম্বারে একটি OTP পাঠানো হয়েছে</h5>
                <h4>OTP দিন<h4>
                <form id="otp_form" action="" method="POST">
                    @csrf
                    @method('POST')

                    <div class="otp-input">
                        <input type="hidden" name="user_id" value="">
                        <input name="dig1" type="number" min="0" max="9" required>
                        <input name="dig2" type="number" min="0" max="9" required>
                        <input name="dig3" type="number" min="0" max="9" required>
                        <input name="dig4" type="number" min="0" max="9" required>
                    </div>

                <div class="varify_button">
                    @error('otp')
                        <span style="color:red;font-weight:700;">{{ $message }}</span>
                    @enderror
                </div>
                <div class="varify_button">
                    <a href="" id="resend_btn" class="resend_btn">আবার পাঠান</a>
                </div>

                    <div class="otp_text">
                        <p><span id="time" class="time"></span> সেকেন্ডের মদ্ধে OTP দিন.</p>
                        <p> আপনি আপনার মোবাইল নাম্বারে মেসেজের মাদ্ধমে OTP পাবেন.
                        <span>{{$number}}</span> <a href="">পরিবর্তন করুন</a></p>
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

    let timeLeft = 50; // 2 minutes in seconds
    let timerId;
    let canResend = true;
    function startTimer() {
        timerId = setInterval(() => {
            if (timeLeft <= 0) {
                clearInterval(timerId);
                resend_btn.style.display="flex";
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
        }, 100);
    }
    startTimer();




        // _______________________________ checking all otp field
        const form = document.getElementById('otp_form');
        const next_btn = document.getElementById('disabled');

        function checkForm() {
            console.log('checkform');
            const inputs = form.querySelectorAll('input');
            let allFilled = false;
            inputs.forEach(input => {
                if (input.value === '') {
                    allFilled = false;
                }
            });

            if(allFilled = true){
                next_btn.classList.remove('disabled');
            }
        }

        form.addEventListener('input', checkForm);


    // _________________________________ verify otp
    function verifyOTP() {

            const otp = Array.from(inputs).map(input => input.value).join('');
            if (otp.length === 4) {
                if (timeLeft > 0) {
                    alert(`Verifying OTP: ${otp}`);

                } else {
                    alert('OTP has expired. Please request a new one.');
                }
            } else {
                alert('Please enter a 4-digit OTP');
            }
        }








    </script>
@endpush