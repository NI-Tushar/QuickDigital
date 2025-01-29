<header>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-MBXJWQEP3W"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-MBXJWQEP3W');
</script>


@include('quick_digital.layout.loader')
@include('quick_digital.layout.sticky_ripple_logo')


<div id="sticky_bar" class="sticky_bar">

    <div class="bg-first text-white">
        <div class="container max-width">
            <div class="top-contacts">

                <!-- __________________ nav-list-->
                <div class="mail_num">

                    <a class="" href="mailto:quickdigital121@gmail.com">
                        <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="currentColor">
                            <path d="M3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM12.0606 11.6829L5.64722 6.2377L4.35278 7.7623L12.0731 14.3171L19.6544 7.75616L18.3456 6.24384L12.0606 11.6829Z">
                            </path>
                        </svg>
                        <span class="">
                            quickdigital121@gmail.com
                        </span>
                    </a>

                    <a class="phone_number" href="tel:01973784959">
                        <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="currentColor">
                            <path
                                d="M21 8C22.1046 8 23 8.89543 23 10V14C23 15.1046 22.1046 16 21 16H19.9381C19.446 19.9463 16.0796 23 12 23V21C15.3137 21 18 18.3137 18 15V9C18 5.68629 15.3137 3 12 3C8.68629 3 6 5.68629 6 9V16H3C1.89543 16 1 15.1046 1 14V10C1 8.89543 1.89543 8 3 8H4.06189C4.55399 4.05369 7.92038 1 12 1C16.0796 1 19.446 4.05369 19.9381 8H21ZM7.75944 15.7849L8.81958 14.0887C9.74161 14.6662 10.8318 15 12 15C13.1682 15 14.2584 14.6662 15.1804 14.0887L16.2406 15.7849C15.0112 16.5549 13.5576 17 12 17C10.4424 17 8.98882 16.5549 7.75944 15.7849Z">
                            </path>
                        </svg>
                        <span class="">
                            01973-784959
                        </span>
                    </a>

                </div>


                <!-- __________________ nav-list-->

                @if (!Auth::guard('user')->check())
                <div class="user_part">
                    <div class="">
                        <a href="{{ url('user/login') }}">
                            <svg height="20px" width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-3.31 0-10 1.67-10 5v2h20v-2c0-3.33-6.69-5-10-5z"></path>
                            </svg>

                            <span class="text-control-6 fs-6 px-1">লগইন</span>
                        </a>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
    <!-- ______________________________________________________________ -->

    <style>
        .user_name{
            max-width:120px;
            width:100%;
            height:auto;
            font-size:15px;
            overflow:hidden;
            margin-top:15px;
        }
        .nav-item .nav-link{
            border:1px solid red;
        }
    
        .nav-item .nav-link .nav__user__img{
            height: 40px;
            width: 40px;
            border-radius: 50%;
            box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
        }
        .navbar-nav{
            display:flex;
        }
        .nav-item{
            margin:auto;
        }
        .nav-item .nav-link {
            padding-top:5px !important;
            padding-bottom:5px !important;
            padding:8px;
        }
        .nav-item .nav-link:hover{
            background:transparent;
        }

        .custom-padding{
            padding:0px !important;
        }

        @media (max-width: 995px) {
            .navbar-nav .nav-item{
                width: 100%;
            }
        }


    </style>

<script>
    window.addEventListener('scroll', function () {
        const header = document.getElementById('sticky_bar');
        if (window.scrollY > 100) { // Change 50 to the scroll threshold you want
            header.classList.add('scrolled');

            const logo_black = document.getElementById('logo_black');
            logo_black.style.display="flex";

            const logo_white = document.getElementById('logo_white');
            logo_white.style.display="none";
        } else {
            header.classList.remove('scrolled');

            const logo_black = document.getElementById('logo_black');
            logo_black.style.display="none";
            const logo_white = document.getElementById('logo_white');
            logo_white.style.display="flex";
        }
    });
