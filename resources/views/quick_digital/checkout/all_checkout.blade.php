@extends('quick_digital.layout.layout')
@section('content')
<link rel="stylesheet" href="{{ url ('front/styles/all_checkout.css') }}">



<div class="checkout_section">
    <div class="whole_div">

        <div class="row">
            <div class="col-75">
            <div class="container">
                <form action="/action_page.php">
                    
                    <div class="row">
                        <div class="col-50">
                            <h3>বিলিং তথ্য</h3>
                            <label for="fname"><i class="fa fa-user"></i> আপনার নামঃ</label>
                            <input type="text" id="fname" name="firstname" placeholder="আপনার নাম লিখুন" required>
                            <label for="email"><i class="fa fa-envelope"></i> ই-মেইলঃ</label>
                            <input type="email" id="email" name="email" placeholder="ই-মেইল লিখুন" required>
                            <label for="email"><i class="fa fa-envelope"></i> মোবাইল নম্বরঃ</label>
                            <input type="number" id="email" name="phone" placeholder="মোবাইল নাম্বার দিন" required>
                            <!-- <label for="adr"><i class="fa-solid fa-message"></i> Message</label>
                            <textarea name="" id="" cols="30" rows="5" placeholder="Optional"></textarea> -->
                            <label>
                                <input id="paid" onchange="paid_func()" type="checkbox" name="" required> আমি ওয়েবসাইটের শর্তগুলো পড়েছি এবং এতে সম্মতি দিয়েছি <a href="">শর্তাবলী</a>, 
                                <a href="">গোপনীয়তা নীতি</a> এবং <a href="">রিফান্ড নীতি</a>.
                            </label>
                        </div>
                        
                        <div class="col-50 payment_section">
                            <h3>আপনার অর্ডার</h3>
                            <p class="fname">Apartment Visitors Management System</p>
                            <div class="desc">
                                <p class="desc_head">বিবরনঃ</p>
                                <p>Apartment Visitors Management System Apartment Visitors Management System</p>
                            </div>
                            <div class="order_table">
                                <ul>
                                    <li><div class="part">প্যাকেজ</div><div class="part">: এক্সপ্রেস প্যাকেজ</div></li>
                                    <li><div class="part">ডেলিভারি</div><div class="part">: পেমেন্ট এর পরেই</div></li>
                                    <li><div class="part">সাবস্ক্রিপশন</div><div class="part">: ১ মাস</div></li>
                                    <li><div class="part">সাবটোটাল</div><div class="part">: ১৪৫০০ ট</div></li>
                                    <li><div class="part">সর্বমোট</div><div class="part">: ১৪৫০০ ট</div></li>
                                </ul>
                            </div>
                        </div>
    
                    </div>
                    <script>
                        function paid_func(){
                            checkbox = document.getElementById('paid');
                                if ( checkbox.checked ) {
                                    const dis = document.getElementById("submit_btn");
                                    dis.classList.remove('disabled') 
                                } else {
                                    const dis = document.getElementById("submit_btn");
                                    dis.classList.add('disabled');
                                }
                        }
                    </script>

                        <input id="submit_btn" type="submit" value="অর্ডার প্লেস করুন" class="btn disabled">
                    </form>
                    </div>
                    </div>

                    
                </div>
            </div>
</div>


<div class="checkout_section manual">
    <div class="whole_div">
        <div class="row">
            <div class="col-75">
                <div class="container">
                    <h4>ম্যানুয়ালি অর্ডার করতে হোয়াটসঅ্যাপ অথবা ফেসবুকে মেসেজ দিন</h4>
                    <div class="btn_part">
                        <a href="https://wa.me/+01973784959?text=Hello%20WiseCorporation!" target="_blank" class="text-decoration-none text-dark gap-3 d-flex align-items-center">
                            <div class="icon">
                                <ion-icon class="fs-5 text-success" name="logo-whatsapp"></ion-icon>
                                <span> ওয়াটস-এপ এ চ্যাট করুন</span>
                            </div>
                        </a>
                        <a href="https://www.facebook.com/WiseCorporationBD" target="_blank" class="text-decoration-none text-dark gap-3 d-flex align-items-center">
                            <div class="icon">
                                <ion-icon class="fs-5 text-primary" name="logo-facebook"></ion-icon>
                                <span> ফেসবুকে এ চ্যাট করুন</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection