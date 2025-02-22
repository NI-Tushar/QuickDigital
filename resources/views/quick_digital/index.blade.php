@extends('quick_digital.layout.layout')
@section('content')
@push('css')
    <link rel="stylesheet" href="{{ url ('front/styles/landing_page/banner.css') }}">
    <!-- <link rel="stylesheet" href="{{ url ('front/styles/landing_page/service_card_disabled.css') }}"> -->
    <link rel="stylesheet" href="{{ url ('front/styles/landing_page/service_card.css') }}">
    <link rel="stylesheet" href="{{ url ('front/styles/landing_page/digital_service.css') }}">
    <link rel="stylesheet" href="{{ url ('front/styles/landing_page/digital_product.css') }}">
    <link rel="stylesheet" href="{{ url ('front/styles/landing_page/software.css') }}">
    <link rel="stylesheet" href="{{ url ('front/styles/landing_page/training.css') }}">
    <link rel="stylesheet" href="{{ url ('front/styles/landing_page/about_us.css') }}">
    <script src="{{ url('admin/assets/js/landing_page/software_carousol.js') }}"></script>
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


    <!-- _______________________________________ BANNER SECTION START -->
     <section>
        <div class="whole_banner">
            <img class="banner_bg_img bg_desktop" src="{{ asset('front/assets/images/landing/banner_bg.png') }}" alt="">
            <img class="banner_bg_img bg_mobile" src="{{ asset('front/assets/images/landing/mobile_bg.png') }}" alt="">
            <div class="centered_banner">
                <div class="banner_part part_left">
                    <div class="banner_text">
                        <h1>আপনার <span>ব্যবসা</span> এবং <span>দক্ষতা</span> বৃদ্ধি করুন</h1>
                        <p>ক্যারিয়ার গড়তে এবং আয়ের নতুন পথ তৈরি করতে আজই কুইক ডিজিটালের সাথে যুক্ত হোন</p>
                        <div class="button_part">
                            <a href="{{ route('quick.software') }}"><button class="active">সফটওয়্যার সল্যুশন</button></a>
                            <a href="{{ route('quick.digitalProduct') }}"><button>ডিজিটাল প্রোডাক্ট</button></a>
                        </div>
                    </div>
                </div>
                <div class="banner_part part_right">
                    <div class="image_box">
                        <img class="hexa1" src="{{ asset('front/assets/images/landing/hexagon/Star 1.png') }}" alt="">
                        <img class="hexa2" src="{{ asset('front/assets/images/landing/hexagon/Star 2.png') }}" alt="">
                        <img class="hexa3" src="{{ asset('front/assets/images/landing/hexagon/Star 3.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
     </section>
    <!-- _______________________________________ BANNER SECTION END -->

    <!-- 
    four image section
    <div class="banner_part part_right">
        <div class="image_box">
            <div class="box1">
                <img src="{{ asset('front/assets/images/landing/poster2.png') }}" alt="" class="img1">
                <img src="{{ asset('front/assets/images/landing/poster3.png') }}" alt="" class="img2">
            </div>
            <div class="box2">
                <img src="{{ asset('front/assets/images/landing/poster1.png') }}" alt="" class="img3">
                <img src="{{ asset('front/assets/images/landing/poster4.png') }}" alt="" class="img4">
            </div>
        </div>
    </div> -->


    <!-- _______________________________________ BANNER SECTION START -->
     <section>
        <div class="whole_banner" style="display:none;">
            <img class="banner_bg_img bg_desktop" src="{{ asset('front/assets/images/landing/banner_bg.png') }}" alt="">
            <img class="banner_bg_img bg_mobile" src="{{ asset('front/assets/images/landing/mobile_bg.png') }}" alt="">
            <div class="centered_banner">
                <div class="banner_part part_left">
                    <div class="banner_text">
                        <h1>আপনার <span>ব্যবসা</span> এবং <span>দক্ষতা</span> বৃদ্ধি করুন</h1>
                        <p>ক্যারিয়ার গড়তে এবং আয়ের নতুন পথ তৈরি করতে আজই জয়েন করুন আমাদের কুইক ডিজিটালে</p>
                        <div class="button_part">
                            <a href=""><button class="active">সফটওয়্যার সল্যুশন</button></a>
                            <a href=""><button>ডিজিটাল প্রোডাক্ট</button></a>
                        </div>
                    </div>
                </div>
                <div class="banner_part part_right">
                    <div class="image_box">
                        <img src="{{ asset('front/assets/images/landing/banner_front_img.png') }}" alt="">
                        <div class="img_shadow">
                            <img src="" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
     </section>
    <!-- _______________________________________ BANNER SECTION END -->


    

<!-- ________________________________________________________________________ SERVICE CARD START ENEABLED -->
<section class="service_section">
    <div class="service_heading">
        <h1>আমাদের সার্ভিসসমূহ</h1>
        <p>সৃজনশীলতা, প্রযুক্তি এবং কৌশল—একই জায়গায় একত্রিত আপনার ব্যবসার জন্য দক্ষ ও দায়িত্তশীল টিম আপনার সেবায় নিয়জিত</p>
    </div>
    <div class="service_card">
        <div class="blank-1"></div>
            <div class="cards">

            <!-- _______________________________ -->
                <a href="">
                    <div class="signle_card">
                        <div class="card-body">
                            <div class="body_icon">
                                <img src="{{ asset('front/assets/images/services/icons/landing_page.png') }}" alt="">
                            </div>
                            <div class="card_desc">
                                <p class="title">ল্যান্ডিং পেইজ তৈরি</p>
                            </div>
                        </div>
                    </div>                  
                </a>

                <!-- ____________________________ -->
                 <a href="">
                    <div class="signle_card">
                        <div class="card-body">
                            <div class="body_icon">
                                <img src="{{ asset('front/assets/images/services/icons/video_make.png') }}" alt="">
                            </div>
                            <div class="card_desc">
                                <p class="title">ভিডিও তৈরি</p>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- ____________________________ -->
                 <a href="">
                    <div class="signle_card">
                        <div class="card-body">
                            <div class="body_icon">
                                <img src="{{ asset('front/assets/images/services/icons/facebook_market.png') }}" alt="">
                            </div>
                            <div class="card_desc">
                                <p class="title">ফেসবুক মার্কেটিং</p>
                            </div>
                        </div>
                    </div>                   
                 </a>

                <!-- ____________________________ -->
                <a href="">
                    <div class="signle_card">
                        <div class="card-body">
                            <div class="body_icon">
                                <img src="{{ asset('front/assets/images/services/icons/add_campaign.png') }}" alt="">
                            </div>
                            <div class="card_desc">
                                <p class="title">অ্যাড ক্যাম্পেইন</p>
                            </div>
                        </div>
                    </div>
                </a>

                <!-- ____________________________ -->
                 <a href="">
                    <div class="signle_card">
                        <div class="card-body">
                            <div class="body_icon">
                                <img src="{{ asset('front/assets/images/services/icons/software_solution.png') }}" alt="">
                            </div>
                            <div class="card_desc">
                                <p class="title">সফটওয়্যার সমাধান</p>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- ____________________________ -->
                 <a href="">
                    <div class="signle_card">
                        <div class="card-body">
                            <div class="body_icon">
                                <img src="{{ asset('front/assets/images/services/icons/digital_product.png') }}" alt="">
                            </div>
                            <div class="card_desc">
                                <p class="title">ডিজিটাল পণ্য</p>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- ____________________________ -->
                 <a href="">
                    <div class="signle_card">
                        <div class="card-body">
                            <div class="body_icon">
                                <img src="{{ asset('front/assets/images/services/icons/web_design.png') }}" alt="">
                            </div>
                            <div class="card_desc">
                                <p class="title">ওয়েব ডিজাইন</p>
                            </div>
                        </div>
                    </div>
                </a>
                <!-- ____________________________ -->
                 <a href="">
                    <div class="signle_card">
                        <div class="card-body">
                            <div class="body_icon">
                                <img src="{{ asset('front/assets/images/services/icons/graphics.png') }}" alt="">
                            </div>
                            <div class="card_desc">
                                <p class="title">গ্রাফিক ডিজাইন</p>
                            </div>
                        </div>
                    </div>
                </a>


            </div>
        <div class="blank-2"></div>
    </div>
</section>
<!-- ________________________________________________________________________ SERVICE CARD END -->


<div class="package_section">
    <a class="middle_package" href="{{ route('quick.digitalService') }}#package_section">
            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M19.4587 32.5833C18.2657 32.5833 17.1253 32.086 14.846 31.09C12.1845 29.9291 10.1487 29.0395 8.73553 28.2083H3.41699M19.4587 32.5833C20.6516 32.5833 21.792 32.086 24.0714 31.09C29.7457 28.6137 32.5837 27.377 32.5837 25.2916V9.97913M19.4587 32.5833V16.5416M6.33366 9.97913V14.3541" stroke="#E02143" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M26.95 6.35663L11.9729 13.6031M3.41683 19.4583H7.79183M1.9585 23.8333H7.79183M14.1006 14.6327L9.84079 12.572C7.50308 11.4404 6.3335 10.8745 6.3335 9.97913C6.3335 9.08371 7.50308 8.51788 9.84079 7.38621L14.0991 5.32558C16.7314 4.05246 18.0439 3.41663 19.4585 3.41663C20.8731 3.41663 22.187 4.05246 24.8164 5.32558L29.0762 7.38621C31.4139 8.51788 32.5835 9.08371 32.5835 9.97913C32.5835 10.8745 31.4139 11.4404 29.0762 12.572L24.8179 14.6327C22.1856 15.9058 20.8731 16.5416 19.4585 16.5416C18.0439 16.5416 16.73 15.9058 14.1006 14.6327Z" stroke="#E02143" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
            <p>আমাদের প্যাকেজগুলি দেখুন </p>
            <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l82.7 0L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3l0 82.7c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-17.7-14.3-32-32-32L320 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/></svg>
    </a>
</div>


<div class="page_button_part">
    <div class="page_buttons">
        <a href="{{ route('quick.software') }}"><button class="active">সফটওয়্যার সল্যুশন</button></a>
        <a href="{{ route('quick.digitalProduct') }}"><button>ডিজিটাল প্রোডাক্ট</button></a>
    </div>
</div>


<!-- ________________________________________________________________________ POPULER DIGITAL PRODUCT START -->
 
<!-- ________________________________________________________________________ SERVICE CARD START ENEABLED -->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.min.css">

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.5.0/glide.min.js"></script>
    
<section class="digital_service_section">
    <div class="product_heading">
        <h1>পপুলার ডিজিটাল সার্ভিস</h1>
        <p>সৃজনশীলতা, প্রযুক্তি এবং কৌশল—একই জায়গায় একত্রিত আপনার ব্যবসার জন্য</p>
        <div class="view_all_btn">
            <a href="{{ route('quick.digitalService') }}"><button>সকল সার্ভিস <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l82.7 0L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3l0 82.7c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-17.7-14.3-32-32-32L320 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/></svg></button></a>
        </div>
    </div>

    <div class="product_card_carousol">
        <div class="bg-cover flex h-screen justify-center items-center" style="height: auto;">
            <div class="glide xl:w-[54rem] lg:w-[42rem] md:w-[30rem] sm:w-[18rem] px-16 py-8 bg-gray-700 bg-opacity-60 rounded-3xl">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">

                <!-- _____________________________ -->
                @foreach ($digital_service as $service)
                <li class="glide__slide">
                    <div class="relative flex flex-col text-center bg-gray-800 h-40 items-center justify-center rounded-3xl duration- ease-in-out">
                        <div class="part">
                            <img src="{{ $service->thumbnail ? asset($service->thumbnail) : asset('no_image2.jpg') }}" alt="">
                        </div>
                        <div class="part desc">
                            <h5>{{$service->title}}</h5>
                            <div class="review">
                                <div class="star">★★★★☆</div>
                                <p>(Reviews)</p>
                            </div>
                            <div class="button_price">
                                <div class="price">{{$service->price}} BDT</div> 
                                <div class="btn"><a href=""><button>কিনুন</button></a></div>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
                 <!-- _____________________________ -->

                
                </ul>
            </div>  
            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left left-4" data-glide-dir="<">
                <div class="h-9 w-9 bg-gray-800 rounded-xl flex justify-center items-center my-auto  duration-300 ease-in-out">
                    
                    <svg class="arrow_color" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                        <path d="M14 5L8 12L14 19" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                </div>
                </button>

                <button class="glide__arrow glide__arrow--right right-4" data-glide-dir=">">
                <div class="h-9 w-9 bg-gray-800 rounded-xl flex justify-center items-center my-auto  duration-300 ease-in-out">

                    <svg class="arrow_color" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" fill="currentColor">
                        <path d="M10 19L16 12L10 5" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                </div>
                </button>
            </div>
            </div>
        </div>
    </div>
</section>

<script>
    const config = {
    type: 'carousel',
    startAt: 0,
    perView: 4,
    gap: 32,
    breakpoints: {
      1280: {
        perView: 3,
      },
      1024: {
        perView: 2,
      },
      768: {
        perView: 1,
      }
    }
  }
  new Glide('.glide', config).mount()
</script>
<!-- ________________________________________________________________________ POPULER DIGITAL PRODUCT END -->



<!-- ________________________________________________________________________ POPULER SOFTWARE START -->
 <section class="software_section">
    <div class="product_heading">
        <h1>পপুলার সফটওয়্যার সমূহ</h1>
        <p>সৃজনশীলতা, প্রযুক্তি এবং কৌশল—একই জায়গায় একত্রিত আপনার ব্যবসার জন্য</p>
        <div class="view_all_btn">
            <a href="{{ route('quick.software') }}"><button>সকল সফটওয়্যার<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l82.7 0L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3l0 82.7c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-17.7-14.3-32-32-32L320 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/></svg></button></a>
        </div>

        <div class="software_carousol">
            <div id="container">
                <div id="slider-container">
                    <span onclick="slideRight()" class="btn"></span>
                        <div id="slider">
                                                                              
                        <!-- _________________________ -->
                        @foreach ($software as $soft)
                        <a href="{{ url('/quick-digital/software/details/'.$soft['id']) }}">
                        <div class="slide">
                            <div class="slide_part img_part">
                                <img src="{{ $soft->thumbnail ? asset($soft->thumbnail) : asset('no_image2.jpg') }}" alt="">
                            </div>
                            <div class="slide_part desc_part">
                                <div class="soft_desc">
                                    <h3>{{ $soft->title }}</h3>
                                    <p>{{ strlen($soft->description) > 100 ? substr($soft->description, 0, 100) . '...' : $soft->description }}</p>
                                    <div class="review">
                                        <div class="star">★★★★☆</div>
                                        <p>(Reviews)</p>
                                    </div>
                                    <div class="price_section">
                                        <div class="left"><a href="{{ url('/quick-digital/software/details/'.$soft['id']) }}"><p>বিস্তারিত <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l82.7 0L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3l0 82.7c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-17.7-14.3-32-32-32L320 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/></svg></p></a></div>
                                        <div class="right">{{ $soft->price }}<span>/মাসিক</span></div>
                                    </div>
                                    <div class="button_section">
                                        <a href="{{ route('custom.software.order', ['id' => $soft->id]) }}">কাস্টম</a>
                                        <a href="{{ route('software.order', ['id' => $soft->id]) }}" class="active">কিনুন</a>
                                    </div>
                                </div>
                            </div>
                        </div>    
                        </a>
                        @endforeach
                        <!-- _________________________ -->
   
                        </div>
                    <span onclick="slideLeft()" class="btn"></span>
                </div>
            </div>
        </div>

    </div>

 </section>
 <script>
    var container = document.getElementById("container");
    var slider = document.getElementById("slider");
    var slides = document.getElementsByClassName("slide").length;
    var buttons = document.getElementsByClassName("btn");

    var currentPosition = 0;
    var currentMargin = 0;
    var slidesPerPage = 0;
    var slidesCount = slides - slidesPerPage;
    var containerWidth = container.offsetWidth;
    var prevKeyActive = false;
    var nextKeyActive = true;

    window.addEventListener("resize", checkWidth);

    function checkWidth() {
    containerWidth = container.offsetWidth;
    setParams(containerWidth);
    }

    function setParams(w) {
    if (w < 551) {
        slidesPerPage = 1;
    } else {
        if (w < 901) {
        slidesPerPage = 2;
        } else {
        if (w < 1101) {
            slidesPerPage = 3;
        } else {
            slidesPerPage = 4;
        }
        }
    }
    slidesCount = slides - slidesPerPage;
    if (currentPosition > slidesCount) {
        currentPosition -= slidesPerPage;
    }
    currentMargin = -currentPosition * (100 / slidesPerPage);
    slider.style.marginLeft = currentMargin + "%";
    if (currentPosition > 0) {
        buttons[0].classList.remove("inactive");
    }
    if (currentPosition < slidesCount) {
        buttons[1].classList.remove("inactive");
    }
    if (currentPosition >= slidesCount) {
        buttons[1].classList.add("inactive");
    }
    }

    setParams();

    function slideRight() {
    if (currentPosition != 0) {
        slider.style.marginLeft = currentMargin + 100 / slidesPerPage + "%";
        currentMargin += 100 / slidesPerPage;
        currentPosition--;
    }
    if (currentPosition === 0) {
        buttons[0].classList.add("inactive");
    }
    if (currentPosition < slidesCount) {
        buttons[1].classList.remove("inactive");
    }
    }

    function slideLeft() {
    if (currentPosition != slidesCount) {
        slider.style.marginLeft = currentMargin - 100 / slidesPerPage + "%";
        currentMargin -= 100 / slidesPerPage;
        currentPosition++;
    }
    if (currentPosition == slidesCount) {
        buttons[1].classList.add("inactive");
    }
    if (currentPosition > 0) {
        buttons[0].classList.remove("inactive");
    }
    }

 </script>