</script>


    <div class="container max-width header_bar" style="padding:0px;">
            <nav class="navbar custom-padding navbar-expand-lg" style="width:100%;">
                <div class="container-fluid">
                    <a class="navbar-brand" href="{{ url('quick-digital/index') }}">
                        <img id="logo_white" src="{{ asset('front/assets/images/logo_white.png') }}"alt="">
                        <img id="logo_black" src="{{ asset('front/assets/images/logo_black.png') }}"alt="">
                    </a>
                    <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar"  style="width:90% !important"
                        aria-labelledby="offcanvasNavbarLabel">
                        <div class="offcanvas-header">
                            <a class="navbar-brand" href="{{ url('quick-digital/index') }}" style="">
                                <img id="logo_white" class="py-2" height="auto" width="50%"src="{{ asset('front/assets/images/logo_white.png') }}" alt="">
                                <img id="logo_black" class="py-2" height="auto" width="50%"src="{{ asset('front/assets/images/logo_black.png') }}" alt="">
                            </a>
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>

                        <div class="offcanvas-body">
                            <ul class="navbar-nav">

                                @php
                                $active = Session::get('page') == 'quickBusiness_req' ? 'active' : '';
                                @endphp

                                <li class="nav-item hide {{ $active }}">
                                    <a class="nav-link fw-semibold px-md-3" aria-current="page"
                                        href="{{ route('rep.requestForm') }}">
                                        কুইক ব্যাবসা
                                    </a>
                                </li>
                                <!-- <li class="nav-item dropdown hide">
                                    <a class="nav-link dropdown-toggle fw-semibold px-md-3"
                                        href="{{ url('quick-digital/ebook-list') }}" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        ই-বুক
                                    </a>
                                    <ul class="dropdown-menu ">

                                        <li>
                                            <a class="dropdown-item fw-semibold px-md-4 nav-link"
                                                href="{{ url('quick-digital/paikari_bazar') }}">
                                                লাভের খনি পাইকারি বাজার
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item fw-semibold px-md-4 nav-link"
                                                href="{{ url('quick-digital/14-days-online-business') }}">
                                                <span class="font_change">১৪</span> দিনে অনলাইন ব্যবসা
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item fw-semibold px-md-4 nav-link"
                                                href="{{ url('quick-digital/100-business-idea') }}">
                                                <span class="font_change">১০০</span> টা ব্যবসার আইডিয়া
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item fw-semibold px-md-4 nav-link"
                                                href="{{ url('quick-digital/ebook-list') }}">
                                                <span class="font_change">সকল বইগুলো
                                            </a>
                                        </li>
                                    </ul>
                                </li> -->
                                <!-- <li class="nav-item nav-style hide">
                                        <a class="nav-link fw-semibold px-md-3" aria-current="page" href="./ebook.html">ই-বুক</a>
                                    </li> -->

                                <!-- <li class="nav-item hide">
                                    <a class="nav-link fw-semibold px-md-3" aria-current="page"
                                        href="{{ url('quick-digital/courses') }}">
                                        মোবাইল ফ্রিল্যান্সিং
                                    </a>
                                </li> -->
                                <!-- <li class="nav-item dropdown hide">
                                    <a class="nav-link dropdown-toggle fw-semibold px-md-3 d-block" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    কোর্স
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item fw-semibold px-md-2 nav-link" href="{{ url('quick-digital/all-course') }}">
                                                সকল কোর্স
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item fw-semibold px-md-2 nav-link" href="{{ url('quick-digital/courses') }}">
                                            মোবাইল ফ্রিল্যান্সিং
                                            </a>
                                        </li>
                                    </ul>
                                </li> -->
                                <!-- <li class="nav-item hide">
                                    <a class="nav-link fw-semibold px-md-3" aria-current="page"
                                        href="{{ url('quick-digital/digital-products') }}" target="_blank">কুইক শপ</a>
                                </li>
                                -->

                                @php
                                $active = Session::get('page') == 'software' ? 'active' : '';
                                @endphp
                                <li class="nav-item hide {{ $active }}">
                                    <a class="nav-link fw-semibold px-md-3" aria-current="page"
                                        href="{{ route('quick.software') }}">
                                        সফটওয়্যার
                                    </a>
                                </li>

                                @php
                                $active = Session::get('page') == 'digitaProduct' ? 'active' : '';
                                @endphp
                                <li class="nav-item hide {{$active}}">
                                    <a class="nav-link fw-semibold px-md-3" aria-current="page"
                                        href="{{ route('quick.digitalProduct') }}">
                                        ডিজিটাল প্রোডাক্ট
                                    </a>
                                </li>
                                <!-- <li class="nav-item">
                                    <a class="nav-link fw-semibold px-md-3" aria-current="page"
                                        href="{{ url('/') }}">
                                        ডিজিটাল সার্ভিস
                                    </a>
                                </li> -->

                                
                                <!-- @php
                                $active = Session::get('page') == 'training' ? 'active' : '';
                                @endphp 
                                <li class="nav-item hide {{ $active }}">
                                    <a class="nav-link fw-semibold px-md-3" aria-current="page"
                                        href="{{ url('/quick-digital/contact-us') }}">ট্রেইনিং</a>
                                </li> -->

                                @php
                                $active = Session::get('page') == 'contactUs' ? 'active' : '';
                                @endphp
                                <li class="nav-item hide {{ $active }}">
                                    <a class="nav-link fw-semibold px-md-3" aria-current="page"
                                        href="{{ url('/quick-digital/contact-us') }}">যোগাযোগ</a>
                                </li>
                                    <!-- __________________________ user profile li start -->

                                    <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        @if (Auth::guard('user')->check())
                                        @php
                                        $user = Auth::guard('user')->user();
                                        @endphp
                                        @if (!empty($user->image))
                                        <img class="nav__user__img" src="{{ asset('admin/images/user_images/' . $user->image) }}" alt="user image">
                                        @else
                                        <img class="nav__user__img" src="{{ asset('no_image.png') }}" alt="user image">
                                        <!-- <svg height="20px" width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M20 22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13Z">
                                            </path>
                                        </svg> -->
                                        @endif
                                            <!-- <h5 class="m-0" >{{ $user->name }}</h5> -->
                                        @else
                                            <svg height="20px" width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M20 22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13Z">
                                                </path>
                                            </svg>
                                        Guest
                                        @endif
                                    </a>
                                    <ul class="dropdown-menu" style="right: 0 !important; left: inherit !important; min-width:100%;">
                                        <li class="d-flex justify-centent-center flex-column align-items-center mt-3 gap-1 mb-3">
                                            @if (Auth::guard('user')->check())
                                            @php
                                            $user = Auth::guard('user')->user();
                                            @endphp
                                            @if (!empty($user->image))
                                            <img class="nav__user__img__main" src="{{ asset('admin/images/user_images/' . $user->image) }}" alt="user image">
                                            @else
                                            <img class="nav__user__img__main" src="{{ asset('no_image.png') }}" alt="user image">
                                            <!-- <svg class="nav__user__img__main" height="50px" width="50px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M20 22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13Z">
                                                </path>
                                            </svg> -->
                                            @endif
                                            <h4 class="text-center">{{ $user->name }}</h4>
                                            <div class="d-flex gap-2 justify-content-center align-items-center">
                                                <span>{{ $user->email }}</span>
                                                @if ($user->subscription_id && $user->subscription_expire_date > \Carbon\Carbon::now())
                                                @if ($user->subscription_id == 1)
                                                <span class="subscription_badge rounded-pill">সিলভার</span>
                                                @elseif ($user->subscription_id == 2)
                                                <span class="subscription_badge rounded-pill">গোল্ড</span>
                                                @else
                                                <span class="subscription_badge rounded-pill">প্ল্যাটিনাম</span>
                                                @endif
                                                @endif
                                            </div>
                                            @else
                                            <svg height="20px" width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M20 22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13Z">
                                                </path>
                                            </svg>
                                            Guest
                                            @endif
                                        </li>
                                        @if (Auth::guard('user')->check())
                                        @php
                                        $user = Auth::guard('user')->user();
                                        @endphp
                                            @if ($user->is_instructor == 1)
                                            <li>
                                                <a class="dropdown-item user__nav__item d-flex align-items-center gap-3" href="{{ route('user.dashboard') }}">
                                                    <svg class="" height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                        <path d="M7 10H20C20.5523 10 21 10.4477 21 11V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V11C3 10.4477 3.44772 10 4 10H5V9C5 5.13401 8.13401 2 12 2C14.7405 2 17.1131 3.5748 18.2624 5.86882L16.4731 6.76344C15.6522 5.12486 13.9575 4 12 4C9.23858 4 7 6.23858 7 9V10ZM10 15V17H14V15H10Z">
                                                        </path>
                                                    </svg>Instructor Dashboard
                                                </a>
                                            </li>
                                            @endif
                                        @endif
                                        <li>
                                            <a class="dropdown-item user__nav__item d-flex align-items-center gap-3" href="{{ route('user.dashboard') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <rect x="3" y="3" width="7" height="7"></rect>
                                                <rect x="14" y="3" width="7" height="7"></rect>
                                                <rect x="3" y="14" width="7" height="7"></rect>
                                                <rect x="14" y="14" width="7" height="7"></rect>
                                            </svg>
                                                ড্যাশবোর্ড
                                            </a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item user__nav__item d-flex align-items-center gap-3" href="{{ route('user.update') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="5" y="11" width="14" height="10" rx="2" ry="2"></rect>
                                            <path d="M12 11V7a4 4 0 0 1 8 0v4"></path>
                                            <line x1="12" y1="15" x2="12" y2="17"></line>
                                            <line x1="10" y1="17" x2="14" y2="17"></line>
                                            </svg>
                                                প্রোফাইল আপডেট করুন
                                            </a>
                                        </li>

                                        @if (auth()->guard('user')->user()->user_type === 'affiliator')
                                        <li>
                                            <a class="dropdown-item user__nav__item d-flex align-items-center gap-3" href="{{ route('affiliate.account.setup') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <rect x="5" y="11" width="14" height="10" rx="2" ry="2"></rect>
                                            <path d="M12 11V7a4 4 0 0 1 8 0v4"></path>
                                            <line x1="12" y1="15" x2="12" y2="17"></line>
                                            <line x1="10" y1="17" x2="14" y2="17"></line>
                                            </svg>
                                                একাউন্ট সেটআপ করুন
                                            </a>
                                        </li>
                                        @endif
                                        <li>
                                            <a class="dropdown-item user__nav__item d-flex align-items-center gap-3" href="{{ route('password.update') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <circle cx="12" cy="7" r="4"></circle>
                                            <path d="M5.5 21c1.5-4 6.5-4 7-4s5.5 0 7 4"></path>
                                            </svg>
                                                পাসওয়ার্ড পরিবর্তন করুন
                                            </a>
                                        </li>


                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <!-- @if (Auth::guard('user')->check())
                                        @php
                                            $user = Auth::guard('user')->user();
                                        @endphp
                                            @if ($user->is_instructor == 0)
                                            <li>
                                                <form method="POST" action="{{ route('request.instructor') }}">
                                                    @csrf
                                                    <button type="submit" class="dropdown-item user__nav__item d-flex align-items-center gap-3">
                                                        <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                            <path d="M6.00488 9H19.9433L20.4433 7H8.00488V5H21.7241C22.2764 5 22.7241 5.44772 22.7241 6C22.7241 6.08176 22.7141 6.16322 22.6942 6.24254L20.1942 16.2425C20.083 16.6877 19.683 17 19.2241 17H5.00488C4.4526 17 4.00488 16.5523 4.00488 16V4H2.00488V2H5.00488C5.55717 2 6.00488 2.44772 6.00488 3V9ZM6.00488 23C4.90031 23 4.00488 22.1046 4.00488 21C4.00488 19.8954 4.90031 19 6.00488 19C7.10945 19 8.00488 19.8954 8.00488 21C8.00488 22.1046 7.10945 23 6.00488 23ZM18.0049 23C16.9003 23 16.0049 22.1046 16.0049 21C16.0049 19.8954 16.9003 19 18.0049 19C19.1095 19 20.0049 19.8954 20.0049 21C20.0049 22.1046 19.1095 23 18.0049 23Z">
                                                            </path>
                                                        </svg>Become an Instructor
                                                    </button>
                                                </form>
                                            </li>
                                            @endif
                                        @endif -->

                                        <li>
                                            <a class="dropdown-item user__nav__item d-flex align-items-center gap-3" href="{{ url('/user/logout') }}">
                                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                    <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C15.2713 2 18.1757 3.57078 20.0002 5.99923L17.2909 5.99931C15.8807 4.75499 14.0285 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20C14.029 20 15.8816 19.2446 17.2919 17.9998L20.0009 17.9998C18.1765 20.4288 15.2717 22 12 22ZM19 16V13H11V11H19V8L24 12L19 16Z">
                                                    </path>
                                                </svg>
                                                লগ আউট
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- __________________________ user profile li end -->

                            </ul>
                        </div>
                    </div>
                    <!-- {{-- <div class="nav-item btn-stylish rounded-1 bg-danger py-1 px-4 contact-btn">
                        <a class="nav-link text-white fw-semibold py-auto" aria-current="page" href="#">যোগাযোগ</a>
                    </div> --}} -->
                </div>
            </nav>
        </div>

    <!-- ______________________________________________________________ -->
    </div>
    <!-- <div class="header_gap"></div> -->
</header>
