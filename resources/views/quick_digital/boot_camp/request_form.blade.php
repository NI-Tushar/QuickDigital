@extends('quick_digital.layout.layout')
@push('css')
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <!-- Or for RTL support -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />

    <link rel="stylesheet" href="{{ url('front/styles/quick_business.css') }}">
    <link rel="stylesheet" href="{{ url('front/styles/affiliator_req_form.css') }}">

@endpush
@section('content')




<section class="hero text-white">
        <div class="d-flex flex-column">
            <div class="container max-width d-flex flex-column align-items-center">
              <div class="page_head_text">
                <h1>আমাদের কুইক ব্যবসায় জয়েন করুন</h1>
              </div>
                <div class="d-flex flex-column justify-content-center align-items-center col-md-8 py-3">
                    <div class="iframe-wrapper">
                    <iframe 
                        src="{{ asset('front/assets/vid/quick_business_vid.mp4') }}" 
                        title="Quick Business Video" 
                        frameborder="0" 
                        allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" 
                        allowfullscreen>
                    </iframe>

                    </div>
                </div>
                <div>
                    <h4 class="text-two lh-base pp__description py-3 fw-semibold">
                    কুইক ব্যবসা হলো অ্যাফিলিয়েট মার্কেটারদের জন্য একটি অনন্য সুযোগ! এখানে আপনি শিখবেন কীভাবে আমাদের প্রোডাক্ট এবং সার্ভিস বিভিন্ন জেলায় সেল করতে হয়। 
                    আমাদের কুইক ব্যবসা থেকে প্রয়োজনীয় দিকনির্দেশনা এবং সাপোর্ট পেয়ে, আপনি সেল বাড়িয়ে আমাদের কাছ থেকে সরাসরি প্রফিট অর্জন করতে পারবেন। ক্যারিয়ার গড়তে 
                    এবং আয়ের নতুন পথ তৈরি করতে আজই জয়েন করুন আমাদের কুইক ব্যবসা-এ!
                    </h4>
                </div>

               
                <p class="text-white text-center fw-bold fs-4 fs-sm-5 pt-4 pb-2">আমাদের সাথে জয়েন করতে জয়েন করুন</p>
                <div class="justify-content-center">
                    <a class="rounded my-2" href="#quick_form">
                        <button class="text-white reg_button">জয়েন করুন</button>
                    </a>
                </div>
    
        </div>
            <div class="shapes-container d-flex mt-3">
                <div id="right-box"></div>
                <div id="left-box"></div>
            </div>
        </div>
    </section>



    <!-- ______________________________________ new designed form start -->
     <section id="quick_form">
         <!-- ___________________ -->
            <div class="affiliator_reg_section">
                <div class="centered_list">
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
            </div>
        </div>
        <!-- ___________________ -->
     </section>
    <!-- ______________________________________ new designed form end -->








 <main>
        <section class="my-5" id="quick_form" style="display:none;">
            <div class="container">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>আমাদের কুইক ব্যবসায় জয়েন করুন</h3>
                    </div>
                    <div  style="background-color:rgb(223, 223, 223);" class="card-body">
                        <form action="{{ route('rep.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group mb-3">
                                <label for="name" class="mb-1">আপনার পুরো নাম দিন</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="আপানার নাম" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="email" class="mb-1">আপানার ই-মেইল দিন</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="আপানার ই-মেইল এড্রেস" value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="phone" class="mb-1">আপনার মোবাইল নম্বর দিন</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="মোবাইল নম্বর- 01648800000" value="{{ old('phone') }}">
                                @error('phone')
                                    <span class="text-danger bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="gender" class="mb-1">Gender সিলেক্ট করুন</label>
                                <div class="d-flex" style="gap: 1em">
                                    <div class="form-check">
                                        <input type="radio" name="gender" id="gender" value="Male" checked>
                                        <label class="form-check-label" for="gender">
                                          Male
                                        </label>
                                      </div>

                                    <div class="form-check">
                                        <input type="radio" name="gender" id="gender" value="Female">
                                        <label class="form-check-label" for="gender">
                                          Female
                                        </label>
                                    </div>
                                </div>
                                @error('gender')
                                    <span class="text-danger bold">{{ $message }}</span>
                                @enderror
                            </div>

                            



                            <div class="form-group mb-3">
                                <button type="submit" class="btn">সাবমিট করুন</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>



    <!-- <main>
        <section style="display:none;" class="my-5">
            <div class="container">
                <div class="card">
                    <div class="card-header text-center">
                        <h3 style="color: rgb(58, 2, 86);font-weight:900;">আমাদের কুইক ব্যবসায় জয়েন করুন</h3>
                        <p>কুইক ব্যবসা হলো অ্যাফিলিয়েট মার্কেটারদের জন্য একটি অনন্য সুযোগ! এখানে আপনি শিখবেন কীভাবে আমাদের প্রোডাক্ট এবং সার্ভিস বিভিন্ন জেলায় সেল করতে হয়। আমাদের কুইক ব্যবসা থেকে প্রয়োজনীয় দিকনির্দেশনা এবং সাপোর্ট পেয়ে, আপনি সেল বাড়িয়ে আমাদের কাছ থেকে সরাসরি প্রফিট অর্জন করতে পারবেন। ক্যারিয়ার গড়তে এবং আয়ের নতুন পথ তৈরি করতে আজই জয়েন করুন আমাদের কুইক ব্যবসা-এ!</p>
                    </div>
                    <div  style="background-color:rgb(223, 223, 223);" class="card-body">
                        <form action="{{ route('rep.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group mb-3">
                                <label for="name" class="mb-1">আপনার পুরো নাম দিন</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="আপানার নাম" value="{{ old('name') }}">
                                @error('name')
                                    <span class="text-danger bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="email" class="mb-1">আপানার ই-মেইল দিন</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="আপানার ই-মেইল এড্রেস" value="{{ old('email') }}">
                                @error('email')
                                    <span class="text-danger bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="phone" class="mb-1">আপনার মোবাইল নম্বর দিন</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="মোবাইল নম্বর- 01648800000" value="{{ old('phone') }}">
                                @error('phone')
                                <span class="text-danger bold">{{ $message }}</span>
                            @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="profession" class="mb-1">আপনার পেশা</label>
                                <select class="form-control @error('profession') is-invalid @enderror" name="profession" id="profession">
                                    <option value=""disabled selected>আপনার পেশা সিলেক্ট করুন</option>
                                    <option value="Student">ছাত্র/ছাত্রী</option>
                                    <option value="Thacher">শিক্ষক/শিক্ষিকা</option>
                                    <option value="Employee">চাকরিজীবি</option>
                                    <option value="Owner">ব্যাবশায়ী</option>
                                </select>
                                @error('profession')
                                    <span class="text-danger bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="institute" class="mb-1">কোম্পানি / প্রতিষ্ঠান</label>
                                <input type="text" class="form-control @error('institute') is-invalid @enderror" id="institute" name="institute" placeholder="আপানার কোম্পানির নাম / প্রতিষ্ঠানের নাম - Company, XYZ School, XYZ Collage" value="{{ old('institute') }}">
                                @error('institute')
                                    <span class="text-danger bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="gender" class="mb-1">Gender সিলেক্ট করুন</label>
                                <div class="d-flex" style="gap: 1em">
                                    <div class="form-check">
                                        <input type="radio" name="gender" id="gender" value="Male" checked>
                                        <label class="form-check-label" for="gender">
                                          Male
                                        </label>
                                      </div>

                                    <div class="form-check">
                                        <input type="radio" name="gender" id="gender" value="Female">
                                        <label class="form-check-label" for="gender">
                                          Female
                                        </label>
                                    </div>
                                </div>
                                @error('gender')
                                    <span class="text-danger bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="interests" class="mb-1">আপনি কোনটিতে আগ্রহী</label>
                                <select class="form-control select2 @error('interests') is-invalid @enderror" name="interests[]" id="interest" multiple="multiple">
                                    <option value="">Select Your Interest</option>
                                    <option value="Software">Software</option>
                                    <option value="E-Book">E-Book</option>
                                    <option value="Digital-Product">Digital-Product</option>
                                    <option value="Physical-Product">Physical-Product</option>
                                </select>
                                @error('interests')
                                    <span class="text-danger bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="division" class="mb-1">বিভাগ</label>
                                <select name="division" id="division" class="form-control select2 @error('division') is-invalid @enderror">
                                    <option value="">Select Division</option>
                                    <option value="Barisal">Barisal</option>
                                    <option value="Chattogram">Chattogram</option>
                                    <option value="Dhaka">Dhaka</option>
                                    <option value="Khulna">Khulna</option>
                                    <option value="Mymensingh">Mymensingh</option>
                                    <option value="Rajshahi">Rajshahi</option>
                                    <option value="Rangpur">Rangpur</option>
                                    <option value="Sylhet">Sylhet</option>
                                </select>
                                @error('division')
                                    <span class="text-danger bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="district" class="mb-1">জেলা</label>
                                <select name="district" id="district" class="form-control select2 @error('district') is-invalid @enderror">
                                    <option value="">Select District</option>
                                    <optgroup label="Barishal">
                                        <option value="Barishal">Barishal</option>
                                        <option value="Barguna">Barguna</option>
                                        <option value="Bhola">Bhola</option>
                                        <option value="Jhalokati">Jhalokati</option>
                                        <option value="Patuakhali">Patuakhali</option>
                                        <option value="Pirojpur">Pirojpur</option>
                                    </optgroup>
                                    <optgroup label="Chattogram">
                                        <option value="Bandarban">Bandarban</option>
                                        <option value="Brahmanbaria">Brahmanbaria</option>
                                        <option value="Chandpur">Chandpur</option>
                                        <option value="Chattogram">Chattogram</option>
                                        <option value="Cox's Bazar">Cox's Bazar</option>
                                        <option value="Cumilla">Cumilla</option>
                                        <option value="Feni">Feni</option>
                                        <option value="Khagrachari">Khagrachari</option>
                                        <option value="Lakshmipur">Lakshmipur</option>
                                        <option value="Noakhali">Noakhali</option>
                                        <option value="Rangamati">Rangamati</option>
                                    </optgroup>
                                    <optgroup label="Dhaka">
                                        <option value="Dhaka">Dhaka</option>
                                        <option value="Faridpur">Faridpur</option>
                                        <option value="Gazipur">Gazipur</option>
                                        <option value="Gopalganj">Gopalganj</option>
                                        <option value="Kishoreganj">Kishoreganj</option>
                                        <option value="Madaripur">Madaripur</option>
                                        <option value="Manikganj">Manikganj</option>
                                        <option value="Munshiganj">Munshiganj</option>
                                        <option value="Narayanganj">Narayanganj</option>
                                        <option value="Narsingdi">Narsingdi</option>
                                        <option value="Rajbari">Rajbari</option>
                                        <option value="Shariatpur">Shariatpur</option>
                                        <option value="Tangail">Tangail</option>
                                    </optgroup>
                                    <optgroup label="Khulna">
                                        <option value="Bagerhat">Bagerhat</option>
                                        <option value="Chuadanga">Chuadanga</option>
                                        <option value="Jashore">Jashore</option>
                                        <option value="Jhenaidah">Jhenaidah</option>
                                        <option value="Khulna">Khulna</option>
                                        <option value="Kushtia">Kushtia</option>
                                        <option value="Magura">Magura</option>
                                        <option value="Meherpur">Meherpur</option>
                                        <option value="Narail">Narail</option>
                                        <option value="Satkhira">Satkhira</option>
                                    </optgroup>
                                    <optgroup label="Mymensingh">
                                        <option value="Jamalpur">Jamalpur</option>
                                        <option value="Mymensingh">Mymensingh</option>
                                        <option value="Netrokona">Netrokona</option>
                                        <option value="Sherpur">Sherpur</option>
                                    </optgroup>
                                    <optgroup label="Rajshahi">
                                        <option value="Bogura">Bogura</option>
                                        <option value="Chapainawabganj">Chapainawabganj</option>
                                        <option value="Joypurhat">Joypurhat</option>
                                        <option value="Naogaon">Naogaon</option>
                                        <option value="Natore">Natore</option>
                                        <option value="Pabna">Pabna</option>
                                        <option value="Rajshahi">Rajshahi</option>
                                        <option value="Sirajganj">Sirajganj</option>
                                    </optgroup>
                                    <optgroup label="Rangpur">
                                        <option value="Dinajpur">Dinajpur</option>
                                        <option value="Gaibandha">Gaibandha</option>
                                        <option value="Kurigram">Kurigram</option>
                                        <option value="Lalmonirhat">Lalmonirhat</option>
                                        <option value="Nilphamari">Nilphamari</option>
                                        <option value="Panchagarh">Panchagarh</option>
                                        <option value="Rangpur">Rangpur</option>
                                        <option value="Thakurgaon">Thakurgaon</option>
                                    </optgroup>
                                    <optgroup label="Sylhet">
                                        <option value="Habiganj">Habiganj</option>
                                        <option value="Moulvibazar">Moulvibazar</option>
                                        <option value="Sunamganj">Sunamganj</option>
                                        <option value="Sylhet">Sylhet</option>
                                    </optgroup>
                                </select>
                                @error('district')
                                    <span class="text-danger bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="address" class="mb-1">এড্রেস দিন</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="আপনার সম্পুর্ন এড্রেস দিন" cols="30" rows="2">{{ old('address') }}</textarea>
                                @error('address')
                                    <span class="text-danger bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <div class="form-check">
                                    <input type="checkbox" id="agree" name="agree" checked>
                                    <label class="form-check-label" for="agree">
                                       আমি ওয়েবসাইটের সকল নীতি এবং শর্তাবলীতে সম্মতি দিচ্ছি
                                    </label>
                                </div>
                                @error('agree')
                                    <span class="text-danger bold">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <button type="submit" class="btn">সাবমিট করুন</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main> -->









