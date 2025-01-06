@extends('quick_digital.layout.layout')
@section('content')
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('front/styles/digital_product.css') }}">

    <div class="dig_prod_section">
        <div class="centered_product">

            <div class="search_box">
                <form action="">
                    <div class="search">
                        <input type="text" name="search_name" placeholder="নাম দিয়ে সার্চ করুন">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </div>
                    </div>
                </form>
            </div>

            <ul class="listing">

            @if (empty($products))
                <p>No products available.</p>
            @else
            @foreach ($products as $product)
            <!-- _________________________ product list start -->
            <li class="product">
                <a class="img-wrapper">
                    <img src="{{ $product->thumbnail ? asset($product->thumbnail) : asset('no_image2.jpg') }}" alt="">
                </a>
                <!-- <div class="note no-stock">Out of stock</div> -->
                <div class="note on-sale">On sale</div>
                
                <div class="info">
                    <div class="title">{{$product->title}}</div>
                    <div class="price">{{$product->price}} BDT</div>
                </div>
                
                <div class="actions-wrapper">
                    <!-- <a href="#" class="add-btn cart">Cart</a> -->
                    <a href="{{ route('digitalProduct.order', ['id' => $product->id]) }}" class="add-btn cart">Buy</a>
                </div>
            </li>
            <!-- _________________________ product list end -->
            @endforeach
            @endif

            </ul>
        </div>
    </div>
       

        
@endsection