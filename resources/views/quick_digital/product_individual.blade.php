@extends('quick_digital.layout.layout')
@section('content')
    <header class="header-bg text-white py-5 d-flex flex-column align-items-center justify-content-center gap-5">
        <div class="container max-width custom-padding">
            <h1 class="text-one text-center fw-bold">
                <span class="ebook__heading">{{ $product->headline_1 }}</span>
                <br> এখন থেকে এক {{ $product['category']['name'] }} এ হবে জীবন পার
            </h1>

            <div class="d-flex justify-content-center col-12 col-md-8 col-lg-8 mx-auto">
                <img class="w-100 mt-3" src="{{ asset($product->image_1) }}" alt="product">
            </div>
            <div class="d-flex justify-content-center">
                <a href="{{route('cart.create.product', $product->id)}}" class="">
                    <button class="buy-btn btn btn-success mt-3 px-4 py-2 rounded-5 fs-4 fw-bold text-white">
                        অর্ডার করতে চাই &rarr;
                    </button>
                </a>
            </div>
        </div>
    </header>

    <main>
        <section class="my-5 quote container max-width custom-padding">
            <h1 class="bg-dark rounded text-white text-center p-3 text-one fw-bold">
                বেস্ট কোয়ালিটির {{ $product->name }}টি আপনাকে যে সকল সুবিধা প্রদান করবে-
            </h1>

            <div class="row g-5 my-2">
                <div class="col-12 col-md-4">
                    <img class="w-100" src="{{ asset($product->image_2) }}" alt="product">
                </div>
                <div class="col-12 col-md-8">
                    @foreach ($product->features as $feature)
                        <p class="fw-semibold text-two text-start d-flex gap-2">
                            <span>👉</span>
                            <span>{{ $feature }}</span>
                        </p>
                    @endforeach
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <a href="{{route('cart.create.product', $product->id)}}" class="">
                    <button class="buy-btn btn btn-success mt-3 px-4 py-2 rounded-5 fs-4 fw-bold text-white">
                        অর্ডার করতে চাই &rarr;
                    </button>
                </a>
            </div>
        </section>

        <section class="py-5 bg-color">
            <div class="container max-width custom-padding">
                <div class="bg-white text-dark rounded">
                    <h1 class="fw-bold p-3 text-one text-center">
                        বেস্ট কোয়ালিটির {{ $product->name }}টি আমাদের নিকট হতে কেন নিবেন ??
                    </h1>
                </div>
                <div class="row g-3">
                    <div class="col-12 col-md-4">
                        <img class="w-100 mt-3" src="{{ asset($product->image_3) }}" alt="product">
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="my-3">
                            <div class="d-flex gap-3 py-2 border-bottom border-white">
                                <p class="fw-semibold text-two text-white text-start">💪</p>
                                <p class="fw-semibold text-two text-white text-start">
                                    প্রোডাক্ট হাতে পেয়ে, দেখে, কোয়ালিটি চেক করে পেমেন্টে করার সুবিধা।
                                </p>
                            </div>
                            <div class="d-flex gap-3 py-2 border-bottom border-white my-2">
                                <p class="fw-semibold text-two text-white text-start">💪</p>
                                <p class="fw-semibold text-two text-white text-start">
                                    প্রোডাক্ট পছন্দ না হলে সাথে সাথে রিটার্ন দিতে পারবেন।
                                </p>
                            </div>
                            <div class="d-flex gap-3 py-2 border-bottom border-white my-2">
                                <p class="fw-semibold text-two text-white text-start">💪</p>
                                <p class="fw-semibold text-two text-white text-start">
                                    সারা বাংলাদেশে কুরিয়ারের মাধ্যমে হোম ডেলিভারি পাবেন।
                                </p>
                            </div>
                            <div class="d-flex gap-3 py-2 border-bottom border-white my-2">
                                <p class="fw-semibold text-two text-white text-start">💪</p>
                                <p class="fw-semibold text-two text-white text-start">
                                    বেস্ট কোয়ালিটি সম্পূর্ণ প্রোডাক্ট পাওয়ার শতভাগ নিশ্চয়তা
                                </p>
                            </div>
                            <div class="d-flex gap-3 py-2 border-bottom border-white my-2">
                                <p class="fw-semibold text-two text-white text-start">💪</p>
                                <p class="fw-semibold text-two text-white text-start">
                                    যে কোন সময় আমাদের সাথে যোগাযোগ করতে পারবেন ।
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <a href="{{route('cart.create.product', $product->id)}}" class="">
                            <button class="buy-btn btn btn-success mt-3 px-4 py-2 rounded-5 fs-4 fw-bold text-white">
                                অর্ডার করতে চাই &rarr;
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <h4 class="bg-dark text-white text-center p-3 text-one fw-bold mb-0">
            প্রয়োজনে কল করুন- 01973784959
        </h4>
    </main>
@endsection