<!-- _________________ FAQ START -->
 
<section class="faq py-2">
        <div class="container max-width custom-padding">
            <h4 class="faq-heading fs-2 fs-sm-4 fw-bold py-4 text-center rounded-3 mt-5">
                আপনাদের সচরাচর জিজ্ঞাসা করা কিছু প্রশ্ন ও তাদের উত্তর
            </h4>
            <div class="my-5 text-white">
                <div class="accordion accordion-flush border" id="accordionFlushExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed bg-black text-white" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false"
                                aria-controls="flush-collapseOne">
                                <div class="fs-4 fw-semibold">
                                    কুইক ব্যবসায় অন্তর্ভুক্ত হতে আমাকে ঢাকায় আসতে হবে কি না?
                                </div>
                            </button>
                        </h2>
                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body bg-black text-white text-two text-start">
                                উত্তরঃ না। আমাদের কুইক ব্যবসায় অন্তর্ভুক্ত হতে আপানাকে ঢাকায় আসতে হবে না। আপনি যেকোনো যায়গা থেকে আমাদের কুইক ব্যবসায় অন্তর্ভুক্ত হতে পারবেন।
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed bg-black text-white" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false"
                                aria-controls="flush-collapseTwo">
                                <div class="fs-4 fw-semibold">
                                কুইক ব্যবসায় অন্তর্ভুক্ত হতে আমাকে কোন ফি দিতে হবে কি না?
                                </div>
                            </button>
                        </h2>
                        <div id="flush-collapseTwo" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body bg-black text-white text-two text-start">
                                উত্তর: না। আমাদের কুইক ব্যবসায় অন্তর্ভুক্ত হতে আপনাকে কোন ধরনের ফি দিতে হবে না। কুইক ব্যবসায় অন্তর্ভুক্ত হওয়া সম্পুর্ন ফ্রি।
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed bg-black text-white" type="button"
                                data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                aria-expanded="false" aria-controls="flush-collapseThree">
                                <div class="fs-4 fw-semibold">
                                    আমি কিভাবে কুইক ব্যবসায় অন্তর্ভুক্ত হবো?
                                </div>
                            </button>
                        </h2>
                        <div id="flush-collapseThree" class="accordion-collapse collapse"
                            data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body bg-black text-white text-two text-start">
                                উত্তর: কুইক ব্যবসায় অন্তর্ভুক্ত হতে আপনাকে শুধুমাত্র উপরের ফর্মটি পুরন করতে হবে। আপনার সাথে আমাদের প্রতিনিধি যোগাযোগ করবেন।
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    
        <div class="button_section">
            <div class="justify-content-center">
                <a class="rounded my-2" href="#quick_form">
                    <button class="text-white reg_button">জয়েন করুন</button>
                </a>
            </div>
        </div>

    </section>
<!-- _________________ FAQ END -->


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
