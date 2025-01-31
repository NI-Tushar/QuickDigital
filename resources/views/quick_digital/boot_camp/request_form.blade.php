@extends('quick_digital.layout.layout')
@push('css')
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />

    <link rel="stylesheet" href="{{ url('front/styles/quick_business/quick_business.css') }}">
    <link rel="stylesheet" href="{{ url('front/styles/quick_business/request_form.css') }}">

@endpush
@section('content')


<section class="quick_business_section">
    <img src="{{ asset('front/assets/images/quick_business/quick_banner.png') }}" alt="">
    <div class="center_section">
        <div class="banner_part banner_part_text">
            <div class="banner_text">
                <h2>আমাদের কুইক ব্যবসায় জয়েন করুন</h2>
                <p>কুইক ব্যবসা হলো অ্যাফিলিয়েট মার্কেটারদের জন্য একটি অনন্য সুযোগ! এখানে আপনি শিখবেন কীভাবে আমাদের প্রোডাক্ট এবং সার্ভিস বিভিন্ন জেলায় সেল করতে হয়। আমাদের কুইক ব্যবসা থেকে প্রয়োজনীয় দিকনির্দেশনা এবং সাপোর্ট পেয়ে, আপনি সেল বাড়িয়ে আমাদের কাছ থেকে সরাসরি প্রফিট অর্জন করতে পারবেন। ক্যারিয়ার গড়তে এবং আয়ের নতুন পথ তৈরি করতে আজই জয়েন করুন আমাদের কুইক ব্যবসা-এ!</p>
                <div class="banner_button">
                    <a href="#quick_form_section"><button>জয়েন করুন</button></a>
                </div>
            </div>
        </div>
        <div class="banner_part">
            <div class="vid_part">
                <!-- <iframe 
                    src="{{ asset('front/assets/vid/quick_business_vid.mp4') }}" 
                    title="Quick Business Video" 
                    frameborder="0"
                    autoplay="0"
                    allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    referrerpolicy="strict-origin-when-cross-origin" 
                    allowfullscreen>
                </iframe> -->

                <video controls width="100%" height="100%">
                    <source src="{{ asset('front/assets/vid/quick_business_vid.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
</section>




<section id="quick_form_section" class="quick_form_section">
    <div class="center_form">
    <div class="form_wrapper">
        <div class="form_container">
            <div class="title_container">
                <h2>আমাদের কুইক ব্যবসায় জয়েন করুন</h2>
            </div>
            <form action="{{ route('rep.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
            <div class="row clearfix">
                <div class="">
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                        <label for="">আপনার পুরো নাম দিনঃ</label>
                        <input type="text" name="name" placeholder="আপানার নাম"  value="{{ old('name') }}"/>
                        @error('name')
                            <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                        <label for="">আপানার ই-মেইল দিনঃ</label>
                        <input type="email" name="email" placeholder="আপানার ই-মেইল এড্রেস"  value="{{ old('email') }}"/>
                        @error('email')
                            <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                        <label for="">আপনার মোবাইল নম্বর দিনঃ</label>
                        <input type="number" name="phone" placeholder="মোবাইল নম্বর- 01973784959"  value="{{ old('phone') }}"/>
                        @error('phone')
                            <p style="color:red;">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                    <label for="">Gender সিলেক্ট করুনঃ</label>

                    <div class="input_field radio_option">
                        <input type="radio" name="gender" id="rd1">
                        <label for="rd1">Male</label>
                        <input type="radio" name="gender" id="rd2">
                        <label for="rd2">Female</label>
                        
                        @error('gender')
                        <p style="color:red;" class="">{{ $message }}</p>
                        @enderror
                    </div>
                    </div>
                    
                    <input type="submit" value="সাবমিট করুন">
                </div>
            </div>
            </form>
        </div>
    </div>
    <img src="{{ asset('front/assets/images/quick_business/bottom_bg.png') }}" alt="">
</section>




<!-- _________________ FAQ START -->
 
<section class="faq py-2">
            <div class="my-5 text-white">
                <h4 class="">আপনাদের সচরাচর জিজ্ঞাসা করা কিছু প্রশ্ন ও তাদের উত্তর</h4>
                <div class="accordion accordion-flush border" id="accordionFlushExample">

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed " type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                <div class="fw-semibold">
                                    কুইক ব্যবসায় অন্তর্ভুক্ত হতে আমাকে ঢাকায় আসতে হবে কি না?
                                </div>
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body text-start">
                                উত্তরঃ না। আমাদের কুইক ব্যবসায় অন্তর্ভুক্ত হতে আপানাকে ঢাকায় আসতে হবে না। আপনি যেকোনো যায়গা থেকে আমাদের কুইক ব্যবসায় অন্তর্ভুক্ত হতে পারবেন।
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" style="color:black;"
                                aria-controls="flush-collapseTwo">
                                <div class="fw-semibold">
                                কুইক ব্যবসায় অন্তর্ভুক্ত হতে আমাকে কোন ফি দিতে হবে কি না?
                                </div>
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body text-start">
                                উত্তর: না। আমাদের কুইক ব্যবসায় অন্তর্ভুক্ত হতে আপনাকে কোন ধরনের ফি দিতে হবে না। কুইক ব্যবসায় অন্তর্ভুক্ত হওয়া সম্পুর্ন ফ্রি।
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed " type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                aria-expanded="false" aria-controls="flush-collapseThree">
                                <div class="fw-semibold">
                                    আমি কিভাবে কুইক ব্যবসায় অন্তর্ভুক্ত হবো?
                                </div>
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body text-start">
                                উত্তর: কুইক ব্যবসায় অন্তর্ভুক্ত হতে আপনাকে শুধুমাত্র উপরের ফর্মটি পুরন করতে হবে। আপনার সাথে আমাদের প্রতিনিধি যোগাযোগ করবেন।
                            </div>
                        </div>
                    </div>

            </div>
        </div>

        
    </section>
    <!-- _________________ FAQ END -->
    <div class="button_section">
        <div class="justify-content-center">
            <a href="#quick_form_section">
                <button>জয়েন করুন</button>
            </a>
        </div>
    </div>




@endsection
@push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

    <script>

        $( '.select2' ).select2( {
            theme: 'bootstrap-5',
            'placeholder': 'Select Your Interest'
        } );

    </script>

    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
            confirmButtonText: 'OK',
        });
    </script>
    @endif

@endpush