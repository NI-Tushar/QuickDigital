@extends('quick_digital.layout.layout')
@extends('front.users.user_dashboard.sidebar')

<script src="https://kit.fontawesome.com/5f7bc44e9f.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ url ('front/styles/digital_product_user.css') }}">

@section('content')
  <section class="home-section">
      <section class="home-content">
        <div class="software_section">


            <div class="centered_list">
                <main class="order_section">
                    <section class="container max-width custom-padding my-5">
                        <div class="order_center">

                        <!-- <div class="order_headline">
                            <h2 class="no_post_msg">কোনো অর্ডার নেই</h2>
                        </div> -->

                        <div class="order_headline">
                            <h3 class="no_post_msg">ডিজিটাল প্রোডাক্ট</h3>
                        </div>
                            <!-- ____________________ -->
                            <div class="expandable-item">
                                <div class="expandable-header">    
                                    <div class="collapsible-header">
                                        <div class="enr_img">
                                            <img src="https://media.istockphoto.com/id/1328399434/photo/live-demo-symbol-concept-words-live-demo-on-wooden-blocks-on-a-beautiful-orange-background.jpg?s=612x612&w=0&k=20&c=xrEz6Zdkz2htzivAG-JrwhWTW0v2emTz6PZ_aFIHzPw=" alt="">
                                        </div>
                                        <div class="header_info">
                                            <div class="section_part">
                                                <p>প্রোডাক্ট / সার্ভিসের নাম</p>
                                            </div>
                                            <div class="section_part">
                                                <label>প্যাকেজ</label>
                                                <p></p>
                                            </div>      
                                            <div class="section_part">
                                                <label>এমাউন্ট</label> 
                                                <p><span>250</span> ৳</p>
                                            </div>            
                                            <div class="section_part">
                                                <label>কমিশন</label> 
                                                <p><span>250</span> ৳</p>
                                            </div>
                                            <div class="buy_button">
                                                <a href="">কিনুন</a>
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                            <!-- _______________________ -->
                        </div>
                    </section>
                </main>

        </div>
    </div>
</section>


@endsection