@extends('quick_digital.layout.layout')
@section('content')
<link rel="stylesheet" href="{{ url('front/styles/digital_product_desc.css') }}">

<div class="product_view_section">
    <div class="centered_desc">
        <div class="desc_part desc_left">
            <img src="{{ $product->thumbnail ? asset($product->thumbnail) : asset('no_image2.jpg') }}" alt="">
        </div>
        <div class="desc_part desc_right">
            <div class="name_price">
                <h3>{{$product->title}}</h3>
                <p class="price">মূল্যঃ {{$product->price}} BDT</p>
            </div>
            <div class="rate">
                <a href="#!" class="active">★</a>
                <a href="#!" class="active">★</a>
                <a href="#!" class="active">★</a>
                <a href="#!">★</a>
                <a href="#!">★</a>
            </div>
            <div class="description">
                <h5>বিবরণঃ</h5>
                <p>{{ strlen($product->description) > 100 ? substr($product->description, 0, 500) . '...' : $product->description }} <span title="{{$product->description}}">More</span></p>
            </div>
            <div class="features">
                <h5>বৈশিষ্ট্যসমূহঃ</h5>
                <ul>
                    @php
                        $product->features = json_decode($product->features, true);
                        $count = 0;
                    @endphp

                    @foreach ($product->features as $feature)
                        @if ($count < 5)
                            <li>{{ $feature }}</li>
                            @php $count++; @endphp
                        @else
                            @break
                        @endif
                    @endforeach
                    <li>আরও দেখুন</li>
                </ul>
            </div>
            <div class="pricing">
                <div class="pricing_part left_border">
                    <p>প্যাকেজ</p>
                    <p class="value">বেসিক</p>
                </div>
                <div class="pricing_part left_border">
                    <p>পরিমান</p>
                    <p class="value">1</p>
                </div>
                <div class="pricing_part left_border">
                    <p>সাবটোটাল</p>
                    <p class="value">{{$product->price}} BDT</p>
                </div>
                <div class="pricing_part left_border">
                    <p>টোটাল</p>
                    <p class="value">{{$product->price}} BDT</p>
                </div>
            </div>

            <div class="button_section">
                <a href="{{ route('digitalProduct.order', ['id' => $product->id]) }}">
                    <button>
                        <img src="http://co0kie.github.io/codepen/nike-product-page/cart.png" alt="">
                        Buy Now
                    </button>
                </a>
                <a href="#!" class="share_icon"><img src="http://co0kie.github.io/codepen/nike-product-page/share.png" alt=""></a>
            </div>
        </div>
    </div>
</div>
@endsection

