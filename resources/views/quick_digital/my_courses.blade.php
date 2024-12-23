@extends('quick_digital.layout.layout')
@section('content')
    <section class="my-5 container max-width custom-padding">
        <div class="row gap-5">
            <div class="col-md-8 order-md-2 shadow rounded">
                <div class="p-3">
                    <h4>রেকর্ডেড ক্লাস</h4>
                    <div class="table-responsive">
                        <table class="course_table table align-middle text-center g-4">
                            <tr>
                                <td class="d-flex gap-3 align-items-center">
                                    <div class="course_img_container">
                                        <img class="img-fluid rounded w-100"
                                        src="{{ asset('front/assets/images/about-img.jpg') }}" alt="">
                                        <div class="course_play">
                                            <svg class="text-white" height="45px" width="45px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M19.376 12.4161L8.77735 19.4818C8.54759 19.635 8.23715 19.5729 8.08397 19.3432C8.02922 19.261 8 19.1645 8 19.0658V4.93433C8 4.65818 8.22386 4.43433 8.5 4.43433C8.59871 4.43433 8.69522 4.46355 8.77735 4.5183L19.376 11.584C19.6057 11.7372 19.6678 12.0477 19.5146 12.2774C19.478 12.3323 19.4309 12.3795 19.376 12.4161Z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <h6 class="m-0">মোবাইল ভিডিও এডিটিং কোর্স</h6>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM13 12H17V14H11V7H13V12Z"></path></svg>
                                        <span class="font_change">১০ মি:</span>
                                    </div>
                                </td>
                                <td class="font_change">০৬-১০-২০২৪</td>
                                <td>
                                    <a class="text-decoration-none py-2 px-3 rounded course_button" href="{{ route('quick_digital.video') }}">শুরু করুন</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="d-flex gap-3 align-items-center">
                                    <div class="course_img_container">
                                        <img class="img-fluid rounded w-100"
                                        src="{{ asset('front/assets/images/about-img.jpg') }}" alt="">
                                        <div class="course_play">
                                            <svg class="text-white" height="45px" width="45px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M19.376 12.4161L8.77735 19.4818C8.54759 19.635 8.23715 19.5729 8.08397 19.3432C8.02922 19.261 8 19.1645 8 19.0658V4.93433C8 4.65818 8.22386 4.43433 8.5 4.43433C8.59871 4.43433 8.69522 4.46355 8.77735 4.5183L19.376 11.584C19.6057 11.7372 19.6678 12.0477 19.5146 12.2774C19.478 12.3323 19.4309 12.3795 19.376 12.4161Z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <h6 class="m-0">মোবাইল ভিডিও এডিটিং কোর্স</h6>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM13 12H17V14H11V7H13V12Z"></path></svg>
                                        <span class="font_change">১০ মি:</span>
                                    </div>
                                </td>
                                <td class="font_change">০৬-১০-২০২৪</td>
                                <td>
                                    <a class="text-decoration-none py-2 px-3 rounded course_button" href="{{ route('quick_digital.video') }}">শুরু করুন</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="d-flex gap-3 align-items-center">
                                    <div class="course_img_container">
                                        <img class="img-fluid rounded w-100"
                                        src="{{ asset('front/assets/images/about-img.jpg') }}" alt="">
                                        <div class="course_play">
                                            <svg class="text-white" height="45px" width="45px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M19.376 12.4161L8.77735 19.4818C8.54759 19.635 8.23715 19.5729 8.08397 19.3432C8.02922 19.261 8 19.1645 8 19.0658V4.93433C8 4.65818 8.22386 4.43433 8.5 4.43433C8.59871 4.43433 8.69522 4.46355 8.77735 4.5183L19.376 11.584C19.6057 11.7372 19.6678 12.0477 19.5146 12.2774C19.478 12.3323 19.4309 12.3795 19.376 12.4161Z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <h6 class="m-0">মোবাইল ভিডিও এডিটিং কোর্স</h6>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM13 12H17V14H11V7H13V12Z"></path></svg>
                                        <span class="font_change">১০ মি:</span>
                                    </div>
                                </td>
                                <td class="font_change">০৬-১০-২০২৪</td>
                                <td>
                                    <a class="text-decoration-none py-2 px-3 rounded course_button" href="{{ route('quick_digital.video') }}">শুরু করুন</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <hr class="my-4">
                    <h4>ফেসবুক লাইভ ক্লাস</h4>
                    <div class="table-responsive">
                        <table class="course_table table align-middle text-center g-4">
                            <tr>
                                <td class="d-flex gap-3 align-items-center">
                                    <div class="course_img_container">
                                        <img class="img-fluid rounded w-100"
                                        src="{{ asset('front/assets/images/about-img.jpg') }}" alt="">
                                        <div class="course_play">
                                            <svg class="text-white" height="45px" width="45px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M19.376 12.4161L8.77735 19.4818C8.54759 19.635 8.23715 19.5729 8.08397 19.3432C8.02922 19.261 8 19.1645 8 19.0658V4.93433C8 4.65818 8.22386 4.43433 8.5 4.43433C8.59871 4.43433 8.69522 4.46355 8.77735 4.5183L19.376 11.584C19.6057 11.7372 19.6678 12.0477 19.5146 12.2774C19.478 12.3323 19.4309 12.3795 19.376 12.4161Z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <h6 class="m-0">মোবাইল ভিডিও এডিটিং কোর্স</h6>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM13 12H17V14H11V7H13V12Z"></path></svg>
                                        <span class="font_change">১০ মি:</span>
                                    </div>
                                </td>
                                <td class="font_change">০৬-১০-২০২৪</td>
                                <td>
                                    <a class="text-decoration-none py-2 px-3 rounded course_button" href="{{ route('quick_digital.video') }}">শুরু করুন</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="d-flex gap-3 align-items-center">
                                    <div class="course_img_container">
                                        <img class="img-fluid rounded w-100"
                                        src="{{ asset('front/assets/images/about-img.jpg') }}" alt="">
                                        <div class="course_play">
                                            <svg class="text-white" height="45px" width="45px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M19.376 12.4161L8.77735 19.4818C8.54759 19.635 8.23715 19.5729 8.08397 19.3432C8.02922 19.261 8 19.1645 8 19.0658V4.93433C8 4.65818 8.22386 4.43433 8.5 4.43433C8.59871 4.43433 8.69522 4.46355 8.77735 4.5183L19.376 11.584C19.6057 11.7372 19.6678 12.0477 19.5146 12.2774C19.478 12.3323 19.4309 12.3795 19.376 12.4161Z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <h6 class="m-0">মোবাইল ভিডিও এডিটিং কোর্স</h6>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM13 12H17V14H11V7H13V12Z"></path></svg>
                                        <span class="font_change">১০ মি:</span>
                                    </div>
                                </td>
                                <td class="font_change">০৬-১০-২০২৪</td>
                                <td>
                                    <a class="text-decoration-none py-2 px-3 rounded course_button" href="{{ route('quick_digital.video') }}">শুরু করুন</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="d-flex gap-3 align-items-center">
                                    <div class="course_img_container">
                                        <img class="img-fluid rounded w-100"
                                        src="{{ asset('front/assets/images/about-img.jpg') }}" alt="">
                                        <div class="course_play">
                                            <svg class="text-white" height="45px" width="45px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M19.376 12.4161L8.77735 19.4818C8.54759 19.635 8.23715 19.5729 8.08397 19.3432C8.02922 19.261 8 19.1645 8 19.0658V4.93433C8 4.65818 8.22386 4.43433 8.5 4.43433C8.59871 4.43433 8.69522 4.46355 8.77735 4.5183L19.376 11.584C19.6057 11.7372 19.6678 12.0477 19.5146 12.2774C19.478 12.3323 19.4309 12.3795 19.376 12.4161Z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <h6 class="m-0">মোবাইল ভিডিও এডিটিং কোর্স</h6>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM13 12H17V14H11V7H13V12Z"></path></svg>
                                        <span class="font_change">১০ মি:</span>
                                    </div>
                                </td>
                                <td class="font_change">০৬-১০-২০২৪</td>
                                <td>
                                    <a class="text-decoration-none py-2 px-3 rounded course_button" href="{{ route('quick_digital.video') }}">শুরু করুন</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <hr class="my-4">
                    <h4><span class="text-primary">ZOOM</span> লাইভ ক্লাস</h4>
                    <div class="table-responsive">
                        <table class="course_table table align-middle text-center g-4">
                            <tr>
                                <td class="d-flex gap-3 align-items-center">
                                    <div class="course_img_container">
                                        <img class="img-fluid rounded w-100"
                                        src="{{ asset('front/assets/images/about-img.jpg') }}" alt="">
                                        <div class="course_play">
                                            <svg class="text-white" height="45px" width="45px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M19.376 12.4161L8.77735 19.4818C8.54759 19.635 8.23715 19.5729 8.08397 19.3432C8.02922 19.261 8 19.1645 8 19.0658V4.93433C8 4.65818 8.22386 4.43433 8.5 4.43433C8.59871 4.43433 8.69522 4.46355 8.77735 4.5183L19.376 11.584C19.6057 11.7372 19.6678 12.0477 19.5146 12.2774C19.478 12.3323 19.4309 12.3795 19.376 12.4161Z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <h6 class="m-0">মোবাইল ভিডিও এডিটিং কোর্স</h6>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM13 12H17V14H11V7H13V12Z"></path></svg>
                                        <span class="font_change">১০ মি:</span>
                                    </div>
                                </td>
                                <td class="font_change">০৬-১০-২০২৪</td>
                                <td>
                                    <a class="text-decoration-none py-2 px-3 rounded course_button" href="{{ route('quick_digital.video') }}">শুরু করুন</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="d-flex gap-3 align-items-center">
                                    <div class="course_img_container">
                                        <img class="img-fluid rounded w-100"
                                        src="{{ asset('front/assets/images/about-img.jpg') }}" alt="">
                                        <div class="course_play">
                                            <svg class="text-white" height="45px" width="45px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M19.376 12.4161L8.77735 19.4818C8.54759 19.635 8.23715 19.5729 8.08397 19.3432C8.02922 19.261 8 19.1645 8 19.0658V4.93433C8 4.65818 8.22386 4.43433 8.5 4.43433C8.59871 4.43433 8.69522 4.46355 8.77735 4.5183L19.376 11.584C19.6057 11.7372 19.6678 12.0477 19.5146 12.2774C19.478 12.3323 19.4309 12.3795 19.376 12.4161Z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <h6 class="m-0">মোবাইল ভিডিও এডিটিং কোর্স</h6>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM13 12H17V14H11V7H13V12Z"></path></svg>
                                        <span class="font_change">১০ মি:</span>
                                    </div>
                                </td>
                                <td class="font_change">০৬-১০-২০২৪</td>
                                <td>
                                    <a class="text-decoration-none py-2 px-3 rounded course_button" href="{{ route('quick_digital.video') }}">শুরু করুন</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="d-flex gap-3 align-items-center">
                                    <div class="course_img_container">
                                        <img class="img-fluid rounded w-100"
                                        src="{{ asset('front/assets/images/about-img.jpg') }}" alt="">
                                        <div class="course_play">
                                            <svg class="text-white" height="45px" width="45px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M19.376 12.4161L8.77735 19.4818C8.54759 19.635 8.23715 19.5729 8.08397 19.3432C8.02922 19.261 8 19.1645 8 19.0658V4.93433C8 4.65818 8.22386 4.43433 8.5 4.43433C8.59871 4.43433 8.69522 4.46355 8.77735 4.5183L19.376 11.584C19.6057 11.7372 19.6678 12.0477 19.5146 12.2774C19.478 12.3323 19.4309 12.3795 19.376 12.4161Z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <h6 class="m-0">মোবাইল ভিডিও এডিটিং কোর্স</h6>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM13 12H17V14H11V7H13V12Z"></path></svg>
                                        <span class="font_change">১০ মি:</span>
                                    </div>
                                </td>
                                <td class="font_change">০৬-১০-২০২৪</td>
                                <td>
                                    <a class="text-decoration-none py-2 px-3 rounded course_button" href="{{ route('quick_digital.video') }}">শুরু করুন</a>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3 order-md-1">
                <div class="shadow py-3 rounded">
                    <div class="d-flex justify-centent-center flex-column align-items-center mt-3 gap-1 mb-3">
                        @if (Auth::guard('user')->check())
                            @php
                                $user = Auth::guard('user')->user();
                            @endphp
                            @if (!empty($user->image))
                                <img class="nav__user__img__main"
                                    src="{{ asset('admin/images/user_images/' . $user->image) }}" alt="">
                            @else
                                <svg class="nav__user__img__main" height="50px" width="50px"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M20 22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13Z">
                                    </path>
                                </svg>
                            @endif
                            <h4 class="text-center">{{ $user->name }}</h4>
                            <span>{{ $user->email }}</span>
                        @else
                            <svg height="20px" width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M20 22H4V20C4 17.2386 6.23858 15 9 15H15C17.7614 15 20 17.2386 20 20V22ZM12 13C8.68629 13 6 10.3137 6 7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7C18 10.3137 15.3137 13 12 13Z">
                                </path>
                            </svg>
                            Guest
                        @endif
                    </div>
                    <div class="py-2 px-4">
                        <a class="dropdown-item user__nav__item d-flex align-items-center gap-3"
                            href="{{ url('/quick-digital/update-password') }}">
                            <svg class="" height="16px" width="16px" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24" fill="currentColor">
                                <path
                                    d="M7 10H20C20.5523 10 21 10.4477 21 11V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V11C3 10.4477 3.44772 10 4 10H5V9C5 5.13401 8.13401 2 12 2C14.7405 2 17.1131 3.5748 18.2624 5.86882L16.4731 6.76344C15.6522 5.12486 13.9575 4 12 4C9.23858 4 7 6.23858 7 9V10ZM10 15V17H14V15H10Z">
                                </path>
                            </svg>পাসওয়ার্ড চেঞ্জ
                        </a>
                    </div>
                    <div class="py-2 px-4">
                        <a class="dropdown-item user__nav__item d-flex align-items-center gap-3"
                            href="{{ url('/quick-digital/update-profile') }}">
                            <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M2 3.9934C2 3.44476 2.45531 3 2.9918 3H21.0082C21.556 3 22 3.44495 22 3.9934V20.0066C22 20.5552 21.5447 21 21.0082 21H2.9918C2.44405 21 2 20.5551 2 20.0066V3.9934ZM6 15V17H18V15H6ZM6 7V13H12V7H6ZM14 7V9H18V7H14ZM14 11V13H18V11H14ZM8 9H10V11H8V9Z">
                                </path>
                            </svg>
                            প্রোফাইল আপডেট
                        </a>
                    </div>
                    <div class="py-2 px-4">
                        <a class="dropdown-item user__nav__item d-flex align-items-center gap-3"
                            href="{{ url('/quick-digital/my-courses') }}">
                            <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M4.87759 3.00275H19.1319C19.4518 3.00275 19.7524 3.15583 19.9406 3.41457L23.7634 8.67097C23.9037 8.86385 23.8882 9.12895 23.7265 9.30419L12.3721 21.6047C12.1848 21.8076 11.8685 21.8203 11.6656 21.633C11.6591 21.627 7.86486 17.5174 0.282992 9.30419C0.121226 9.12895 0.10575 8.86385 0.246026 8.67097L4.06886 3.41457C4.25704 3.15583 4.55766 3.00275 4.87759 3.00275ZM5.38682 5.00275L2.58738 8.85198L12.0047 19.0541L21.4221 8.85198L18.6226 5.00275H5.38682Z">
                                </path>
                            </svg>আমার কোর্স
                        </a>
                    </div>
                    <div class="py-2 px-4">
                        <a class="dropdown-item user__nav__item d-flex align-items-center gap-3"
                            href="{{ url('/quick-digital/my-orders') }}">
                            <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="currentColor">
                                <path
                                    d="M6.00488 9H19.9433L20.4433 7H8.00488V5H21.7241C22.2764 5 22.7241 5.44772 22.7241 6C22.7241 6.08176 22.7141 6.16322 22.6942 6.24254L20.1942 16.2425C20.083 16.6877 19.683 17 19.2241 17H5.00488C4.4526 17 4.00488 16.5523 4.00488 16V4H2.00488V2H5.00488C5.55717 2 6.00488 2.44772 6.00488 3V9ZM6.00488 23C4.90031 23 4.00488 22.1046 4.00488 21C4.00488 19.8954 4.90031 19 6.00488 19C7.10945 19 8.00488 19.8954 8.00488 21C8.00488 22.1046 7.10945 23 6.00488 23ZM18.0049 23C16.9003 23 16.0049 22.1046 16.0049 21C16.0049 19.8954 16.9003 19 18.0049 19C19.1095 19 20.0049 19.8954 20.0049 21C20.0049 22.1046 19.1095 23 18.0049 23Z">
                                </path>
                            </svg>আমার অর্ডার
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection
