@extends('quick_digital.layout.layout')
@section('content')
<section class="course__info__top py-5 d-none d-lg-block">
    <div class="max-width custom-padding container">
        <div class="breadcrumb_container">
            <a class="__breadcrumb" href="#">home</a>
            <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z">
                </path>
            </svg>
            <a class="__breadcrumb" href="#">home</a>
            <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z">
                </path>
            </svg>
            <a class="__breadcrumb" href="#">home</a>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="course__main__title__container">
                    <h1 class="course__main__title">{{ $course->title }}</h1>
                </div>
                <p class="course__short__description">
                    This part is not clear, we do not have any short description, we have only description and that is given below.
                </p>
                <div class="rating__container d-sm-flex gap-3 align-items-center">
                    <div class="d-flex gap-2">
                        <span class="rating__text">4.6</span>
                        <span class="rating__stars">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z">
                                </path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z">
                                </path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z">
                                </path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z">
                                </path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z">
                                </path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12.0006 15.968L16.2473 18.3451L15.2988 13.5717L18.8719 10.2674L14.039 9.69434L12.0006 5.27502V15.968ZM12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z">
                                </path>
                            </svg>
                        </span>
                    </div>
                    <span class="rated__by">(২০০+ রেটিং)</span>
                    <span class="enrolled__students d-block"><span class="font_change">১,২২০</span> জন শিক্ষার্থী</span>
                </div>
                <div class="course__author">তৈরী করেছেন <span class="course__author__name">{{ $course->instructor->name }}</span></div>
                <div class="d-sm-flex gap-3 align-items-center">
                    <span class="last__update__date__clamp">
                        <svg height="14px" weight="14px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9V3H15V1H17V3ZM4 9V19H20V9H4ZM6 11H8V13H6V11ZM11 11H13V13H11V11ZM16 11H18V13H16V11Z">
                            </path>
                        </svg>
                        <span>সর্বশেষ সংস্করণ {{ date('F j, Y', strtotime($course->created_at)) }}</span>
                    </span>
                    <span class="course__language">
                        <svg height="14px" weight="14px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                            <path d="M21 3C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H21ZM20 5H4V19H20V5ZM9 8C10.1045 8 11.1049 8.44841 11.829 9.173L10.4153 10.5866C10.0534 10.2241 9.55299 10 9 10C7.895 10 7 10.895 7 12C7 13.105 7.895 14 9 14C9.5525 14 10.0525 13.7762 10.4144 13.4144L11.828 14.828C11.104 15.552 10.104 16 9 16C6.792 16 5 14.208 5 12C5 9.792 6.792 8 9 8ZM16 8C17.1045 8 18.1049 8.44841 18.829 9.173L17.4153 10.5866C17.0534 10.2241 16.553 10 16 10C14.895 10 14 10.895 14 12C14 13.105 14.895 14 16 14C16.5525 14 17.0525 13.7762 17.4144 13.4144L18.828 14.828C18.104 15.552 17.104 16 16 16C13.792 16 12 14.208 12 12C12 9.792 13.792 8 16 8Z">
                            </path>
                        </svg>
                        <span>
                            @if ($course->language == 1)
                            ইংরেজি
                            @elseif ($course->language == 2)
                            বাংলা
                            @else
                            Unknown Language
                            @endif
                        </span>
                    </span>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mt-5 d-sm-block d-lg-none">
    <div class="max-width custom-padding container">
        <div class="breadcrumb_container">
            <a class="__breadcrumb" href="#">home</a>
            <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z">
                </path>
            </svg>
            <a class="__breadcrumb" href="#">home</a>
            <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                <path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z">
                </path>
            </svg>
            <a class="__breadcrumb" href="#">home</a>
        </div>
        <div class="d-flex flex-column gap-3">
            <div class="video__player">
                <video id="player" playsinline controls data-poster="/path/to/poster.jpg">
                    <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" type="video/mp4" />
                    {{-- <source src="/path/to/video.webm" type="video/webm" /> --}}

                    <!-- Captions are optional -->
                    {{-- <track kind="captions" label="English captions" src="/path/to/captions.vtt" srclang="en" default /> --}}
                </video>
            </div>
            <div class="course__main__title__container">
                <h1 class="course__main__title">{{ $course->title }}</h1>
            </div>
            <p class="course__short__description">
                This part is not clear, we do not have any short description, we have only description and that is given below.
            </p>
            <div class="rating__container d-sm-flex">
                <span class="rating__stars">
                    <span class="rating__text">4.6</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z">
                        </path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z">
                        </path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z">
                        </path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z">
                        </path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z">
                        </path>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12.0006 15.968L16.2473 18.3451L15.2988 13.5717L18.8719 10.2674L14.039 9.69434L12.0006 5.27502V15.968ZM12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z">
                        </path>
                    </svg>
                </span>
                <span class="rated__by">(২০০+ রেটিং)</span>
                <span class="enrolled__students d-block"><span class="font_change">১,২২০</span> জন শিক্ষার্থী</span>
            </div>
            <div class="course__author">তৈরী করেছেন <span class="course__author__name">{{ $course->instructor->name }}</span></div>
            <div class="d-flex gap-3 align-items-center">
                <span class="last__update__date__clamp align-items-center">
                    <svg height="14px" weight="14px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M17 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9V3H15V1H17V3ZM4 9V19H20V9H4ZM6 11H8V13H6V11ZM11 11H13V13H11V11ZM16 11H18V13H16V11Z">
                        </path>
                    </svg>
                    <span>সর্বশেষ সংস্করণ {{ date('F j, Y', strtotime($course->created_at)) }}</span>
                </span>
                <span class="course__language">
                    <svg height="14px" weight="14px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M21 3C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H21ZM20 5H4V19H20V5ZM9 8C10.1045 8 11.1049 8.44841 11.829 9.173L10.4153 10.5866C10.0534 10.2241 9.55299 10 9 10C7.895 10 7 10.895 7 12C7 13.105 7.895 14 9 14C9.5525 14 10.0525 13.7762 10.4144 13.4144L11.828 14.828C11.104 15.552 10.104 16 9 16C6.792 16 5 14.208 5 12C5 9.792 6.792 8 9 8ZM16 8C17.1045 8 18.1049 8.44841 18.829 9.173L17.4153 10.5866C17.0534 10.2241 16.553 10 16 10C14.895 10 14 10.895 14 12C14 13.105 14.895 14 16 14C16.5525 14 17.0525 13.7762 17.4144 13.4144L18.828 14.828C18.104 15.552 17.104 16 16 16C13.792 16 12 14.208 12 12C12 9.792 13.792 8 16 8Z">
                        </path>
                    </svg>
                    <span>
                        @if ($course->language == 1)
                        ইংরেজি
                        @elseif ($course->language == 2)
                        বাংলা
                        @else
                        Unknown Language
                        @endif
                    </span> </span>
            </div>
        </div>
    </div>