<!-- ________________________________________________________________________ POPULER SOFTWARE END -->



<!-- ________________________________________________________________________ POPULER DIGITAL PRODUCT START -->
<section class="digital_product_section">
    <div class="product_heading">
        <h1>পপুলার ডিজিটাল প্রোডাক্ট সমূহ</h1>
        <p>সৃজনশীলতা, প্রযুক্তি এবং কৌশল—একই জায়গায় একত্রিত আপনার ব্যবসার জন্য</p>
        <div class="view_all_btn">
            <a href="{{ route('quick.digitalProduct') }}"><button>সকল প্রোডাক্ট<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l82.7 0L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3l0 82.7c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-17.7-14.3-32-32-32L320 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/></svg></button></a>
        </div>

        <div class="software_carousol">
            <div id="digProd_container">
                <div id="slider-container">
                    <span onclick="digProdSlideRight()" class="digProd_btn"></span>
                        <div id="digProd_slider">
                            
                        <!-- _________________________ -->
                        @foreach ($digProd as $product)
                        <a href="{{ url('/quick-digital/digital-product/details/'.$product['id']) }}">
                            <div class="digProd_slide">
                                <div class="slide_part img_part">
                                    <img src="{{ $product->thumbnail ? asset($product->thumbnail) : asset('no_image2.jpg') }}" alt="">
                                </div>
                                <div class="slide_part desc_part">
                                    <div class="soft_desc">
                                        <h3>{{ $product->title }}</h3>
                                        <!-- <p>A Tourism Management System is a comprehensive platform designed to streamline the operations</p> -->
                                        <div class="details">
                                            <a href="{{ url('/quick-digital/digital-product/details/'.$product['id']) }}"><p>বিস্তারিত <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l82.7 0L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3l0 82.7c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-17.7-14.3-32-32-32L320 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/></svg></p></a>
                                        </div>

                                        <div class="price_section">
                                            <div class="left">On Sell</div>
                                            <div class="right">{{ $product->price }}<span> BDT</span></div>
                                        </div>
                                        <div class="button_section">
                                            <!-- <a href="!">কাস্টম</a> -->
                                            <a href="{{ route('digitalProduct.order', ['id' => $product->id]) }}" class="active">কিনুন</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                           
                        </div>
                    <span onclick="digProdSlideLeft()" class="digProd_btn"></span>
                </div>
            </div>
        </div>

    </div>

 </section>
 <script>
    var digProd_container = document.getElementById("digProd_container");
    var digProd_slider = document.getElementById("digProd_slider");
    var digProd_slide = document.getElementsByClassName("digProd_slide").length;
    var digProd_btn = document.getElementsByClassName("digProd_btn");

    var currentPosition = 0;
    var currentMargin = 0;
    var slidesPerPage = 0;
    var slidesCount = slides - slidesPerPage;
    var containerWidth = digProd_container.offsetWidth;
    var prevKeyActive = false;
    var nextKeyActive = true;

    window.addEventListener("resize", checkWidth);

    function checkWidth() {
    containerWidth = digProd_container.offsetWidth;
    setParams(containerWidth);
    }

    function setParams(w) {
    if (w < 551) {
        slidesPerPage = 1;
    } else {
        if (w < 901) {
        slidesPerPage = 2;
        } else {
        if (w < 1101) {
            slidesPerPage = 3;
        } else {
            slidesPerPage = 4;
        }
        }
    }
    slidesCount = slides - slidesPerPage;
    if (currentPosition > slidesCount) {
        currentPosition -= slidesPerPage;
    }
    currentMargin = -currentPosition * (100 / slidesPerPage);
    digProd_slider.style.marginLeft = currentMargin + "%";
    if (currentPosition > 0) {
        buttons[0].classList.remove("inactive");
    }
    if (currentPosition < slidesCount) {
        buttons[1].classList.remove("inactive");
    }
    if (currentPosition >= slidesCount) {
        buttons[1].classList.add("inactive");
    }
    }

    setParams();

    function digProdSlideRight() {
    if (currentPosition != 0) {
        digProd_slider.style.marginLeft = currentMargin + 100 / slidesPerPage + "%";
        currentMargin += 100 / slidesPerPage;
        currentPosition--;
    }
    if (currentPosition === 0) {
        buttons[0].classList.add("inactive");
    }
    if (currentPosition < slidesCount) {
        buttons[1].classList.remove("inactive");
    }
    }

    function digProdSlideLeft() {
    if (currentPosition != slidesCount) {
        digProd_slider.style.marginLeft = currentMargin - 100 / slidesPerPage + "%";
        currentMargin -= 100 / slidesPerPage;
        currentPosition++;
    }
    if (currentPosition == slidesCount) {
        buttons[1].classList.add("inactive");
    }
    if (currentPosition > 0) {
        buttons[0].classList.remove("inactive");
    }
    }

 </script>
<!-- ________________________________________________________________________ POPULER DIGITAL PRODUCT END -->



<!-- ________________________________________________________________________ TRANING START -->
<section class="training_section">
    <div class="taining_left"></div>
    <div class="training_container">
        <div class="training_img"><img src="{{ asset('front/assets/images/landing/training/training.png') }}" alt=""></div>
        <div class="training_content">
            <div class="text">
                <h2>ট্রেইনিং সমূহ</h2>
                <p>কুইক ডিজিটাল"একটি ডিজিটাল সেবা, পন্য, এবং ট্রেনিং প্রদানকারী প্ল্যাটফর্ম। বর্তমানে মানুষের ডিজিটাল চাহিদার জন্য আমরা সদা সচেষ্ট।</p>
                <p>আমাদের ভান্ডারে আছে ইউজার ফ্রেন্ডলি এবং সুবিশাল ক্যাটালগ যেখান থেকে আপনি পাবেন: ই-বুক, ডিজিটাল পণ্য বা সেবা এবং ফ্রিল্যান্সিং কোর্স সমূহ। যার মাধ্যমে আপনি ঘরে বসেই আপনার পন্য বা সেবা গ্রহন করতে পারবেন খুব সহজেই।</p>

                <a href="#" class="btn">সকল ট্রেইনিং →</a>
            </div>
        </div>
    </div>
</section>
<!-- ________________________________________________________________________ TRINING END -->




<!-- ________________________________________________________________________ ABOUT US START -->
<section class="about_us_section">
    <div class="center_about">
        <div class="about_part">
            <div class="about_text">
                <h2>আমাদের সম্পর্কে</h2>
                <p>কুইক ডিজিটাল"একটি ডিজিটাল সেবা, পন্য, এবং ট্রেনিং প্রদানকারী প্ল্যাটফর্ম । বর্তমানে মানুষের ডিজিটাল চাহিদার জন্য আমরা সদা সচেষ্ট।</p>
                <p>আমাদের ভান্ডারে আছে ইউজার ফ্রেন্ডলি এবং সুবিশাল ক্যাটালগ যেখান থেকে আপনি পাবেন: ই-বুক, ডিজিটাল পণ্য বা সেবা এবং ফ্রিল্যান্সিং কোর্স সমূহ। যার মাধ্যমে আপনি ঘরে বসেই আপনার পন্য বা সেবা গ্রহন করতে পারবেন খুব সহজেই।</p>
                <p>"কুইক ডিজিটাল"একটি ডিজিটাল উদ্ভাবনী প্ল্যাটফর্ম। আজকের যুবকদের গতিশীল ডিজিটাল চাহিদার জন্য আমরা সদা সচেষ্ট। কুইক ডিজিটাল হচ্ছে একটি সাম্প্রতিকতম বেস্টসেলার প্লাটফর্ম।</p>
            </div>
        </div>
        <div class="about_part">
            <div class="img_div">
                <img src="{{asset('front/assets/images/landing/about_us/tech_team.jpg')}}" alt="">
                <div class="circle_div">

                    <div class="circle">
                        <div class="summery">
                            <h1>20K+</h1>
                            <p>Happy Clients</p>
                        </div>
                    </div>

                    <div class="circle">
                        <div class="summery">
                            <h1>2K+</h1>
                            <p>Delivered</p>
                        </div>
                    </div>

                    <div class="circle">
                        <div class="summery">
                            <h1>400+</h1>
                            <p>Affiliator</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- ________________________________________________________________________ ABOUT US END -->




