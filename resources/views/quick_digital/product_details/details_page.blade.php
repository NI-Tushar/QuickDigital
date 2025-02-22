@extends('quick_digital.layout.layout')
<link rel="stylesheet" href="{{ url('front/styles/product_details/details_page.css') }}">
<link rel="stylesheet" href="{{ url('front/styles/product_details/relevent_carousol.css') }}">

@section('content')

<section class="detail_section">
    <div class="max_width">
            <div class="headline mobile">
                @if(isset($software) && !empty($software))
                    <h1>{{$software->title}}</h1>
                @elseif(isset($product) && !empty($product))
                    <h1>{{$product->title}}</h1>
                @elseif(isset($service) && !empty($service))
                    <h1>{{$service->title}}</h1>
                @endif
                <div class="review">
                    <div class="star">★★★★☆</div>
                    <p>(Reviews)</p>
                </div>
                @if(isset($software) && !empty($software))
                    <p class="desc_text">{{$software->description}}</p>
                @elseif(isset($product) && !empty($product))
                    <p class="desc_text">{{$product->description}}</p>
                @elseif(isset($service) && !empty($service))
                    <p class="desc_text">{{$service->description}}</p>
                @endif
            </div>

        <div class="banner_part">
            @if(isset($software) && !empty($software))
                <img src="{{ $software->thumbnail ? asset($software->thumbnail) : asset('no_image2.jpg') }}" alt="">
            @elseif(isset($product) && !empty($product))
                <img src="{{ $product->thumbnail ? asset($product->thumbnail) : asset('no_image2.jpg') }}" alt="">
            @elseif(isset($service) && !empty($service))
                <img src="{{ $service->thumbnail ? asset($service->thumbnail) : asset('no_image2.jpg') }}" alt="">
            @endif
        </div>

        <div class="banner_part mobile_banner_part">
            <div class="banner_part_desc">
                <div class="description">

                    <div class="headline desctop">
                        @if(isset($software) && !empty($software))
                            <h1>{{$software->title}}</h1>
                        @elseif(isset($product) && !empty($product))
                            <h1>{{$product->title}}</h1>
                        @elseif(isset($service) && !empty($service))
                            <h1>{{$service->title}}</h1>
                        @endif
                        <div class="review">
                            <div class="star">★★★★☆</div>
                            <p>(Reviews)</p>
                        </div>
                        @if(isset($software) && !empty($software))
                            <p class="desc_text">{{$software->description}}</p>
                        @elseif(isset($product) && !empty($product))
                            <p class="desc_text">{{$product->description}}</p>
                        @elseif(isset($service) && !empty($service))
                            <p class="desc_text">{{$service->description}}</p>
                        @endif
                    </div>

                    <div class="price_div">
                        @if(isset($software) && !empty($software))
                        <div class="price_part">
                            <label for="">মেয়াদ</label>
                            <p>1 মাস</p>
                        </div>
                        @endif
                        <div class="price_part">
                            <label for="">ডিসকাউন্ট</label>
                            <p>10%</p>
                        </div>
                        <div class="price_part">
                            <label for="">টোটাল</label>
                            @if(isset($software) && !empty($software))
                                <p>{{$software->price}} BDT</p>
                            @elseif(isset($product) && !empty($product))
                                <p>{{$product->price}} BDT</p>
                            @elseif(isset($service) && !empty($service))
                                <p>{{$service->price}} BDT</p>
                            @endif
                        </div>
                    </div>
                    
                    <div class="button_sec">
                        <div class="sec">
                            @if(isset($software) && !empty($software))
                                <h3>{{$software->price}} BDT</h3>
                            @elseif(isset($product) && !empty($product))
                                <h3>{{$product->price}} BDT</h3>
                            @elseif(isset($service) && !empty($service))
                                <h3>{{$service->price}} BDT</h3>
                            @endif
                        </div>
                        <div class="sec">
                            @if(isset($product) && !empty($product))
                                <a href="{{ route('digitalProduct.order', ['id' => $product->id]) }}"><button>এখনই কিনুন</button></a>
                            @elseif(isset($software) && !empty($software))
                                <a href="{{ route('software.order', ['id' => $software->id]) }}"><button>এখনই কিনুন</button></a>
                            @elseif(isset($service) && !empty($service))
                            <!-- service route will be here -->
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ________________________________ description start -->
<section class="description_section">
    <div class="centered_desc">
        @if(isset($software) && !empty($software))
            <p>{{$software->description}}</p>
        @elseif(isset($product) && !empty($product))
            <p>{{$product->description}}</p>
        @elseif(isset($service) && !empty($service))
            <p>{{$service->description}}</p>
        @endif
        <div class="features">

        @if(isset($software) && !empty($software))
            @php
                $software->features = json_decode($software->features, true);
            @endphp
            <p>বৈশিষ্ট্যসমূহঃ</p>
            <ul>
                @foreach ($software->features as $feature)
                <li>{{$feature}}</li>
                @endforeach
            </ul>
        @elseif(isset($product) && !empty($product))
            @php
                $product->features = json_decode($product->features, true);
            @endphp
            <p>বৈশিষ্ট্যসমূহঃ</p>
            <ul>
                @foreach ($product->features as $feature)
                    <li>{{$feature}}</li>
                @endforeach
            </ul>
        @elseif(isset($service) && !empty($service))
            @php
                $features = json_decode($service->features, true);
                if (is_string($features)) {
                    $features = json_decode($features, true);
                }
            @endphp
            <p>বৈশিষ্ট্যসমূহঃ</p>
            <ul>
                @if (is_array($features))
                    @foreach ($features as $feature)
                        <li>{{$feature}}</li>
                    @endforeach
                @endif
            </ul>
        @endif
        </div>
    </div>
</section>
<!-- ________________________________ description end -->




<!-- ________________________________ RELEVENT PRODUCT START -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.min.css">

<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.5.0/glide.min.js"></script>

