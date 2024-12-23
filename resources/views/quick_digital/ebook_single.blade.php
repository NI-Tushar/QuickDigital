@extends('quick_digital.layout.layout')
@section('content')
    <main>
        <section class="container max-width custom-padding py-5">
            <div class="row justify-content-center g-5">
                <div class="col-12 col-md-5 d-flex justify-content-center">
                    <img class="card_img_top"
                        src="{{ $ebook->cover_image ? asset($ebook->cover_image) : asset('no_image.jpg') }}"
                        alt="{{ $ebook->title }}" style="width:350px;">
                </div>
                <div class="col-12 col-md-6">
                    <div class="px-4">
                        <h3 class="fw-bold" style="font-family: 'Poppins', sans-serif">{{ $ebook->title }}</h3>
                        <div class="mt-3">
                            <span class="fw-bold">বিবরণ</span>
                            <p>{{ $ebook->description }}</p>
                        </div>
                        <div class="mt-3">
                            <h5 class="fw-bold fs-6">
                                রচনার তারিখ: <span
                                    class="text-dark fw-semibold fs-6">{{ $ebook->release_date->format('d-m-Y') }}</span>
                            </h5>
                            <h5 class="fw-bold fs-6">
                                পেজ সংখ্যা: <span class="text-dark fw-bold fs-5">{{ $ebook->total_page }}</span>
                            </h5>
                            <div class="d-flex gap-3 fw-bold fs-6">
                                মূল্য:
                                <span class=" fw-bold fs-5">৳ {{ $ebook->price }}</span>
                                @if ($ebook->original_price)
                                    <span class="text-decoration-line-through fw-normal">৳
                                        {{ $ebook->original_price }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mt-4">
                                <a href="{{ route('cart.create', $ebook->id) }}"
                                    class="add__to__cart__btn btn btn-lg text-white fw-bold">এখনই কিনুন</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="container max-width custom-padding mb-5">
            <h4 class="fw-bold border-bottom border-2 pb-3 mb-3">অন্যান্য ই-বুক</h4>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-3 justify-content-center">
                @foreach($ebooks as $book)
                @if ($book != $ebook)
                <div class="col d-flex justify-content-center mx-1">
                    <div class="d-flex flex-column justify-content-between gap-3 gap-md-0 pt-0 ebook__list__card">
                        <a href="{{ url('quick-digital/ebook/' . $book->id) }}" class="overflow-hidden">
                            <img class="img-fluid rounded-top-3 ebook__list__img"
                                src="{{ asset($book->cover_image ? $book->cover_image : 'front/assets/images/no_image.jpg') }}" alt="{{ $book->title }}" style="width:300px;height:500px;">
                        </a>
                        <a href="{{ url('quick-digital/ebook/' . $book->id) }}"
                            class="text-decoration-none text-dark py-2">
                            <h3 class="fw-bold m-0 px-2 fs-5">{{ $book->title }}</h3>
                        </a>
                        <div class="d-flex gap-3 px-2 py-2">
                            <span class="fw-bold fs-5">৳ {{ $book->price }}</span>
                            @if($book->original_price)
                                <span class="text-decoration-line-through">৳ {{ $book->original_price }}</span>
                            @endif
                        </div>
                        <a href="{{ url('quick-digital/ebook/' . $book->id) }}" class="mx-2 text-center text-decoration-none fw-bold add__to__cart__btn py-2">
                            এখনই কিনুন
                        </a>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </section>
        <section class="container max-width custom-padding pb-5">
            <h4 class="text-center fw-bold border-bottom border-2 pb-3 mb-3">বিস্তারিত</h4>
            <div class="row d-flex justify-content-center gap-3">
                <div class="col-12 col-md-5">
                    <div class="iframe-wrapper">
                        <iframe class="border-0 rounded" src="https://www.youtube.com/embed/IEnPLF2k6p0?si=Cu2ga8uk4jzjS7S-"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
                <div class="col-12 col-md-5">
                    <div class="iframe-wrapper">
                        <iframe class="border-0 rounded" src="https://www.youtube.com/embed/0ewF0cYNoBk?si=yd2-QujaVQ_g3HJ6"
                            title="YouTube video player" frameborder="0"
                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                            referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
