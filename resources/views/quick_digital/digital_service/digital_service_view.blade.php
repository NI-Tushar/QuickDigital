@extends('quick_digital.layout.layout')
@section('content')
    <link rel="stylesheet" href="{{ url('front/styles/digital_product.css') }}">
    <link rel="stylesheet" href="{{ url('front/styles/digital_service_list_view.css') }}">


    <div class="software_section">
    <div class="centered_list">
        <div class="soft_heading">
          <div class="header_part">
            <h3>ডিজিটাল সার্ভিস</h3>  
          </div>
          <!-- ___________________________ product search start -->
          <div class="header_part search_box">
            <form method="GET" action="{{ route('quick.digitalService') }}">
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



<!-- __________________ DIGITAL SERVICE LIST START -->
<section class="service_section">
    <div class="service_card">
        <div class="blank-1"></div>
            <div class="cards">

            <!-- _______________________________ -->
                @if (empty($services))
                    <p>কোনো ডিজিটাল সার্ভিস পাওয়া যায়নি</p>
                @else
                @foreach ($services as $service)
                <div class="signle_card">
                    <div class="card_body">
                        <div class="card_part">
                            <img src="{{ $service->thumbnail ? asset($service->thumbnail) : asset('no_image2.jpg') }}" alt="">
                        </div>
                        <div class="card_part">
                            <div class="card_text">
                                <h5>{{$service->title}}</h5>
                                <div class="review">
                                    <div class="star">★★★★☆</div>
                                    <p>(Reviews)</p>
                                </div>
                                <div class="button_price">
                                    <div class="price">{{$service->price}} BDT</div>
                                    <div class="btn"><a href=""><button>কিনুন</button></a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
                @endforeach
                @endif            
            <!-- _______________________________ -->
            

            </div>
        <div class="blank-2"></div>
    </div>
</section>

<!-- __________________ DIGITAL SERVICE LIST END-->

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
  {{ $services->links('pagination::bootstrap-4') }}
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
                    url: '{{ route("quick.digitalService.suggestion") }}',
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