<section class="relevent_section">
    <div class="product_heading">
        @if(isset($software) && !empty($software))
            <h1>রিলিভেন্ট সফটওয়্যার</h1>
            <div class="view_all_btn">
                <a href="{{ route('quick.software') }}"><button>সকল সফটওয়্যার <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l82.7 0L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3l0 82.7c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-17.7-14.3-32-32-32L320 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/></svg></button></a>
            </div>
        @elseif(isset($product) && !empty($product))
            <h1>রিলিভেন্ট প্রোডাক্টস</h1>
            <div class="view_all_btn">
                <a href="{{ route('quick.digitalProduct') }}"><button>সকল প্রোডাক্টস<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l82.7 0L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3l0 82.7c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-17.7-14.3-32-32-32L320 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/></svg></button></a>
            </div>
        @elseif(isset($service) && !empty($service))
            <h1>রিলিভেন্ট সার্ভিস</h1>
            <div class="view_all_btn">
                <a href="#"><button>সকল সার্ভিস<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l82.7 0L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3l0 82.7c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-17.7-14.3-32-32-32L320 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/></svg></button></a>
            </div>
        @endif
    </div>

    <div class="relevent_product_card_carousol">
        <div class="bg-cover flex h-screen justify-center items-center" style="height: auto;">
            <div class="glide xl:w-[54rem] lg:w-[42rem] md:w-[30rem] sm:w-[18rem] px-16 py-8 bg-gray-700 bg-opacity-60 rounded-3xl">
            <div class="glide__track" data-glide-el="track">
                <ul class="glide__slides">

                <!-- _____________________ -->
                @if(isset($releventSoftware) && !empty($releventSoftware))
                    @foreach ($releventSoftware as $relSoft)
                    <li class="glide__slide_li">
                        <div class="relative flex flex-col text-center bg-gray-800 h-40 items-center justify-center rounded-3xl duration- ease-in-out">
                            <div class="part">
                                <img src="{{ $relSoft->thumbnail ? asset($relSoft->thumbnail) : asset('no_image2.jpg') }}" alt="">
                            </div>
                            <div class="part desc">
                                <h5>{{$relSoft->title}}</h5>
                                <div class="details_section">
                                    <div class="left"><a href="{{ url('/quick-digital/software/details/'.$relSoft['id']) }}"><p>বিস্তারিত <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l82.7 0L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3l0 82.7c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-17.7-14.3-32-32-32L320 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/></svg></p></a></div>
                                </div>
                                <div class="price_section">
                                    <div class="left"><a href="{{ route('custom.software.order', ['id' => $relSoft->id]) }}">কাস্টম</a></div>
                                    <div class="right">{{$relSoft->price}}<span> BDT</span></div>
                                </div>
                                <div class="button_price">
                                    <div class="btn"><a href="{{ route('software.order', ['id' => $relSoft->id]) }}"><button>কিনুন</button></a></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                @endif

                <!-- _____________________ -->
                @if(isset($releventProduct) && !empty($releventProduct))
                    @foreach ($releventProduct as $relProd)
                    <li class="glide__slide_li">
                        <div class="relative flex flex-col text-center bg-gray-800 h-40 items-center justify-center rounded-3xl duration- ease-in-out">
                            <div class="part">
                                <img src="{{ $relProd->thumbnail ? asset($relProd->thumbnail) : asset('no_image2.jpg') }}" alt="">
                            </div>
                            <div class="part desc">
                                <h5>{{$relProd->title}}</h5>
                                <div class="details_section">
                                    <div class="left"><a href="{{ url('/quick-digital/digital-product/details/'.$relProd['id']) }}"><p>বিস্তারিত <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l82.7 0L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3l0 82.7c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-17.7-14.3-32-32-32L320 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/></svg></p></a></div>
                                </div>
                                <div class="price_section">
                                    <div class="left">On Sell</div>
                                    <div class="right">{{$relProd->price}}<span> BDT</span></div>
                                </div>
                                <div class="button_price">
                                    <div class="btn"><a href="{{ route('digitalProduct.order', ['id' => $relProd->id]) }}"><button>কিনুন</button></a></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                @endif
                <!-- _____________________ -->
                @if(isset($releventService) && !empty($releventService))
                    @foreach ($releventService as $relService)
                    <li class="glide__slide_li">
                        <div class="relative flex flex-col text-center bg-gray-800 h-40 items-center justify-center rounded-3xl duration- ease-in-out">
                            <div class="part">
                                <img src="{{ $relService->thumbnail ? asset($relService->thumbnail) : asset('no_image2.jpg') }}" alt="">
                            </div>
                            <div class="part desc">
                                <h5>{{$relService->title}}</h5>
                                <div class="details_section">
                                    <div class="left"><a href="{{ url('/quick-digital/digital-service/details/'.$relService['id']) }}"><p>বিস্তারিত <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l82.7 0L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3l0 82.7c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-17.7-14.3-32-32-32L320 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/></svg></p></a></div>
                                </div>
                                <div class="price_section">
                                    <div class="left">On Sell</div>
                                    <div class="right">{{$relService->price}}<span> BDT</span></div>
                                </div>
                                <div class="button_price">
                                    <div class="btn"><a href="{{ route('digitalProduct.order', ['id' => $relService->id]) }}"><button>কিনুন</button></a></div>
                                </div>
                            </div>
                        </div>
                    </li>
                    @endforeach
                @endif
                <!-- _____________________ -->

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
<!-- ________________________________ RELEVENT PRODUCT START -->



