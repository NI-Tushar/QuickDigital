@extends('quick_digital.layout.layout')
@section('content')
    <header class="animate__animated animate__fadeIn container max-width custom-padding mb-3">
        <div class="me-2 position-relative w-100">
            <input class="w-100 input_search" type="search" placeholder="Search" aria-label="Search" id="product_input_search">
            <div
                class="position-absolute h-100 top-0 start-0 d-flex align-items-center justify-content-center px-2">
                <svg class="shop_search_icon" height="20px" width="20px"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path
                        d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748Z">
                    </path>
                </svg>
            </div>
            <div
                class="position-absolute h-100 top-0 end-0 d-flex align-items-center justify-content-center px-2">
                <button class="border-0 search_button" type="submit">Search</button>
            </div>
        </div>
    </header>
    <main>
        <section>
            <div class="container max-width custom-padding">
                <img class="w-100" src="https://placehold.co/600x400" alt="">
            </div>
        </section>
        <section>
        <div class="max-width custom-padding container my-5">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-5" id="product_search_result_append">
                @foreach($products as $product)
                <div class="col">
                    <a href="{{ url('quick-digital/quick-shop/product/' . $product->id) }}" class="text-decoration-none text-dark">
                        <div class="border">
                            <div class="overflow-hidden">
                                <img class="w-100 product_img" src="{{ asset($product->image_1) }}" alt="{{ $product->name }}">
                            </div>
                            <div class="px-3 my-3">
                                <span class="product_title">{{ $product->name }}</span>
                                <span class="d-flex gap-3 align-items-center">
                                    <span class="fw-bold">৳ {{ $product->discount_price }}</span><span class="text-decoration-line-through product__linethrough__text"> ৳ {{ $product->actual_price }}</span>
                                </span>
                            </div>
                            <span class="d-flex align-items-center justify-content-center gap-1 col-12 py-2 fw-bold text-white purchase_btn">
                                <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M4.00436 6.41686L0.761719 3.17422L2.17593 1.76001L5.41857 5.00265H20.6603C21.2126 5.00265 21.6603 5.45037 21.6603 6.00265C21.6603 6.09997 21.6461 6.19678 21.6182 6.29L19.2182 14.29C19.0913 14.713 18.7019 15.0027 18.2603 15.0027H6.00436V17.0027H17.0044V19.0027H5.00436C4.45207 19.0027 4.00436 18.5549 4.00436 18.0027V6.41686ZM5.50436 23.0027C4.67593 23.0027 4.00436 22.3311 4.00436 21.5027C4.00436 20.6742 4.67593 20.0027 5.50436 20.0027C6.33279 20.0027 7.00436 20.6742 7.00436 21.5027C7.00436 22.3311 6.33279 23.0027 5.50436 23.0027ZM17.5044 23.0027C16.6759 23.0027 16.0044 22.3311 16.0044 21.5027C16.0044 20.6742 16.6759 20.0027 17.5044 20.0027C18.3328 20.0027 19.0044 20.6742 19.0044 21.5027C19.0044 22.3311 18.3328 23.0027 17.5044 23.0027Z">
                                    </path>
                                </svg> এখনই কিনুন
                            </span>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        </div>
        </section>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#product_input_search').keyup(function(){
                let phrase = $(this).val();

                $.ajax({
                    url: "{{ route('search.product') }}",
                    type: 'GET',
                    data: { search: phrase },
                    success: function(data) {
                        let results = $('#product_search_result_append');
                        results.empty();

                        if(data.length > 0) {
                            console.log("i am here", data);

                            data.forEach(product => {
                                results.append(`
                                    <div class="col">
                                        <a href="{{ url('quick-digital/quick-shop/product/') }}/${product.id}" class="text-decoration-none text-dark">
                                            <div class="border">
                                                <div>
                                                    <img class="w-100" src="{{ asset('') }}${product.image_1}" alt="${product.name}">
                                                </div>
                                                <div class="px-3 my-3">
                                                    <span class="product_title">${product.name}</span>
                                                    <span class="d-flex gap-5">
                                                        <span class="fw-bold">৳ ${product.discount_price}</span><span class="text-decoration-line-through"> ৳ ${product.actual_price}</span>
                                                    </span>
                                                </div>
                                                <span class="d-flex align-items-center justify-content-center gap-1 col-12 py-2 fw-bold text-white purchase_btn">
                                                    <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                                        <path d="M4.00436 6.41686L0.761719 3.17422L2.17593 1.76001L5.41857 5.00265H20.6603C21.2126 5.00265 21.6603 5.45037 21.6603 6.00265C21.6603 6.09997 21.6461 6.19678 21.6182 6.29L19.2182 14.29C19.0913 14.713 18.7019 15.0027 18.2603 15.0027H6.00436V17.0027H17.0044V19.0027H5.00436C4.45207 19.0027 4.00436 18.5549 4.00436 18.0027V6.41686ZM5.50436 23.0027C4.67593 23.0027 4.00436 22.3311 4.00436 21.5027C4.00436 20.6742 4.67593 20.0027 5.50436 20.0027C6.33279 20.0027 7.00436 20.6742 7.00436 21.5027C7.00436 22.3311 6.33279 23.0027 5.50436 23.0027ZM17.5044 23.0027C16.6759 23.0027 16.0044 22.3311 16.0044 21.5027C16.0044 20.6742 16.6759 20.0027 17.5044 20.0027C18.3328 20.0027 19.0044 20.6742 19.0044 21.5027C19.0044 22.3311 18.3328 23.0027 17.5044 23.0027Z"></path>
                                                    </svg> এখনই কিনুন
                                                </span>
                                            </div>
                                        </a>
                                    </div>
                                `);
                            });
                        } else {
                            results.append('<p>No products found.</p>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                    }
                });
            });
        });
    </script>
@endsection
