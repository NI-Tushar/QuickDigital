@extends('quick_digital.layout.layout')
@section('content')
<main>
    <section class="header-bg text-white py-5 d-flex flex-column align-items-center justify-content-center gap-5" id="cooming-soon">
        <div class="container max-width custom-padding">
            <div class="d-flex align-items-center justify-content-center flex-column">
                <h1 class="text-one text-center fw-bold">
                    <span class="text-warning">সার্ভিসগুলো পেতে আমাদের সাথে যোগাযোগ করুন। </span>
                </h1>
                <p>
                <div class="d-flex align-items-center justify-content-center gap-2 fs-5">
                    <svg height="20px" width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M21 16.42V19.9561C21 20.4811 20.5941 20.9167 20.0705 20.9537C19.6331 20.9846 19.2763 21 19 21C10.1634 21 3 13.8366 3 5C3 4.72371 3.01545 4.36687 3.04635 3.9295C3.08337 3.40588 3.51894 3 4.04386 3H7.5801C7.83678 3 8.05176 3.19442 8.07753 3.4498C8.10067 3.67907 8.12218 3.86314 8.14207 4.00202C8.34435 5.41472 8.75753 6.75936 9.3487 8.00303C9.44359 8.20265 9.38171 8.44159 9.20185 8.57006L7.04355 10.1118C8.35752 13.1811 10.8189 15.6425 13.8882 16.9565L15.4271 14.8019C15.5572 14.6199 15.799 14.5573 16.001 14.6532C17.2446 15.2439 18.5891 15.6566 20.0016 15.8584C20.1396 15.8782 20.3225 15.8995 20.5502 15.9225C20.8056 15.9483 21 16.1633 21 16.42Z"></path>
                    </svg>
                    <a class="text-decoration-none text-white" href="tel:01973784959">
                        01973784959
                    </a>
                </div>
                </p>
                <p>
                <div class="d-flex align-items-center justify-content-center gap-2 fs-5">
                    <svg height="20px" width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM12.0606 11.6829L5.64722 6.2377L4.35278 7.7623L12.0731 14.3171L19.6544 7.75616L18.3456 6.24384L12.0606 11.6829Z"></path>
                    </svg>
                    <a class="text-decoration-none text-white" href="mailto:quickdigital121@gmail.com">
                        quickdigital121@gmail.com
                    </a>
                </div>
                </p>
            </div>
        </div>
    </section>
    <section class="py-5 digital__services__bg">
        <div class="container max-width custom-padding">
            <h4 class="border-top border-bottom border-black py-4 fs-1 fw-bold mb-4 text-center">আপনার স্বপ্নের <span class="text-primary">"অনলাইন ব্যবসা"</span> – এবার আপনার হাতের মুঠোই</h4>
            <!-- <div class="d-flex justify-content-center col-12 col-md-8 col-lg-8 mx-auto">
                </div> -->
            <div class="row align-items-center gap-5 mb-3">
                <div class="col-12 col-md-4">
                    <img class="container-fluid" src="{{ asset('front/assets/images/digitasl_service_book.jpeg') }}" alt="">
                </div>
                <div class="col-12 col-md-7">
                    <p class="text-two py-3 fs-3">
                        এখন থেকে মাত্র <span class="text-primary">৯৯০৳</span> থেকে শুরু করে আমাদের কাছ থেকে <span class="text-primary">"অনলাইন ব্যবসা"</span>-র জন্য প্রফেশনাল মানের সাপোর্ট সার্ভিস নিতে পারবেন ।
                    </p>
                    <p class="text-two">
                        এই অফারটি সীমিত সময়ের জন্য। তাই যারা অনলাইনে (ওয়েবসাইট) অথবা ফে'স'বু'ক পেজের মাধ্যমে নিজের পছন্দের প্রোডাক্ট বা সার্ভিস নিয়ে ব্যবসা শুরু করতে চাচ্ছেন এই অফারটি হতে পারে আপনার জন্য খুবই উপকারী।
                        এছাড়াও যারা অলরেডি পেইজ নিয়ে কাজ করতেছেন কিন্তু পেইজটি ভালোভাবে সেট-আপ করা নেই তারাও চাইলে প্রফেশনালভাবে নিজের পেইজটিকে সেট-আপ করিয়ে নিতে পারেন।
                    </p>
                    <!-- <div class="d-flex justify-content-center justify-content-md-start pt-4 mb-4">
                            <a class="buy-btn rounded-5" href="#">
                                <button class="btn btn-primary rounded-5 px-3 py-2 fs-3 fw-bold text-white">সার্ভিস নিন</button>
                            </a>
                        </div> -->
                </div>
            </div>
        </div>
    </section>
    <hr class="max-width container custom-padding">
    <section class="py-5">
        <div class="max-width container custom-padding">
            <div class="row align-items-center gap-5">
                <div class="col-12 col-md-4">
                    <img class="img-fluid rounded" src="{{ asset('front/assets/images/qd_ds-1.jpeg') }}" alt="">
                </div>
                <!-- <div class="col-1"></div> -->
                <div class="col-12 col-md-7">
                    <h4 class="fw-semibold">কেন আপনি আমাদের কাছ থেকে <span class="text-primary">"অনলাইন ব্যবসা"</span>-র জন্য সাপোর্ট সার্ভিসটি নিবেন? </h4>
                    <div class="d-flex gap-3">
                        <div>
                            <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="rgba(36,178,55,1)">
                                <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM11.0026 16L6.75999 11.7574L8.17421 10.3431L11.0026 13.1716L16.6595 7.51472L18.0737 8.92893L11.0026 16Z"></path>
                            </svg>
                        </div>
                        <h6 class="fs-5">আমরা ফেসবুক অ্যালগরিদম অনুসারে কাজ করি তাই প্রফেশনাল ফেসবুক পেইজ সেটআপের পর বুস্ট ছাড়াই ক্রমাগত আপনার অর্গানিক কাস্টমার ও বিক্রয় বৃদ্ধি পাবে।</h6>
                    </div>
                    <div class="d-flex gap-3">
                        <div>
                            <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="rgba(36,178,55,1)">
                                <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM11.0026 16L6.75999 11.7574L8.17421 10.3431L11.0026 13.1716L16.6595 7.51472L18.0737 8.92893L11.0026 16Z"></path>
                            </svg>
                        </div>
                        <h6 class="fs-5">অর্গানিক রিচ , এংগেজমেন্ট , লা'ই'ক ও ফ'লো'য়া'র বৃদ্ধি পাবে প্রফেশনাল ফেসবুক পেইজ সেটআপের মাধ্যমে।</h6>
                    </div>
                    <div class="d-flex gap-3">
                        <div>
                            <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="rgba(36,178,55,1)">
                                <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM11.0026 16L6.75999 11.7574L8.17421 10.3431L11.0026 13.1716L16.6595 7.51472L18.0737 8.92893L11.0026 16Z"></path>
                            </svg>
                        </div>
                        <h6 class="fs-5">২৯০টি এর অধিক বিজনেস পেইজ সেট-আপ করার বাস্তব অভিজ্ঞতা রয়েছে আমাদের।</h6>
                    </div>
                    <div class="d-flex gap-3">
                        <div>
                            <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="rgba(36,178,55,1)">
                                <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM11.0026 16L6.75999 11.7574L8.17421 10.3431L11.0026 13.1716L16.6595 7.51472L18.0737 8.92893L11.0026 16Z"></path>
                            </svg>
                        </div>
                        <h6 class="fs-5">ল্যান্ডিং পেজ তৈরী করে আপনার ব্যবসাকে পৌঁছে দিন সবার কাছে।</h6>
                    </div>
                    <div class="d-flex gap-3">
                        <div>
                            <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="rgba(36,178,55,1)">
                                <path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM11.0026 16L6.75999 11.7574L8.17421 10.3431L11.0026 13.1716L16.6595 7.51472L18.0737 8.92893L11.0026 16Z"></path>
                            </svg>
                        </div>
                        <h6 class="fs-5">আমাদের নিজস্ব ষ্টুডিও (বারিধারা DOHS)-তে এসে আপনি ভিডিও মেকিং সার্ভিস নিতে পারবেন। </h6>
                    </div>
                    <!-- <div class="d-flex justify-content-center justify-content-md-start mt-3">
                            <a class="fw-bold bg-primary rounded-3 text-white text-decoration-none px-3 py-2" href="#">আরো জানুন</a>
                        </div> -->
                </div>
            </div>
            <hr class="my-5">
            <div class="row align-items-center gap-5">
                <div class="col-12 col-md-4">
                    <img class="img-fluid rounded" src="{{ asset('front/assets/images/qd_ds-2.jpeg') }}" alt="">
                </div>
                <!-- <div class="col-1"></div> -->
                <div class="col-12 col-md-7">
                    <h4 class="fw-semibold">এছাড়াও আমাদের থেকে যেসব সার্ভিসগুলো পাবেন - </h4>
                    <div class="d-flex gap-3">
                        <div>
                            <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="rgba(27,140,68,1)">
                                <path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path>
                            </svg>
                        </div>
                        <h6 class="fs-5">ফেসবুক মার্কেটিং স্ট্রাটেজি & প্লানিং</h6>
                    </div>
                    <div class="d-flex gap-3">
                        <div>
                            <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="rgba(27,140,68,1)">
                                <path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path>
                            </svg>
                        </div>
                        <h6 class="fs-5">পেজ সেট-আপ & ডেভেলপমেন্ট,</h6>
                    </div>
                    <div class="d-flex gap-3">
                        <div>
                            <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="rgba(27,140,68,1)">
                                <path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path>
                            </svg>
                        </div>
                        <h6 class="fs-5">ভিডিও মেকিং, ভিডিও এডিটিং, ইমেজ এডিটিং এবং সকল ধরণের এডিটিং সার্ভিস</h6>
                    </div>
                    <div class="d-flex gap-3">
                        <div>
                            <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="rgba(27,140,68,1)">
                                <path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path>
                            </svg>
                        </div>
                        <h6 class="fs-5">মিডিয়া বাইয়িং (সকল সোশ্যাল মিডিয়া এড ক্যাম্পেইন)</h6>
                    </div>
                    <div class="d-flex gap-3">
                        <div>
                            <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="rgba(27,140,68,1)">
                                <path d="M13.1717 12.0007L8.22192 7.05093L9.63614 5.63672L16.0001 12.0007L9.63614 18.3646L8.22192 16.9504L13.1717 12.0007Z"></path>
                            </svg>
                        </div>
                        <h6 class="fs-5">ল্যান্ডিং পেজ, ওয়েবসাইট তৈরী এবং (SEO) এসইও সার্ভিস</h6>
                    </div>
                    <!-- <div class="d-flex justify-content-center justify-content-md-start mt-3">
                            <a class="fw-bold bg-primary rounded-3 text-white text-decoration-none px-3 py-2" href="#">আরো জানুন</a>
                        </div> -->
                </div>
            </div>
        </div>
    </section>
</main>
@endsection