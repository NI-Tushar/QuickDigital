@extends('quick_digital.layout.layout')
@extends('front.users.user_dashboard.sidebar')

<script src="https://kit.fontawesome.com/5f7bc44e9f.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ url ('front/styles/ordered_software_details.css') }}">

@section('content')
  <section class="home-section">
      <section class="home-content">
        <div class="software_section">

            <div class="centered_list">
                    <div class="soft_heading">
                        <h3>আপনার সফটওয়্যার সল্যুশনঃ</h3>
                    </div>
                    <!-- ___________________ -->
                        <div class="details_section">
                        <div class="form_wrapper">
                        <div class="form_container">
                            <!-- <div class="title_container">
                            <h2>Responsive Registration Form</h2>
                            </div> -->
                            <div class="row clearfix">
                            <div class="">

                            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                                <label for="">Order ID/ অর্ডার আইডি:</label>
                                <!-- <input type="email" name="email" placeholder="Email" required  value=""/> -->
                                <p>{{$orderData->order_id}}</p>
                            </div>
                            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                                <label for="">Software Title/ সফটওয়্যার নেইমঃ</label>
                                <!-- <input type="email" name="email" placeholder="Email" required  value=""/> -->
                                <p>{{$orderData->softwareList->title}}</p>
                            </div>
                            <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                                    <label for="">Description/ বিবরণঃ</label>
                                    <p>{{$orderData->softwareList->description}}</p>
                                </div>
                                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                                    @if($orderData->software_type=='custom')
                                    @if( $orderData->Custom_requirement_list != null)
                                    @php
                                    $orderData->Custom_requirement_list = json_decode($orderData->Custom_requirement_list, true);
                                    @endphp
                                    <label for="">Features/ বৈশিষ্ট্যসমূহঃ</label>
                                        <ul>
                                            @foreach ($orderData->Custom_requirement_list as $list)
                                                <li>{{ $list }}</li>
                                            @endforeach
                                        </ul>
                                        @else
                                            <p style="color:red;">কোনো ফিচার এড হয়নি</p>
                                        @endif
                                    @else
                                        <label>সার্ভিস টাইপঃ</label>
                                        <p>রেডি মেইড (সাবস্ক্রিপশন)</p>
                                    @endif
                                </div>
                                <div class="row clearfix">
                                    <div class="col_half">
                                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                        <label for="">সাবস্ক্রিপশনের তারিখঃ</label>
                                            <p>{{ date('F j, Y', strtotime($orderData->created_at)) }}</p>
                                        </div>
                                    </div>
                                    <div class="col_half">
                                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                        <label for="">সর্বশেষ রিনিউঃ</label>
                                            <p>{{ date('F j, Y', strtotime($orderData->start_date)) }}</p>
                                        </div>
                                    </div>
                                    <div class="col_half">
                                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                        <label for="">মেয়াদের শেষ তারিখঃ</label>
                                            <p>{{ date('F j, Y', strtotime($orderData->end_date)) }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row clearfix">
                                    <div class="col_half">
                                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                        <label for="">সর্বশেষ পেইড এমাউন্টঃ</label>
                                            <p>{{$orderData->total}} BDT</p>
                                        </div>
                                    </div>
                                    <div class="col_half">
                                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                        <label for="">পেমেন্ট মেথডঃ</label>
                                            <p>{{$orderData->payment_method}}</p>
                                        </div>
                                    </div>
                                    <div class="col_half">
                                        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                                        <label for="">সার্ভিস স্ট্যাটাসঃ</label>
                                            @if($orderData->delivery_status=='Pending')
                                                <p style="border:none;"><span style="color:red; border:2px solid red; padding-left:5px; padding-right:5px;border-radius:5px;">{{$orderData->delivery_status}}</span></p>
                                            @elseif($orderData->delivery_status=='In-progress')
                                                <p style="border:none;"><span style="color:blue; border:2px solid blue; padding-left:5px; padding-right:5px;border-radius:5px;">{{$orderData->delivery_status}}</span></p>
                                            @elseif($orderData->delivery_status=='Disabled')
                                                <p style="border:none;"><span style="color:red; border:2px solid red;background-color:red;color:white; padding-left:5px; padding-right:5px;border-radius:5px;">{{$orderData->delivery_status}}</span></p>
                                            @elseif($orderData->delivery_status=='Delivered')
                                                <p style="border:none;"><span style="color:green; border:2px solid green;background-color:green;color:white; padding-left:5px; padding-right:5px;border-radius:5px;">Active</span></p>
                                            @endif
                                        </div>
                                    </div>
                                    <a href="{{ route('customer.software') }}"><button class="back_btn">Back</button></a>

                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        </div>
                    <!-- ___________________ -->
            </div>

        </div>
    </section>
</section>

@endsection