<!-- ________________________________ REVIEW SECTION START -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.slick/1.5.0/slick.css">

 
<section class="review_section">
    <div class="center_review">
        <h3>আমাদের কাস্টমার রিভিউজ</h3>

    <div class="slider">

        <!-- ____________________ -->
        <div class="slide active">
            <div class="review_text">
                <div class="img_box">
                    <div class="img_info">
                        <!-- <img src="{{ asset('no_image.png') }}"> -->
                        <img src="https://scontent.fdac138-1.fna.fbcdn.net/v/t39.30808-1/468120326_2289461234741045_6382756601179989286_n.jpg?stp=dst-jpg_s200x200_tt6&_nc_cat=108&ccb=1-7&_nc_sid=e99d92&_nc_ohc=FXTqBjYwOYMQ7kNvgH47Tgg&_nc_zt=24&_nc_ht=scontent.fdac138-1.fna&_nc_gid=AiQk98akaczAuptWrHmqxWh&oh=00_AYDAW0GFZarKybzm1eVNVFuxKn8ElbjeK6RO9Q2Ko49Img&oe=67A414B6">
                        <div class="name">
                            <h3>Ratul Hasan</h3>
                            <p class="date">24 Nov 2024</p>
                        </div>
                    </div>
                </div>
                <p class="review_qoute">"Worked with Quick Digital on project profiles, and it was a seamless experience! Professional team delivering excellent results. Highly recommend!"</p>
                <div class="like_box">
                    <div class="likes">

                        <div class="like_left">
                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.75 6.751L11.01 6.628C10.9921 6.73544 10.9979 6.84548 11.0269 6.95046C11.0558 7.05545 11.1073 7.15288 11.1777 7.23596C11.2482 7.31904 11.3358 7.38578 11.4347 7.43155C11.5335 7.47732 11.6411 7.50102 11.75 7.501V6.751ZM0.75 6.751V6.001C0.551088 6.001 0.360322 6.08002 0.21967 6.22067C0.0790175 6.36132 0 6.55209 0 6.751H0.75ZM2.75 17.501H14.11V16.001H2.75V17.501ZM15.31 6.001H11.75V7.501H15.31V6.001ZM12.49 6.874L13.296 2.039L11.816 1.792L11.01 6.628L12.49 6.874ZM11.57 0.000999928H11.356V1.501H11.569L11.57 0.000999928ZM8.235 1.671L5.72 5.444L6.968 6.276L9.483 2.503L8.235 1.671ZM4.68 6.001H0.75V7.501H4.68V6.001ZM0 6.751V14.751H1.5V6.751H0ZM16.807 15.291L18.007 9.291L16.537 8.996L15.337 14.996L16.807 15.291ZM5.72 5.444C5.6059 5.61528 5.45127 5.75475 5.26985 5.85191C5.08842 5.94908 4.88581 5.99995 4.68 6V7.5C5.6 7.5 6.458 7.041 6.968 6.276L5.72 5.444ZM13.296 2.039C13.3377 1.78837 13.3243 1.53067 13.2567 1.28574C13.1892 1.04082 13.0691 0.813533 12.9049 0.61969C12.7406 0.425848 12.5361 0.270094 12.3056 0.163253C12.0751 0.0564111 11.8241 0.00104429 11.57 0.000999928L11.569 1.501C11.6052 1.50109 11.642 1.50906 11.6749 1.52436C11.7078 1.53966 11.7369 1.56192 11.7603 1.5896C11.7837 1.61728 11.8008 1.64972 11.8104 1.68467C11.82 1.71962 11.8219 1.75624 11.816 1.792L13.296 2.039ZM15.31 7.5C16.1 7.5 16.69 8.222 16.536 8.995L18.007 9.29C18.0866 8.89109 18.0767 8.4785 17.978 8.08389C17.8793 7.68927 17.6943 7.32146 17.4364 7.00696C17.1784 6.69246 16.8539 6.4391 16.4862 6.26515C16.1185 6.0912 15.7168 6.00098 15.31 6.001V7.5ZM14.11 17.501C14.7457 17.5011 15.3618 17.28 15.8535 16.8771C16.3452 16.4742 16.6822 15.9133 16.807 15.29L15.337 14.995C15.2803 15.2786 15.127 15.5338 14.9033 15.717C14.6796 15.9003 14.3992 16.0013 14.11 16.001V17.501ZM11.356 0.000999928C10.7387 0.00104478 10.1309 0.152495 9.58662 0.44382C9.04235 0.735145 8.57841 1.15633 8.236 1.67L9.483 2.503C9.68854 2.19466 9.96706 1.94086 10.2938 1.76606C10.6206 1.59125 10.9854 1.50086 11.356 1.501V0.000999928ZM2.75 16.001C2.06 16.001 1.5 15.441 1.5 14.751H0C0 15.4803 0.289731 16.1798 0.805456 16.6955C1.32118 17.2113 2.02065 17.501 2.75 17.501V16.001Z" fill="black"/>
                                <path d="M4.75 6.75098V16.751" stroke="black" stroke-width="1.5"/>
                            </svg>
                            38
                        </div>
                        <div class="like_left">
                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.25 10.75L7.99 10.873C8.00786 10.7655 8.00211 10.6555 7.97314 10.5505C7.94418 10.4455 7.89269 10.3481 7.82227 10.265C7.75185 10.1819 7.66418 10.1152 7.56535 10.0694C7.46652 10.0237 7.35891 9.99995 7.25 9.99998V10.75ZM18.25 10.75V11.5C18.4489 11.5 18.6397 11.421 18.7803 11.2803C18.921 11.1397 19 10.9489 19 10.75H18.25ZM16.25 -2.28882e-05H4.89V1.49998H16.25V-2.28882e-05ZM3.69 11.5H7.25V9.99998H3.69V11.5ZM6.51 10.627L5.704 15.462L7.184 15.709L7.99 10.873L6.51 10.627ZM7.43 17.5H7.644V16H7.431L7.43 17.5ZM10.765 15.83L13.28 12.057L12.032 11.225L9.517 14.998L10.765 15.83ZM14.32 11.5H18.25V9.99998H14.32V11.5ZM19 10.75V2.74998H17.5V10.75H19ZM2.193 2.20998L0.993 8.20998L2.463 8.50498L3.663 2.50498L2.193 2.20998ZM13.28 12.057C13.3941 11.8857 13.5487 11.7462 13.7302 11.6491C13.9116 11.5519 14.1142 11.501 14.32 11.501V10.001C13.4 10.001 12.542 10.46 12.032 11.225L13.28 12.057ZM5.704 15.462C5.66233 15.7126 5.67574 15.9703 5.74329 16.2152C5.81083 16.4602 5.9309 16.6874 6.09515 16.8813C6.2594 17.0751 6.46388 17.2309 6.6944 17.3377C6.92491 17.4446 7.17593 17.4999 7.43 17.5L7.431 16C7.39475 15.9999 7.35796 15.9919 7.3251 15.9766C7.29224 15.9613 7.26309 15.9391 7.23969 15.9114C7.21629 15.8837 7.19919 15.8513 7.18957 15.8163C7.17996 15.7814 7.17805 15.7447 7.184 15.709L5.704 15.462ZM3.69 10.001C2.9 10.001 2.31 9.27898 2.464 8.50598L0.993 8.21098C0.913422 8.60988 0.923326 9.02248 1.022 9.41709C1.12068 9.81171 1.30567 10.1795 1.56364 10.494C1.82161 10.8085 2.14614 11.0619 2.51383 11.2358C2.88153 11.4098 3.28323 11.5 3.69 11.5V10.001ZM4.89 -2.28882e-05C4.25429 -0.000146866 3.63818 0.220976 3.14647 0.623896C2.65476 1.02682 2.31783 1.58765 2.193 2.21098L3.663 2.50598C3.71968 2.22238 3.87296 1.96721 4.09669 1.78395C4.32043 1.60069 4.60079 1.49969 4.89 1.49998V-2.28882e-05ZM7.644 17.5C8.26133 17.4999 8.86911 17.3485 9.41338 17.0572C9.95765 16.7658 10.4216 16.3446 10.764 15.831L9.517 14.998C9.31146 15.3063 9.03294 15.5601 8.70619 15.7349C8.37944 15.9097 8.01457 16.0001 7.644 16V17.5ZM16.25 1.49998C16.94 1.49998 17.5 2.05998 17.5 2.74998H19C19 2.02063 18.7103 1.32116 18.1945 0.805433C17.6788 0.289709 16.9793 -2.28882e-05 16.25 -2.28882e-05V1.49998Z" fill="black"/>
                            <path d="M14.25 10.75V0.75" stroke="black" stroke-width="1.5"/>
                            </svg>
                            0
                        </div>

                    </div>
                </div>

            </div>
            <img src="{{ asset('white_bg.png') }}">
        </div>

        <!-- ____________________ -->
        <div class="slide next">
            <div class="review_text">
                <div class="img_box">
                    <div class="img_info">
                        <img src="https://scontent.fdac138-1.fna.fbcdn.net/v/t39.30808-1/455003558_1043081344002376_2911823505634800667_n.jpg?stp=c0.305.1294.1294a_dst-jpg_s200x200_tt6&_nc_cat=108&ccb=1-7&_nc_sid=e99d92&_nc_ohc=TwBWC2TycdsQ7kNvgE6toWl&_nc_zt=24&_nc_ht=scontent.fdac138-1.fna&_nc_gid=As0Er3ygo4Vrn75ZlaRSdfo&oh=00_AYCa7ttG2lRJc0Ju1_6vBbsKcxYpzPybMonaYr4qRMix_A&oe=67A40A96">
                        <div class="name">
                            <h3>Nishat Tasnim</h3>
                            <p class="date">24 Nov 2024</p>
                        </div>
                    </div>
                </div>
                <p class="review_qoute">"I'm satisfied with their website development services. highly recommended"</p>
                <div class="like_box">
                    <div class="likes">

                        <div class="like_left">
                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.75 6.751L11.01 6.628C10.9921 6.73544 10.9979 6.84548 11.0269 6.95046C11.0558 7.05545 11.1073 7.15288 11.1777 7.23596C11.2482 7.31904 11.3358 7.38578 11.4347 7.43155C11.5335 7.47732 11.6411 7.50102 11.75 7.501V6.751ZM0.75 6.751V6.001C0.551088 6.001 0.360322 6.08002 0.21967 6.22067C0.0790175 6.36132 0 6.55209 0 6.751H0.75ZM2.75 17.501H14.11V16.001H2.75V17.501ZM15.31 6.001H11.75V7.501H15.31V6.001ZM12.49 6.874L13.296 2.039L11.816 1.792L11.01 6.628L12.49 6.874ZM11.57 0.000999928H11.356V1.501H11.569L11.57 0.000999928ZM8.235 1.671L5.72 5.444L6.968 6.276L9.483 2.503L8.235 1.671ZM4.68 6.001H0.75V7.501H4.68V6.001ZM0 6.751V14.751H1.5V6.751H0ZM16.807 15.291L18.007 9.291L16.537 8.996L15.337 14.996L16.807 15.291ZM5.72 5.444C5.6059 5.61528 5.45127 5.75475 5.26985 5.85191C5.08842 5.94908 4.88581 5.99995 4.68 6V7.5C5.6 7.5 6.458 7.041 6.968 6.276L5.72 5.444ZM13.296 2.039C13.3377 1.78837 13.3243 1.53067 13.2567 1.28574C13.1892 1.04082 13.0691 0.813533 12.9049 0.61969C12.7406 0.425848 12.5361 0.270094 12.3056 0.163253C12.0751 0.0564111 11.8241 0.00104429 11.57 0.000999928L11.569 1.501C11.6052 1.50109 11.642 1.50906 11.6749 1.52436C11.7078 1.53966 11.7369 1.56192 11.7603 1.5896C11.7837 1.61728 11.8008 1.64972 11.8104 1.68467C11.82 1.71962 11.8219 1.75624 11.816 1.792L13.296 2.039ZM15.31 7.5C16.1 7.5 16.69 8.222 16.536 8.995L18.007 9.29C18.0866 8.89109 18.0767 8.4785 17.978 8.08389C17.8793 7.68927 17.6943 7.32146 17.4364 7.00696C17.1784 6.69246 16.8539 6.4391 16.4862 6.26515C16.1185 6.0912 15.7168 6.00098 15.31 6.001V7.5ZM14.11 17.501C14.7457 17.5011 15.3618 17.28 15.8535 16.8771C16.3452 16.4742 16.6822 15.9133 16.807 15.29L15.337 14.995C15.2803 15.2786 15.127 15.5338 14.9033 15.717C14.6796 15.9003 14.3992 16.0013 14.11 16.001V17.501ZM11.356 0.000999928C10.7387 0.00104478 10.1309 0.152495 9.58662 0.44382C9.04235 0.735145 8.57841 1.15633 8.236 1.67L9.483 2.503C9.68854 2.19466 9.96706 1.94086 10.2938 1.76606C10.6206 1.59125 10.9854 1.50086 11.356 1.501V0.000999928ZM2.75 16.001C2.06 16.001 1.5 15.441 1.5 14.751H0C0 15.4803 0.289731 16.1798 0.805456 16.6955C1.32118 17.2113 2.02065 17.501 2.75 17.501V16.001Z" fill="black"/>
                                <path d="M4.75 6.75098V16.751" stroke="black" stroke-width="1.5"/>
                            </svg>
                            14
                        </div>
                        <div class="like_left">
                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.25 10.75L7.99 10.873C8.00786 10.7655 8.00211 10.6555 7.97314 10.5505C7.94418 10.4455 7.89269 10.3481 7.82227 10.265C7.75185 10.1819 7.66418 10.1152 7.56535 10.0694C7.46652 10.0237 7.35891 9.99995 7.25 9.99998V10.75ZM18.25 10.75V11.5C18.4489 11.5 18.6397 11.421 18.7803 11.2803C18.921 11.1397 19 10.9489 19 10.75H18.25ZM16.25 -2.28882e-05H4.89V1.49998H16.25V-2.28882e-05ZM3.69 11.5H7.25V9.99998H3.69V11.5ZM6.51 10.627L5.704 15.462L7.184 15.709L7.99 10.873L6.51 10.627ZM7.43 17.5H7.644V16H7.431L7.43 17.5ZM10.765 15.83L13.28 12.057L12.032 11.225L9.517 14.998L10.765 15.83ZM14.32 11.5H18.25V9.99998H14.32V11.5ZM19 10.75V2.74998H17.5V10.75H19ZM2.193 2.20998L0.993 8.20998L2.463 8.50498L3.663 2.50498L2.193 2.20998ZM13.28 12.057C13.3941 11.8857 13.5487 11.7462 13.7302 11.6491C13.9116 11.5519 14.1142 11.501 14.32 11.501V10.001C13.4 10.001 12.542 10.46 12.032 11.225L13.28 12.057ZM5.704 15.462C5.66233 15.7126 5.67574 15.9703 5.74329 16.2152C5.81083 16.4602 5.9309 16.6874 6.09515 16.8813C6.2594 17.0751 6.46388 17.2309 6.6944 17.3377C6.92491 17.4446 7.17593 17.4999 7.43 17.5L7.431 16C7.39475 15.9999 7.35796 15.9919 7.3251 15.9766C7.29224 15.9613 7.26309 15.9391 7.23969 15.9114C7.21629 15.8837 7.19919 15.8513 7.18957 15.8163C7.17996 15.7814 7.17805 15.7447 7.184 15.709L5.704 15.462ZM3.69 10.001C2.9 10.001 2.31 9.27898 2.464 8.50598L0.993 8.21098C0.913422 8.60988 0.923326 9.02248 1.022 9.41709C1.12068 9.81171 1.30567 10.1795 1.56364 10.494C1.82161 10.8085 2.14614 11.0619 2.51383 11.2358C2.88153 11.4098 3.28323 11.5 3.69 11.5V10.001ZM4.89 -2.28882e-05C4.25429 -0.000146866 3.63818 0.220976 3.14647 0.623896C2.65476 1.02682 2.31783 1.58765 2.193 2.21098L3.663 2.50598C3.71968 2.22238 3.87296 1.96721 4.09669 1.78395C4.32043 1.60069 4.60079 1.49969 4.89 1.49998V-2.28882e-05ZM7.644 17.5C8.26133 17.4999 8.86911 17.3485 9.41338 17.0572C9.95765 16.7658 10.4216 16.3446 10.764 15.831L9.517 14.998C9.31146 15.3063 9.03294 15.5601 8.70619 15.7349C8.37944 15.9097 8.01457 16.0001 7.644 16V17.5ZM16.25 1.49998C16.94 1.49998 17.5 2.05998 17.5 2.74998H19C19 2.02063 18.7103 1.32116 18.1945 0.805433C17.6788 0.289709 16.9793 -2.28882e-05 16.25 -2.28882e-05V1.49998Z" fill="black"/>
                            <path d="M14.25 10.75V0.75" stroke="black" stroke-width="1.5"/>
                            </svg>
                            0
                        </div>

                    </div>
                </div>

            </div>
            <img src="{{ asset('white_bg.png') }}" />
        </div>
        <!-- ____________________ -->

        <div class="slide">
            <div class="review_text">
                <div class="img_box">
                    <div class="img_info">
                        <img src="https://scontent.fdac138-2.fna.fbcdn.net/v/t39.30808-1/221685301_908724756375646_5691222080424690788_n.jpg?stp=c0.65.442.442a_dst-jpg_s200x200_tt6&_nc_cat=103&ccb=1-7&_nc_sid=e99d92&_nc_ohc=UtiOKECKN0IQ7kNvgE7zrqw&_nc_zt=24&_nc_ht=scontent.fdac138-2.fna&_nc_gid=AkCRB4XU_ZuqIPcSroVQFYU&oh=00_AYDHrt4MRW6p4WK50AdGIDc8gY6w0gMHus2Ok1cXluj65Q&oe=67A406F4">
                        <div class="name">
                            <h3>NI Tushar</h3>
                            <p class="date">24 Nov 2024</p>
                        </div>
                    </div>
                </div>
                <p class="review_qoute">"One of the Best learning flatform i have every seen. I have completed my video editing course in very effective way"</p>
                <div class="like_box">
                    <div class="likes">

                        <div class="like_left">
                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.75 6.751L11.01 6.628C10.9921 6.73544 10.9979 6.84548 11.0269 6.95046C11.0558 7.05545 11.1073 7.15288 11.1777 7.23596C11.2482 7.31904 11.3358 7.38578 11.4347 7.43155C11.5335 7.47732 11.6411 7.50102 11.75 7.501V6.751ZM0.75 6.751V6.001C0.551088 6.001 0.360322 6.08002 0.21967 6.22067C0.0790175 6.36132 0 6.55209 0 6.751H0.75ZM2.75 17.501H14.11V16.001H2.75V17.501ZM15.31 6.001H11.75V7.501H15.31V6.001ZM12.49 6.874L13.296 2.039L11.816 1.792L11.01 6.628L12.49 6.874ZM11.57 0.000999928H11.356V1.501H11.569L11.57 0.000999928ZM8.235 1.671L5.72 5.444L6.968 6.276L9.483 2.503L8.235 1.671ZM4.68 6.001H0.75V7.501H4.68V6.001ZM0 6.751V14.751H1.5V6.751H0ZM16.807 15.291L18.007 9.291L16.537 8.996L15.337 14.996L16.807 15.291ZM5.72 5.444C5.6059 5.61528 5.45127 5.75475 5.26985 5.85191C5.08842 5.94908 4.88581 5.99995 4.68 6V7.5C5.6 7.5 6.458 7.041 6.968 6.276L5.72 5.444ZM13.296 2.039C13.3377 1.78837 13.3243 1.53067 13.2567 1.28574C13.1892 1.04082 13.0691 0.813533 12.9049 0.61969C12.7406 0.425848 12.5361 0.270094 12.3056 0.163253C12.0751 0.0564111 11.8241 0.00104429 11.57 0.000999928L11.569 1.501C11.6052 1.50109 11.642 1.50906 11.6749 1.52436C11.7078 1.53966 11.7369 1.56192 11.7603 1.5896C11.7837 1.61728 11.8008 1.64972 11.8104 1.68467C11.82 1.71962 11.8219 1.75624 11.816 1.792L13.296 2.039ZM15.31 7.5C16.1 7.5 16.69 8.222 16.536 8.995L18.007 9.29C18.0866 8.89109 18.0767 8.4785 17.978 8.08389C17.8793 7.68927 17.6943 7.32146 17.4364 7.00696C17.1784 6.69246 16.8539 6.4391 16.4862 6.26515C16.1185 6.0912 15.7168 6.00098 15.31 6.001V7.5ZM14.11 17.501C14.7457 17.5011 15.3618 17.28 15.8535 16.8771C16.3452 16.4742 16.6822 15.9133 16.807 15.29L15.337 14.995C15.2803 15.2786 15.127 15.5338 14.9033 15.717C14.6796 15.9003 14.3992 16.0013 14.11 16.001V17.501ZM11.356 0.000999928C10.7387 0.00104478 10.1309 0.152495 9.58662 0.44382C9.04235 0.735145 8.57841 1.15633 8.236 1.67L9.483 2.503C9.68854 2.19466 9.96706 1.94086 10.2938 1.76606C10.6206 1.59125 10.9854 1.50086 11.356 1.501V0.000999928ZM2.75 16.001C2.06 16.001 1.5 15.441 1.5 14.751H0C0 15.4803 0.289731 16.1798 0.805456 16.6955C1.32118 17.2113 2.02065 17.501 2.75 17.501V16.001Z" fill="black"/>
                                <path d="M4.75 6.75098V16.751" stroke="black" stroke-width="1.5"/>
                            </svg>
                            25
                        </div>
                        <div class="like_left">
                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.25 10.75L7.99 10.873C8.00786 10.7655 8.00211 10.6555 7.97314 10.5505C7.94418 10.4455 7.89269 10.3481 7.82227 10.265C7.75185 10.1819 7.66418 10.1152 7.56535 10.0694C7.46652 10.0237 7.35891 9.99995 7.25 9.99998V10.75ZM18.25 10.75V11.5C18.4489 11.5 18.6397 11.421 18.7803 11.2803C18.921 11.1397 19 10.9489 19 10.75H18.25ZM16.25 -2.28882e-05H4.89V1.49998H16.25V-2.28882e-05ZM3.69 11.5H7.25V9.99998H3.69V11.5ZM6.51 10.627L5.704 15.462L7.184 15.709L7.99 10.873L6.51 10.627ZM7.43 17.5H7.644V16H7.431L7.43 17.5ZM10.765 15.83L13.28 12.057L12.032 11.225L9.517 14.998L10.765 15.83ZM14.32 11.5H18.25V9.99998H14.32V11.5ZM19 10.75V2.74998H17.5V10.75H19ZM2.193 2.20998L0.993 8.20998L2.463 8.50498L3.663 2.50498L2.193 2.20998ZM13.28 12.057C13.3941 11.8857 13.5487 11.7462 13.7302 11.6491C13.9116 11.5519 14.1142 11.501 14.32 11.501V10.001C13.4 10.001 12.542 10.46 12.032 11.225L13.28 12.057ZM5.704 15.462C5.66233 15.7126 5.67574 15.9703 5.74329 16.2152C5.81083 16.4602 5.9309 16.6874 6.09515 16.8813C6.2594 17.0751 6.46388 17.2309 6.6944 17.3377C6.92491 17.4446 7.17593 17.4999 7.43 17.5L7.431 16C7.39475 15.9999 7.35796 15.9919 7.3251 15.9766C7.29224 15.9613 7.26309 15.9391 7.23969 15.9114C7.21629 15.8837 7.19919 15.8513 7.18957 15.8163C7.17996 15.7814 7.17805 15.7447 7.184 15.709L5.704 15.462ZM3.69 10.001C2.9 10.001 2.31 9.27898 2.464 8.50598L0.993 8.21098C0.913422 8.60988 0.923326 9.02248 1.022 9.41709C1.12068 9.81171 1.30567 10.1795 1.56364 10.494C1.82161 10.8085 2.14614 11.0619 2.51383 11.2358C2.88153 11.4098 3.28323 11.5 3.69 11.5V10.001ZM4.89 -2.28882e-05C4.25429 -0.000146866 3.63818 0.220976 3.14647 0.623896C2.65476 1.02682 2.31783 1.58765 2.193 2.21098L3.663 2.50598C3.71968 2.22238 3.87296 1.96721 4.09669 1.78395C4.32043 1.60069 4.60079 1.49969 4.89 1.49998V-2.28882e-05ZM7.644 17.5C8.26133 17.4999 8.86911 17.3485 9.41338 17.0572C9.95765 16.7658 10.4216 16.3446 10.764 15.831L9.517 14.998C9.31146 15.3063 9.03294 15.5601 8.70619 15.7349C8.37944 15.9097 8.01457 16.0001 7.644 16V17.5ZM16.25 1.49998C16.94 1.49998 17.5 2.05998 17.5 2.74998H19C19 2.02063 18.7103 1.32116 18.1945 0.805433C17.6788 0.289709 16.9793 -2.28882e-05 16.25 -2.28882e-05V1.49998Z" fill="black"/>
                            <path d="M14.25 10.75V0.75" stroke="black" stroke-width="1.5"/>
                            </svg>
                            0
                        </div>

                    </div>
                </div>

            </div>
            <img src="{{ asset('white_bg.png') }}" />
        </div>
        <!-- ____________________ -->

        <div class="slide">
            <div class="review_text">
                <div class="img_box">
                    <div class="img_info">
                        <img src="https://scontent.fdac138-1.fna.fbcdn.net/v/t39.30808-1/471576139_3551995361764477_7900152490448475666_n.jpg?stp=dst-jpg_s200x200_tt6&_nc_cat=110&ccb=1-7&_nc_sid=e99d92&_nc_ohc=aeg4JzslcIAQ7kNvgE1uTUa&_nc_zt=24&_nc_ht=scontent.fdac138-1.fna&_nc_gid=AUYg3NdF7L51yr0IcOSdssz&oh=00_AYCxygzyJDPBCDkGum3cyr1kvTa1jvTPZsaFYFsKDYTslg&oe=67A42908">
                        <div class="name">
                            <h3>Imran Hossain</h3>
                            <p class="date">24 Nov 2024</p>
                        </div>
                    </div>
                </div>
                <p class="review_qoute">"I recently worked with Quick Digital on my personal portfolio, and the experience was exceptional"</p>
                <div class="like_box">
                    <div class="likes">

                        <div class="like_left">
                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.75 6.751L11.01 6.628C10.9921 6.73544 10.9979 6.84548 11.0269 6.95046C11.0558 7.05545 11.1073 7.15288 11.1777 7.23596C11.2482 7.31904 11.3358 7.38578 11.4347 7.43155C11.5335 7.47732 11.6411 7.50102 11.75 7.501V6.751ZM0.75 6.751V6.001C0.551088 6.001 0.360322 6.08002 0.21967 6.22067C0.0790175 6.36132 0 6.55209 0 6.751H0.75ZM2.75 17.501H14.11V16.001H2.75V17.501ZM15.31 6.001H11.75V7.501H15.31V6.001ZM12.49 6.874L13.296 2.039L11.816 1.792L11.01 6.628L12.49 6.874ZM11.57 0.000999928H11.356V1.501H11.569L11.57 0.000999928ZM8.235 1.671L5.72 5.444L6.968 6.276L9.483 2.503L8.235 1.671ZM4.68 6.001H0.75V7.501H4.68V6.001ZM0 6.751V14.751H1.5V6.751H0ZM16.807 15.291L18.007 9.291L16.537 8.996L15.337 14.996L16.807 15.291ZM5.72 5.444C5.6059 5.61528 5.45127 5.75475 5.26985 5.85191C5.08842 5.94908 4.88581 5.99995 4.68 6V7.5C5.6 7.5 6.458 7.041 6.968 6.276L5.72 5.444ZM13.296 2.039C13.3377 1.78837 13.3243 1.53067 13.2567 1.28574C13.1892 1.04082 13.0691 0.813533 12.9049 0.61969C12.7406 0.425848 12.5361 0.270094 12.3056 0.163253C12.0751 0.0564111 11.8241 0.00104429 11.57 0.000999928L11.569 1.501C11.6052 1.50109 11.642 1.50906 11.6749 1.52436C11.7078 1.53966 11.7369 1.56192 11.7603 1.5896C11.7837 1.61728 11.8008 1.64972 11.8104 1.68467C11.82 1.71962 11.8219 1.75624 11.816 1.792L13.296 2.039ZM15.31 7.5C16.1 7.5 16.69 8.222 16.536 8.995L18.007 9.29C18.0866 8.89109 18.0767 8.4785 17.978 8.08389C17.8793 7.68927 17.6943 7.32146 17.4364 7.00696C17.1784 6.69246 16.8539 6.4391 16.4862 6.26515C16.1185 6.0912 15.7168 6.00098 15.31 6.001V7.5ZM14.11 17.501C14.7457 17.5011 15.3618 17.28 15.8535 16.8771C16.3452 16.4742 16.6822 15.9133 16.807 15.29L15.337 14.995C15.2803 15.2786 15.127 15.5338 14.9033 15.717C14.6796 15.9003 14.3992 16.0013 14.11 16.001V17.501ZM11.356 0.000999928C10.7387 0.00104478 10.1309 0.152495 9.58662 0.44382C9.04235 0.735145 8.57841 1.15633 8.236 1.67L9.483 2.503C9.68854 2.19466 9.96706 1.94086 10.2938 1.76606C10.6206 1.59125 10.9854 1.50086 11.356 1.501V0.000999928ZM2.75 16.001C2.06 16.001 1.5 15.441 1.5 14.751H0C0 15.4803 0.289731 16.1798 0.805456 16.6955C1.32118 17.2113 2.02065 17.501 2.75 17.501V16.001Z" fill="black"/>
                                <path d="M4.75 6.75098V16.751" stroke="black" stroke-width="1.5"/>
                            </svg>
                            24
                        </div>
                        <div class="like_left">
                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.25 10.75L7.99 10.873C8.00786 10.7655 8.00211 10.6555 7.97314 10.5505C7.94418 10.4455 7.89269 10.3481 7.82227 10.265C7.75185 10.1819 7.66418 10.1152 7.56535 10.0694C7.46652 10.0237 7.35891 9.99995 7.25 9.99998V10.75ZM18.25 10.75V11.5C18.4489 11.5 18.6397 11.421 18.7803 11.2803C18.921 11.1397 19 10.9489 19 10.75H18.25ZM16.25 -2.28882e-05H4.89V1.49998H16.25V-2.28882e-05ZM3.69 11.5H7.25V9.99998H3.69V11.5ZM6.51 10.627L5.704 15.462L7.184 15.709L7.99 10.873L6.51 10.627ZM7.43 17.5H7.644V16H7.431L7.43 17.5ZM10.765 15.83L13.28 12.057L12.032 11.225L9.517 14.998L10.765 15.83ZM14.32 11.5H18.25V9.99998H14.32V11.5ZM19 10.75V2.74998H17.5V10.75H19ZM2.193 2.20998L0.993 8.20998L2.463 8.50498L3.663 2.50498L2.193 2.20998ZM13.28 12.057C13.3941 11.8857 13.5487 11.7462 13.7302 11.6491C13.9116 11.5519 14.1142 11.501 14.32 11.501V10.001C13.4 10.001 12.542 10.46 12.032 11.225L13.28 12.057ZM5.704 15.462C5.66233 15.7126 5.67574 15.9703 5.74329 16.2152C5.81083 16.4602 5.9309 16.6874 6.09515 16.8813C6.2594 17.0751 6.46388 17.2309 6.6944 17.3377C6.92491 17.4446 7.17593 17.4999 7.43 17.5L7.431 16C7.39475 15.9999 7.35796 15.9919 7.3251 15.9766C7.29224 15.9613 7.26309 15.9391 7.23969 15.9114C7.21629 15.8837 7.19919 15.8513 7.18957 15.8163C7.17996 15.7814 7.17805 15.7447 7.184 15.709L5.704 15.462ZM3.69 10.001C2.9 10.001 2.31 9.27898 2.464 8.50598L0.993 8.21098C0.913422 8.60988 0.923326 9.02248 1.022 9.41709C1.12068 9.81171 1.30567 10.1795 1.56364 10.494C1.82161 10.8085 2.14614 11.0619 2.51383 11.2358C2.88153 11.4098 3.28323 11.5 3.69 11.5V10.001ZM4.89 -2.28882e-05C4.25429 -0.000146866 3.63818 0.220976 3.14647 0.623896C2.65476 1.02682 2.31783 1.58765 2.193 2.21098L3.663 2.50598C3.71968 2.22238 3.87296 1.96721 4.09669 1.78395C4.32043 1.60069 4.60079 1.49969 4.89 1.49998V-2.28882e-05ZM7.644 17.5C8.26133 17.4999 8.86911 17.3485 9.41338 17.0572C9.95765 16.7658 10.4216 16.3446 10.764 15.831L9.517 14.998C9.31146 15.3063 9.03294 15.5601 8.70619 15.7349C8.37944 15.9097 8.01457 16.0001 7.644 16V17.5ZM16.25 1.49998C16.94 1.49998 17.5 2.05998 17.5 2.74998H19C19 2.02063 18.7103 1.32116 18.1945 0.805433C17.6788 0.289709 16.9793 -2.28882e-05 16.25 -2.28882e-05V1.49998Z" fill="black"/>
                            <path d="M14.25 10.75V0.75" stroke="black" stroke-width="1.5"/>
                            </svg>
                            0
                        </div>

                    </div>
                </div>

            </div>
            <img src="{{ asset('white_bg.png') }}" />
        </div>
        <!-- ____________________ -->

        <div class="slide prev">
            <div class="review_text">
                <div class="img_box">
                    <div class="img_info">
                        <img src="https://scontent.fdac138-2.fna.fbcdn.net/v/t39.30808-1/472335607_1160767095634205_8840842469046554953_n.jpg?stp=dst-jpg_s200x200_tt6&_nc_cat=106&ccb=1-7&_nc_sid=1d2534&_nc_ohc=j7oDweAwqtwQ7kNvgGikXF9&_nc_zt=24&_nc_ht=scontent.fdac138-2.fna&_nc_gid=Ab0-_IYEgdhES9iluAhYDy2&oh=00_AYCaeGYonbhr6nQogTRymNhqCX2CthhdHfmLSiq1vSr9XA&oe=67A41D34">
                        <div class="name">
                            <h3>Joysree Sarker</h3>
                            <p class="date">24 Nov 2024</p>
                        </div>
                    </div>
                </div>
                <p class="review_qoute">"Quick digital is the best platform for video editing"</p>
                <div class="like_box">
                    <div class="likes">

                        <div class="like_left">
                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.75 6.751L11.01 6.628C10.9921 6.73544 10.9979 6.84548 11.0269 6.95046C11.0558 7.05545 11.1073 7.15288 11.1777 7.23596C11.2482 7.31904 11.3358 7.38578 11.4347 7.43155C11.5335 7.47732 11.6411 7.50102 11.75 7.501V6.751ZM0.75 6.751V6.001C0.551088 6.001 0.360322 6.08002 0.21967 6.22067C0.0790175 6.36132 0 6.55209 0 6.751H0.75ZM2.75 17.501H14.11V16.001H2.75V17.501ZM15.31 6.001H11.75V7.501H15.31V6.001ZM12.49 6.874L13.296 2.039L11.816 1.792L11.01 6.628L12.49 6.874ZM11.57 0.000999928H11.356V1.501H11.569L11.57 0.000999928ZM8.235 1.671L5.72 5.444L6.968 6.276L9.483 2.503L8.235 1.671ZM4.68 6.001H0.75V7.501H4.68V6.001ZM0 6.751V14.751H1.5V6.751H0ZM16.807 15.291L18.007 9.291L16.537 8.996L15.337 14.996L16.807 15.291ZM5.72 5.444C5.6059 5.61528 5.45127 5.75475 5.26985 5.85191C5.08842 5.94908 4.88581 5.99995 4.68 6V7.5C5.6 7.5 6.458 7.041 6.968 6.276L5.72 5.444ZM13.296 2.039C13.3377 1.78837 13.3243 1.53067 13.2567 1.28574C13.1892 1.04082 13.0691 0.813533 12.9049 0.61969C12.7406 0.425848 12.5361 0.270094 12.3056 0.163253C12.0751 0.0564111 11.8241 0.00104429 11.57 0.000999928L11.569 1.501C11.6052 1.50109 11.642 1.50906 11.6749 1.52436C11.7078 1.53966 11.7369 1.56192 11.7603 1.5896C11.7837 1.61728 11.8008 1.64972 11.8104 1.68467C11.82 1.71962 11.8219 1.75624 11.816 1.792L13.296 2.039ZM15.31 7.5C16.1 7.5 16.69 8.222 16.536 8.995L18.007 9.29C18.0866 8.89109 18.0767 8.4785 17.978 8.08389C17.8793 7.68927 17.6943 7.32146 17.4364 7.00696C17.1784 6.69246 16.8539 6.4391 16.4862 6.26515C16.1185 6.0912 15.7168 6.00098 15.31 6.001V7.5ZM14.11 17.501C14.7457 17.5011 15.3618 17.28 15.8535 16.8771C16.3452 16.4742 16.6822 15.9133 16.807 15.29L15.337 14.995C15.2803 15.2786 15.127 15.5338 14.9033 15.717C14.6796 15.9003 14.3992 16.0013 14.11 16.001V17.501ZM11.356 0.000999928C10.7387 0.00104478 10.1309 0.152495 9.58662 0.44382C9.04235 0.735145 8.57841 1.15633 8.236 1.67L9.483 2.503C9.68854 2.19466 9.96706 1.94086 10.2938 1.76606C10.6206 1.59125 10.9854 1.50086 11.356 1.501V0.000999928ZM2.75 16.001C2.06 16.001 1.5 15.441 1.5 14.751H0C0 15.4803 0.289731 16.1798 0.805456 16.6955C1.32118 17.2113 2.02065 17.501 2.75 17.501V16.001Z" fill="black"/>
                                <path d="M4.75 6.75098V16.751" stroke="black" stroke-width="1.5"/>
                            </svg>
                            23
                        </div>
                        <div class="like_left">
                            <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.25 10.75L7.99 10.873C8.00786 10.7655 8.00211 10.6555 7.97314 10.5505C7.94418 10.4455 7.89269 10.3481 7.82227 10.265C7.75185 10.1819 7.66418 10.1152 7.56535 10.0694C7.46652 10.0237 7.35891 9.99995 7.25 9.99998V10.75ZM18.25 10.75V11.5C18.4489 11.5 18.6397 11.421 18.7803 11.2803C18.921 11.1397 19 10.9489 19 10.75H18.25ZM16.25 -2.28882e-05H4.89V1.49998H16.25V-2.28882e-05ZM3.69 11.5H7.25V9.99998H3.69V11.5ZM6.51 10.627L5.704 15.462L7.184 15.709L7.99 10.873L6.51 10.627ZM7.43 17.5H7.644V16H7.431L7.43 17.5ZM10.765 15.83L13.28 12.057L12.032 11.225L9.517 14.998L10.765 15.83ZM14.32 11.5H18.25V9.99998H14.32V11.5ZM19 10.75V2.74998H17.5V10.75H19ZM2.193 2.20998L0.993 8.20998L2.463 8.50498L3.663 2.50498L2.193 2.20998ZM13.28 12.057C13.3941 11.8857 13.5487 11.7462 13.7302 11.6491C13.9116 11.5519 14.1142 11.501 14.32 11.501V10.001C13.4 10.001 12.542 10.46 12.032 11.225L13.28 12.057ZM5.704 15.462C5.66233 15.7126 5.67574 15.9703 5.74329 16.2152C5.81083 16.4602 5.9309 16.6874 6.09515 16.8813C6.2594 17.0751 6.46388 17.2309 6.6944 17.3377C6.92491 17.4446 7.17593 17.4999 7.43 17.5L7.431 16C7.39475 15.9999 7.35796 15.9919 7.3251 15.9766C7.29224 15.9613 7.26309 15.9391 7.23969 15.9114C7.21629 15.8837 7.19919 15.8513 7.18957 15.8163C7.17996 15.7814 7.17805 15.7447 7.184 15.709L5.704 15.462ZM3.69 10.001C2.9 10.001 2.31 9.27898 2.464 8.50598L0.993 8.21098C0.913422 8.60988 0.923326 9.02248 1.022 9.41709C1.12068 9.81171 1.30567 10.1795 1.56364 10.494C1.82161 10.8085 2.14614 11.0619 2.51383 11.2358C2.88153 11.4098 3.28323 11.5 3.69 11.5V10.001ZM4.89 -2.28882e-05C4.25429 -0.000146866 3.63818 0.220976 3.14647 0.623896C2.65476 1.02682 2.31783 1.58765 2.193 2.21098L3.663 2.50598C3.71968 2.22238 3.87296 1.96721 4.09669 1.78395C4.32043 1.60069 4.60079 1.49969 4.89 1.49998V-2.28882e-05ZM7.644 17.5C8.26133 17.4999 8.86911 17.3485 9.41338 17.0572C9.95765 16.7658 10.4216 16.3446 10.764 15.831L9.517 14.998C9.31146 15.3063 9.03294 15.5601 8.70619 15.7349C8.37944 15.9097 8.01457 16.0001 7.644 16V17.5ZM16.25 1.49998C16.94 1.49998 17.5 2.05998 17.5 2.74998H19C19 2.02063 18.7103 1.32116 18.1945 0.805433C17.6788 0.289709 16.9793 -2.28882e-05 16.25 -2.28882e-05V1.49998Z" fill="black"/>
                            <path d="M14.25 10.75V0.75" stroke="black" stroke-width="1.5"/>
                            </svg>
                            0
                        </div>

                    </div>
                </div>

            </div>
            <img src="{{ asset('white_bg.png') }}" />
        </div>

        <div class="controls">
            <div id="click-left">&#8592;</div>
            <div id="click-right">&#8594;</div>
        </div>
    </div>

    </div>