</section>
<section class="py-5">
    <div class="container max-width custom-padding">
        <div class="row">
            <div class="col-md-4 order-md-2">
                <div class="bg-white desktop__visible">
                    <div class="video__player__lg d-lg-block d-none">
                        <video id="player-2" playsinline controls data-poster="/path/to/poster.jpg">
                            <source src="https://cdn.plyr.io/static/demo/View_From_A_Blue_Moon_Trailer-576p.mp4" type="video/mp4" />
                            {{-- <source src="/path/to/video.webm" type="video/webm" /> --}}

                            <!-- Captions are optional -->
                            {{-- <track kind="captions" label="English captions" src="/path/to/captions.vtt" srclang="en" default /> --}}
                        </video>
                    </div>
                    <div class="px-md-3">
                        <div class="d-lg-flex gap-3 justify-content-between align-items-center font_change">
                            <div class="d-flex gap-3">
                                @if($course->course_type == 'free')
                                <span class="course__price__value">Free</span>
                                @else
                                <span class="course__price__value">&#2547; {{ $course->discount_price }}</span>
                                <span class="course__discounted__price text-decoration-line-through">&#2547; {{ $course->price }}</span>
                                @endif

                            </div>
                            @if($course->course_type != 'free')
                            <div class="d-block align-items-center">
                                @php
                                $discountPercentage = (($course->price - $course->discount_price) / $course->price) * 100;
                                @endphp
                                <span class="course__discount__value font_change">-{{ round($discountPercentage) }}% ডিসকাউন্ট</span>
                            </div>
                            @endif

                        </div>
                        <a class="course__add__to__cart" href="#">কার্টে যোগ করুন</a>
                        <a class="course__buy__now" href="#">এখন কিনুন</a>
                        <div class="in__this__course__container">
                            <span class="in__this__course_title">এই কোর্সে থাকছে:</span>
                            <div class="in__this__course__item">
                                <div>
                                    <svg height="14px" width="18px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M16 2L21 7V21.0082C21 21.556 20.5551 22 20.0066 22H3.9934C3.44476 22 3 21.5447 3 21.0082V2.9918C3 2.44405 3.44495 2 3.9934 2H16ZM15.0008 11.667L10.1219 8.41435C10.0562 8.37054 9.979 8.34717 9.9 8.34717C9.6791 8.34717 9.5 8.52625 9.5 8.74717V15.2524C9.5 15.3314 9.5234 15.4086 9.5672 15.4743C9.6897 15.6581 9.9381 15.7078 10.1219 15.5852L15.0008 12.3326C15.0447 12.3033 15.0824 12.2656 15.1117 12.2217C15.2343 12.0379 15.1846 11.7895 15.0008 11.667Z">
                                        </path>
                                    </svg>
                                </div>
                                <span>অন-ডিমান্ড ভিডিও</span>
                            </div>
                            <div class="in__this__course__item">
                                <div>
                                    <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M3 12C3 10.067 4.567 8.5 6.5 8.5C7.7035 8.5 8.51959 8.9338 9.19914 9.61336C9.9255 10.3397 10.4851 11.3322 11.1258 12.4856L11.1595 12.5462C11.7605 13.6283 12.4431 14.8573 13.3866 15.8009C14.3946 16.8088 15.7035 17.5 17.5 17.5C20.5376 17.5 23 15.0376 23 12C23 8.96243 20.5376 6.5 17.5 6.5C15.8394 6.5 14.3508 7.2359 13.3423 8.39937C13.7887 9.05406 14.1574 9.70577 14.464 10.2574C15.0681 9.20718 16.2014 8.5 17.5 8.5C19.433 8.5 21 10.067 21 12C21 13.933 19.433 15.5 17.5 15.5C16.2965 15.5 15.4804 15.0662 14.8009 14.3866C14.0745 13.6603 13.5149 12.6678 12.8742 11.5144L12.8405 11.4538C12.2395 10.3717 11.5569 9.14265 10.6134 8.19914C9.60541 7.1912 8.2965 6.5 6.5 6.5C3.46243 6.5 1 8.96243 1 12C1 15.0376 3.46243 17.5 6.5 17.5C8.16056 17.5 9.64923 16.7641 10.6577 15.6006C10.2113 14.9459 9.84262 14.2942 9.53605 13.7426C8.93194 14.7928 7.79856 15.5 6.5 15.5C4.567 15.5 3 13.933 3 12Z">
                                        </path>
                                    </svg>
                                </div>
                                <span>আজীবন অ্যাক্সেস</span>
                            </div>
                            <div class="in__this__course__item">
                                <div>
                                    <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M13.0049 16.9409V19.0027H18.0049V21.0027H6.00488V19.0027H11.0049V16.9409C7.05857 16.4488 4.00488 13.0824 4.00488 9.00275V3.00275H20.0049V9.00275C20.0049 13.0824 16.9512 16.4488 13.0049 16.9409ZM6.00488 5.00275V9.00275C6.00488 12.3165 8.69117 15.0027 12.0049 15.0027C15.3186 15.0027 18.0049 12.3165 18.0049 9.00275V5.00275H6.00488ZM1.00488 5.00275H3.00488V9.00275H1.00488V5.00275ZM21.0049 5.00275H23.0049V9.00275H21.0049V5.00275Z">
                                        </path>
                                    </svg>
                                </div>
                                <span>শেষ করার পর পাবেন সার্টিফিকেট</span>
                            </div>
                        </div>
                        <div class="course__share__socials">
                            <div class="course__share__fb__container">
                                <a href="#">
                                    <svg class="course__share__fb" height="32px" width="32px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M14 13.5H16.5L17.5 9.5H14V7.5C14 6.47062 14 5.5 16 5.5H17.5V2.1401C17.1743 2.09685 15.943 2 14.6429 2C11.9284 2 10 3.65686 10 6.69971V9.5H7V13.5H10V22H14V13.5Z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                            <div class="course__share__x__container">
                                <a href="#">
                                    <svg class="course__share__x" height="32px" width="32px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M8 2H1L9.26086 13.0145L1.44995 21.9999H4.09998L10.4883 14.651L16 22H23L14.3917 10.5223L21.8001 2H19.1501L13.1643 8.88578L8 2ZM17 20L5 4H7L19 20H17Z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                            <div class="course__share__in__container">
                                <a href="#">
                                    <svg class="course__share__in" height="32px" width="32px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M6.94048 4.99993C6.94011 5.81424 6.44608 6.54702 5.69134 6.85273C4.9366 7.15845 4.07187 6.97605 3.5049 6.39155C2.93793 5.80704 2.78195 4.93715 3.1105 4.19207C3.43906 3.44699 4.18654 2.9755 5.00048 2.99993C6.08155 3.03238 6.94097 3.91837 6.94048 4.99993ZM7.00048 8.47993H3.00048V20.9999H7.00048V8.47993ZM13.3205 8.47993H9.34048V20.9999H13.2805V14.4299C13.2805 10.7699 18.0505 10.4299 18.0505 14.4299V20.9999H22.0005V13.0699C22.0005 6.89993 14.9405 7.12993 13.2805 10.1599L13.3205 8.47993Z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <div class="course__coupon__container">
                            <span class="course__coupon__heading">কুপন ব্যবহার করুন</span>
                            <form action="" class="course__coupon__group">
                                <input class="coupon__input" type="text" name="coupon" id="coupon">
                                <button type="submit" class="coupoun__submit">ব্যবহার করুন</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="border rounded mt-5 d-none d-lg-block p-3" style="transform: translateY(-360px);">
                    <div class="related__course__container">
                        <h4 class="related__course__title fw-bold mb-3">সংশ্লিষ্ট কোর্স </h4>
                    </div>
                    <div class="related__course__items__container">
                        <div class="related__course__item">
                            <img class="related__course__item__img" src="https://dummyimage.com/100x70/000/fff" alt="">
                            <div>
                                <div class="related__course__title fw-semibold">
                                    <a class="text-decoration-none" style="color: #333" href="#">
                                        সার্টিফিকেট ইন বিউটিফিকেশন সার্টিফিকেট ইন বিউটিফিকেশন সার্টিফিকেট ইন বিউটিফিকেশন
                                    </a>
                                </div>
                                <span class="fw-bold"> &#2547; ৪৯৯</span>
                                <span class="related__course__deducted__price"> &#2547; ৬০০</span>
                            </div>
                        </div>
                        <div class="related__course__item">
                            <img class="related__course__item__img" src="https://dummyimage.com/100x70/000/fff" alt="">
                            <div>
                                <div class="related__course__title fw-semibold">
                                    <a class="text-decoration-none" style="color: #333" href="#">
                                        সার্টিফিকেট ইন বিউটিফিকেশন সার্টিফিকেট ইন বিউটিফিকেশন সার্টিফিকেট ইন বিউটিফিকেশন
                                    </a>
                                </div>
                                <span class="fw-bold"> &#2547; ৪৯৯</span>
                                <span class="related__course__deducted__price"> &#2547; ৬০০</span>
                            </div>
                        </div>
                        <div class="related__course__item">
                            <img class="related__course__item__img" src="https://dummyimage.com/100x70/000/fff" alt="">
                            <div>
                                <div class="related__course__title fw-semibold">
                                    <a class="text-decoration-none" style="color: #333" href="#">
                                        সার্টিফিকেট ইন বিউটিফিকেশন সার্টিফিকেট ইন বিউটিফিকেশন সার্টিফিকেট ইন বিউটিফিকেশন
                                    </a>
                                </div>
                                <span class="fw-bold"> &#2547; ৪৯৯</span>
                                <span class="related__course__deducted__price"> &#2547; ৬০০</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 order-md-1">
                {{-- about course --}}
                <div class="course__about__description__container mt-4 mt-lg-0">
                    <h4 class="fw-bold mb-3">কোর্সটি সর্ম্পকে-</h4>
                    <p class="course__about__description mb-0">
                        {{ strip_tags($course->description) }}
                    </p>
                </div>
                {{-- what you will learn --}}
                <div class="course__what__you__will__learn">
                    <h4 class="fw-bold mb-3">এই কোর্স থেকে আপনি যা শিখবেন</h4>
                    <div class="row gy-3">

                        @foreach ($course->what_will_i_learn as $objective)
                        <div class="col-md-6">

                            <div class="d-flex gap-1">
                                <div>
                                    <svg class="course__objective__check" height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                        <path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z">
                                        </path>
                                    </svg>
                                </div>
                                <span class="course__learn__objective">{{ $objective }}</span>
                            </div>

                        </div>
                        @endforeach
                    </div>
                </div>
                {{-- course requirements --}}
                <div class="course__requirements">
                    <h4 class="fw-bold mb-3">কোর্সটি করতে যা যা প্রয়োজন-</h4>
                    @foreach ($course->materials_included as $materials)

                    <div class="course__requirements__items">
                        <div>
                            <svg height="18px" weight="18px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M9.9997 15.1709L19.1921 5.97852L20.6063 7.39273L9.9997 17.9993L3.63574 11.6354L5.04996 10.2212L9.9997 15.1709Z">
                                </path>
                            </svg>
                        </div>
                        <span>{{ $materials }}</span>
                    </div>
                    @endforeach
                </div>
                {{-- target audience --}}
                <div class="course__target__audience__container mb-5">
                    <h4 class="fw-bold mb-3">কোর্সটি কাদের জন্য -</h4>
                    @foreach ($course->tageted_audience as $audience)
                    <div class="course__target__audience__item">
                        <div>
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15.141 6 5.518 4.95a1.05 1.05 0 0 1 0 1.549l-5.612 5.088m-6.154-3.214v1.615a.95.95 0 0 0 1.525.845l5.108-4.251a1.1 1.1 0 0 0 0-1.646l-5.108-4.251a.95.95 0 0 0-1.525.846v1.7c-3.312 0-6 2.979-6 6.654v1.329a.7.7 0 0 0 1.344.353 5.174 5.174 0 0 1 4.652-3.191l.004-.003Z" />
                            </svg>
                        </div>
                        <span>{{ $audience }}</span>
                    </div>
                    @endforeach
                </div>
                {{-- course curriculum --}}
                <div class="course__curiculum__container">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="fw-bold mb-3">পাঠ্যক্রম</h4>
                        <div class="d-flex justify-content-between align-items-center gap-5">
                            <span>{{ $course['topics_count'] }} টি মডিউল</span>
                            @php
                            $hours = floor($totalDurationInSeconds / 3600);
                            $minutes = floor(($totalDurationInSeconds % 3600) / 60);
                            $seconds = $totalDurationInSeconds % 60;
                            @endphp

                            <span>{{ $hours }} ঘ: {{ $minutes }} মি: {{ $seconds }} সেকেন্ড</span>

                        </div>
                    </div>
                    <div class="accordion">
                        @if ($course)
                        @foreach ($course->topics as $topic)
                        <div class="accordion__item">
                            <div class="accordion__title">
                                <div class="accordion__arrow"><span class="accordion__arrow-item">+</span></div>
                                <span class="accordion__title-text">{{ $topic->title }}</span>
                            </div>
                            <div class="accordion__content">
                                @if ($topic->lessons->isNotEmpty())
                                @foreach ($topic->lessons as $lesson)
                                <div class="content__item d-flex justify-content-between align-items-center">
                                    <div class="d-flex gap-2 align-items-center">
                                        <div>
                                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                                <path fill-rule="evenodd" d="M19.003 3A2 2 0 0 1 21 5v2h-2V5.414L17.414 7h-2.828l2-2h-2.172l-2 2H9.586l2-2H9.414l-2 2H3V5a2 2 0 0 1 2-2h14.003ZM3 9v10a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V9H3Zm2-2.414L6.586 5H5v1.586Zm4.553 4.52a1 1 0 0 1 1.047.094l4 3a1 1 0 0 1 0 1.6l-4 3A1 1 0 0 1 9 18v-6a1 1 0 0 1 .553-.894Z" clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                        <span>{{ $lesson->lesson_title }}</span>
                                    </div>
                                    <div>
                                        <svg height="24px" width="24px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M6 10V20H19V10H6ZM18 8H20C20.5523 8 21 8.44772 21 9V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V9C3 8.44772 3.44772 8 4 8H6V7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7V8ZM16 8V7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7V8H16ZM7 11H9V13H7V11ZM7 14H9V16H7V14ZM7 17H9V19H7V17Z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>

                </div>
                {{-- course instructor --}}
                <div class="course__instructor__container mt-5">
                    <h4 class="fw-bold mb-3">আপনার প্রশিক্ষক</h4>
                    <div class="d-lg-flex gap-5">
                        <div class="course__instructor__img d-flex justify-content-center">
                            <img class="rounded" src="https://dummyimage.com/200x250/000/fff" alt="instructor">
                        </div>
                        <div class="mt-3 mt-lg-0">
                            <span class="course__instructor__name fw-bolder fs-5">{{ $course->instructor->name }}</span>
                            <div class="course__instructor__rating__container d-flex align-items-center gap-3 mt-3">
                                <div class="course__instructor__rating text-warning fw-bold">4.4</div>
                                <div class="course__instructor__rating__stars__container d-flex gap-1 text-warning">
                                    <div>
                                        <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                            </path>
                                        </svg>
                                    </div>
                                    <div>
                                        <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M11.9998 14.6564L14.8165 16.3769L14.0507 13.1664L16.5574 11.0192L13.2673 10.7554L11.9998 7.70792V14.6564ZM11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                            </path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex gap-3 mt-3">
                                <div class="d-flex gap-1 align-items-center">
                                    <div>
                                        <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM10.6219 8.41459L15.5008 11.6672C15.6846 11.7897 15.7343 12.0381 15.6117 12.2219C15.5824 12.2658 15.5447 12.3035 15.5008 12.3328L10.6219 15.5854C10.4381 15.708 10.1897 15.6583 10.0672 15.4745C10.0234 15.4088 10 15.3316 10 15.2526V8.74741C10 8.52649 10.1791 8.34741 10.4 8.34741C10.479 8.34741 10.5562 8.37078 10.6219 8.41459Z">
                                            </path>
                                        </svg>
                                    </div>
                                    <span><span class="font_change">১০</span> টি কোর্স</span>
                                </div>
                                <div class="d-flex gap-1 align-items-center">
                                    <div>
                                        <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M6.45455 19L2 22.5V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V18C22 18.5523 21.5523 19 21 19H6.45455ZM5.76282 17H20V5H4V18.3851L5.76282 17ZM11 10H13V12H11V10ZM7 10H9V12H7V10ZM15 10H17V12H15V10Z">
                                            </path>
                                        </svg>
                                    </div>
                                    <span>২৫ টি রিভিউ</span>
                                </div>
                                <div class="d-flex gap-1 align-items-center">
                                    <div>
                                        <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H4ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13Z">
                                            </path>
                                        </svg>

                                    </div>
                                    <span><span class="font_change">১০</span> টি কোর্স</span>
                                </div>
                            </div>
                            <p class="course__instructor__bio mt-3">
                                পাঠ্যক্রমের প্রশিক্ষক অনন্ত দাশ। তিনি একজন অভিজ্ঞ শিক্ষক এবং শিক্ষানীতির
                                প্রেক্ষাপটে উন্নতি করেন। তাঁর প্রাথমিক আদর্শ হল শিক্ষার মাধ্যমে ছাত্রদের মতিদান এবং
                                সমস্যা সমাধানের দক্ষতা উন্নত করা। তিনি পুরোপুরি প্রতিষ্ঠিত এবং প্রস্তুতিশীল শিক্ষানীতির
                                প্রয়োগ করে তাঁর ছাত্রদের উচ্চ শিক্ষার প্রস্তুতি সম্পন্ন করতে সহায়তা করেন। শ্রী অনন্ত
                                দাশের একটি অন্যতম গুরুত্বপূর্ণ গুণ হল তাঁর উৎসাহবান এবং শিক্ষার প্রতি অগ্রহ।
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- related course --}}
        <div class="mt-4 d-lg-none">
            <div class="related__course__container">
                <h4 class="related__course__title fw-bold mb-3">সংশ্লিষ্ট কোর্স </h4>
            </div>
            <div class="related__course__items__container">
                <div class="related__course__item">
                    <img class="related__course__item__img" src="https://dummyimage.com/100x70/000/fff" alt="">
                    <div>
                        <div class="related__course__title fw-semibold">
                            <a class="text-decoration-none" style="color: #333" href="#">
                                সার্টিফিকেট ইন বিউটিফিকেশন সার্টিফিকেট ইন বিউটিফিকেশন সার্টিফিকেট ইন বিউটিফিকেশন
                            </a>
                        </div>
                        <span class="fw-bold"> &#2547; ৪৯৯</span>
                        <span class="related__course__deducted__price"> &#2547; ৬০০</span>
                    </div>
                </div>
                <div class="related__course__item">
                    <img class="related__course__item__img" src="https://dummyimage.com/100x70/000/fff" alt="">
                    <div>
                        <div class="related__course__title fw-semibold">
                            <a class="text-decoration-none" style="color: #333" href="#">
                                সার্টিফিকেট ইন বিউটিফিকেশন সার্টিফিকেট ইন বিউটিফিকেশন সার্টিফিকেট ইন বিউটিফিকেশন
                            </a>
                        </div>
                        <span class="fw-bold"> &#2547; ৪৯৯</span>
                        <span class="related__course__deducted__price"> &#2547; ৬০০</span>
                    </div>
                </div>
                <div class="related__course__item">
                    <img class="related__course__item__img" src="https://dummyimage.com/100x70/000/fff" alt="">
                    <div>
                        <div class="related__course__title fw-semibold">
                            <a class="text-decoration-none" style="color: #333" href="#">
                                সার্টিফিকেট ইন বিউটিফিকেশন সার্টিফিকেট ইন বিউটিফিকেশন সার্টিফিকেট ইন বিউটিফিকেশন
                            </a>
                        </div>
                        <span class="fw-bold"> &#2547; ৪৯৯</span>
                        <span class="related__course__deducted__price"> &#2547; ৬০০</span>
                    </div>
                </div>
            </div>
        </div>
        {{-- শিক্ষার্থীদের ফিডব্যাক --}}
        <div class="mt-5 col-md-8">
            <h4 class="course__feedback__title fw-bold mb-3">কোর্স ফিডব্যাক</h4>
            <div class="row align-items-center g-5">
                <div class="col-md-4">
                    <div class="d-flex justify-content-center align-items-center flex-column shadow" style="height: 200px;">
                        <h1 class="course__feedback__rating">5.0</h1>
                        <div class="course__instructor__rating__stars__container d-flex gap-1 text-warning">
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <span class="mt-3 d-block">২টি রেটিং </span>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <div class="course__instructor__rating__stars__container d-flex gap-1 text-warning">
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="progress w-100" role="progressbar" aria-label="Example 20px high" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 5px">
                            <div class="progress-bar" style="width: 25%"></div>
                        </div>
                        <span class="course__feddback__rating__percentage">100%</span>
                    </div>
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <div class="course__instructor__rating__stars__container d-flex gap-1 text-warning">
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17ZM11.9998 14.6564L14.8165 16.3769L14.0507 13.1664L16.5574 11.0192L13.2673 10.7554L11.9998 7.70792L10.7323 10.7554L7.44228 11.0192L9.94893 13.1664L9.18311 16.3769L11.9998 14.6564Z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="progress w-100" role="progressbar" aria-label="Example 20px high" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 5px">
                            <div class="progress-bar" style="width: 25%"></div>
                        </div>
                        <span class="course__feddback__rating__percentage">100%</span>
                    </div>
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <div class="course__instructor__rating__stars__container d-flex gap-1 text-warning">
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17ZM11.9998 14.6564L14.8165 16.3769L14.0507 13.1664L16.5574 11.0192L13.2673 10.7554L11.9998 7.70792L10.7323 10.7554L7.44228 11.0192L9.94893 13.1664L9.18311 16.3769L11.9998 14.6564Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17ZM11.9998 14.6564L14.8165 16.3769L14.0507 13.1664L16.5574 11.0192L13.2673 10.7554L11.9998 7.70792L10.7323 10.7554L7.44228 11.0192L9.94893 13.1664L9.18311 16.3769L11.9998 14.6564Z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="progress w-100" role="progressbar" aria-label="Example 20px high" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 5px">
                            <div class="progress-bar" style="width: 25%"></div>
                        </div>
                        <span class="course__feddback__rating__percentage">100%</span>
                    </div>
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <div class="course__instructor__rating__stars__container d-flex gap-1 text-warning">
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17ZM11.9998 14.6564L14.8165 16.3769L14.0507 13.1664L16.5574 11.0192L13.2673 10.7554L11.9998 7.70792L10.7323 10.7554L7.44228 11.0192L9.94893 13.1664L9.18311 16.3769L11.9998 14.6564Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17ZM11.9998 14.6564L14.8165 16.3769L14.0507 13.1664L16.5574 11.0192L13.2673 10.7554L11.9998 7.70792L10.7323 10.7554L7.44228 11.0192L9.94893 13.1664L9.18311 16.3769L11.9998 14.6564Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17ZM11.9998 14.6564L14.8165 16.3769L14.0507 13.1664L16.5574 11.0192L13.2673 10.7554L11.9998 7.70792L10.7323 10.7554L7.44228 11.0192L9.94893 13.1664L9.18311 16.3769L11.9998 14.6564Z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="progress w-100" role="progressbar" aria-label="Example 20px high" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 5px">
                            <div class="progress-bar" style="width: 25%"></div>
                        </div>
                        <span class="course__feddback__rating__percentage">100%</span>
                    </div>
                    <div class="d-flex align-items-center gap-3 mb-2">
                        <div class="course__instructor__rating__stars__container d-flex gap-1 text-warning">
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17ZM11.9998 14.6564L14.8165 16.3769L14.0507 13.1664L16.5574 11.0192L13.2673 10.7554L11.9998 7.70792L10.7323 10.7554L7.44228 11.0192L9.94893 13.1664L9.18311 16.3769L11.9998 14.6564Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17ZM11.9998 14.6564L14.8165 16.3769L14.0507 13.1664L16.5574 11.0192L13.2673 10.7554L11.9998 7.70792L10.7323 10.7554L7.44228 11.0192L9.94893 13.1664L9.18311 16.3769L11.9998 14.6564Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17ZM11.9998 14.6564L14.8165 16.3769L14.0507 13.1664L16.5574 11.0192L13.2673 10.7554L11.9998 7.70792L10.7323 10.7554L7.44228 11.0192L9.94893 13.1664L9.18311 16.3769L11.9998 14.6564Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17ZM11.9998 14.6564L14.8165 16.3769L14.0507 13.1664L16.5574 11.0192L13.2673 10.7554L11.9998 7.70792L10.7323 10.7554L7.44228 11.0192L9.94893 13.1664L9.18311 16.3769L11.9998 14.6564Z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <div class="progress w-100" role="progressbar" aria-label="Example 20px high" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="height: 5px">
                            <div class="progress-bar" style="width: 25%"></div>
                        </div>
                        <span class="course__feddback__rating__percentage">100%</span>
                    </div>
                </div>
            </div>
            {{-- reviews --}}
            <div class="mt-5">
                <h4 class="course__feedback__title fw-bold mb-3">রিভিউ</h4>
                <div class="course__review__container d-md-flex gap-3">
                    <img class="course__review__image" src="https://dummyimage.com/64x64/b5b5b5/fff" alt="">
                    <div>
                        <span class="course__reviewer__name">আজমত খান</span>
                        <div class="course__instructor__rating__stars__container d-flex gap-1 text-warning mb-3">
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <span style="font-weight: 18px;">ভালো কোর্স</span>
                    </div>
                </div>
                <div class="course__review__container d-md-flex gap-3">
                    <img class="course__review__image" src="https://dummyimage.com/64x64/b5b5b5/fff" alt="">
                    <div>
                        <span class="course__reviewer__name">আজমত খান</span>
                        <div class="course__instructor__rating__stars__container d-flex gap-1 text-warning mb-3">
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                            <div>
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M11.9998 17L6.12197 20.5902L7.72007 13.8906L2.48926 9.40983L9.35479 8.85942L11.9998 2.5L14.6449 8.85942L21.5104 9.40983L16.2796 13.8906L17.8777 20.5902L11.9998 17Z">
                                    </path>
                                </svg>
                            </div>
                        </div>
                        <span style="font-weight: 18px;">ভালো কোর্স</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(function() {

        //BEGIN
        $(".accordion__title").on("click", function(e) {

            e.preventDefault();
            var $this = $(this);

            if (!$this.hasClass("accordion-active")) {
                $(".accordion__content").slideUp(400);
                $(".accordion__title").removeClass("accordion-active");
                $('.accordion__arrow').removeClass('accordion__rotate');
            }

            $this.toggleClass("accordion-active");
            $this.next().slideToggle();
            $('.accordion__arrow', this).toggleClass('accordion__rotate');
        });
        //END

    });
</script>
@endsection