@extends('quick_digital.layout.layout')
@section('content')
<link rel="stylesheet" href="{{ url ('front/styles/all_checkout.css') }}">



<div class="checkout_section">
    <div class="whole_div">

        <div class="row">
            <div class="col-75">
            <div class="container">

                <form action="{{ route('softwarePayment') }}" method="POST">
                    @csrf
                    
                    <div class="row">
                        <div class="col-50">
                            <h3>বিলিং তথ্য</h3>
                            @if (Auth::guard('user')->check())
                            @php
                            $user = Auth::guard('user')->user();
                            @endphp
                                <label for="fname"><i class="fa fa-user"></i> আপনার নামঃ</label>
                                <input type="text" id="fname" name="name" value="{{ $user->name }}" readonly required>
                                <label for="email"><i class="fa fa-envelope"></i> ই-মেইলঃ</label>
                                <input type="email" id="email" name="email" value="{{ $user->email }}" readonly required>
                                <label for="email"><i class="fa fa-envelope"></i> মোবাইল নম্বরঃ</label>
                                <input type="number" id="email" name="phone" value="{{ $user->mobile }}" readonly required>
                            @else
                                <label for="fname"><i class="fa fa-user"></i> আপনার নামঃ</label>
                                <p style="color:red;text-align:left;width:100%;padding:0;margin:0;">@error('name'){{$message}}@enderror</p>
                                <input type="text" id="fname" name="name" placeholder="আপনার নাম লিখুন" value="{{old('name')}}" required>
                                
                                <label for="email"><i class="fa fa-envelope"></i> ই-মেইলঃ</label>
                                <p style="color:red;text-align:left;width:100%;padding:0;margin:0;">@error('email'){{$message}}@enderror</p>
                                <input type="email" id="email" name="email" placeholder="ই-মেইল লিখুন" value="{{old('email')}}" required>

                                <label for="email"><i class="fa fa-envelope"></i> মোবাইল নম্বরঃ</label>
                                <p style="color:red;text-align:left;width:100%;padding:0;margin:0;">@error('phone'){{$message}}@enderror</p>
                                <input type="number" id="email" name="phone" placeholder="মোবাইল নাম্বার দিন" value="{{old('phone')}}" required>
                            @endif
                            <!-- <label for="adr"><i class="fa-solid fa-message"></i> Message</label>
                            <textarea name="" id="" cols="30" rows="5" placeholder="Optional"></textarea> -->
                            <label>
                                <input id="paid" type="checkbox" name="is_checked" required> আমি ওয়েবসাইটের শর্তগুলো পড়েছি এবং এতে সম্মতি দিয়েছি <a href="">শর্তাবলী</a>, 
                                <a href="">গোপনীয়তা নীতি</a> এবং <a href="">রিফান্ড নীতি</a>.
                            </label>
                        </div>
                        
                        <div class="col-50 payment_section">
                            <h3>আপনার অর্ডার</h3>
                            @if (session()->has('title'))
                                <p class="fname">{{ session('title') }}</p>
                            @endif
                            <div class="desc">
                                <p class="desc_head">বিবরনঃ</p>
                                @if (session()->has('desc'))
                                    <p>{{ session('desc') }}</p>
                                @endif
                            </div>
                            <div class="order_table">
                                <ul>
                                    @if (session()->has('package'))
                                        <li><div class="part">প্যাকেজ</div><div class="part">: এক্সপ্রেস প্যাকেজ</div></li>
                                    @endif
                                    @if (session()->has('delivery_time'))
                                        <li><div class="part">ডেলিভারি</div><div class="part">: পেমেন্ট এর পরেই</div></li>
                                    @endif
                                    @if (session()->has('subscription_price'))
                                        <li><div class="part">সাবস্ক্রিপশন</div><div class="part">: ১ মাস</div></li>
                                        <li><div class="part">সাবটোটাল</div><div class="part">: {{ session('subscription_price') }} BDT প্রতি মাসে</div></li>
                                        <li><div class="part">সর্বমোট</div><div class="part">: {{ session('subscription_price') }} BDT প্রতি মাসে</div></li>
                                    @endif
                                    @if (session()->has('hosting_charge'))
                                        <li><div class="part">হোস্টিং চার্জ</div><div class="part">: {{ session('hosting_charge') }} BDT প্রতি মাসে</div></li>
                                        <li><div class="part">সফটওয়্যার প্রাইজ</div><div class="part">: {{ session('soft_price') }} BDT</div></li>
                                        <li><div class="part">সর্বমোট</div><div class="part">: {{ session('total_price') }} BDT</div></li>
                                    @endif
                                    @if (session()->has('current_price'))
                                        <li><div class="part">সফটওয়্যার প্রাইজ</div><div class="part">: {{ session('current_price') }} BDT</div></li>
                                        <li><div class="part">সাবটোটাল</div><div class="part">: {{ session('current_price') }} BDT</div></li>
                                        <li><div class="part">সর্বমোট</div><div class="part">: {{ session('current_price') }} BDT</div></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
    
                    </div>

                        <input id="submit_btn" type="submit" value="অর্ডার প্লেস করুন" class="btn">
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