</section>


<!-- ________________________________ REVIEW SECTION END -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script>
let activeSlide = 0;
const slides = document.querySelectorAll('.slide');

let left = document.querySelector('#click-left');

left.onclick = function() {
  updatePrevSlide()
}


let right = document.querySelector('#click-right');

right.onclick = function() {
  updateNextSlide();
}

function updateNextSlide() {
    slides[activeSlide].classList.add("prev");
  let nextSlide = ( activeSlide < slides.length -1) ? activeSlide+1 : 0; 
  slides[nextSlide].classList.remove("prev");
  slides[nextSlide].classList.remove("next");
  slides[nextSlide].classList.add("active");
  
  if(nextSlide < slides.length -1){
    slides[nextSlide+1].classList.add("next");
    slides[nextSlide+1].classList.remove("prev");
  }  
  else {
    slides[0].classList.remove("prev");
    slides[0].classList.add("next");
  }
  activeSlide = nextSlide;
}


function updatePrevSlide() {
    slides[activeSlide].classList.add("next");
    let prevSlide = ( activeSlide > 0) ? activeSlide-1 : slides.length-1; 
    slides[prevSlide].classList.remove("next");
    slides[prevSlide].classList.remove("prev");
  slides[prevSlide].classList.add("active");
  
  if(prevSlide > 0){
     slides[prevSlide-1].classList.add("prev");
     slides[prevSlide-1].classList.remove("next");
  }
  else {
      slides[slides.length-1].classList.remove("next");
      slides[slides.length-1].classList.add("prev");   
    }
    
    activeSlide = prevSlide;
}

setInterval(updateNextSlide, 4000);
</script>


@endsection
