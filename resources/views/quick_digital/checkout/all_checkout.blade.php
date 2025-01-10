@extends('quick_digital.layout.layout')
@section('content')
<link rel="stylesheet" href="{{ url ('front/styles/all_checkout.css') }}">



<div class="checkout_section">
    <div class="whole_div">

        <div class="row">
            <div class="col-75">
            <div class="container">

                <form action="{{ route('customer.payment')}}" method="POST">
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
                            <p style="color:red;text-align:left;width:100%;padding:0;margin:0;">@error('is_checked'){{$message}}@enderror</p>
                        </div>

                        
                        <div class="col-50 payment_section">
                            <h3>আপনার অর্ডার</h3>
                            <p class="fname">{{$product->title}}</p>
                            <div class="desc">
                                <p class="desc_head">বিবরণঃ</p>
                                <p>{{ strlen($product->description) > 100 ? substr($product->description, 0, 150) . '...' : $product->description }}</p>
                            </div>

                            @if(session()->has('software_type'))
                                <div class="desc">
                                    <p class="desc_head">সফটওয়্যার সার্ভিস টাইপঃ</p>
                                    @if(session('software_type')=='subscription')
                                        <p>সাবস্ক্রিপশন</p>
                                    @else
                                        <p>কাস্টোমাইজ</p>
                                    @endif
                                </div>
                            @endif

                            <div class="order_table">
                                <ul>
                                    <!-- 
                                    <li><div class="part">প্যাকেজ</div><div class="part">: এক্সপ্রেস প্যাকেজ</div></li>
                                    <li><div class="part">ডেলিভারি</div><div class="part">: পেমেন্ট এর পরেই</div></li>
                                    <li><div class="part">সাবস্ক্রিপশন</div><div class="part">: ১ মাস</div></li>
                                    <li><div class="part">সাবটোটাল</div><div class="part">: {{ session('subscription_price') }} BDT প্রতি মাসে</div></li>
                                    <li><div class="part">সর্বমোট</div><div class="part">: {{ session('subscription_price') }} BDT প্রতি মাসে</div></li> 
                                    -->
                                    <input type="hidden" name="service_id" value="{{$product->id}}">
                                    <li><div class="part">মূল্য</div><div class="part">: {{$product->price}} BDT</div></li>
                                    <li><div class="part">সাবটোটাল</div><div class="part">: {{$product->price}} BDT</div></li>
                                    <li><div class="part">সর্বমোট</div><div class="part">: {{$product->price}} BDT</div></li>
                                </ul>
                            </div>
                            <div class="promocod_div">
                                <p>প্রোমোকোড দিন (যদি থাকে)</p>
                                <input style="border-radius:5px;" type="text" name="promocode">
                                @if (session('error'))
                                <p style="color:red;margin-top:-10px;padding:0;">{{ session('error') }}</p>
                                @endif
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
                        <a href="https://wa.me/+8801973784959?text=Hello%20QuickDigital!" target="_blank" class="text-decoration-none text-dark gap-3 d-flex align-items-center">
                            <div class="icon">
                                <ion-icon class="fs-5 text-success" name="logo-whatsapp"></ion-icon>
                                <span> হোয়াটসঅ্যাপ-এপ এ চ্যাট করুন</span>
                            </div>
                        </a>
                        <a href="https://www.facebook.com/quickdigital.official" target="_blank" class="text-decoration-none text-dark gap-3 d-flex align-items-center">
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