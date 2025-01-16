
@extends('wise_corporation.layout.layout')
@extends('front.users.user_dashboard.sidebar')

@section('content')
<link rel="stylesheet" href="{{ url ('front/styles/track_order.css') }}">
<section class="home-section">
<div class="home-content">

    <main class="order_section">
        <section class="container max-width custom-padding my-5">
            <div class="order_center">

            @if ($cart_data->isEmpty())
            <div class="order_headline">
                <h2 class="no_post_msg">কোনো অর্ডার নেই</h2>
            </div>
            @else
            <div class="order_headline">
                <h3 class="no_post_msg">আপনার অর্ডার</h3>
            </div>
            @foreach ($cart_data as $cart)
                <!-- ____________________ -->
                <div class="expandable-item">
                    <div class="expandable-header" onclick="toggle('<?php echo  $loop->index; ?>')">    
                        <div class="collapsible-header">
                            <div class="enr_img">
                                <!-- <img src="https://media.istockphoto.com/id/1328399434/photo/live-demo-symbol-concept-words-live-demo-on-wooden-blocks-on-a-beautiful-orange-background.jpg?s=612x612&w=0&k=20&c=xrEz6Zdkz2htzivAG-JrwhWTW0v2emTz6PZ_aFIHzPw=" alt=""> -->
                            </div>
                            <div class="header_info">
                                <div class="section_part">
                                    <label>প্রোডাক্ট / সার্ভিসের নাম</label>
                                    @if($cart['book_title'] != '0')
                                        <p>{{$cart['book_title']}}</p>
                                    @else
                                        <p>কোম্পানী প্রোফাইল</p>
                                    @endif
                                </div>
                                <div class="section_part">
                                    <label>প্যাকেজ</label>
                                    <p>{{$cart['package_name']}}</p>
                                </div>      
                                <div class="section_part">
                                    <label>এমাউন্ট</label> 
                                    <p><span>{{$cart['price']}}</span> ৳</p>
                                </div>            
                                <div class="section_part">
                                    <label>ডেলিভারি</label> 
                                    <p><span>{{$cart['delivery_time']}}</span></p>
                                </div>
                                <div class="down_icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M19 14l-7-7-7 7"></path>
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>    
                    </div>
                    <div class="expandable-body">
                        <div class="drop_text">
                            <div class="drop_section">
                                <label>নামঃ</label>
                                <p>{{$cart['user_name']}}</p>
                                <label>অর্ডার স্ট্যাটাসঃ</label>
                                <p class="status">{{$cart['order_status']}}</p>
                            </div>
                            <div class="drop_section">
                                <label>ই-মেইলঃ</label>
                                <p>{{$cart['email']}}</p>
                                <label>মোবাইল নাম্বারঃ</label>
                                <p>{{$cart['phone']}}</p>                            
                            </div>

                            <div class="drop_section">
                                <label>অর্ডার তারিখঃ</label>
                                <p>{{ $cart['created_at']->format('d-F-Y') }}</p>

                                <label>অর্ডার আইডিঃ</label>
                                <p>{{$cart['order_id']}}</p>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- _______________________ -->
                 @endforeach
                 @endif

              
                 <script>
                    
                    toggle = (idx) => {
                        document.querySelectorAll('.expandable-item')[idx].classList.toggle('active');
                        console.log('clicked lskflskdf');
                    };
                 </script>

            </div>
        </section>
    </main>
</div>
</section>

@push('script')

@endpush
@endsection
