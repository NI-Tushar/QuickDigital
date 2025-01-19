@extends('quick_digital.layout.layout')
@section('content')
@push('css')

@endpush

<main>
    <!-- @if (Session::has('error_message'))
    <div class="alert  alert-icon-left alert-dismissible mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Oh snap! </strong>{{ Session::get('error_message') }}
    </div>
    @endif
    @if (Session::has('success_message'))
    <div class="alert bg-success alert-icon-left alert-dismissible mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Well done!</strong> {{ Session::get('success_message') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif -->
    
    <section>
        <div class="home_slider">
            <img class="w-100" src="{{ asset('front/assets/images/banner_bg.png') }}" alt="">
            <div class="centered_div">
                <div class="slider_text">
                    <h1>আপনার <span>ব্যবসা</span> এবং <span>দক্ষতা</span> বৃদ্ধি করুন কুইক ডিজিটাল এর মাধ্যমে </h1>
                    <p>ক্যারিয়ার গড়তে এবং আয়ের নতুন পথ তৈরি করতে আজই জয়েন করুন আমাদের কুইক ডিজিটালে</p>
                    <!-- <p>ডিজিটাল মার্কেটিং এ দক্ষতা এবং কৌশল আয়ত্ত করে আপনার ব্যবসা অনলাইনে প্রশার বাড়ান, আরও গ্রাহক বাড়ান এবং নির্ভরযোগ্য ফলাফল অর্জন করুন।</p> -->
                    <div class="slider_buttons">
                        <a href="{{ route('quick.software') }}"><button class="active">সফটওয়্যার সল্যুশন</button></a>
                        <a href="{{ route('quick.digitalProduct') }}"><button>ডিজিটাল প্রোডাক্ট</button></a>
                    </div>
                </div>
                <div class="banner_img">
                    <img class="w-100" src="{{ asset('front/assets/images/about-img.jpg') }}" alt="">
                </div>
            </div>

            <!-- <div>
                <a href="{{ url('quick-digital/ebook') }}">~
                    <img class="w-100" src="{{ asset('front/assets/images/h_slider_2.png') }}" alt="">
                </a>
            </div> -->
            <!-- <div>
                <a href="{{ url('quick-digital/ebook') }}">
                    <img class="w-100" src="{{ asset('front/assets/images/h_slider_3.png') }}" alt="">
                </a>
            </div> -->
            <!-- <div>
                <a href="{{ url('quick-digital/ebook') }}">
                    <img class="w-100" src="{{ asset('front/assets/images/h_slider_4.png') }}" alt="">
                </a>
            </div> -->
            <!-- <div>
                <a href="{{ url('quick-digital/digital-service') }}">
                    <img class="w-100" src="{{ asset('front/assets/images/h_slider_5.jpeg') }}" alt="">
                </a>
            </div> -->
        </div>
    </section>








    <!-- __________________________________ banner start -->
     <section>
        <div class="banner">
            <img src="{{ asset('front/assets/images/newmarkeing.jpg') }}" alt="">
            <div class="button_div">
                <div class="buttons">
                    <!-- <a href="#"><button>আমাদের বইগুলো</button></a> -->
                    <a href="{{ route('quick.digitalProduct') }}"><button class="active">ডিজিটাল প্রোডাক্ট</button></a>
                    <a href="{{ route('quick.software') }}"><button>সফটওয়্যার সল্যুশন</button></a>
                </div>
            </div>
        </div>
     </section>
    <!-- __________________________________ banner end -->







    <section class="hero-section" style="display:none;">
        <div class="container hero-container d-flex flex-coloumn justify-content-center max-width py-5">
            <div class="row">
                <div class="col-12 col-lg-6 custom-padding">
                    <div class="heading-1-container">
                        <img class="heading-img-1" src="{{ asset('front/assets/images/heading-1.png') }}" alt="">
                    </div>
                    <div class="heading-2-container">
                        <img class="heading-img-2" src="{{ asset('front/assets/images/heading-2.png') }}" alt="">
                    </div>
                    <h2 class="hero-heading display-4 fw-semibold text-white">
                        সাশ্রয়ী মূল্যে
                    </h2>
                    <p class="text-white hero-decription-text">
                        ই-বুক এবং ডিজিটাল প্রোডাক্ট এর বিশ্বস্ত প্লাটফর্ম
                    </p>
                    <div class="d-flex gap-5">
                        <div class="d-flex justify-content-center">
                            <button class="border-0 rounded-1  py-1 px-4 ">
                                <a class="text-decoration-none text-white py-auto fw-medium btn-stylish" aria-current="page" href="{{ url('quick-digital/ebook') }}">ই-বুক</a>
                            </button>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="border-0 rounded-1  py-1 px-4">
                                <a class="text-decoration-none text-white py-auto fw-medium btn-stylish" aria-current="page" href="{{ url('quick-digital/courses') }}">মোবাইল ফ্রিল্যান্সিং</a>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-1">
                    <div class="heading-img-3-container" style="display: flex; justify-content: center; align-items: flex-end; height: 100%;">
                        <img class="heading-img-3" src="{{ asset('front/assets/images/running.png') }}" alt="">
                    </div>
                </div>
                <div class="col-12 col-lg-5 custom-padding">
                    <div class="heading-img-4-container">
                        <img class="heading-img-4 img-fluid" src="{{ asset('front/assets/images/hero-img.jpg') }}" alt="" class="heading-img-3">
                    </div>
                </div>
            </div>
            <!-- <div class="">
                </div> -->
        </div>
    </section>
    <!-- About -->
    <section class="about-section" id="about">
        <div class="container max-width">
            <div class="row py-5 gap-5 align-items-center about-element-container">

                <!-- ______________________ -->
                <div class="col-12 col-md-5 d-flex justify-content-center align-items-center">
                    <div class="about-img-element">
                        <img class="img-fluid rounded-3" src="{{ asset('front/assets/images/tech_team2.png') }}" alt="">
                    </div>
                </div>
                <!-- ______________________ -->
                <div class="col-12 col-md-6 d-flex flex-column custom-padding">
                    <h3 class="about-heading fw-bold">
                        আমাদের সম্পর্কে 
                        <div class="b-bottom"></div>
                    </h3>
                    <p class="about-descripttion text-center py-1">
                    কুইক ডিজিটাল"একটি ডিজিটাল সেবা, পন্য, এবং ট্রেনিং  প্রদানকারী প্ল্যাটফর্ম। বর্তমানে মানুষের  ডিজিটাল চাহিদার জন্য আমরা সদা সচেষ্ট।
                    </p>
                    <p class="about-descripttion text-center py-1">
                    আমাদের ভান্ডারে আছে  ইউজার ফ্রেন্ডলি এবং সুবিশাল ক্যাটালগ যেখান থেকে আপনি পাবেন: ই-বুক, ডিজিটাল পণ্য  বা সেবা এবং ফ্রিল্যান্সিং কোর্স সমূহ। যার মাধ্যমে আপনি ঘরে বসেই আপনার পন্য বা সেবা গ্রহন করতে পারবেন খুব সহজেই।
                    </p>
                    <p class="about-descripttion text-center py-1">
                    "কুইক ডিজিটাল"একটি ডিজিটাল উদ্ভাবনী প্ল্যাটফর্ম। আজকের যুবকদের গতিশীল ডিজিটাল চাহিদার জন্য আমরা সদা সচেষ্ট। কুইক ডিজিটাল হচ্ছে একটি সাম্প্রতিকতম বেস্টসেলার প্লাটফর্ম।
                    </p=>

                    <!-- <div class="">
                            <button class="border-0 rounded-1  py-2 px-4 btn-stylish">
                                <a class="text-decoration-none text-white py-auto fw-medium fs-5" aria-current="page" href="#">
                                    <i aria-hidden="true" class="far fa-hand-point-right"></i> Read More</a>
                            </button>
                        </div> -->
                </div>
                <!-- ____________________ -->

            </div>
        </div>
    </section>
    <!-- resources -->
    <section class="resources-section py-5" >

        <div class="container max-width px-0">
            <h3 class="resources-heading text-center custom-padding">
                আমাদের সার্ভিস সমূহ
                <span class="d-flex justify-content-center">
                    <div class="b-bottom-middle"></div>
                </span>
            </h3>
            <p class="resources-description text-center py-2 custom-padding">
                <!-- আপনার জন্য আমরা নিয়ে এসেছি ডিজিটাল জগতের সবকিছু। যা দিয়ে এই নতুন যুগের ডিজিটাল বিজনেস গুলোকে আপনি নিয়ে যেতে পারবেন অনন্য উচ্চতায়।
                আমাদের মোবাইল ফ্রিল্যান্সিং কোর্স গুলো শিখে আপনি উপার্জনের নতুন পন্থাগুলো সম্পর্কে জানতে পারবেন...ইনশাল্লাহ। -->
            </p>
            <div class="button"><a href="{{ route('quick-digital.contact') }}"><button>সব সার্ভিস</button></a></div>
            <div class="row resource-package-container">
                <div class="col-12 col-lg-4 d-flex justify-content-center card-container p-1">
                    <div class="card shadow border-0" style="width: 22rem;">
                        <img class="card-img-top rounded" src="{{ asset('front/assets/images/services/S-1-01.jpg') }}" alt="Card image cap">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <p class="card-text fs-5 text-center fw-bold">
                                    <a class="text-decoration-none resource-link" href="https://wa.me/+8801973784959?text=Hello%20QuickDigital!" target="_blank">
                                       হয়ে উঠুন একজন সফল গ্রাফিক্স ডিজাইনার আপনার ভালো ক্যারিয়ার এর জন্য।
                                    </a>
                                    <!-- <p>Become a Proffesional Graphics Designer</p> -->
                                </p>
                            </div>
                            <div class="d-flex justify-content-center my-2">
                                <button class="border-1 rounded-1 py-2 px-4 btn-stylish" style="width:95%;">
                                    <a class="text-decoration-none py-auto fw-medium fs-5" aria-current="page" href="https://wa.me/+8801973784959?text=Hello%20QuickDigital!" target="_blank">এখনই বুক করুন</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 d-flex justify-content-center card-container p-1">
                    <div class="card shadow border-0" style="width: 22rem;">
                        <img class="card-img-top rounded" src="{{ asset('front/assets/images/services/S-2-02.jpg') }}" alt="Card image cap">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <p class="card-text fs-5 text-center fw-bold">
                                    <a class="text-decoration-none resource-link" href="https://wa.me/+8801973784959?text=Hello%20QuickDigital!" target="_blank">
                                        আপনার প্রজেক্টের মান উন্নত করতে এবং দর্শকের মনোযোগ আকর্ষণ করতে প্রফেশনাল ভিডিও এডিটিং সার্ভিস গ্রহণ করুন।
                                    </a>
                                </p>
                            </div>
                            <div class="d-flex justify-content-center my-2">
                                <button class="border-1 rounded-1  py-2 px-4 btn-stylish" style="width:95%;">
                                    <a class="text-decoration-none py-auto fw-medium fs-5" aria-current="page" href="https://wa.me/+8801973784959?text=Hello%20QuickDigital!" target="_blank">এখনই বুক করুন</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-4 d-flex justify-content-center card-container p-1">
                    <div class="card shadow border-0" style="width: 22rem;">
                        <img class="card-img-top rounded" src="{{ asset('front/assets/images/services/S-4-04.jpg') }}" alt="Card image cap">
                        <div class="card-body d-flex flex-column justify-content-between">
                            <div class="d-flex flex-column justify-content-center align-items-center">
                                <p class="card-text fs-5 text-center fw-bold">
                                    <a class="text-decoration-none resource-link" href="https://wa.me/+8801973784959?text=Hello%20QuickDigital!" target="_blank">
                                    একটি আধুনিক এবং সকল ডিভাইসের সাথে সামঞ্জস্যপূর্ন, কার্যকরী এবং দর্শকদের আকর্ষণীয় করে তুলতে আমাদের প্রফেশনাল ওয়েব ডিজাইন সার্ভিস বেছে নিন।
                                    </a>
                                </p>
                            </div>
                            <div class="d-flex justify-content-center my-2">
                                <button class="border-1 rounded-1  py-2 px-4 btn-stylish" style="width:95%;">
                                    <a class="text-decoration-none py-auto fw-medium fs-5" aria-current="page" href="https://wa.me/+8801973784959?text=Hello%20QuickDigital!" target="_blank">এখনই বুক করুন</a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="courses_book" style="display:none;">
        <div class="centered_div">
            <div class="centered_part">
                <div class="img">
                    <img src="{{ asset('front/assets/images/courses/fb_marketing.png') }}" alt="">
                    <p>ফেসবুক মার্কেটিংয়ের কার্যকরী কৌশল শিখে আপনার ব্যবসা বা ব্র্যান্ডকে নতুন উচ্চতায় নিয়ে যান।</p>
                    <a href="{{ route('quick-digital.contact') }}"><button>এখনই বুক করুন</button></a>
                </div>
                <div class="img">
                    <img src="{{ asset('front/assets/images/courses/thumnail.jpg') }}" alt="">
                    <p>থাম্বনেল ডিজাইন কৌশল শিখে আপনার কনটেন্টকে আকর্ষণীয় ও নজরকাড়া করুন।</p>
                    <a href="{{ route('quick-digital.contact') }}"><button>এখনই বুক করুন</button></a>
                </div>
            </div>
            <div class="centered_part">
                <div class="img">
                    <img src="{{ asset('front/assets/books/cover/book1.png') }}" alt="">
                    <p>লাভের খনি পাইকারি বাজার" বইটি আপনাকে টাকার খনি খুঁজে দিবে</p>
                    <a href="{{ url('quick-digital/paikari_bazar') }}"><button>এখনই কিনুন</button></a>
                </div>
                <div class="img">
                    <img src="{{ asset('front/assets/books/cover/book3.jpeg') }}" alt="">
                    <p>এই বইটি পড়ে আপনি ১০০ টি সফল অনলাইন ব্যবসার আইডিয়া পাবেন</p>
                    <a href="{{ url('quick-digital/100-business-idea') }}"><button>এখনই কিনুন</button></a>
                </div>
            </div>
        </div>
    </section>


 


    </main>
@endsection