<!-- ________________________________________________________________________ SERVICE CARD START OLD-DISABLED -->
<section class="service_section" style="display:none;">
        <div class="service_heading">
            <h1>আমাদের সার্ভিসসমূহ</h1>
            <p>সৃজনশীলতা, প্রযুক্তি এবং কৌশল—একই জায়গায় একত্রিত আপনার ব্যবসার জন্য দক্ষ ও দায়িত্তশীল টিম আপনার সেবায় নিয়জিত</p>
        </div>
        <div class="service_card">
            <div class="blank-1"></div>
            <div class="cards">
                <div class="signle_card">
                    <div class="card-body">
                        <svg width="45" height="45" viewBox="0 0 57 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M49.875 4.75H7.125C4.5125 4.75 2.375 6.8875 2.375 9.5V47.5C2.375 50.1125 4.5125 52.25 7.125 52.25H49.875C52.4875 52.25 54.625 50.1125 54.625 47.5V9.5C54.625 6.8875 52.4875 4.75 49.875 4.75ZM51.2035 48.7882L5.79669 48.7882L5.31364 10.1441L51.2035 10.1441V48.7882Z" fill="#E02143"/>
                        <path d="M41.5421 15.4576H15.4574C13.8633 15.4576 12.5591 15.8924 12.5591 16.4237V24.1526C12.5591 24.6839 13.8633 25.1187 15.4574 25.1187H41.5421C43.1362 25.1187 44.4404 24.6839 44.4404 24.1526V16.4237C44.4404 15.8924 43.1362 15.4576 41.5421 15.4576ZM41.5421 24.1526H15.4574V17.3898H41.5421V24.1526Z" fill="#E02143"/>
                        <path d="M25.3332 29.1334H13.9332C13.2365 29.1334 12.6665 29.3614 12.6665 29.64V33.6934C12.6665 33.972 13.2365 34.2 13.9332 34.2H25.3332C26.0298 34.2 26.5998 33.972 26.5998 33.6934V29.64C26.5998 29.3614 26.0298 29.1334 25.3332 29.1334ZM25.3332 33.6934H13.9332V30.1467H25.3332V33.6934Z" fill="#E02143"/>
                        <path d="M25.3332 38H13.9332C13.2365 38 12.6665 38.228 12.6665 38.5067V42.56C12.6665 42.8387 13.2365 43.0667 13.9332 43.0667H25.3332C26.0298 43.0667 26.5998 42.8387 26.5998 42.56V38.5067C26.5998 38.228 26.0298 38 25.3332 38ZM25.3332 42.56H13.9332V39.0133H25.3332V42.56Z" fill="#E02143"/>
                        <path d="M43.1817 29.1334H32.818C32.1847 29.1334 31.6665 29.3614 31.6665 29.64V33.6934C31.6665 33.972 32.1847 34.2 32.818 34.2H43.1817C43.815 34.2 44.3332 33.972 44.3332 33.6934V29.64C44.3332 29.3614 43.815 29.1334 43.1817 29.1334ZM43.1817 33.6934H32.818V30.1467H43.1817V33.6934Z" fill="#E02143"/>
                        <path d="M43.1817 38H32.818C32.1847 38 31.6665 38.228 31.6665 38.5067V42.56C31.6665 42.8387 32.1847 43.0667 32.818 43.0667H43.1817C43.815 43.0667 44.3332 42.8387 44.3332 42.56V38.5067C44.3332 38.228 43.815 38 43.1817 38ZM43.1817 42.56H32.818V39.0133H43.1817V42.56Z" fill="#E02143"/>
                        </svg>
                        <div class="card_desc">
                            <p class="title">ল্যান্ডিং পেইজ তৈরি</p>
                            <p>আপনার ফেইসবুক পেইজ ভিত্তিক ব্যবসার জন্য, একটি আধুনিক পেমেন্ট গেইটওয়ে সম্বলিত, ল্যান্ডিং পেইজ তৈরি করুন আজই।</p>
                        </div>
                        <div class="button_section">
                            <a href="!"><button>বিস্তারিত</button></a>
                        </div>
                    </div>
                </div>

                <div class="signle_card">
                    <div class="card-body">
                    <svg width="47" height="48" viewBox="0 0 47 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M37.1228 47.4609H35.2065C35.1059 47.4335 35.0053 47.3958 34.903 47.3804C30.5964 46.7224 27.6605 44.3426 26.1841 40.2322C25.809 39.187 25.705 38.0442 25.4663 36.8928H22.6038C22.6038 37.1002 22.6038 37.2818 22.6038 37.4617C22.6038 39.9803 22.6072 42.5007 22.6038 45.0193C22.6021 46.1176 22.0855 46.9212 21.1614 47.2981C21.0387 47.3478 20.9176 47.4061 20.7966 47.4609H1.82426C0.89167 47.1765 0.283016 46.5648 0 45.6276C0 40.2819 0 34.9345 0 29.5888C0.0323934 29.5237 0.071606 29.4603 0.0954748 29.3917C0.450097 28.3825 1.22242 27.8137 2.29482 27.776C2.51816 27.7675 2.7415 27.776 3.01088 27.776C3.01088 27.5481 3.01088 27.37 3.01088 27.1901C3.01088 19.1098 3.01088 11.0296 3.01088 2.95105C3.01088 1.49641 3.96393 0.540348 5.4114 0.540348C15.8711 0.538634 26.329 0.538634 36.7887 0.540348C38.2003 0.540348 39.1295 1.46557 39.1636 2.88081C39.1687 3.10012 39.1636 3.32114 39.1636 3.56273C40.9469 3.56273 42.6485 3.55587 44.35 3.56444C45.7412 3.57301 46.6993 4.53763 46.6993 5.93403C46.7044 10.4093 46.7044 14.8847 46.6993 19.36C46.6993 20.7649 45.7463 21.7141 44.3482 21.7193C42.7985 21.7244 41.247 21.7193 39.6972 21.7193C39.5353 21.7193 39.375 21.7193 39.1892 21.7193C39.1789 21.9266 39.1653 22.0774 39.1653 22.2264C39.1653 23.5697 39.1738 24.9147 39.1568 26.258C39.1517 26.6006 39.254 26.7463 39.5932 26.8628C43.7481 28.3003 46.6226 32.2428 46.6976 36.569C46.7778 41.1351 44.1113 45.1598 39.8899 46.7533C39.005 47.0874 38.0486 47.2296 37.1245 47.4592L37.1228 47.4609ZM11.261 29.3026C8.34385 29.3026 5.42674 29.3026 2.50793 29.3026C1.73731 29.3026 1.50714 29.5322 1.50714 30.3169C1.50544 35.188 1.50544 40.0574 1.50714 44.9285C1.50714 45.7064 1.74072 45.9411 2.51304 45.9411C8.36261 45.9411 14.2139 45.9411 20.0634 45.9411C20.8665 45.9411 21.0813 45.7184 21.0813 44.8994C21.0813 40.0437 21.0813 35.1898 21.0813 30.3341C21.0813 29.5219 20.863 29.3026 20.0583 29.3009C17.1259 29.3009 14.1934 29.3009 11.261 29.3009V29.3026ZM35.4384 5.07905C32.5059 5.07905 29.5735 5.07905 26.641 5.07905C25.8346 5.07905 25.6181 5.30179 25.6181 6.11564C25.6181 10.4676 25.6181 14.8178 25.6181 19.1698C25.6181 19.9922 25.8499 20.2218 26.6819 20.2218C28.5812 20.2218 30.4805 20.2286 32.3797 20.2149C32.6696 20.2132 32.8486 20.3006 33.0191 20.5388C33.5681 21.3063 34.1375 22.0619 34.7104 22.8124C35.1315 23.3641 35.6805 23.3572 36.1033 22.8021C36.6472 22.0876 37.1978 21.3749 37.7093 20.6364C37.9241 20.3263 38.1577 20.2115 38.5311 20.2149C40.3843 20.2338 42.2393 20.2235 44.0925 20.2235C44.9722 20.2235 45.1922 20.0008 45.1922 19.1081C45.1922 14.8024 45.1922 10.4967 45.1922 6.19103C45.1922 5.28809 44.9859 5.07905 44.0993 5.07905C41.2129 5.07905 38.3248 5.07905 35.4384 5.07905ZM13.5796 27.7726C13.7859 27.7726 13.9496 27.7726 14.1133 27.7726C16.12 27.7726 18.125 27.7675 20.1316 27.7743C21.6626 27.7794 22.6004 28.7269 22.6038 30.2655C22.6089 31.7921 22.6038 33.3188 22.6055 34.8454C22.6055 35.0064 22.6191 35.1675 22.6259 35.3285H25.7221C26.208 32.4587 27.5548 30.1199 29.8633 28.3826C32.1683 26.6469 34.7769 26.0113 37.6667 26.3796V23.2544C37.4791 23.4977 37.3717 23.6382 37.2643 23.777C36.2431 25.0912 34.5501 25.0877 33.5374 23.765C33.1026 23.1962 32.6679 22.6274 32.2553 22.0414C32.0882 21.8049 31.9109 21.7107 31.6177 21.7124C29.9622 21.7278 28.3033 21.6679 26.6495 21.7347C25.1663 21.7947 24.0649 20.7238 24.0836 19.1389C24.128 15.6591 24.0973 12.1758 24.0973 8.69597V8.15283H13.5814V27.7743L13.5796 27.7726ZM36.1647 45.9411C41.1635 45.9291 45.2075 41.8496 45.1888 36.8414C45.17 31.823 41.0953 27.7503 36.1203 27.776C31.1556 27.8017 27.1099 31.8812 27.1099 36.862C27.1099 41.865 31.1863 45.9531 36.1647 45.9411ZM4.55383 8.13913V27.7349H12.0179V8.13913H4.55383ZM4.53848 6.56112H24.0768C24.0836 6.42919 24.0939 6.32467 24.0956 6.21844C24.1211 4.40913 24.9719 3.56273 26.7655 3.56101C30.2162 3.56101 33.667 3.56101 37.1177 3.56101H37.6377C37.74 2.25029 37.5644 2.05496 36.3539 2.05496C26.1534 2.05496 15.9529 2.05496 5.75238 2.05496C5.56996 2.05496 5.38583 2.04811 5.20511 2.06867C4.82661 2.10979 4.55383 2.32396 4.54701 2.70604C4.52484 3.98421 4.53848 5.26238 4.53848 6.5594V6.56112Z" fill="#525EA4"/>
                    <path d="M10.5499 30.8258H12.0212C12.0297 30.992 12.0434 31.1513 12.0434 31.3124C12.0451 32.5786 12.0502 33.8465 12.04 35.1126C12.0383 35.3697 12.1048 35.5119 12.3503 35.6404C13.1294 36.0481 13.5437 36.7284 13.5505 37.6039C13.5573 38.4777 13.155 39.1682 12.381 39.5828C12.1065 39.7302 12.0366 39.8946 12.04 40.1859C12.0553 41.4367 12.0468 42.6892 12.0468 43.9416C12.0468 44.0907 12.0468 44.2397 12.0468 44.4128H10.5754C10.5669 44.2432 10.5533 44.0804 10.5533 43.9193C10.5516 42.6532 10.5482 41.3853 10.5567 40.1191C10.5567 39.8827 10.5021 39.7422 10.272 39.6205C9.4826 39.2042 9.04614 38.5274 9.04443 37.6279C9.04443 36.7283 9.48601 36.0738 10.2549 35.6147C10.3981 35.529 10.5362 35.3011 10.5396 35.1349C10.5635 33.8842 10.5533 32.6317 10.5533 31.3792C10.5533 31.213 10.5533 31.0468 10.5533 30.8275L10.5499 30.8258ZM11.3171 38.3766C11.728 38.3646 12.057 38.0065 12.0417 37.5902C12.0263 37.1738 11.6666 36.8449 11.2557 36.8706C10.8533 36.8945 10.5533 37.2218 10.5584 37.6296C10.5635 38.0545 10.9045 38.3886 11.3171 38.3766Z" fill="#525EA4"/>
                    <path d="M6.02148 44.4145H4.52116C4.52116 43.969 4.54502 43.5458 4.50922 43.1243C4.49558 42.965 4.38476 42.7525 4.25178 42.6754C2.58949 41.6885 2.58096 39.6016 4.2603 38.649C4.52457 38.4999 4.52116 38.3183 4.52116 38.0887C4.52116 35.8597 4.52116 33.6306 4.52116 31.4015C4.52116 31.2216 4.52116 31.0417 4.52116 30.8344H6.02148C6.02148 31.0091 6.02148 31.1719 6.02148 31.3329C6.02148 33.5929 6.02489 35.8511 6.01637 38.111C6.01637 38.3817 6.07263 38.5359 6.33689 38.6764C7.11092 39.0876 7.52351 39.7696 7.52351 40.6468C7.52351 41.5223 7.11945 42.2077 6.34201 42.6189C6.08286 42.756 6.00102 42.9067 6.01637 43.1843C6.03853 43.5784 6.02148 43.9759 6.02148 44.4145ZM5.29178 39.8998C4.87237 39.8878 4.53309 40.2185 4.52968 40.6417C4.52627 41.046 4.83316 41.3801 5.2287 41.4041C5.63447 41.4298 5.99932 41.094 6.01637 40.6811C6.03512 40.2647 5.70607 39.9118 5.29007 39.8998H5.29178Z" fill="#525EA4"/>
                    <path d="M16.5771 30.8309H18.0689C18.0689 31.7493 18.0791 32.6454 18.0638 33.5415C18.0587 33.8276 18.1234 33.9938 18.4031 34.1429C19.1771 34.5558 19.5811 35.2463 19.5777 36.1218C19.5743 36.9785 19.172 37.6587 18.4184 38.0631C18.12 38.2224 18.0621 38.4023 18.0638 38.7021C18.0757 40.4275 18.0689 42.1529 18.0689 43.8782C18.0689 44.0444 18.0689 44.2089 18.0689 44.4059H16.5771C16.5771 44.25 16.5771 44.0907 16.5771 43.9313C16.5771 42.1751 16.5703 40.4189 16.5839 38.6627C16.5856 38.3663 16.5021 38.2138 16.231 38.0648C15.4808 37.6553 15.0751 36.9853 15.0665 36.1252C15.058 35.2446 15.4723 34.5644 16.2378 34.1463C16.5123 33.9972 16.589 33.8396 16.5839 33.5483C16.5669 32.6522 16.5771 31.7544 16.5771 30.8309ZM18.0638 36.1098C18.0638 35.6849 17.7364 35.3559 17.3136 35.3611C16.8891 35.3645 16.5737 35.6969 16.5822 36.1269C16.5907 36.5382 16.8993 36.8448 17.3068 36.8517C17.7347 36.8586 18.0621 36.5382 18.0621 36.1115L18.0638 36.1098Z" fill="#525EA4"/>
                    <path d="M37.7282 10.3271C37.3804 8.20081 38.7307 7.00488 39.8883 6.69476C41.3648 6.29897 42.9026 7.06656 43.467 8.49037C43.8199 9.38132 43.7585 10.2586 43.2999 11.0947C42.843 11.9257 42.1064 12.4003 41.1193 12.6367C42.7731 13.1764 43.6255 14.165 43.6852 15.5272C43.7619 17.3108 42.3366 18.7432 40.5362 18.6883C38.8279 18.6369 37.4912 17.0812 37.6924 15.3421C37.7265 15.044 37.6651 14.9121 37.406 14.7836C36.7001 14.4306 36.0045 14.0537 35.314 13.6682C35.0737 13.5328 34.8844 13.5465 34.644 13.6767C32.6373 14.7561 30.6221 15.8219 28.6103 16.891C28.4893 16.9544 28.3716 17.0264 28.2472 17.0812C27.8312 17.2679 27.4118 17.1497 27.2174 16.7985C27.0043 16.4147 27.1288 15.9898 27.5516 15.7499C28.0272 15.4792 28.5149 15.2307 28.9973 14.9737C30.3118 14.2747 31.628 13.5774 32.9408 12.8766C33.0567 12.8149 33.1676 12.7429 33.3329 12.6453C33.1505 12.5391 33.0141 12.4517 32.8726 12.3746C31.1967 11.4819 29.519 10.591 27.8431 9.7C27.7493 9.65031 27.6539 9.60234 27.5635 9.54751C27.1441 9.29051 27.0077 8.88273 27.2123 8.50065C27.4135 8.12542 27.8414 7.99863 28.2779 8.22651C29.3162 8.76451 30.3459 9.31964 31.3791 9.86791C32.4651 10.4453 33.5546 11.021 34.6355 11.6087C34.8674 11.7355 35.0532 11.7663 35.3021 11.6275C36.0966 11.1804 36.9064 10.764 37.7299 10.3254L37.7282 10.3271ZM40.6948 8.11514C39.8559 8.10486 39.1825 8.75936 39.1689 9.59891C39.1552 10.4248 39.8253 11.1187 40.6538 11.1341C41.4773 11.1495 42.161 10.4779 42.1712 9.64004C42.1814 8.79535 41.5336 8.12542 40.6948 8.11514ZM40.6896 14.1702C39.8508 14.1633 39.1791 14.8213 39.1689 15.6574C39.1603 16.4832 39.8338 17.1771 40.659 17.1891C41.4807 17.2011 42.1644 16.5243 42.1712 15.6882C42.1797 14.8418 41.5285 14.177 40.6879 14.1702H40.6896ZM36.5996 12.6453C37.2679 12.9999 37.851 13.3118 38.3488 13.5756C38.9762 13.2278 39.5422 12.9143 40.0043 12.659C39.5815 12.3951 39.0802 12.0747 38.5704 11.7697C38.4971 11.7252 38.3624 11.7115 38.2891 11.7492C37.7521 12.0216 37.2236 12.3112 36.5996 12.6453Z" fill="#525EA4"/>
                    <path d="M22.5662 17.172H15.0952V9.65204H22.5662V17.172ZM21.0641 11.1718H16.6041V15.6317H21.0641V11.1718Z" fill="#525EA4"/>
                    <path d="M15.083 18.7192H22.5761V26.2494H15.083V18.7192ZM21.0587 20.2578H16.6089V24.7211H21.0587V20.2578Z" fill="#525EA4"/>
                    <path d="M30.8881 36.8517C30.8881 35.1709 30.8847 33.4918 30.8881 31.811C30.8915 30.9029 31.3842 30.5945 32.1906 30.9988C35.5732 32.6933 38.9523 34.3964 42.3366 36.0909C42.6725 36.2588 42.935 36.4764 42.9299 36.8791C42.9248 37.2595 42.6724 37.4719 42.3519 37.633C38.9438 39.3412 35.5374 41.0563 32.1275 42.7628C31.4098 43.1226 30.8915 42.7953 30.8881 41.9832C30.8796 40.2733 30.8864 38.5616 30.8864 36.8517H30.8881ZM32.3969 40.9363C35.1163 39.5691 37.7691 38.2361 40.4987 36.8637C37.7623 35.4895 35.1009 34.1514 32.3969 32.7927V40.9363Z" fill="#525EA4"/>
                    <path d="M10.4901 9.65033C10.5157 9.69316 10.5293 9.70516 10.531 9.71886C10.6277 10.6658 10.2128 11.1392 9.28645 11.1392C8.36068 11.1392 7.43492 11.1392 6.51085 11.1392C6.36252 11.1392 6.2142 11.1255 6.04541 11.1187V9.65033H10.4918H10.4901Z" fill="#525EA4"/>
                    <path d="M10.5211 14.1427H6.0542V12.671H10.5211V14.1427Z" fill="#525EA4"/>
                    <path d="M10.5106 17.172H6.04883V15.6917H10.5106V17.172Z" fill="#525EA4"/>
                    <path d="M10.5242 21.7587V23.2202H6.04541V21.7587H10.5242Z" fill="#525EA4"/>
                    <path d="M6.06104 24.769H10.516V26.2494H6.06104V24.769Z" fill="#525EA4"/>
                    <path d="M10.5242 18.7311V20.1909H6.04541V18.7311H10.5242Z" fill="#525EA4"/>
                    <path d="M6.03906 5.03966V3.59015H7.5087V5.03966H6.03906Z" fill="#525EA4"/>
                    <path d="M10.5207 3.59186V5.03965H9.06641V3.59186H10.5207Z" fill="#525EA4"/>
                    <path d="M12.0571 5.04648V3.6004H13.5251V5.04648H12.0571Z" fill="#525EA4"/>
                    </svg>
                        <div class="card_desc">
                            <p class="title">ভিডিও মেকিং ও এডিটিং</p>
                            <p>বিজ্ঞাপন, ইভেন্ট, প্রোডাক্ট ভিডিও সহ যেকোনো ধরনের ভিডিও তৈরি করুন। ভিডিও ক্লিপিং, ট্রানজিশন, কালার গ্রেডিং, মিউজিক এবং সাউন্ড ইফেক্টস যুক্ত করুন।</p>
                        </div>
                        <div class="button_section">
                            <a href="!"><button>বিস্তারিত</button></a>
                        </div>
                    </div>
                </div>

                <div class="signle_card">
                    <div class="card-body">
                        <svg width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M2.52146 44.3131V43.6247C2.52146 38.1224 2.52146 32.6201 2.52146 27.1179C2.52146 26.1583 2.76248 25.9188 3.72302 25.9188C6.14197 25.9188 8.55915 25.9171 10.9781 25.9188C11.5428 25.9188 11.8648 26.153 11.9474 26.5932C12.0548 27.1654 11.6607 27.5845 10.9851 27.5862C8.93211 27.5915 6.87909 27.588 4.82606 27.588C4.63782 27.588 4.44782 27.588 4.22616 27.588V44.2797H25.9122C25.9122 44.0737 25.9122 43.887 25.9122 43.7004C25.9122 41.2283 25.9105 38.7545 25.9122 36.2825C25.9122 35.6908 26.1673 35.3581 26.6353 35.3035C27.1982 35.2366 27.5782 35.6134 27.5782 36.2701C27.5835 38.7422 27.58 41.216 27.58 43.6881C27.58 43.8765 27.58 44.0631 27.58 44.3096C28.1201 44.3096 28.618 44.3026 29.1176 44.3096C29.7685 44.3202 30.0799 44.623 30.0834 45.2727C30.0869 45.9682 30.1344 46.6743 30.0394 47.3592C29.7386 49.5266 28.0233 50.9933 25.8208 50.9951C18.6361 51.0021 11.4513 51.0039 4.26486 50.9845C3.72126 50.9845 3.14423 50.8771 2.64285 50.6746C1.02787 50.0179 0.164086 48.7678 0.0268656 47.0352C-0.0206337 46.4471 0.00751444 45.852 0.0163106 45.2604C0.026866 44.6195 0.338251 44.3219 0.996204 44.3114C1.48175 44.3043 1.96554 44.3114 2.5197 44.3114L2.52146 44.3131ZM24.2691 49.2889C27.2493 49.6006 28.7974 48.3505 28.3541 46.021H1.68758C1.68758 46.3151 1.68231 46.5739 1.68758 46.8327C1.71397 48.0529 2.51618 49.0794 3.71774 49.2625C4.40736 49.3682 5.12513 49.2819 5.86401 49.2819C5.86401 49.0037 5.84993 48.7449 5.86753 48.486C5.90095 47.9913 6.24752 47.6568 6.70316 47.6603C7.1588 47.6638 7.49658 48.0001 7.52648 48.5001C7.54232 48.7695 7.53 49.0389 7.53 49.303H22.5187C22.7052 47.9261 22.8723 47.6339 23.4423 47.662C24.0035 47.6884 24.1706 48.0107 24.2691 49.2889Z" fill="#8BC53F"/>
                            <path d="M30.5675 30.3496C30.1983 29.7032 29.8484 29.0884 29.4967 28.4753C28.6499 27.0016 27.7804 25.5419 26.972 24.047C26.8373 23.7958 26.8461 23.3338 26.9948 23.102C27.1278 22.8947 27.5442 22.7963 27.8363 22.7946C28.0183 22.7946 28.265 23.0247 28.3752 23.2144C29.7452 25.5664 31.1028 27.9255 32.4483 30.2934C32.7894 30.8941 32.5725 31.3543 31.8639 31.6231C29.1818 32.6384 26.4962 33.6484 23.8105 34.6602C22.4214 35.1837 21.0339 35.7071 19.6045 36.2464C20.1364 37.1844 20.6735 38.0732 21.1529 38.9902C21.7793 40.1864 21.3489 41.625 20.2046 42.2978C19.0604 42.9688 17.6152 42.6245 16.8681 41.4985C16.7439 41.3106 16.6372 41.1121 16.5252 40.9154C16.0668 40.1214 15.6102 39.3257 15.1413 38.5089C14.8561 38.6652 14.6059 38.8127 14.347 38.9445C13.0663 39.5944 11.8398 39.5119 10.7061 38.6178C10.4699 38.4316 10.3282 38.4509 10.0762 38.5686C9.56534 38.804 9.03872 39.0815 8.49459 39.1483C7.36611 39.2853 6.37934 38.5826 6.00317 37.5164C5.62351 36.4361 5.96818 35.2311 6.96195 34.6426C7.61105 34.258 7.92773 33.9154 7.84724 33.0652C7.74577 31.9937 8.31613 31.0996 9.18918 30.4462C9.23117 30.4146 9.27141 30.3812 9.31865 30.3601C13.1433 28.4788 16.1823 25.5278 19.4435 22.8789C21.1109 21.5246 22.7555 20.1404 24.4106 18.7703C25.1122 18.1888 25.5706 18.2732 26.0378 19.0724C26.2565 19.4466 26.4804 19.8189 26.6816 20.2019C26.9336 20.6779 26.8198 21.1469 26.4174 21.3876C26.008 21.6317 25.5549 21.5053 25.2557 21.0591C25.1507 20.9028 25.0597 20.7376 24.9215 20.5093C21.4451 23.3865 17.9966 26.2427 14.5062 29.1323C15.0731 30.1177 15.6329 31.0891 16.1911 32.0605C16.338 32.3152 16.4937 32.5664 16.625 32.8299C16.8524 33.2883 16.7387 33.738 16.3538 33.9716C15.9514 34.2158 15.458 34.1034 15.1903 33.6537C14.5779 32.6261 13.9936 31.5827 13.3952 30.5463C13.3182 30.4111 13.236 30.2793 13.1205 30.0843C12.5484 30.4128 11.985 30.736 11.4234 31.061C11.0333 31.2858 10.6378 31.5019 10.2582 31.7425C9.45512 32.2537 9.20843 33.1742 9.67207 34.012C10.1917 34.9536 10.7288 35.8845 11.2817 36.8067C11.7943 37.6604 12.7391 37.9626 13.5632 37.4163C16.9801 35.1468 20.9027 34.0595 24.6573 32.5822C26.6029 31.8181 28.5677 31.1032 30.5657 30.3496H30.5675ZM16.569 37.6815C17.1428 38.6828 17.6677 39.619 18.2153 40.5412C18.4708 40.9698 18.9397 41.1016 19.3316 40.882C19.7375 40.6536 19.9037 40.2531 19.7025 39.8649C19.1794 38.8567 18.5862 37.8853 18.0001 36.8612C17.5015 37.1475 17.0589 37.4022 16.5707 37.6833L16.569 37.6815ZM8.63281 35.5648C7.53757 36.1357 7.26988 36.5591 7.6058 37.1106C7.93822 37.6569 8.51034 37.6183 9.43412 36.9543C9.17344 36.5029 8.911 36.0461 8.63281 35.5648Z" fill="#8BC53F"/>
                            <path d="M50.1611 8.41124C50.1611 10.0125 50.1664 11.6138 50.1611 13.215C50.1558 14.8409 49.109 15.8808 47.4728 15.8826C44.2531 15.8861 41.0351 15.8861 37.8154 15.8826C36.1792 15.8826 35.1288 14.8391 35.1253 13.2185C35.12 11.6701 35.1218 10.1216 35.1253 8.57137C35.1253 7.91327 35.4385 7.53143 35.9593 7.53143C36.4801 7.53143 36.7915 7.91327 36.7932 8.57137C36.7968 10.1022 36.7932 11.6349 36.795 13.1657C36.7968 13.9153 37.0888 14.2092 37.8366 14.211C41.0387 14.2145 44.239 14.2145 47.4411 14.211C48.1924 14.211 48.4862 13.9171 48.4879 13.171C48.4915 9.96851 48.4915 6.76775 48.4879 3.56524C48.4879 2.81212 48.1959 2.51826 47.4499 2.5165C44.2478 2.51298 41.0475 2.51298 37.8454 2.5165C37.0906 2.5165 36.8003 2.80684 36.795 3.55116C36.7915 4.02098 36.8038 4.4908 36.7897 4.96062C36.7739 5.49554 36.4361 5.84747 35.9663 5.85275C35.493 5.85803 35.1429 5.5061 35.1288 4.97645C35.113 4.38522 35.106 3.79223 35.1324 3.20099C35.1922 1.93934 36.232 0.865973 37.4952 0.857175C40.9225 0.829021 44.3516 0.829021 47.7789 0.857175C49.109 0.867733 50.1435 1.98685 50.1558 3.3488C50.1717 5.03628 50.1594 6.72552 50.1594 8.413L50.1611 8.41124Z" fill="#8BC53F"/>
                            <path d="M35.1193 34.277C35.1193 32.6758 35.1176 31.0747 35.1193 29.4735C35.1228 27.8019 36.1536 26.7585 37.8087 26.7567C41.0276 26.7532 44.2447 26.7532 47.4635 26.7567C49.0993 26.7567 50.1476 27.7966 50.1529 29.4207C50.1582 30.9691 50.1564 32.5175 50.1529 34.0676C50.1529 34.724 49.8363 35.1075 49.3157 35.1075C48.7968 35.1075 48.4854 34.724 48.4837 34.0641C48.4802 32.5333 48.4854 31.0008 48.4819 29.4699C48.4802 28.7221 48.1864 28.4283 47.4371 28.4283C44.2359 28.4248 41.0364 28.4248 37.8351 28.4283C37.084 28.4283 36.7921 28.7204 36.7921 29.4699C36.7885 32.6723 36.7885 35.8729 36.7921 39.0753C36.7921 39.8266 37.084 40.1222 37.8298 40.1222C41.0311 40.1258 44.2306 40.1258 47.4318 40.1222C48.1847 40.1222 48.4749 39.8302 48.4819 39.0841C48.4872 38.6143 48.4731 38.1445 48.4872 37.6747C48.503 37.1398 48.839 36.7879 49.3121 36.7844C49.7853 36.7809 50.1353 37.1293 50.1494 37.6624C50.1652 38.2536 50.174 38.8466 50.1441 39.4378C50.0825 40.7029 49.0483 41.7709 47.7801 41.7815C44.3537 41.8096 40.9255 41.8114 37.4991 41.7815C36.1694 41.7709 35.1351 40.6466 35.1228 39.2882C35.107 37.6184 35.1193 35.9468 35.1193 34.277Z" fill="#8BC53F"/>
                            <path d="M0.000782584 15.8846C0.000782584 13.7417 0.000782584 11.6005 0.000782584 9.45764C0.000782584 8.6371 0.277231 8.36066 1.09601 8.36066C4.26548 8.36066 7.4367 8.36066 10.6062 8.36066C11.4267 8.36066 11.7032 8.6371 11.7049 9.45588C11.7049 13.7399 11.7049 18.0257 11.7049 22.3098C11.7049 23.1285 11.4267 23.4068 10.6079 23.4085C7.43846 23.4103 4.26724 23.4103 1.09777 23.4085C0.278992 23.4085 0.000782584 23.1303 0.000782584 22.3115C-0.00097823 20.1686 0.000782584 18.0275 0.000782584 15.8846ZM1.71053 10.0317V21.6952H10.0057V10.051C9.89656 10.044 9.81204 10.0334 9.72928 10.0334C7.06869 10.0334 4.40634 10.0334 1.71053 10.0334V10.0317Z" fill="#8BC53F"/>
                            <path d="M28.4261 7.5105C28.4332 11.6699 25.0605 15.0421 20.8884 15.0492C16.7848 15.0562 13.3911 11.6857 13.377 7.5915C13.3629 3.40922 16.7232 0 20.8619 0C25.0447 0 28.4191 3.35111 28.4261 7.5105ZM26.7548 7.52635C26.7548 4.30379 24.1289 1.66763 20.9201 1.67115C17.6672 1.67467 15.0519 4.29146 15.0519 7.54572C15.0519 10.7295 17.6795 13.3675 20.8619 13.3745C24.1201 13.3815 26.7548 10.7683 26.7565 7.52635H26.7548Z" fill="#8BC53F"/>
                            <path d="M39.295 34.2576C39.3073 32.4102 40.8204 30.9221 42.6735 30.9345C44.5159 30.9468 46.0044 32.4736 45.9832 34.3262C45.9621 36.1472 44.4596 37.6247 42.6294 37.6229C40.7852 37.6211 39.2827 36.1049 39.295 34.2576ZM42.6594 35.9482C43.57 35.9376 44.3098 35.1856 44.3098 34.2716C44.3098 33.3665 43.5489 32.6092 42.6453 32.6092C41.7099 32.6092 40.9525 33.3806 40.9701 34.3139C40.9877 35.2244 41.7487 35.9605 42.6611 35.9482H42.6594Z" fill="#8BC53F"/>
                            <path d="M40.9622 9.24061C39.6054 9.11212 39.2455 8.93435 39.3002 8.36055C39.3972 7.31329 40.2617 7.58435 40.9639 7.5069C40.9639 7.21648 40.9586 6.94367 40.9639 6.67085C40.9975 5.29621 42.0543 4.22606 43.4234 4.19086C43.9809 4.17678 44.5402 4.17678 45.0978 4.19086C45.6323 4.20494 45.9834 4.54816 45.9834 5.02339C45.9834 5.49686 45.6306 5.83656 45.0942 5.85416C44.6584 5.86824 44.2226 5.85768 43.7851 5.85768C42.8959 5.85944 42.6348 6.1217 42.6348 7.00879C42.6348 7.16192 42.6348 7.31505 42.6348 7.49634C43.3334 7.59667 44.2703 7.30273 44.2932 8.438C44.3038 8.99595 43.9245 9.15788 42.6348 9.22301C42.6348 9.78096 42.6348 10.346 42.6348 10.9127C42.6348 11.1046 42.6348 11.2964 42.6348 11.4865C42.6277 12.1501 42.3278 12.532 41.809 12.5408C41.2727 12.5496 40.9622 12.1571 40.9586 11.4601C40.9569 10.7314 40.9586 10.0027 40.9586 9.24061H40.9622Z" fill="#8BC53F"/>
                            <path d="M34.3959 25.9181C33.8508 25.9087 33.4961 25.5081 33.4477 24.9107C33.401 24.3297 33.6968 23.833 34.1848 23.6971C35.5067 23.3316 36.8303 22.9662 38.1556 22.6124C38.7457 22.4554 39.1713 22.7858 39.2734 23.4464C39.3789 24.1282 39.1003 24.6553 38.5173 24.8193C37.23 25.1848 35.9392 25.5338 34.6485 25.8853C34.5481 25.9134 34.4443 25.911 34.3959 25.9157V25.9181Z" fill="#8BC53F"/>
                            <path d="M29.3672 18.39C28.616 18.3654 28.1964 17.6601 28.558 17.146C29.3953 15.9617 30.273 14.802 31.17 13.6616C31.4473 13.3089 31.8651 13.2949 32.246 13.5598C32.6111 13.8125 32.7305 14.2827 32.4566 14.6617C31.6158 15.8231 30.7504 16.9688 29.8693 18.1022C29.7376 18.2724 29.4691 18.3356 29.3655 18.3935L29.3672 18.39Z" fill="#8BC53F"/>
                            <path d="M31.6258 21.7377C31.3957 21.5366 31.0498 21.3682 30.9678 21.1207C30.8858 20.8698 30.9589 20.4126 31.1497 20.2648C32.2944 19.3694 33.4836 18.5255 34.68 17.6919C35.0545 17.4307 35.543 17.5716 35.7944 17.9274C36.0565 18.2986 35.9923 18.742 35.5805 19.0514C34.7621 19.665 33.9258 20.2545 33.0967 20.8543C32.8293 21.0468 32.5707 21.2513 32.2926 21.4283C32.1232 21.5366 31.9235 21.6019 31.6275 21.7377H31.6258Z" fill="#8BC53F"/>
                            <path d="M6.21183 16.7167C5.60087 16.7167 4.98992 16.729 4.38102 16.7132C3.75566 16.6992 3.3463 16.3611 3.34425 15.8899C3.34219 15.417 3.74949 15.0667 4.37279 15.0596C5.63379 15.0456 6.89478 15.0456 8.15784 15.0596C8.78319 15.0667 9.19255 15.4117 9.19667 15.8812C9.20078 16.3524 8.78936 16.6975 8.16812 16.7132C7.51808 16.729 6.86598 16.7167 6.21594 16.7167H6.21183Z" fill="#8BC53F"/>
                            <path d="M6.25401 20.0615C5.66345 20.0615 5.07288 20.0667 4.48438 20.0615C3.77242 20.0527 3.33413 19.7227 3.34442 19.2155C3.3547 18.7258 3.77859 18.4029 4.45352 18.3994C5.65316 18.3906 6.85486 18.3924 8.05655 18.3994C8.76646 18.4029 9.20681 18.7381 9.19652 19.2436C9.18623 19.7455 8.74794 20.0562 8.02569 20.0632C7.43513 20.0685 6.84457 20.0632 6.25606 20.0632L6.25401 20.0615Z" fill="#8BC53F"/>
                            <path d="M7.13661 13.3703C6.76611 13.3703 6.39341 13.3877 6.02512 13.3668C5.41424 13.3318 4.99743 12.9678 5.01728 12.5164C5.03492 12.0842 5.4407 11.7413 6.02732 11.722C6.74626 11.6993 7.46741 11.6993 8.18635 11.722C8.77297 11.7413 9.17875 12.086 9.19639 12.5181C9.21404 12.9678 8.79502 13.3318 8.18635 13.3668C7.84011 13.3877 7.48946 13.3703 7.14102 13.3703H7.13661Z" fill="#8BC53F"/>
                            <path d="M19.2318 7.51874C19.2318 6.73239 19.2257 5.94605 19.2334 5.16147C19.2426 4.32034 19.7444 3.95456 20.4006 4.32388C21.7962 5.10669 23.1919 5.89127 24.566 6.72179C24.796 6.86139 25.0076 7.21127 25.0678 7.50637C25.1481 7.89866 24.8748 8.16902 24.566 8.34573C23.175 9.13915 21.7885 9.9414 20.3928 10.726C19.7367 11.0953 19.2411 10.726 19.2334 9.87778C19.2257 9.09143 19.2318 8.30509 19.2318 7.52051V7.51874ZM20.7171 6.37368V8.66734C21.384 8.28388 22.0093 7.92517 22.7149 7.52051C22.0062 7.11408 21.3887 6.7589 20.7171 6.37368Z" fill="#8BC53F"/>
                        </svg>

                        <div class="card_desc">
                            <p class="title">ফেসবুক মার্কেটিং</p>
                            <p>কমিউনিটি বিল্ডিং, এনগেজিং পোস্ট, কনটেন্ট প্ল্যানিং। ক্যাম্পেইনের পারফরমেন্স ট্র্যাক এবং অপটিমাইজেশন।</p>
                        </div>
                        <div class="button_section">
                            <a href="!"><button>বিস্তারিত</button></a>
                        </div>
                    </div>
                </div>


                <div class="signle_card">
                    <div class="card-body">
                        <svg width="57" height="53" viewBox="0 0 57 53" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M37.0708 10.7831C40.5524 8.71038 44.2272 10.1701 45.7523 12.661C46.7041 14.2167 46.9349 15.8698 46.4477 17.6173C45.965 19.3499 44.8517 20.5893 43.2587 21.4676C44.3131 23.2825 45.3465 25.06 46.3768 26.8375C46.7811 27.5329 47.1944 28.2254 47.5821 28.9298C48.5611 30.7058 48.1749 32.825 46.6604 34.0599C45.0991 35.3323 42.9615 35.2964 41.3655 33.9955C41.186 33.8501 40.8979 33.7332 40.6776 33.7557C34.6586 34.3806 28.9293 36.0412 23.3749 38.6056C23.5439 38.7839 23.6842 38.9413 23.835 39.0896C26.0299 41.2733 28.2278 43.454 30.4227 45.6376C31.352 46.5623 31.3505 47.1978 30.4227 48.1225C29.0922 49.4459 27.7617 50.7693 26.4297 52.0911C25.3843 53.1283 24.8035 53.1313 23.7732 52.1076C20.9372 49.29 18.0997 46.4769 15.2712 43.6518C15.0163 43.397 14.8337 43.3206 14.4596 43.4734C10.3082 45.185 5.8128 43.6863 3.51081 39.8375C2.72336 38.5201 1.95854 37.1893 1.19825 35.8569C-1.24856 31.5675 0.158885 26.4374 4.44458 23.954C6.79937 22.5901 9.20847 21.3042 11.4773 19.8085C16.7435 16.3329 21.2691 12.057 25.0072 6.97485C25.2093 6.69908 25.2727 6.46228 25.2108 6.11158C24.8608 4.11227 25.9258 2.26884 27.7874 1.58092C29.6458 0.8945 31.6748 1.59291 32.7187 3.34343C34.0794 5.62599 35.3948 7.93704 36.7313 10.2346C36.8339 10.4099 36.944 10.5808 37.0708 10.7861V10.7831ZM39.4844 31.1674C35.2002 23.7936 30.9779 16.5233 26.7208 9.19747C22.8877 14.2392 18.3456 18.4102 13.1623 21.9622C15.9817 26.8165 18.7785 31.629 21.5843 36.4594C27.2835 33.7602 33.1818 31.9497 39.4829 31.1674H39.4844ZM10.8573 23.3815C9.02896 24.4366 7.23232 25.4152 5.49752 26.4898C2.82292 28.1474 1.93441 31.4851 3.41879 34.2532C4.23188 35.7685 5.09927 37.2582 6.01343 38.715C7.56268 41.1864 10.6566 42.2205 13.3056 41.0005C15.3255 40.0698 17.2157 38.8633 19.2054 37.7558C16.4101 32.9434 13.6511 28.1939 10.8558 23.3815H10.8573ZM45.4868 30.8901C45.342 30.5724 45.2213 30.2411 45.0463 29.9399C40.2205 21.6219 35.3888 13.307 30.557 4.99203C30.4725 4.84665 30.388 4.69828 30.2855 4.56639C29.8495 4.00287 29.1239 3.85749 28.522 4.2052C27.9276 4.54841 27.6893 5.2588 27.9623 5.90775C28.0348 6.07861 28.1358 6.23897 28.2309 6.39934C33.0415 14.6828 37.8522 22.9663 42.6659 31.2498C42.779 31.4431 42.8876 31.644 43.0294 31.8148C43.399 32.2629 44.0265 32.4098 44.5636 32.1955C45.09 31.9857 45.4189 31.4926 45.4853 30.8901H45.4868ZM27.6848 46.892C25.3903 44.608 23.0717 42.2999 20.7245 39.9634C19.6444 40.5839 18.5175 41.2313 17.4314 41.8548C20.026 44.4356 22.5754 46.97 25.0886 49.4714C25.9439 48.6216 26.831 47.7403 27.6848 46.892ZM41.8935 19.1146C43.936 18.0265 44.5802 15.8039 43.4246 14.0399C42.3415 12.3853 40.0365 11.9731 38.4511 13.1871C39.59 15.1474 40.7319 17.1138 41.8935 19.1146Z" fill="#E02143"/>
                            <path d="M55.485 22.1765C55.405 22.1601 55.218 22.1361 55.0415 22.0806C53.4711 21.58 51.9008 21.081 50.3349 20.5669C49.6501 20.3421 49.2669 19.8175 49.2971 19.2001C49.3257 18.6021 49.7315 18.0925 50.3334 17.9576C50.5431 17.9112 50.7905 17.9052 50.9941 17.9681C52.6746 18.4927 54.3536 19.0247 56.022 19.5852C56.6873 19.8085 57.0358 20.459 56.909 21.09C56.7823 21.7284 56.2468 22.1705 55.4865 22.178L55.485 22.1765Z" fill="#E02143"/>
                            <path d="M43.168 7.70624C42.3368 7.70324 41.6761 6.99135 41.836 6.18203C42.1754 4.45999 42.5465 2.74244 42.9387 1.03089C43.1152 0.260546 43.8258 -0.135119 44.583 0.0417316C45.2588 0.199098 45.7084 0.863035 45.5636 1.58542C45.2226 3.28948 44.8621 4.98904 44.482 6.68411C44.3371 7.32856 43.8031 7.70774 43.168 7.70624Z" fill="#E02143"/>
                            <path d="M49.8206 12.5262C49.1388 12.5157 48.6545 12.171 48.466 11.6405C48.2698 11.0859 48.4071 10.449 48.9155 10.1447C50.4904 9.20203 52.0804 8.28031 53.6945 7.40506C54.2813 7.08583 55.0189 7.39456 55.3508 7.96258C55.7008 8.56058 55.5877 9.33542 54.9812 9.70111C53.426 10.6393 51.8375 11.5251 50.2551 12.4198C50.0997 12.5067 49.896 12.5082 49.8191 12.5262H49.8206Z" fill="#E02143"/>
                        </svg>


                        <div class="card_desc">
                            <p class="title">অ্যাড ক্যাম্পেইন</p>
                            <p>উদ্দেশ্য নির্ধারণ (অ্যাওয়ারনেস, এনগেজমেন্ট, কনভার্সন), টার্গেট অডিয়েন্স নির্বাচন I Google Ads, Facebook Ads, Instagram Ads ইত্যাদি।</p>
                        </div>
                        <div class="button_section">
                            <a href="!"><button>বিস্তারিত</button></a>
                        </div>
                    </div>
                </div>

                <div class="signle_card">
                    <div class="card-body">
                        <svg width="62" height="57" viewBox="0 0 62 57" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M61.401 43.4109C60.8992 44.7445 59.9881 45.5284 58.4567 45.5158C58.3512 45.5158 58.2112 45.6684 58.1465 45.7813C58.041 45.9652 58.013 46.191 57.9053 46.3749C57.4745 47.1128 57.3302 47.7148 58.0324 48.4987C58.7755 49.3286 58.5536 50.6601 57.7718 51.5004C57.1967 52.1192 56.5936 52.717 55.9496 53.2688C54.8038 54.2513 53.365 54.0966 51.9693 52.88C51.3016 53.1351 50.6145 53.3838 49.9468 53.6723C49.8391 53.7183 49.7745 53.9482 49.7638 54.0966C49.6496 55.796 48.5705 56.7931 46.8151 56.7994C46.1948 56.8015 45.5767 56.8036 44.9564 56.7994C43.3798 56.7848 42.2576 55.796 42.1628 54.268C42.1348 53.8228 42.0035 53.5803 41.5511 53.5218C41.5124 53.5176 41.4758 53.4967 41.4413 53.4779C40.5841 53.0222 39.8561 52.7922 38.9299 53.5845C38.1265 54.2722 36.7804 53.9942 35.9468 53.2626C35.3265 52.7149 34.7256 52.1422 34.1635 51.538C33.1964 50.4971 33.2071 49.0255 34.2001 48.0075C34.5016 47.6981 34.5511 47.4682 34.3271 47.1149C34.1613 46.8536 34.0191 46.5589 33.9545 46.2621C33.8231 45.6412 33.4828 45.4803 32.8367 45.4886C29.7804 45.5263 26.7219 45.5095 23.6634 45.5033C22.8471 45.5033 22.3345 45.0873 22.2871 44.4226C22.2354 43.6784 22.7459 43.1726 23.5902 43.1705C25.6687 43.1621 27.7471 43.1684 29.8256 43.1684C30.0216 43.1684 30.2176 43.1684 30.489 43.1684C30.489 42.4242 30.4847 41.7323 30.489 41.0425C30.4998 39.2657 31.4582 38.2728 33.2696 38.1161C33.4505 38.0993 33.6315 37.9112 33.7801 37.7732C33.8576 37.7022 33.8554 37.5559 33.9093 37.4534C34.3336 36.6382 34.5964 35.9442 33.7994 35.0663C33.0715 34.2636 33.3407 32.9362 34.1118 32.121C34.6782 31.5211 35.2727 30.9421 35.8908 30.3944C36.9398 29.4642 38.4561 29.483 39.5308 30.4467C39.8324 30.7163 40.0435 30.7581 40.4075 30.57C40.933 30.3003 41.5016 30.1101 42.0422 29.8906C42.0982 29.4997 42.1004 29.1026 42.2145 28.7389C42.5484 27.6811 43.2872 26.9955 44.4308 26.8847C45.3419 26.7969 46.2702 26.8032 47.1835 26.8576C48.5705 26.9412 49.5656 27.8965 49.669 29.2447C49.7078 29.7527 49.8693 30.0307 50.3841 30.108C50.481 30.1227 50.5779 30.1603 50.6619 30.2104C51.4222 30.6557 52.0878 30.8083 52.8502 30.0808C53.2078 29.738 53.9121 29.738 54.5388 29.5583V17.9131H2.43729C2.42652 18.12 2.40929 18.3248 2.40929 18.5276C2.40929 25.317 2.40929 32.1043 2.40713 38.8937C2.40713 39.9263 2.61606 40.8962 3.2299 41.7574C3.88683 42.6813 4.77206 43.1809 5.95668 43.1726C8.19452 43.1579 10.4345 43.1642 12.6724 43.1726C13.4284 43.1747 13.9281 43.6157 13.9668 44.2679C14.0013 44.8762 13.5641 45.474 12.9244 45.4782C10.2687 45.497 7.59791 45.6141 4.95944 45.3967C2.4739 45.1918 0.53975 43.02 0.124058 40.4363C0.0465191 39.9597 0.00559535 39.4727 0.00559535 38.9898C-0.000866185 28.1661 -0.000865463 17.3424 0.00128838 6.52077C0.00128838 4.397 0.703442 2.56379 2.4136 1.16954C3.36344 0.396117 4.47267 0.00104472 5.71975 0.00104472C20.9087 0.00104472 36.0976 -0.00313504 51.2887 0.00522626C53.9422 0.00522626 56.2253 1.94923 56.8241 4.71473C56.9748 5.41081 57.0244 6.13824 57.0265 6.85105C57.0395 14.8236 57.033 22.7961 57.0459 30.7665C57.0459 31.0466 57.1321 31.3998 57.3173 31.5963C58.825 33.2017 58.8595 34.32 57.3819 35.9818C57.6425 36.6152 57.8988 37.2611 58.1767 37.8966C58.2198 37.9948 58.3748 38.114 58.4761 38.1119C59.9816 38.0868 60.8712 38.8769 61.4053 40.1562V43.415L61.401 43.4109ZM54.5992 15.4736C54.5992 14.5811 54.5992 13.7491 54.5992 12.9172C54.5927 10.5886 54.6401 8.25992 54.5625 5.93548C54.4893 3.69256 52.9558 2.33594 50.6705 2.33594C45.2342 2.33594 39.7979 2.33594 34.3595 2.33594C24.9256 2.33594 15.4918 2.34012 6.05575 2.32967C5.02837 2.32967 4.1776 2.63904 3.50775 3.39155C2.7259 4.26949 2.40929 5.31256 2.40713 6.45179C2.40283 9.303 2.40498 12.1542 2.40713 15.0075C2.40713 15.1559 2.43298 15.3064 2.44806 15.4757H54.597L54.5992 15.4736ZM37.7302 32.075C37.6484 32.0959 37.5751 32.0938 37.5364 32.1294C37.2865 32.3509 37.0388 32.5746 36.7976 32.8066C36.1012 33.4797 36.0897 34.157 36.7631 34.8384C37.377 35.4593 37.3921 35.8355 37.0108 36.6131C36.5844 37.4827 36.1816 38.3711 35.8628 39.2804C35.5441 40.1959 35.249 40.4719 34.2367 40.4802C32.925 40.4907 32.9185 40.4907 32.9271 41.795C32.9358 43.3711 32.7441 43.1475 34.3207 43.1621C35.2705 43.1705 35.5591 43.4339 35.8585 44.3013C36.1622 45.1772 36.5154 46.0447 36.9419 46.8703C37.4373 47.8298 37.433 48.1664 36.6598 48.9189C35.6195 49.9327 35.6561 49.6651 36.6662 50.6601C37.6936 51.6718 37.7001 51.6656 38.7576 50.6747C39.3671 50.1041 39.7828 50.0832 40.5367 50.4385C41.4133 50.8503 42.3028 51.2517 43.2225 51.5485C44.3447 51.9122 44.5665 52.1233 44.5708 53.273C44.5751 54.5941 44.4416 54.454 45.7899 54.4561C46.8094 54.4589 47.327 53.9747 47.3428 53.0034C47.3558 52.184 47.6293 51.8955 48.4262 51.6238C49.3631 51.3039 50.2979 50.9611 51.1853 50.5326C52.1825 50.0497 52.4884 50.0497 53.2939 50.819C54.3385 51.814 54.0521 51.7952 55.0924 50.8002C56.1348 49.8031 56.1284 49.7968 55.0988 48.7663C54.5152 48.181 54.4979 47.7775 54.8662 47.0418C55.2905 46.1931 55.6955 45.3256 56.0056 44.433C56.3739 43.3711 56.585 43.1621 57.7395 43.1621C59.133 43.1621 58.9844 43.2645 58.9887 41.9372C58.9901 40.991 58.5012 40.5046 57.5219 40.4781C56.6755 40.4551 56.3653 40.1604 56.0767 39.3598C55.7407 38.4338 55.3595 37.5161 54.9136 36.634C54.4828 35.7791 54.4893 35.4237 55.1979 34.7276C55.824 34.1131 55.8261 33.5041 55.2044 32.9007C54.5353 32.2513 53.8654 32.2436 53.1948 32.8777C52.5228 33.5111 52.133 33.5111 51.2715 33.1035C50.3625 32.6749 49.417 32.307 48.4585 31.9893C47.5905 31.7009 47.2998 31.3978 47.2868 30.4801C47.2754 29.6133 46.8331 29.1799 45.9601 29.1799C45.0052 29.1799 44.5227 29.6356 44.5127 30.547C44.5041 31.4333 44.2262 31.728 43.369 32.006C42.5031 32.2882 41.6373 32.5997 40.8253 33.001C39.6213 33.5968 39.4016 33.603 38.4345 32.6666C38.2924 32.5307 38.1567 32.3865 38.0081 32.259C37.9219 32.1837 37.8142 32.1315 37.7281 32.075H37.7302Z" fill="#3A3A3A"/>
                            <path d="M27.0472 30.5052C26.0801 29.4496 25.1647 28.4525 24.2536 27.4533C23.6785 26.8199 23.6592 26.1301 24.1933 25.6556C24.7296 25.1811 25.4576 25.2564 26.0305 25.873C27.0989 27.0227 28.1629 28.1766 29.2139 29.343C29.8924 30.0934 29.901 30.9002 29.2333 31.6444C28.1585 32.8401 27.0709 34.0253 25.9724 35.2021C25.4598 35.7519 24.7275 35.8083 24.2149 35.3756C23.6807 34.9241 23.6592 34.2092 24.189 33.6219C25.1216 32.5913 26.0672 31.5712 27.0429 30.5052H27.0472Z" fill="#3A3A3A"/>
                            <path d="M9.51445 30.5029C10.4406 31.5147 11.3344 32.4783 12.2132 33.4545C12.4071 33.6698 12.6117 33.9123 12.6935 34.1756C12.8594 34.7087 12.6828 35.1727 12.1831 35.4863C11.7114 35.781 11.076 35.7079 10.656 35.2689C9.97537 34.5603 9.3206 33.8266 8.65506 33.1033C8.20276 32.61 7.74399 32.125 7.30676 31.6213C6.68214 30.9022 6.66491 30.1058 7.28953 29.4076C8.37722 28.1931 9.48214 26.9933 10.5957 25.7997C11.1105 25.2479 11.8406 25.1998 12.3532 25.6429C12.8637 26.0861 12.896 26.7989 12.392 27.3591C11.4615 28.3959 10.5095 29.416 9.51445 30.5029Z" fill="#3A3A3A"/>
                            <path d="M20.7297 25.5742C20.4303 26.8096 20.1633 27.9237 19.8919 29.0337C19.3749 31.1428 18.8709 33.2562 18.3174 35.359C18.2205 35.7248 17.9793 36.1115 17.6863 36.3582C17.3116 36.6759 16.8183 36.6153 16.4048 36.3331C15.9719 36.0384 15.7953 35.6224 15.918 35.1145C16.3402 33.3607 16.7688 31.609 17.1953 29.8552C17.5506 28.4045 17.8974 26.9517 18.2679 25.5052C18.5242 24.5081 19.5753 24.1172 20.2666 24.7715C20.5036 24.9952 20.6048 25.3505 20.7297 25.5763V25.5742Z" fill="#3A3A3A"/>
                            <path d="M41.3207 12.9067C39.5029 12.9067 37.6828 12.9318 35.8672 12.8984C34.1613 12.867 32.6902 11.7926 32.141 10.2541C31.5918 8.7177 32.0548 7.05798 33.3407 5.98146C34.0967 5.346 34.9905 5.03245 35.9792 5.02827C39.5352 5.01573 43.0933 5.0011 46.6493 5.03036C49.0099 5.05127 50.7632 6.79878 50.7416 9.0208C50.7201 11.2031 48.941 12.8733 46.5976 12.9088C46.5567 12.9088 46.5179 12.9088 46.477 12.9088C44.7582 12.9088 43.0395 12.9088 41.3228 12.9088V12.9025L41.3207 12.9067ZM41.3745 7.38198C39.5976 7.38198 37.8185 7.36526 36.0416 7.38825C35.0315 7.40079 34.325 8.08642 34.3293 8.97063C34.3336 9.85693 35.0422 10.553 36.0459 10.5572C39.561 10.576 43.0782 10.5676 46.5933 10.5614C47.3105 10.5614 47.8748 10.2624 48.1807 9.61236C48.6912 8.53584 47.8985 7.40706 46.589 7.38616C44.8509 7.35899 43.1127 7.37989 41.3745 7.37989V7.38198Z" fill="#3A3A3A"/>
                            <path d="M25.7849 8.94969C25.7913 11.132 23.9649 12.913 21.7227 12.9067C19.5107 12.9025 17.6929 11.1424 17.6735 8.98732C17.6541 6.82801 19.515 5.01779 21.7421 5.02615C23.9606 5.0366 25.7784 6.80084 25.7827 8.94969H25.7849ZM23.3726 8.98732C23.3855 8.11984 22.6424 7.3924 21.7378 7.39031C20.8526 7.38613 20.131 8.06758 20.1116 8.92461C20.0901 9.81091 20.7987 10.5383 21.7033 10.5592C22.5886 10.5802 23.3618 9.85272 23.3726 8.98732Z" fill="#3A3A3A"/>
                            <path d="M15.2656 8.95604C15.2721 11.1467 13.4499 12.9151 11.2013 12.9068C8.97856 12.8984 7.1801 11.1425 7.17579 8.97903C7.17148 6.79255 9.00225 5.0095 11.2379 5.02414C13.4607 5.03877 15.2613 6.79464 15.2656 8.95395V8.95604ZM12.8447 8.93932C12.8318 8.05929 12.0844 7.3653 11.1755 7.39039C10.2903 7.41547 9.59025 8.11364 9.59241 8.96858C9.59241 9.84025 10.3484 10.5698 11.2358 10.5593C12.1339 10.5489 12.8576 9.81935 12.8447 8.93932Z" fill="#3A3A3A"/>
                            <path d="M38.5703 41.816C38.566 37.8528 41.8743 34.6483 45.9602 34.6525C50.0374 34.6587 53.3608 37.8883 53.3479 41.8307C53.3349 45.7417 50.0029 48.9712 45.9731 48.9817C41.9088 48.9921 38.5746 45.7646 38.5703 41.8139V41.816ZM40.9934 41.8118C40.9934 44.4666 43.2032 46.6217 45.9365 46.6342C48.646 46.6489 50.8925 44.4875 50.9226 41.8369C50.9506 39.178 48.6999 36.9936 45.9343 36.9999C43.1903 37.0062 40.9912 39.1488 40.9934 41.8118Z" fill="#3A3A3A"/>
                        </svg>


                        <div class="card_desc">
                            <p class="title">সফটওয়্যার সমাধান</p>
                            <p>আপনার ব্যবসার চাহিদা অনুযায়ী বিশেষ সফটওয়্যার তৈরি। অ্যান্ড্রয়েড ও আইওএস প্ল্যাটফর্মের জন্য ইউজার-ফ্রেন্ডলি অ্যাপ্লিকেশন ডিজাইন ও ডেভেলপমেন্ট।</p>
                        </div>
                        <div class="button_section">
                            <a href="!"><button>বিস্তারিত</button></a>
                        </div>
                    </div>
                </div>

                <div class="signle_card">
                    <div class="card-body">
                    <svg width="58" height="59" viewBox="0 0 58 59" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M44.0845 8.7296C46.4144 8.06275 48.0632 8.56894 49.0243 10.2108C49.9898 11.8592 49.604 13.5605 47.856 15.2683C48.9163 17.106 49.981 18.9526 51.0478 20.7969C51.5107 21.5936 51.7069 22.4321 51.4732 23.3433C51.1228 24.7012 50.2631 25.5595 48.8898 25.8368C47.5364 26.1097 46.4122 25.6497 45.5878 24.5603C45.3344 24.2258 45.0897 24.1026 44.6863 24.1048C40.4298 24.14 36.3828 25.148 32.4438 26.6797C32.0867 26.8184 31.7318 26.9681 31.302 27.1441C31.4364 27.34 31.5422 27.5073 31.6612 27.6679C33.4048 30.0162 35.1528 32.3623 36.8942 34.7129C37.7825 35.9101 37.6943 36.7949 36.5988 37.7874C36.3145 38.0449 36.0301 38.3068 35.7414 38.5621C34.6965 39.4909 33.5481 39.3831 32.7105 38.265C30.8633 35.8023 29.0227 33.3329 27.1778 30.868C27.0411 30.6831 26.8978 30.5048 26.8074 30.3882C25.9213 30.6523 25.0991 30.9956 24.2439 31.1365C21.4488 31.5986 18.6582 29.9238 17.6156 27.2322C16.5972 24.6021 17.5385 21.4527 19.8904 19.9297C21.3739 18.968 22.9389 18.1338 24.4709 17.2469C24.5833 17.1809 24.7398 17.095 24.8456 17.1259C25.4805 17.3129 25.8464 16.8706 26.2542 16.547C29.5672 13.9192 32.4989 10.9481 34.6899 7.29685C34.9699 6.83027 35.0779 6.44512 34.8376 5.8773C34.1785 4.3191 34.9125 2.53861 36.4313 1.76831C37.939 1.00242 39.8016 1.4668 40.6988 2.92376C41.748 4.62722 42.7157 6.3791 43.7186 8.10897C43.8332 8.30704 43.9523 8.50512 44.0845 8.7318V8.7296ZM44.2895 22.3925C41.5606 17.6695 38.834 12.9508 36.0654 8.15518C33.4974 12.3654 30.105 15.6777 26.2718 18.585C27.5657 20.8299 28.8464 23.0197 30.094 25.2294C30.3299 25.6497 30.5194 25.7378 30.9801 25.5419C33.6936 24.3843 36.4952 23.4885 39.4115 23.0065C41.0008 22.7446 42.6099 22.5994 44.2917 22.3903L44.2895 22.3925ZM37.8971 3.036C37.1763 3.0448 36.5569 3.50038 36.3211 4.17604C36.1029 4.79888 36.3034 5.33589 36.612 5.8707C38.8185 9.67817 41.0184 13.49 43.2183 17.2997C44.3711 19.2959 45.5217 21.2965 46.6812 23.2882C47.1551 24.1025 47.8803 24.4437 48.6474 24.2434C49.8046 23.9419 50.2851 22.7358 49.6547 21.6288C48.3035 19.2585 46.928 16.9014 45.5636 14.5377C43.5555 11.0603 41.543 7.58516 39.5415 4.10121C39.169 3.45196 38.6796 3.0294 37.8971 3.0338V3.036ZM29.241 26.9637C27.6825 24.2676 26.1682 21.6464 24.6406 19.0054C23.3423 19.7625 22.0881 20.4403 20.889 21.204C18.8897 22.4761 18.2482 25.1325 19.3834 27.2124C20.5209 29.2922 23.1087 30.2143 25.2468 29.1953C26.5958 28.5527 27.8633 27.7406 29.241 26.9659V26.9637ZM28.1675 29.4572C28.2887 29.6311 28.3901 29.7895 28.5025 29.9414C30.1116 32.096 31.723 34.2507 33.3343 36.4031C34.3152 37.7148 34.3042 37.6994 35.5386 36.5814C35.8957 36.2579 35.878 36.0356 35.6069 35.6746C33.8523 33.3417 32.1153 30.9934 30.3717 28.6495C30.2946 28.5439 30.202 28.4492 30.1006 28.326C29.6025 28.6099 29.1197 28.885 28.6392 29.1623C28.4915 29.2481 28.3482 29.3428 28.1675 29.4572ZM46.9898 13.7718C47.9244 13.1423 48.1823 11.9583 47.6202 11.0119C47.0691 10.0853 45.8964 9.73319 44.9574 10.2504C45.6341 11.4234 46.313 12.5965 46.9898 13.7718Z" fill="#8BC53F"/>
                        <path d="M27.4073 50.4446C25.5094 50.6405 23.6799 50.8782 21.8415 51.0014C20.6931 51.0784 19.5336 50.9596 18.3786 50.9794C18.0413 50.9838 17.6534 51.0806 17.3823 51.2677C14.2919 53.3959 11.2213 55.5528 8.13535 57.6876C7.89508 57.8527 7.58207 58.0045 7.30434 58.0045C6.7687 58.0045 6.50859 57.4851 6.65848 56.8337C7.20073 54.4942 7.74739 52.1547 8.28964 49.8129C8.39324 49.3662 8.66437 48.8336 8.51889 48.4858C8.37561 48.1469 7.79809 47.9862 7.40573 47.7574C4.7606 46.2168 2.49241 44.2822 1.13678 41.4783C-0.829433 37.4112 -0.179173 33.6147 2.57837 30.1549C4.97442 27.1508 8.2125 25.3791 11.8077 24.2038C12.6651 23.9243 13.5468 23.7131 14.4241 23.504C15.0788 23.3477 15.5042 23.5766 15.6122 24.0784C15.7158 24.5604 15.3962 24.9477 14.7482 25.0886C11.9377 25.696 9.29479 26.7172 6.91638 28.3524C4.77824 29.8204 3.01702 31.6295 2.14413 34.1297C1.01775 37.3517 1.82231 40.2282 3.90755 42.8098C5.38662 44.6409 7.27788 45.9483 9.38076 46.9672C10.4256 47.4734 10.4719 47.5637 10.2074 48.7059C9.7092 50.876 9.20442 53.0438 8.6776 55.3217C8.92007 55.1654 9.07657 55.073 9.22426 54.9695C11.7658 53.1979 14.3117 51.4328 16.8466 49.6479C17.2478 49.364 17.638 49.2671 18.1339 49.3112C21.242 49.5863 24.3191 49.397 27.4073 48.6311C27.4073 47.9642 27.4007 47.3128 27.4073 46.6613C27.4205 45.4707 28.1568 44.7158 29.3603 44.7048C31.267 44.6894 33.1737 44.718 35.0804 44.6828C35.4066 44.6762 35.8012 44.5309 36.0458 44.3152C38.001 42.5787 39.3941 40.5099 39.7093 37.8403C39.9628 35.6945 39.4162 33.7225 38.1642 32.0103C37.3662 30.9208 36.3302 30.0031 35.3978 29.0127C35.3074 28.9159 35.1818 28.8498 35.0848 28.7574C34.7387 28.4295 34.6836 27.9475 34.9702 27.6218C35.2832 27.2674 35.6755 27.1992 36.0547 27.4787C41.6667 31.6339 43.364 38.3289 38.6447 43.9829C38.475 44.1876 38.2986 44.3857 38.0583 44.6652C38.3405 44.6806 38.5235 44.6982 38.7064 44.6982C39.8614 44.7004 41.0187 44.6806 42.1737 44.707C43.2582 44.7312 44.0363 45.4927 44.0429 46.5777C44.0628 49.7733 44.0628 52.969 44.0429 56.1624C44.0363 57.2628 43.2186 58.0265 42.1032 58.0287C37.8467 58.0375 33.5903 58.0375 29.3338 58.0287C28.192 58.0265 27.4205 57.2408 27.4139 56.0942C27.4029 54.1904 27.4117 52.2867 27.4117 50.4468L27.4073 50.4446ZM35.7042 56.4133C37.7255 56.4133 39.749 56.4001 41.7703 56.4221C42.2685 56.4287 42.4426 56.2857 42.4382 55.7707C42.4184 52.8259 42.4184 49.8812 42.4382 46.9364C42.4404 46.4478 42.2751 46.3048 41.8034 46.307C37.7387 46.3202 33.6763 46.318 29.6116 46.307C29.1685 46.307 29.0098 46.4368 29.012 46.9012C29.0296 49.8658 29.0296 52.8303 29.012 55.7949C29.0098 56.2702 29.1487 56.4287 29.6336 56.4243C31.6549 56.4023 33.6785 56.4155 35.6998 56.4155L35.7042 56.4133Z" fill="#8BC53F"/>
                        <path d="M14.422 18.0326C14.0716 17.8543 13.7453 17.7377 13.472 17.5418C12.6035 16.919 11.7284 17.2777 11.5918 18.3341C11.4815 19.1815 10.9922 19.6436 10.1414 19.6722C9.64098 19.6877 9.14061 19.6877 8.64024 19.6722C7.77396 19.648 7.29343 19.2101 7.16999 18.3583C7.01128 17.2491 6.16705 16.8992 5.2655 17.5682C4.56013 18.092 3.93191 18.0612 3.29708 17.456C2.92015 17.0973 2.54984 16.7319 2.19495 16.3512C1.64608 15.7635 1.61743 15.1121 2.09135 14.4716C2.80773 13.5011 2.46828 12.6889 1.27576 12.5261C0.537333 12.4248 0.0590063 11.9209 0.0347593 11.1704C0.0149208 10.5937 0.0127165 10.0149 0.0347593 9.43829C0.0634148 8.71201 0.526312 8.22782 1.2449 8.11998C2.48811 7.93291 2.80994 7.16481 2.07371 6.14142C1.62404 5.51638 1.65049 4.87373 2.17731 4.30591C2.54322 3.91195 2.92897 3.53341 3.31913 3.16146C3.92751 2.58484 4.56674 2.55403 5.24346 3.05142C6.18248 3.74249 7.00467 3.39916 7.17219 2.24811C7.29123 1.42719 7.77617 0.991426 8.61159 0.973819C9.13179 0.962815 9.652 0.960614 10.1722 0.973819C10.9878 0.995827 11.4882 1.46021 11.5918 2.27452C11.7328 3.37715 12.5969 3.73809 13.4896 3.07123C14.1862 2.54963 14.8276 2.57824 15.4581 3.17907C15.835 3.53781 16.2053 3.90315 16.5602 4.2817C17.1157 4.87593 17.1443 5.50757 16.6682 6.15902C15.954 7.1384 16.2891 7.94171 17.4816 8.11558C18.2332 8.22562 18.6961 8.70321 18.7292 9.4647C18.7556 10.0413 18.7579 10.6201 18.7292 11.1968C18.6895 11.9451 18.2046 12.427 17.4573 12.5261C16.3111 12.6779 15.9606 13.5121 16.6528 14.4496C17.1377 15.1077 17.1267 15.7393 16.5822 16.3314C16.2053 16.7429 15.8196 17.1523 15.3919 17.5088C15.123 17.7311 14.7703 17.8499 14.4243 18.0304L14.422 18.0326ZM3.51751 5.28528C4.77615 7.11859 3.86579 9.34366 1.67474 9.76622V10.9173C2.70854 11.1021 3.47783 11.6149 3.88121 12.5899C4.29121 13.5803 4.09944 14.5002 3.51751 15.33C3.80627 15.6425 4.06637 15.922 4.32868 16.2037C4.50943 16.0937 4.65271 15.9968 4.8026 15.9154C6.25301 15.1297 8.13326 15.8428 8.60497 17.4274C8.76588 17.9688 9.00174 18.1361 9.51093 18.0568C9.65861 18.0348 9.80851 18.0348 9.94517 18.026C10.7608 15.6337 12.1825 15.0505 14.4 16.1443C14.6954 15.8802 14.9797 15.6227 15.2575 15.3718C14.076 13.2392 14.6733 11.7844 17.1046 10.8666C17.1113 10.7236 17.1046 10.5695 17.1267 10.4199C17.1928 9.94229 17.0782 9.68699 16.5271 9.54833C15.4691 9.28423 14.6976 8.30485 14.7086 7.21543C14.7152 6.55738 14.9599 5.90152 15.1076 5.18845C14.9445 5.01238 14.6844 4.73287 14.4265 4.45336C12.7821 5.62642 10.4411 4.99917 9.94297 2.61345H8.77911C8.60277 3.64565 8.08476 4.41375 7.11488 4.8165C6.12737 5.22806 5.20157 5.04539 4.40142 4.47537C4.08401 4.76588 3.80186 5.02559 3.52192 5.28088L3.51751 5.28528Z" fill="#8BC53F"/>
                        <path d="M57.1207 32.1422C56.9553 32.7981 56.7349 34.134 56.2808 35.3841C55.2029 38.342 53.5387 40.9346 51.0347 42.9044C49.5247 44.0928 47.8318 44.7597 45.8745 44.1655C45.3653 44.0114 44.8737 43.7649 44.4174 43.4854C43.4321 42.8824 43.139 41.7401 43.6878 40.7189C44.0603 40.0257 44.4549 39.3412 44.8693 38.6721C45.4887 37.6685 46.6327 37.3758 47.6842 37.9282C47.8539 38.0185 48.0258 38.1065 48.1845 38.2144C48.5394 38.4586 48.8083 38.3838 49.0773 38.0603C50.2808 36.6099 51.2088 35.0077 51.8569 33.2382C51.9913 32.8707 51.9274 32.6066 51.5703 32.4217C51.3653 32.3161 51.1647 32.1994 50.9729 32.0718C50.0339 31.4511 49.7319 30.3375 50.2632 29.3405C50.6335 28.6451 51.0302 27.9628 51.4424 27.2915C52.0773 26.2549 53.2235 25.9622 54.2992 26.5344C56.272 27.5864 57.114 29.2811 57.1229 32.14L57.1207 32.1422ZM55.4961 31.7835C55.5137 29.8379 54.8987 28.7067 53.6401 28.0178C53.3117 27.8373 53.0229 27.7867 52.8047 28.1631C52.4454 28.7771 52.0883 29.3911 51.7356 30.0118C51.5505 30.3375 51.621 30.5994 51.9605 30.7821C52.1125 30.8635 52.2624 30.9516 52.4101 31.0418C53.4571 31.6734 53.8054 32.6066 53.391 33.7532C52.7341 35.5777 51.7687 37.2262 50.596 38.7712C49.4828 40.2391 48.2925 40.2876 47.1133 39.4622C47.0515 39.4182 46.97 39.3434 46.9149 39.3566C46.6812 39.4094 46.3462 39.416 46.2404 39.5701C45.8282 40.1709 45.4578 40.807 45.1426 41.4628C45.0633 41.6279 45.1735 42.0262 45.3234 42.1319C46.0552 42.6359 46.8708 42.8846 47.7789 42.7151C48.923 42.5038 49.8333 41.8744 50.6665 41.1129C51.8436 40.0389 52.7871 38.7778 53.5696 37.3978C54.6122 35.5579 55.3947 33.6278 55.4961 31.7835Z" fill="#8BC53F"/>
                        <path d="M20.7725 39.1278C23.854 39.1278 26.9356 39.1278 30.0172 39.1278C30.2464 39.1278 30.4845 39.1278 30.7027 39.1828C31.1149 39.2863 31.364 39.6142 31.2538 39.9971C31.1744 40.2744 30.8791 40.5253 30.6234 40.7014C30.4757 40.8027 30.2112 40.7432 29.9996 40.7432C23.7967 40.7432 17.5961 40.7432 11.3933 40.7432C10.5138 40.7432 10.1126 40.4835 10.1192 39.9311C10.1258 39.3765 10.5248 39.1278 11.4087 39.1278C14.53 39.1278 17.649 39.1278 20.7703 39.1278H20.7725Z" fill="#8BC53F"/>
                        <path d="M18.0301 34.7502C15.817 34.7502 13.6039 34.7502 11.3886 34.7502C11.177 34.7502 10.9125 34.8074 10.767 34.704C10.5135 34.5213 10.2181 34.2638 10.1498 33.9843C10.0572 33.6058 10.3129 33.2822 10.7273 33.1854C10.9301 33.1392 11.1461 33.137 11.3577 33.137C15.8236 33.1348 20.2894 33.137 24.7553 33.137C24.8324 33.137 24.9096 33.137 24.9867 33.137C25.6568 33.1568 26.0316 33.4561 26.0228 33.9623C26.0139 34.4685 25.648 34.7502 24.9603 34.7524C22.6502 34.7568 20.3401 34.7524 18.0301 34.7524V34.7502Z" fill="#8BC53F"/>
                        <path d="M49.8245 1.64739C49.6945 1.96871 49.6394 2.17339 49.538 2.35166C48.9781 3.33764 48.4116 4.32142 47.8385 5.3008C47.5277 5.8312 47.0714 6.00507 46.646 5.77618C46.2095 5.54289 46.1148 5.06311 46.4234 4.5217C47.0119 3.4851 47.585 2.43749 48.2353 1.44051C48.3918 1.20061 48.8436 1.00914 49.1324 1.03775C49.3837 1.06416 49.6019 1.4361 49.8245 1.64739Z" fill="#8BC53F"/>
                        <path d="M54.4164 15.3408C53.8014 15.3408 53.1842 15.3562 52.5692 15.3364C52.0313 15.3188 51.6941 14.9909 51.6963 14.5353C51.6963 14.0819 52.0336 13.7452 52.5758 13.7364C53.808 13.7166 55.0402 13.7166 56.2724 13.7386C56.808 13.7496 57.1497 14.1105 57.11 14.5705C57.0659 15.0723 56.7595 15.3276 56.2658 15.3364C55.6508 15.3474 55.0336 15.3386 54.4186 15.3408H54.4164Z" fill="#8BC53F"/>
                        <path d="M51.6763 9.44048C51.5308 9.30402 51.1803 9.12796 51.1252 8.88586C51.0635 8.61296 51.1715 8.12877 51.3743 7.99672C52.4324 7.31005 53.5345 6.68721 54.6477 6.08858C55.0158 5.89051 55.4169 6.01155 55.6418 6.40331C55.8446 6.75544 55.8424 7.1692 55.4941 7.38488C54.3721 8.07815 53.2171 8.7208 52.0731 9.37665C52.0113 9.41187 51.9232 9.40306 51.6785 9.44048H51.6763Z" fill="#8BC53F"/>
                        <path d="M3.51759 5.28303C3.79753 5.02773 4.07968 4.76803 4.3971 4.47752C5.19945 5.04974 6.12304 5.23021 7.11056 4.81865C8.08044 4.4159 8.59844 3.6478 8.77478 2.6156H9.93864C10.439 5.00132 12.7799 5.62857 14.4221 4.45551C14.68 4.73502 14.9401 5.01453 15.1033 5.1906C14.9534 5.90367 14.7109 6.55953 14.7043 7.21758C14.6933 8.307 15.4625 9.28858 16.5228 9.55048C17.0761 9.68693 17.1885 9.94444 17.1224 10.422C17.1025 10.5717 17.1069 10.7257 17.1003 10.8688C14.669 11.7865 14.0716 13.2413 15.2531 15.3739C14.9754 15.6248 14.6911 15.8801 14.3957 16.1464C12.1804 15.0548 10.7564 15.6358 9.94084 18.0282C9.80418 18.037 9.65429 18.0348 9.5066 18.059C8.99741 18.1382 8.76156 17.9709 8.60065 17.4295C8.12893 15.8449 6.25089 15.1296 4.79827 15.9175C4.64838 15.999 4.50511 16.0958 4.32436 16.2059C4.06205 15.9241 3.80415 15.6446 3.51318 15.3321C4.09511 14.5024 4.28688 13.5824 3.87689 12.5921C3.47351 11.6171 2.70421 11.1043 1.67041 10.9194V9.76837C3.86146 9.3436 4.77182 7.11854 3.51318 5.28743L3.51759 5.28303ZM14.2811 10.3428C14.2965 7.62914 12.101 5.41288 9.38978 5.40628C6.68734 5.39968 4.46543 7.61593 4.46543 10.3208C4.46543 13.0058 6.64105 15.1913 9.33908 15.2177C12.0614 15.2441 14.2656 13.0696 14.2811 10.345V10.3428Z" fill="#8BC53F"/>
                        <path d="M32.6094 51.3645C32.6094 50.5171 32.5984 49.6698 32.6116 48.8247C32.6248 48.0258 33.209 47.667 33.9011 48.0566C35.3934 48.8973 36.8747 49.7534 38.3471 50.625C39.0062 51.0145 39.015 51.7034 38.3581 52.0951C36.8703 52.9799 35.3714 53.8448 33.857 54.6877C33.2023 55.0531 32.6226 54.6745 32.6116 53.9064C32.5962 53.0591 32.6094 52.2118 32.6072 51.3667L32.6094 51.3645ZM34.2472 52.6123C34.9966 52.1788 35.6601 51.7936 36.4052 51.3623C35.6425 50.9221 34.9746 50.5369 34.2472 50.1188V52.6145V52.6123Z" fill="#8BC53F"/>
                        <path d="M14.281 10.3427C14.2655 13.0673 12.0613 15.2418 9.33898 15.2153C6.64095 15.1911 4.46533 13.0057 4.46533 10.3184C4.46533 7.6136 6.68724 5.39734 9.38968 5.40395C12.1009 5.41055 14.2964 7.62681 14.281 10.3405V10.3427ZM12.663 10.325C12.6674 8.49834 11.1906 7.01497 9.37204 7.02157C7.55572 7.02817 6.06784 8.52915 6.08327 10.3361C6.0987 12.1386 7.54911 13.5845 9.35661 13.5977C11.1906 13.6109 12.6586 12.1562 12.663 10.325Z" fill="#8BC53F"/>
                        <path d="M34.2471 52.6123V50.1166C34.9745 50.5369 35.6424 50.9199 36.4051 51.3601C35.66 51.7914 34.9965 52.1766 34.2471 52.6101V52.6123Z" fill="#8BC53F"/>
                    </svg>


                        <div class="card_desc">
                            <p class="title">ডিজিটাল পণ্য</p>
                            <p>আমরা আপনাকে সর্বাধুনিক সফটওয়্যার সমাধান এবং ডিজিটাল পণ্য প্রদান করি যা আপনার ব্যবসাকে আরও দক্ষ, লাভজনক এবং প্রযুক্তিগতভাবে উন্নত করে তুলবে।</p>
                        </div>
                        <div class="button_section">
                            <a href="!"><button>বিস্তারিত</button></a>
                        </div>
                    </div>
                </div>

                <div class="signle_card">
                    <div class="card-body">
                    <svg width="57" height="58" viewBox="0 0 57 58" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M45.78 0C46.1877 0.142016 46.6152 0.238149 46.9966 0.430417C48.5068 1.19512 49.2717 2.45359 49.3594 4.12938C49.3704 4.35442 49.366 4.57946 49.366 4.8045C49.366 16.3755 49.3704 27.9487 49.3528 39.5196C49.3528 40.02 49.5063 40.2844 49.9359 40.5291C51.639 41.4904 53.3136 42.5042 55.0101 43.4764C55.6436 43.8391 56.025 44.3285 55.9307 45.0692C55.8387 45.8077 55.363 46.2184 54.6528 46.3954C54.0523 46.544 53.4583 46.7209 52.8117 46.8979C52.9125 47.0705 52.9848 47.2125 53.0725 47.3436C54.2189 49.0871 55.3696 50.8263 56.5138 52.5698C57.1933 53.6054 57.0333 54.3767 56.0053 55.054C54.8414 55.8187 53.6796 56.5856 52.5092 57.3393C51.5338 57.9686 50.7403 57.8003 50.1003 56.8368C48.989 55.161 47.8887 53.4787 46.7817 51.8007C46.6502 51.5997 46.5121 51.4009 46.3346 51.1387C45.9137 51.6565 45.528 52.1306 45.1422 52.6047C44.5986 53.2755 44.0484 53.494 43.3755 53.2799C42.6544 53.0505 42.3651 52.5021 42.284 51.7898C42.0955 50.149 41.8938 48.5103 41.6944 46.8695C41.6834 46.7799 41.6549 46.6925 41.6242 46.5527C41.4072 46.5527 41.2034 46.5527 41.0017 46.5527C37.5714 46.5527 34.1411 46.5571 30.7108 46.5505C29.7639 46.5505 29.1896 45.847 29.4767 45.0648C29.6871 44.4902 30.1343 44.2957 30.7217 44.2957C34.0578 44.3023 37.3938 44.2979 40.7299 44.2979H41.3743C41.1617 42.561 40.9579 40.8874 40.7518 39.2116C40.708 38.8576 40.6685 38.5037 40.6116 38.1519C40.5042 37.4768 40.605 36.8694 41.2012 36.4456C41.8039 36.0151 42.4133 36.1353 43.0051 36.4783C44.1778 37.1556 45.346 37.8395 46.5187 38.519C46.6765 38.6108 46.8409 38.6916 47.0623 38.8096V10.1355H2.28622C2.28622 10.3759 2.28622 10.5791 2.28622 10.7801C2.28622 21.1865 2.28622 31.5952 2.28622 42.0016C2.28622 43.5857 3.00954 44.2979 4.60525 44.2979C9.80662 44.2979 15.008 44.2979 20.2094 44.2979C20.4154 44.2979 20.628 44.2848 20.8297 44.322C21.3755 44.4181 21.759 44.901 21.7481 45.445C21.7371 45.989 21.3404 46.4478 20.7858 46.533C20.6017 46.5614 20.4088 46.5505 20.2225 46.5505C15.0014 46.5505 9.78251 46.5505 4.56141 46.5505C1.76235 46.5505 0.0241783 44.8136 0.0241783 42.006C0.0219864 29.6834 0.050481 17.3587 6.73003e-05 5.03609C-0.00870029 2.66334 0.837372 0.681675 3.60136 0C17.6602 0 31.7212 0 45.78 0ZM2.30814 7.79993H47.104C47.104 6.71406 47.104 5.66533 47.104 4.61878C47.104 2.95174 46.4047 2.25477 44.7389 2.25477C31.3815 2.25477 18.024 2.25477 4.66662 2.25477C4.51538 2.25477 4.36414 2.25259 4.21509 2.25477C3.18709 2.28754 2.37609 2.96266 2.32348 3.97862C2.25772 5.23054 2.30814 6.48902 2.30814 7.79775V7.79993ZM54.3723 53.4197C53.033 51.39 51.7354 49.4302 50.4466 47.4682C49.7079 46.3451 50.0937 45.3183 51.3803 44.9512C51.7157 44.8551 52.0489 44.7546 52.496 44.6235C49.298 42.7554 46.2118 40.9551 43.0139 39.0871C43.4676 42.7685 43.9016 46.2993 44.3531 49.972C44.6403 49.6202 44.8485 49.3646 45.0567 49.1112C45.9466 48.0144 47.0272 48.069 47.8141 49.2597C48.7062 50.6078 49.594 51.958 50.4839 53.3061C50.885 53.9157 51.2883 54.523 51.7113 55.1632C52.61 54.5733 53.4714 54.0096 54.3723 53.4175V53.4197Z" fill="#2B388F"/>
                        <path d="M24.6587 31.2587C19.9111 31.2587 15.1656 31.2587 10.418 31.2587C10.1747 31.2587 9.91823 31.2718 9.68809 31.2085C9.18395 31.0664 8.90338 30.7103 8.88146 30.1794C8.85955 29.6572 9.16861 29.2093 9.66836 29.0804C9.9007 29.0214 10.1528 29.0105 10.3961 29.0105C19.9286 29.0061 29.459 29.0083 38.9916 29.0083C39.1231 29.0083 39.2568 29.0039 39.3861 29.0149C40.0831 29.0717 40.5544 29.5392 40.5434 30.1575C40.5325 30.7802 40.0546 31.2478 39.3532 31.2543C37.7707 31.2718 36.1881 31.2609 34.6056 31.2609C31.2892 31.2609 27.9751 31.2609 24.6587 31.2609V31.2587Z" fill="#2B388F"/>
                        <path d="M13.7631 24.5622C12.5751 24.5622 11.3893 24.5665 10.2013 24.5622C9.296 24.5578 8.87516 24.158 8.87297 23.26C8.86201 20.8567 8.86201 18.4511 8.87297 16.0478C8.87735 15.1804 9.30258 14.774 10.1706 14.774C12.5817 14.7697 14.9949 14.7697 17.406 14.774C18.2631 14.774 18.7146 15.1957 18.719 16.0456C18.7321 18.4686 18.7343 20.8916 18.719 23.3146C18.7146 24.1318 18.2565 24.5578 17.4389 24.5644C16.2136 24.5731 14.9884 24.5666 13.7653 24.5666L13.7631 24.5622ZM11.1635 22.2703H16.4284V17.0594H11.1635V22.2703Z" fill="#2B388F"/>
                        <path d="M22.2411 36.1441C26.158 36.1441 30.075 36.1441 33.9919 36.1441C34.1979 36.1441 34.4083 36.1397 34.6122 36.1659C35.1426 36.238 35.5262 36.6706 35.5569 37.2016C35.5854 37.7019 35.2676 38.1826 34.7788 38.3136C34.5289 38.3792 34.2571 38.3923 33.9963 38.3945C26.1449 38.3989 18.2913 38.3989 10.4399 38.3945C10.1791 38.3945 9.90731 38.3814 9.65744 38.3158C9.14453 38.1804 8.84205 37.6953 8.89027 37.1491C8.93411 36.64 9.30673 36.2359 9.81745 36.1659C10.0213 36.1375 10.2317 36.1441 10.4378 36.1441C14.3744 36.1441 18.3089 36.1441 22.2455 36.1441H22.2411Z" fill="#2B388F"/>
                        <path d="M32.0501 14.7696C34.4437 14.7696 36.8351 14.774 39.2286 14.7653C39.7678 14.7653 40.1952 14.9357 40.4342 15.4316C40.7454 16.0805 40.3399 16.8562 39.6253 16.9982C39.4982 17.0244 39.3623 17.02 39.2308 17.02C34.4086 17.02 29.5843 17.0222 24.7621 17.02C24.0168 17.02 23.55 16.6333 23.4952 16.0106C23.4316 15.2765 23.9314 14.774 24.7599 14.7718C27.1907 14.7653 29.6215 14.7696 32.0501 14.7696Z" fill="#2B388F"/>
                        <path d="M32.0061 24.1339C29.6695 24.1339 27.333 24.1339 24.9986 24.1339C24.8298 24.1339 24.6589 24.1404 24.4901 24.123C23.9465 24.0683 23.5454 23.6663 23.495 23.1398C23.4424 22.5914 23.7273 22.1216 24.2512 21.9665C24.4989 21.8944 24.7706 21.8813 25.0315 21.8813C29.6849 21.8769 34.3383 21.8769 38.9917 21.8791C39.1429 21.8791 39.2942 21.8726 39.4432 21.8879C40.0942 21.9556 40.5523 22.4363 40.5435 23.0327C40.5326 23.6554 40.0438 24.1273 39.3533 24.1295C36.905 24.1383 34.4545 24.1339 32.0061 24.1339Z" fill="#2B388F"/>
                        <path d="M25.632 44.3023C26.2369 44.3066 26.7542 44.8201 26.7564 45.4122C26.7564 46.0349 26.2128 46.5658 25.5947 46.5439C24.9788 46.5221 24.5009 46.0196 24.5119 45.4056C24.5229 44.7873 25.0204 44.2979 25.6298 44.3023H25.632Z" fill="#2B388F"/>
                        <path d="M13.8987 4.03754C14.5256 4.0441 15.0165 4.52695 15.0165 5.13652C15.0165 5.74173 14.5146 6.25735 13.914 6.26391C13.2849 6.27265 12.7501 5.74173 12.7655 5.12341C12.7808 4.50728 13.2762 4.03099 13.8987 4.03754Z" fill="#2B388F"/>
                        <path d="M9.74535 4.03543C10.3744 4.0398 10.8544 4.51391 10.8544 5.13441C10.8544 5.75273 10.37 6.25743 9.76288 6.26617C9.13819 6.27491 8.59679 5.73743 8.61213 5.12567C8.62748 4.51391 9.12942 4.03106 9.74535 4.03543Z" fill="#2B388F"/>
                        <path d="M6.7268 5.14088C6.7268 5.7439 6.21828 6.2639 5.62427 6.26609C5.00177 6.26827 4.47572 5.73953 4.48448 5.12122C4.49325 4.50072 4.97109 4.04409 5.61112 4.04627C6.238 4.04627 6.7268 4.52912 6.7268 5.14088Z" fill="#2B388F"/>
                    </svg>
                        <div class="card_desc">
                            <p class="title">ওয়েব ডিজাইন</p>
                            <p>ইউজার এক্সপেরিয়েন্স, ইন্টুইটিভ নেভিগেশন এবং রেসপন্সিভ ডিজাইন। Figma, Adobe XD, ব্যবহার করে প্রোটোটাইপিং এবং ডিজাইনা।</p>
                        </div>
                        <div class="button_section">
                            <a href="!"><button>বিস্তারিত</button></a>
                        </div>
                    </div>
                </div>

                <div class="signle_card">
                    <div class="card-body">
                    <svg width="59" height="60" viewBox="0 0 59 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M52.7919 20.3899C51.6547 21.538 50.5242 22.6911 49.3769 23.8274C49.072 24.1295 48.6693 24.1195 48.3576 23.8173C47.2844 22.7733 46.218 21.7209 45.1616 20.6584C44.8466 20.3412 44.8718 19.9417 45.1835 19.606C45.4598 19.3089 45.7513 19.0253 46.0377 18.7349C39.4991 13.733 29.7746 13.5215 22.9412 18.374C23.6522 20.0626 23.5006 21.6387 22.0887 22.9076C20.8336 24.0355 19.3712 24.1144 17.8549 23.4397C13.1864 29.7323 12.9236 39.6085 18.2424 46.5188C18.5153 46.2217 18.7664 45.9179 19.0477 45.6443C19.4302 45.275 19.8261 45.2784 20.2068 45.6544C21.2278 46.6665 22.2404 47.6853 23.2479 48.7109C23.6286 49.0986 23.6303 49.478 23.2495 49.8606C22.237 50.8812 21.2177 51.8933 20.1934 52.9021C19.7974 53.2915 19.4319 53.2999 19.041 52.9172C18.0049 51.9 16.9755 50.8744 15.9545 49.8422C15.5872 49.4696 15.5906 49.1003 15.9579 48.7293C16.3403 48.3433 16.7497 47.9824 17.1355 47.6216C12.4519 40.9278 11.6027 33.8479 14.4382 26.231C14.1063 26.5952 13.7862 26.9712 13.4391 27.322C12.5664 28.2032 11.6903 29.0827 10.794 29.9404C10.543 30.1805 10.4908 30.3836 10.5868 30.7192C10.9221 31.8975 10.1858 33.1279 9.0082 33.425C7.79011 33.7321 6.59055 33.0171 6.2755 31.7968C5.97898 30.642 6.68659 29.4033 7.86592 29.1398C8.27532 29.0492 8.72853 29.1616 9.16151 29.1667C9.3064 29.1667 9.5052 29.1734 9.59113 29.0894C11.8891 26.8101 14.1771 24.5189 16.4886 22.2077C15.9579 21.3248 15.7287 20.3613 15.9713 19.324C16.1449 18.5855 16.5071 17.951 17.0648 17.429C18.293 16.281 19.8295 16.1416 21.7097 17.0228C21.7922 16.9473 21.8832 16.8701 21.9674 16.7862C24.1425 14.6176 26.3192 12.4507 28.4841 10.272C28.6037 10.1512 28.7082 9.90441 28.6678 9.75671C28.3089 8.42567 28.8666 7.32962 30.1621 6.87979C30.2177 6.85965 30.27 6.82776 30.3222 6.8009C30.6255 6.8009 30.9287 6.8009 31.232 6.8009C31.2707 6.8244 31.3078 6.85294 31.3499 6.86804C32.6438 7.32291 33.2756 8.46428 32.9049 9.66439C32.5073 10.9551 31.0854 11.5141 30.0341 11.1196C29.9094 11.0726 29.6651 11.1817 29.5506 11.2942C28.3594 12.454 27.1835 13.629 26.0041 14.8022C25.9283 14.8778 25.8643 14.9667 25.7767 15.0708C33.3851 12.1603 40.4881 13.0113 47.1311 17.6305C47.148 17.6221 47.1648 17.617 47.1749 17.607C47.5321 17.2595 47.8859 16.907 48.2448 16.5629C48.6963 16.1299 49.0467 16.1282 49.4965 16.5713C50.2715 17.335 51.0448 18.1021 51.8097 18.8759C52.1484 19.2183 52.4617 19.5842 52.7869 19.94V20.3932L52.7919 20.3899ZM21.8882 20.1683C21.8967 18.9027 20.8875 17.8772 19.6307 17.8705C18.389 17.8638 17.3377 18.9078 17.3377 20.1482C17.3377 21.3819 18.3435 22.3923 19.5885 22.4091C20.8639 22.4259 21.8798 21.4356 21.8882 20.1666V20.1683ZM19.6408 47.2154C18.9635 47.9002 18.2576 48.6119 17.5938 49.2816C18.2593 49.9479 18.9584 50.6495 19.6273 51.3192C20.3079 50.6445 21.0122 49.9462 21.6979 49.2681C21.0155 48.5867 20.313 47.8867 19.6408 47.217V47.2154ZM48.8782 22.1724C49.5521 21.496 50.2496 20.7978 50.9202 20.1247C50.2547 19.4634 49.5555 18.7668 48.8816 18.0971C48.2127 18.7634 47.5119 19.46 46.843 20.128C47.5119 20.7994 48.2077 21.4994 48.8799 22.1724H48.8782ZM30.7754 9.7886C31.2033 9.79363 31.5588 9.44619 31.5571 9.01985C31.5571 8.5952 31.2 8.2444 30.7737 8.25111C30.3626 8.25782 30.0324 8.58513 30.0206 8.99803C30.0088 9.43108 30.3441 9.78188 30.7737 9.7886H30.7754ZM9.22385 31.2698C9.22722 30.8535 8.90543 30.5245 8.48423 30.5111C8.05293 30.4977 7.75641 30.773 7.74631 31.1926C7.73451 31.6307 8.06978 31.9815 8.50277 31.9831C8.91216 31.9848 9.22048 31.6793 9.22385 31.2698Z" fill="#E02143"/>
                        <path d="M52.7922 41.4095C52.6473 41.5824 52.5159 41.7687 52.3558 41.9282C48.7454 45.5285 45.1332 49.1255 41.5211 52.7242C41.4672 52.7779 41.4149 52.8316 41.3593 52.8836C40.8472 53.362 40.3653 53.2898 40.0469 52.6654C39.3225 51.2404 38.6165 49.8036 37.8803 48.3853C37.7758 48.1822 37.5585 47.9808 37.3479 47.8985C34.9387 46.9586 32.5244 46.0354 30.1051 45.1223C29.7108 44.9729 29.4564 44.7547 29.293 44.3469C26.8602 38.2557 24.4156 32.1678 21.9609 26.085C21.7571 25.5798 21.8245 25.2105 22.2254 24.8345C22.9751 24.1312 23.6962 23.3961 24.4139 22.6592C24.7324 22.3336 25.0592 22.2799 25.4804 22.446C31.6466 24.9067 37.8163 27.3606 43.9876 29.8079C44.365 29.9572 44.552 30.2208 44.6884 30.5766C45.5982 32.9567 46.5215 35.3317 47.4279 37.7135C47.5475 38.0274 47.7176 38.2372 48.0293 38.3883C49.4058 39.0513 50.7721 39.7344 52.1317 40.431C52.376 40.5568 52.5715 40.7784 52.7905 40.9563V41.4095H52.7922ZM23.7822 25.3817C23.5008 25.5512 23.3761 25.7258 23.5193 26.08C25.8527 31.8539 28.1693 37.6329 30.5027 43.4052C30.5802 43.5966 30.7807 43.8013 30.9727 43.8769C33.2101 44.7564 35.4593 45.6057 37.6983 46.4785C37.9864 46.591 38.1515 46.5339 38.3621 46.3241C40.8623 43.8181 43.3676 41.3189 45.8846 38.8314C46.134 38.5863 46.1491 38.3933 46.0295 38.0895C45.1854 35.9427 44.3498 33.7926 43.5377 31.634C43.3979 31.2631 43.2008 31.0499 42.8301 30.9022C37.0952 28.6296 31.3636 26.3468 25.6371 24.0523C25.2631 23.903 25.0424 23.9567 24.8975 24.2622C28.0244 27.3774 31.1378 30.4793 34.258 33.5878C36.7178 32.0923 39.0782 33.1799 40.1143 34.5932C41.3459 36.275 41.2161 38.5611 39.774 40.0802C38.352 41.5774 36.0153 41.8308 34.2884 40.676C32.3492 39.3786 31.9533 37.3157 33.1242 34.6889C30.0124 31.5887 26.9057 28.4953 23.7822 25.3834V25.3817ZM47.2678 39.632C44.5435 42.3428 41.8681 45.0031 39.1725 47.6837C39.747 48.8267 40.3401 50.0067 40.9213 51.1615C44.2066 47.8885 47.4666 44.6423 50.7502 41.3709C49.5911 40.7918 48.4067 40.201 47.2661 39.632H47.2678ZM36.6908 34.328C35.1072 34.3247 33.8587 35.5567 33.8537 37.126C33.8503 38.687 35.1173 39.956 36.6757 39.9526C38.2274 39.9492 39.5111 38.6618 39.5027 37.1176C39.4943 35.5818 38.2341 34.3314 36.6908 34.3263V34.328Z" fill="#E02143"/>
                    </svg>

                        <div class="card_desc">
                            <p class="title">গ্রাফিক ডিজাইন</p>
                            <p>লোগো, সোশ্যাল মিডিয়া পোস্ট, ব্যানার, ইনফোগ্রাফিক্স এবং আরও অনেক কিছু তৈরি করা I Adobe Photoshop, Illustrator, Canva ইত্যাদি।</p>
                        </div>
                        <div class="button_section">
                            <a href="!"><button>বিস্তারিত</button></a>
                        </div>
                    </div>
                </div>

            </div>
            <div class="blank-2"></div>
        </div>
