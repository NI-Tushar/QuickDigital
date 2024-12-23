@extends('quick_digital.layout.layout')
@section('content')
<main>
    <section class="hero text-white">
        <div class="text-white bg-headline">
            <h4 class="container max-width text-center fw-bold py-4 fs-3 custom-padding">আলহামদুলিল্লাহ্ ! ইতমধ্যে কোর্সে <span class="text-black "><u>১ হাজার +</u></span> শিক্ষার্থী জয়েন করেছেন</h4>
        </div>
        <div class="d-flex flex-column">
            <div class="container max-width d-flex flex-column align-items-center custom-padding">
                <div>
                    <h1 class="fw-bold text-center py-3 text-one">
                        মোবাইল দিয়ে ভিডিও এডিটিং করে আমি যেভাবে প্রতিমাসে লক্ষ টাকা ইনকাম করি, তার সম্পূর্ণ সিক্রেট
                        ফর্মুলা শেয়ার করবো এই কোর্সে।
                    </h1>
                </div>
                <div>
                    <h4 class="text-two lh-base description py-3 text-warning fw-semibold text-center">
                        ভিডিও এডিটিং একটি গতিশীল ইন্ডাস্ট্রি। সময়ের সাথে সাথে এডিটরের চাহিদা দিনে দিনে বেড়ে ই চলছে।
                        আজকাল ইউটিউব, ফেসবুক, টিকটক যাতীয় সোশ্যাল মিডিয়ার জন্য নতুন নতুন কর্মক্ষেত্রের সূচনা হচ্ছে।
                        ভিডিও এডিটিং শেখার পরে প্রথমে জুনিয়র তারপর সিনিয়র এডিটর হওয়া যায়। আপনার পারফর্মেন্স যদি দিন
                        দিন ভালো হতে থাকে তবে খুব সহজেই হেড অফ ভিডিও এডিটিং এবং তার পর পুরো প্রোডাকশনে হাউজের ভিডিও
                        এডিটিং ম্যানেজার পদে উন্নত হওয়া যায়। উক্ত পদগুলোর বেতন সীমানা আমাদের কল্পনার বাইরে।
                    </h4>
                </div>
                <div class="d-flex flex-column justify-content-center align-items-center col-md-8 py-3">
                    <div class="iframe-wrapper">
                        <iframe src="https://www.youtube.com/embed/fU8PWHhYXek?si=NmiOFXdx7Dcllx4Z" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                    <p class="text-white text-center fw-bold fs-4 fs-sm-5 pt-4 pb-2">কোর্সের প্রাইস জানতে এবং জয়েন করতে নিচের <span class="text-danger">"জয়েন করতে চাই"</span> বাটন এ ক্লিক করুন </p>
                    <a class="join-btn rounded-5 my-2" href="{{ url('quick-digital/mobile-video-checkout') }}">
                        <button class="btn btn-danger rounded-5 px-3 py-2 fs-3 fw-bold">জয়েন করতে চাই</button>
                    </a>
                </div>
            </div>
            <div class="shapes-container d-flex mt-3">
                <div id="right-box"></div>
                <div id="left-box"></div>
            </div>
        </div>
    </section>
    <section class="why-learn my-5 container max-width custom-padding">
        <h4 class="why-learn-heading fs-2 fs-sm-4 fw-bold py-4 px-1 text-center text-white rounded-3">
            কেন শিখবেন মোবাইল দিয়ে ভিডিও এডিটিং?
        </h4>
        <div class="py-3">
            <div class="row justify-content-evenly align-items-center">
                <!-- <div class="col-md-5 d-flex flex-column gap-3 align-items-center p-3 shadow rounded-3 text-center">
                        <i aria-hidden="true" class="fas fa-award text-primary fs-2"></i>
                        <h3>অন্যের উপর নির্ভরশীল না হয়ে, <br> আত্মনির্ভরশীল ও সাহসী হয়ে উঠুন</h3>
                        <p>
                            অন্যের উপর নির্ভরশীল না হয়ে, আত্মনির্ভরশীল ও সাহসী হয়ে উঠুন। নিজের শক্তি ও দক্ষতার উপর
                            বিশ্বাস রাখুন এবং নিজের সিদ্ধান্তে আত্মবিশ্বাসী হন। চ্যালেঞ্জগুলোকে সুযোগ হিসেবে গ্রহণ করুন
                            এবং সেগুলো মোকাবিলা করতে সাহসী হোন।
                        </p>
                    </div>
                    <div class="col-md-5 d-flex flex-column gap-3 align-items-center p-3 shadow rounded-3 text-center">
                        <i aria-hidden="true" class="fas fa-award text-primary fs-2"></i>
                        <h3>অন্যের উপর নির্ভরশীল না হয়ে, <br> আত্মনির্ভরশীল ও সাহসী হয়ে উঠুন</h3>
                        <p class="">
                            অন্যের উপর নির্ভরশীল না হয়ে, আত্মনির্ভরশীল ও সাহসী হয়ে উঠুন। নিজের শক্তি ও দক্ষতার উপর
                            বিশ্বাস রাখুন এবং নিজের সিদ্ধান্তে আত্মবিশ্বাসী হন। চ্যালেঞ্জগুলোকে সুযোগ হিসেবে গ্রহণ করুন
                            এবং সেগুলো মোকাবিলা করতে সাহসী হোন।
                        </p>
                    </div>
                    <div class="col-md-5 d-flex flex-column gap-3 align-items-center p-3 shadow rounded-3 text-center">
                        <i aria-hidden="true" class="fas fa-award text-primary fs-2"></i>
                        <h3>অন্যের উপর নির্ভরশীল না হয়ে, <br> আত্মনির্ভরশীল ও সাহসী হয়ে উঠুন</h3>
                        <p>
                            অন্যের উপর নির্ভরশীল না হয়ে, আত্মনির্ভরশীল ও সাহসী হয়ে উঠুন। নিজের শক্তি ও দক্ষতার উপর
                            বিশ্বাস রাখুন এবং নিজের সিদ্ধান্তে আত্মবিশ্বাসী হন। চ্যালেঞ্জগুলোকে সুযোগ হিসেবে গ্রহণ করুন
                            এবং সেগুলো মোকাবিলা করতে সাহসী হোন।
                        </p>
                    </div>
                    <div class="col-md-5 d-flex flex-column gap-3 align-items-center p-3 shadow rounded-3 text-center">
                        <i aria-hidden="true" class="fas fa-award text-primary fs-2"></i>
                        <h3>অন্যের উপর নির্ভরশীল না হয়ে, <br> আত্মনির্ভরশীল ও সাহসী হয়ে উঠুন</h3>
                        <p class="">
                            অন্যের উপর নির্ভরশীল না হয়ে, আত্মনির্ভরশীল ও সাহসী হয়ে উঠুন। নিজের শক্তি ও দক্ষতার উপর
                            বিশ্বাস রাখুন এবং নিজের সিদ্ধান্তে আত্মবিশ্বাসী হন। চ্যালেঞ্জগুলোকে সুযোগ হিসেবে গ্রহণ করুন
                            এবং সেগুলো মোকাবিলা করতে সাহসী হোন।
                        </p>
                    </div> -->
                <div class="why-mve-container">
                    <img class="container-fluid" src="{{ asset('front//assets/images/why-mve.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <section class="why-us py-3">
        <div class="container max-width custom-padding">
            <h4 class="why-learn-heading fs-2 fs-sm-4 fw-bold py-4 px-1 text-center text-white rounded-3 mt-5">
                আমাদের কোর্সেই কেন জয়েন করবেন?
            </h4>

            <div class="py-3">
                <div class="row justify-content-evenly align-items-center gap-5">
                    <!-- <div class="col-md-5 d-flex flex-column gap-3 align-items-center p-3 shadow rounded-3 text-center bg-white mb-md-5">
                            <div class="m-5">
                                <img class="image-fluid" src="/assets/images/point-2.webp" alt="">
                            </div>
                            <p>
                                ভিডিও দেখতে কোন প্রকার বোরিং ফিল হবে না। মনে আনন্দ নিয়ে ভিডিও দেখবেন এবং প্র্যাকটিস করবেন।
                                প্রতিটি টপিকের উপর ছোট ছোট ভিডিও করা, সো খুব সহজে সবকিছু বুঝতে পারবেন, ইনশাআল্লাহ্‌।
                            </p>
                        </div>
                        <div class="col-md-5 d-flex flex-column gap-3 align-items-center p-3 shadow rounded-3 text-center bg-white mb-md-5">
                            <div class="m-5">
                                <img class="image-fluid" src="/assets/images/point-6.webp" alt="">
                            </div>
                            <p class="">
                                কোর্স দেখার সময় কোন কিছু না বুঝলে, কোথায় আটকে গেলে সাপোর্ট এক্সপার্ট থেকে হেল্প নিয়ে আপনার
                                সকল সমস্যার সমাধান করে নিতে পারবেন, ইনশাআল্লাহ্‌।
                            </p>
                        </div> -->
                    <div class="col-12">
                        <img class="container-fluid rounded-5" src="{{ asset('front/assets/images/why-join-mve.jpg') }}" alt="">
                    </div>
                    <div class="col-12 col-lg-5 d-flex flex-column gap-3 align-items-center p-3 shadow rounded-3 text-center bg-white mb-md-5 cls-border">
                        <div class="img-support">
                            <img class="image-fluid" src="{{ asset('front/assets/images/point-2.webp') }}" alt="">
                        </div>
                        <p class="text-two fw-semibold text-center">
                            ভিডিও দেখতে বোরিং ফিল হবে না। আনন্দ নিয়ে ভিডিও দেখুন এবং অনুশীলন করুন। প্রতিটি টপিকের উপর ছোট ছোট ভিডিওতে বিষয়টি সহজেই বুঝতে পারবেন, ইনশাআল্লাহ্‌।
                        </p>
                    </div>
                    <div class="col-12 col-lg-5 d-flex flex-column gap-3 align-items-center p-3 shadow rounded-3 text-center bg-white mb-md-5 cls-border">
                        <div class="img-support">
                            <img class="image-fluid" src="{{ asset('front/assets/images/point-6.webp') }}" alt="">
                        </div>
                        <p class="text-two fw-semibold text-center">
                            কোর্স দেখার সময় কোন কিছু না বুঝলে, কোথাও আটকে গেলে, সাপোর্ট এক্সপার্টের সাহায্য নিয়ে আপনার
                            সমস্যার সমাধান সহজেই করে নিতে পারবেন, ইনশাআল্লাহ্‌।
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="what-you-will-learn py-3">
        <div class="container max-width custom-padding">
            <h4 class="what-you-will-learn-heading fs-2 fs-sm-4 fw-bold py-4 text-center rounded-3 container mt-5">
                কি কি শিখতে পারবেন এই কোর্স থেকে?
            </h4>
            <div class="container">
                <div class="container my-3">
                    <div class="d-flex align-items-center gap-3 py-2 border-bottom border-white">
                        <i class="fa-solid fa-circle-check text-success fs-3"></i>
                        <p class="text-white my-auto text-two text-start">মোবাইলের মাধ্যমে টার্মিনোলজি এবং ওয়ার্কফ্লো সহ ভিডিও
                            এডিটিং-এর বেসিক কনসেপ্ট।</p>
                    </div>
                    <div class="d-flex align-items-center gap-3 py-2 border-bottom border-white my-2">
                        <i class="fa-solid fa-circle-check text-success fs-3"></i>
                        <p class="text-white my-auto text-two text-start">ভিডিও এডিটিং সফটওয়্যারের দক্ষতা যেমন ইম্পোর্ট, ট্রিমিং
                            এবং ভিডিও ফাইল এক্সপোর্ট করা।</p>
                    </div>
                    <div class="d-flex align-items-center gap-3 py-2 border-bottom border-white my-2">
                        <i class="fa-solid fa-circle-check text-success fs-3"></i>
                        <p class="text-white my-auto text-two text-start">ফ্রেমিং, শট সাইজ এবং ক্যামেরা মুভমেন্ট সহ ভিডিও কম্পোজিশন
                            বোঝা।</p>
                    </div>
                    <div class="d-flex align-items-center gap-3 py-2 border-bottom border-white my-2">
                        <i class="fa-solid fa-circle-check text-success fs-3"></i>
                        <p class="text-white my-auto text-two text-start">বিভিন্ন ভিডিও ফরম্যাটের জ্ঞান এবং কীভাবে এর মধ্যে ফাইল
                            কনভার্ট করতে হয়।</p>
                    </div>
                    <div class="d-flex align-items-center gap-3 py-2 border-bottom border-white my-2">
                        <i class="fa-solid fa-circle-check text-success fs-3"></i>
                        <p class="text-white my-auto text-two text-start">আকর্ষণীয় ভিডিও তৈরি করার প্রয়োজনীয় টেকনিক , যেমন : কালার
                            করেকশন, কালার গ্রেডিং এবং ভিজ্যুয়াল এফেক্ট ব্যবহারের দক্ষতা।</p>
                    </div>
                    <div class="d-flex align-items-center gap-3 py-2 border-bottom border-white my-2">
                        <i class="fa-solid fa-circle-check text-success fs-3"></i>
                        <p class="text-white my-auto text-two text-start">সাউন্ড ডিজাইন সম্পর্কে জ্ঞান, যার মধ্যে অডিও রেকর্ডিং এবং
                            এডিটিং করা এবং সাউন্ড ইফেক্ট যোগ করা এবং ভিডিও থেকে মিউজিক।</p>
                    </div>
                    <div class="d-flex align-items-center gap-3 py-2 border-bottom border-white my-2">
                        <i class="fa-solid fa-circle-check text-success fs-3"></i>
                        <p class="text-white my-auto text-two text-start">বিভিন্ন কর্মক্ষেত্রে ভিডিও এডিটিং-এর ভূমিকা বোঝা, যেমন :
                            টেলিভিশন, ফিল্ম, এডভার্টাইজিং এবং সোশ্যাল মিডিয়া।</p>
                    </div>
                    <div class="d-flex align-items-center gap-3 py-2 border-bottom border-white my-2">
                        <i class="fa-solid fa-circle-check text-success fs-3"></i>
                        <p class="text-white my-auto text-two text-start">যোগাযোগে দক্ষতা সহ একটি ভিডিও প্রোডাকশন টিমে অন্যদের সাথে
                            সহযোগিতা করার দক্ষতা এবং ওয়ার্কফ্লো ম্যানেজমেন্ট।</p>
                    </div>
                    <div class="d-flex align-items-center gap-3 py-2 border-bottom border-white my-2">
                        <i class="fa-solid fa-circle-check text-success fs-3"></i>
                        <p class="text-white my-auto text-two text-start">ভিডিও এডিটিংয়ের কৌশলগুলির সাথে পরিচিতি হওয়া, যেমন : মোশন
                            গ্রাফিক্স এবং অ্যানিমেশন।</p>
                    </div>
                    <div class="d-flex align-items-center gap-3 py-2 border-bottom border-white my-2">
                        <i class="fa-solid fa-circle-check text-success fs-3"></i>
                        <p class="text-white my-auto text-two text-start">প্র্যাকটিক্যাল প্রজেক্টের অভিজ্ঞতা যা শিক্ষার্থীদের তাদের
                            দক্ষতা প্রয়োগ এবং পোর্টফোলিও তৈরি করতে সাহায্য করবে।</p>
                    </div>
                    <div class="d-flex justify-content-center pt-4">
                        <a class="join-btn rounded-5" href="{{ url('quick-digital/mobile-video-checkout') }}">
                            <button class="btn btn-danger rounded-5 px-3 py-2 fs-3 fw-bold">জয়েন করতে চাই</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-black py-2" id="join-course">
        <div class="container max-width custom-padding">
            <h3 class="text-warning text-center text-one fw-bold pt-5">
                মাত্র
                <span class="text-success">৭৯৯</span> টাকায় আপনার জীবন ও ক্যারিয়ার বদলে যেতে পারে
            </h3>
            <p class="text-white py-1 text-two text-center">
                কোর্সে জয়েন করলেই আপনি পাবেন আমার দেখানো সিক্রেট ফর্মুলা ও সকল প্রয়োজনীয় সফটওয়্যার এর বিস্তারিত টিউটোরিয়াল যার মাধ্যমে আপনি খুব সহজেই মোবাইল দিয়ে ভিডিও এডিটিং করে আয় করতে পারবেন.....শুরু থেকে শেষ পর্যন্ত আমিই আপনাকে গাইড করবো.....<span class="text-success display-6 fw-bold">ইনশাল্লাহ</span>
            </p>
            <p class="text-warning fs-3 text-center fw-bold">
                কোর্সের প্রাইস জানতে জয়েন করতে চাই ক্লিক করুন
            </p>
            <div class="d-flex justify-content-center pt-4">
                <a class="join-btn rounded-5" href="{{ url('quick-digital/mobile-video-checkout') }}">
                    <button class="btn btn-danger rounded-5 px-3 py-2 fs-3 fw-bold">জয়েন করতে চাই</button>
                </a>
            </div>
        </div>
    </section>

    <section class="faq py-5">
        <div class="container max-width custom-padding">
            <h4 class="faq-heading fs-2 fs-sm-4 fw-bold py-4 text-center text-white rounded-3">
                প্রশ্নোত্তর
            </h4>
            <div class="my-5 text-white">
                <div class="accordion accordion-flush border" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed bg-black text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                <div class="fs-4 fw-semibold">
                                    কোর্স ফী কত টাকা?
                                </div>
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body bg-black text-white text-two text-start">
                                উত্তর: আপনা দের সকলের আর্থিক অবস্থা বিবেচনা করে কোর্স ফি ৭৯৯ টাকা নির্ধারণ করা হয়েছে ,
                                এত কমে কমে কোথাও শেখতে পারবেন না।
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed bg-black text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                <div class="fs-4 fw-semibold">
                                    কোর্সটি করতে কি কম্পিউটার বা ল্যাপটপ প্রয়োজন?
                                </div>
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body bg-black text-white text-two text-start">
                                উত্তর: মোবাইল দিয়েই করতে পারবেন কম্পিউটার বা ল্যাপটপ প্রয়োজন নেই।
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed bg-black text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                <div class="fs-4 fw-semibold">
                                    কোর্সটি রেকর্ডেড নাকি লাইভ ক্লাস?
                                </div>
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body bg-black text-white text-two text-start">
                                উত্তর: বর্তমানে বিশাল ডিস্কাউন্ট দেয়া আছে তবে প্রতিনিয়ত প্রোগ্রামটির মূল্য কিছু কিছু করে বাড়ানো হবে। কারণ শুধু মোবাইল দিয়ে এত রিসোর্স সম্পূর্ণ কোর্স একসাথে বাংলাদেশে নেই। আর যেগুলো সাধারণ কোর্স আছে সেগুলোরমূল্য ও এই কোর্সগুলোর চেয়ে বেশি। তাই কোর্সটি কিনে দ্রুত আমাদের সাথে যুক্ত হোন।
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed bg-black text-white" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                                <div class="fs-4 fw-semibold">
                                    কোর্সটিতে যুক্ত হলেই কি সফল হওয়া সম্ভব?
                                </div>
                            </button>
                        </h2>
                        <div id="flush-collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body bg-black text-white text-two text-start">
                                উত্তর: আমার দেখানো পথে কাজ করে যাবেন, ইনশা আল্লাহ্ আপনি সফল হবেন।
                                আমি আমার জায়গা থেকে আর আপনি আপনার জায়গা থেকে কাজ করে যাবেন।
                                সফলতা এবং টাকাপয়সা দেয়ার মালিক মহান আল্লাহ।
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container max-width custom-padding">
            <h3 class="text-center display-5 fw-bold border-bottom border-top p-2">
                আপনার কাঙ্ক্ষিত স্বপ্ন পূরণের জন্য রেডি তো ?
            </h3>
            <p class="text-two fw-semibold py-1 text-center">
                তাহলে আর দেরি কেন, ফ্রি তে মোবাইল দিয়ে ভিডিও এডিটিং শিখতে এখুনি মেসেজ করুন । মাত্র ৩০ দিনের মধ্যেই আপনার হাতেই তৈরি হয়ে যাবে আপনার স্বপ্নের ক্যারিয়ার ।
            </p>
            <p class="fs-3 text-center fw-bold last-cta">
                কোর্সের প্রাইস জানতে এবং জয়েন করতে নিচের <span class="text-danger">"জয়েন করতে চাই"</span> বাটন এ ক্লিক করুন
            </p>
            <div class="d-flex justify-content-center pt-4">
                <a class="join-btn rounded-5" href="{{ url('quick-digital/mobile-video-checkout') }}">
                    <button class="btn btn-danger rounded-5 px-3 py-2 fs-3 fw-bold">জয়েন করতে চাই</button>
                </a>
            </div>
        </div>
    </section>

</main>
@endsection
