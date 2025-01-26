@extends('quick_digital.layout.layout')
@section('content')
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('front/styles/digital_product.css') }}">


<!-- __________________ BANNER SECTION START -->
<section class="banner_section" style="display:none;">
    <div class="banner_center">
        <h3>আপনার ওয়েবসাইটকে আধুনিক, দ্রুত এবং ইউজার ফ্রেন্ডলি করতে চান? আমাদের ডিজিটাল প্রোডাক্টগুলো আপনার সঠিক সমাধান!</h3>
        <p>কেন আমাদের থিম এবং প্লাগইন ব্যবহার করবেন?</p>
        <ul>
            <li><strong>প্রিমিয়াম ডিজাইন:</strong> অত্যাধুনিক এবং রেসপন্সিভ থিম, যা মোবাইল, ট্যাবলেট এবং ডেস্কটপে একইভাবে কাজ করবে।</li>
            <li><strong>সহজ কাস্টমাইজেশন:</strong> কোডিংয়ের ঝামেলা ছাড়াই আপনার চাহিদা অনুযায়ী থিম ও প্লাগইন কাস্টমাইজ করুন।</li>
            <li><strong>দ্রুত লোডিং স্পিড:</strong> SEO ফ্রেন্ডলি ডিজাইন যা আপনার ওয়েবসাইটের লোডিং সময় কমিয়ে দেবে।</li>
            <li><strong>রেগুলার আপডেট:</strong> সর্বশেষ প্রযুক্তি ও নিরাপত্তা নিশ্চিত করার জন্য নিয়মিত আপডেট।</li>
            <li><strong>২৪/৭ সাপোর্ট:</strong> যেকোনো সমস্যা সমাধানে আমরা আছি আপনার পাশে।</li>
        </ul>
    </div>
</section>
<!-- __________________ BANNER SECTION END -->
 

    <div class="dig_prod_section">
        <div class="centered_product">
        <div class="soft_heading">
            <h3>ডিজিটাল প্রোডাক্ট লিস্টঃ</h3>
        </div>
            <!-- ___________________________ product search start -->
            <div class="search_box">
                <form method="GET" action="{{ route('quick.digitalProduct') }}">
                    <div class="search">
                        <input type="text" id="nameInput" name="nameField" placeholder="নাম দিয়ে সার্চ করুন" value="{{ request('name') }}" autocomplete="off">
                        <div class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </div>
                    </div>
                    <input type="hidden" id="name" name="name" value="{{ request('name') }}">
                    <div id="nameSuggestion" class="dropdown-menu" style="display: none; max-height: 200px; overflow-y: auto;">
                        <!-- Suggestions will be dynamically populated here -->
                    </div>
                </form>
            </div>
            <!-- ___________________________ product search end -->

            <ul class="listing">
                @if (empty($products))
                    <p>কোনো প্রোডাক্ট পাওয়া যায়নি</p>
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
                        <a href="{{ route('digitalProduct.details', ['id' => $product->id]) }}" class="add-btn cart">Details</a>
                        <a href="{{ route('digitalProduct.order', ['id' => $product->id]) }}" class="add-btn cart">Buy</a>
                    </div>
                </li>
                <!-- _________________________ product list end -->
                @endforeach
                @endif
            </ul>
            <!-- Pagination Links -->
            <div class="d-flex justify-content-end">
                {{ $products->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>



@endsection
@push('script')

<script src="https://cdn.jsdelivr.net/npm/axios@1.6.7/dist/axios.min.js"></script>
    <script>

        $(document).ready(function () {
            // Handle input change for dynamic suggestions
            $('#nameInput').on('input', function () {
                const query = $(this).val();
                console.log(query);

                // If the input is cleared, submit the form to show all products
                if (query.length === 0) {
                    $('#name').val('');
                    $(this).closest('form').submit();
                    return;
                }

                // Fetch suggestions if input is non-empty
                $.ajax({
                    url: '{{ route("quick.digitalProduct.suggestion") }}',
                    type: 'GET',
                    data: { query: query },
                    dataType: 'json',
                    success: function (res) {
                        displaySuggestions(res);
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            // Display suggestions in the dropdown
            function displaySuggestions(data) {
                let suggestions = data.map(item => `
                    <a href="#" class="dropdown-item" data-name="${item.title}">${item.title}</a>
                `).join('');
                $('#nameSuggestion').html(suggestions).show();
            }

            // When a suggestion is clicked, set input and hidden field values
            $('#nameSuggestion').on('click', '.dropdown-item', function (e) {
                e.preventDefault();
                const name = $(this).data('name');
                $('#nameInput').val(name);
                $('#name').val(name); // Set hidden field with selected value
                $('#nameSuggestion').hide();

                // Auto-submit form
                $(this).closest('form').submit();
            });

            // Clear suggestions if clicking outside
            $(document).on('click', function (e) {
                if (!$(e.target).closest('#nameInput').length) {
                    $('#nameSuggestion').hide();
                }
            });
        });
    </script>

@endpush
