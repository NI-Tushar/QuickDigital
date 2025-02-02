@extends('quick_digital.layout.layout')
@section('content')
    <link rel="stylesheet" href="{{ url('front/styles/digital_product.css') }}">


    <div class="software_section">
    <div class="centered_list">
        <div class="soft_heading">
          <div class="header_part">
            <h3>ডিজিটাল প্রোডাক্ট</h3>  
          </div>
          <!-- ___________________________ product search start -->
          <div class="header_part search_box">
            <form method="GET" action="{{ route('quick.digitalProduct') }}">
              <div class="search">
                <input type="text" id="nameInput" name="nameField" placeholder="নাম দিয়ে সার্চ করুন" value="{{ request('name') }}" autocomplete="off">
                <div class="icon">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
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
      </div>
    </div>
  </div>



  <!-- ________________________________ -->
  <section class="software_list_section">
      <div class="list_card">
        <div class="blank-1"></div>
          <div class="cards">

            <!-- _____________________________ -->
                @if (empty($products))
                    <p>কোনো ডিজিটাল প্রোডাক্ট পাওয়া যায়নি</p>
                @else

                @foreach ($products as $product)

                  <div class="signle_card">
                    <div class="card-body">
                      <div class="slide">
                        <div class="slide_part img_part">
                            <img src="{{ $product->thumbnail ? asset($product->thumbnail) : asset('no_image2.jpg') }}" alt="">
                        </div>
                        <div class="slide_part desc_part">
                            <div class="soft_desc">
                                <h3>{{ $product->title }}</h3>
                        
                                <div class="review">
                                    <div class="demo"><a href="{{ $product->demo_link }}">বিস্তারিত<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M320 0c-17.7 0-32 14.3-32 32s14.3 32 32 32l82.7 0L201.4 265.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L448 109.3l0 82.7c0 17.7 14.3 32 32 32s32-14.3 32-32l0-160c0-17.7-14.3-32-32-32L320 0zM80 32C35.8 32 0 67.8 0 112L0 432c0 44.2 35.8 80 80 80l320 0c44.2 0 80-35.8 80-80l0-112c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 112c0 8.8-7.2 16-16 16L80 448c-8.8 0-16-7.2-16-16l0-320c0-8.8 7.2-16 16-16l112 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L80 32z"/></svg></a></div>
                                </div>
                                <div class="price_section">
                                    <div class="left"><p>On Sell</p></div>
                                    <div class="right">
                                      @if(!empty($product->price))
                                        {{ $product->price }}<span> BDT</span>
                                      @endif
                                    </div>
                                </div>
                                <div class="button_section">
                                    <!-- <a href="!">কাস্টম</a> -->
                                    <a href="!" class="active">এখনই কিনুন</a>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div> 


                @endforeach
                @endif
              </div>
              <!-- _____________________________ -->
              <div class="blank-2"></div>
            </div>
          </section>
 
 <style>
/* Pagination custom styles */
  .page-link {
      color: var(--primary-color)!important;
  }
  .page-link:hover {
      color: var(--primary-color)!important;
  }
  .page-item.active .page-link {
      background-color:var(--primary-color) !important;
      border-color: var(--primary-color)!important;
      color: #fff !important;
  }
  .page-item.disabled .page-link {
      color: #aaa !important;
  }
</style>
<!-- Pagination Links -->
<div class="d-flex justify-content-center">
  {{ $products->links('pagination::bootstrap-4') }}
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


<ul class="listing" style="display:none;">
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