</section>
<!-- ________________________________________________________________________ SERVICE CARD END -->
 


<!-- ________________________________________________________________________ SERVICE CARD START -->
<section style="display:none;">
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
<!-- ________________________________________________________________________ SERVICE CARD END -->







<!-- __________________________________ banner start -->
    <section style="display:none;">
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
    <section class="about-section" id="about" style="display:none;">
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



    <section class="resources-section py-5" style="display:none;">

        <div class="container max-width px-0">
            <h3 class="resources-heading text-center custom-padding">
                আমাদের জনপ্রিয় সার্ভিস সমূহ
                <span class="d-flex justify-content-center">
                    <div class="b-bottom-middle"></div>
                </span>
            </h3>
            <p class="resources-description text-center py-2 custom-padding">
                <!-- আপনার জন্য আমরা নিয়ে এসেছি ডিজিটাল জগতের সবকিছু। যা দিয়ে এই নতুন যুগের ডিজিটাল বিজনেস গুলোকে আপনি নিয়ে যেতে পারবেন অনন্য উচ্চতায়।
                আমাদের মোবাইল ফ্রিল্যান্সিং কোর্স গুলো শিখে আপনি উপার্জনের নতুন পন্থাগুলো সম্পর্কে জানতে পারবেন...ইনশাল্লাহ। -->
            </p>
            <!-- <div class="button"><a href="{{ route('quick-digital.contact') }}"><button>সব সার্ভিস</button></a></div> -->
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
                                    <a class="text-decoration-none py-auto fw-medium fs-5" aria-current="page" 
                                    href="https://wa.me/+8801973784959?text=Hello%20QuickDigital!" target="_blank">হোয়াটসএপে অর্ডার করুন</a>
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
                                    <a class="text-decoration-none py-auto fw-medium fs-5" aria-current="page" 
                                    href="https://wa.me/+8801973784959?text=Hello%20QuickDigital!" target="_blank">হোয়াটসএপে অর্ডার করুন</a>
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
                                    <a class="text-decoration-none py-auto fw-medium fs-5" aria-current="page" 
                                    href="https://wa.me/+8801973784959?text=Hello%20QuickDigital!" target="_blank">হোয়াটসএপে অর্ডার করুন</a>
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
