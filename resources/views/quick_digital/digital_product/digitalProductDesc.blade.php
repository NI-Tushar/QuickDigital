@extends('quick_digital.layout.layout')
@section('content')
<link rel="stylesheet" href="{{ url('front/styles/digital_product_desc.css') }}">

<div class="product_view_section">
    <div class="centered_desc">
        <div class="desc_part desc_left">
            <img src="https://pvaatoz.com/resource/images/product_poster/quora_poster.png" alt="">
        </div>
        <div class="desc_part desc_right">
            <div class="name_price">
                <h3>Digital Product Name</h3>
                <p class="price">250 BDT</p>
            </div>
            <div class="rate">
                <a href="#!" class="active">★</a>
                <a href="#!" class="active">★</a>
                <a href="#!" class="active">★</a>
                <a href="#!">★</a>
                <a href="#!">★</a>
            </div>
            <div class="description">
                <h5>Description</h5>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus veniam ipsa velit? Cum libero suscipit ducimus quisquam, commodi quas amet ea, consectetur, id esse culpa laudantium? Vero maxime magni commodi.</p>
            </div>
        </div>
    </div>
</div>
@endsection

