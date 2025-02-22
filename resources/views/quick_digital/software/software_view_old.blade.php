@extends('quick_digital.layout.layout')
@section('content')
<link rel="stylesheet" href="{{ url ('front/styles/software.css') }}">


<!-- __________________ BANNER SECTION START -->
 <!-- <section class="banner_section">
    <div class="banner_center">
      <h3>আপনার ব্যবসার কার্যক্রমকে সহজ, দ্রুত এবং নির্ভুল করতে চান? আমাদের ম্যানেজমেন্ট সফটওয়্যার ঠিক সেই কাজটিই করবে!</h3>
      <p>কেন আমাদের ম্যানেজমেন্ট সফটওয়্যার ব্যবহার করবেন?</p>
      <ul>
        <li><strong>সম্পূর্ণ অটোমেশন:</strong> কাজের ঝামেলা দূর করুন, সময় ও খরচ বাঁচান।</li>
        <li><strong>রিয়েল-টাইম রিপোর্টিং:</strong> আপনার ব্যবসার সকল তথ্য এক ক্লিকে।</li>
        <li><strong>সহজ ইন্টারফেস:</strong> ব্যবহার করতে কোনো অতিরিক্ত প্রশিক্ষণের প্রয়োজন নেই।</li>
        <li><strong>কাস্টমাইজড সলিউশন:</strong> আপনার ব্যবসার চাহিদা অনুযায়ী ব্যক্তিগতকরণ।</li>
        <li><strong>নিরাপত্তার নিশ্চয়তা:</strong> আপনার ডেটা সম্পূর্ণ সুরক্ষিত।</li>
    </ul>
    </div>
 </section> -->
<!-- __________________ BANNER SECTION END -->


<div class="software_section" style="display:none;">
    <div class="centered_list">
        <div class="soft_heading">
            <h3>ম্যানেজমেন্ট সফটওয়্যার লিস্টঃ</h3>
        </div>
        <style>
          
        /* ___________________ search box start */
        .search_box{
          margin-bottom: 2rem;
          padding:10px;
          border-radius: 5px;
          /* box-shadow: rgba(60, 64, 67, 0.3) 0px 1px 2px 0px, rgba(60, 64, 67, 0.15) 0px 1px 3px 1px; */
        }
        .search_box .search{
          display: flex;
          gap:5px;
          border: none;
        }
        .search_box .search input{
          width: 100%;
          padding: 10px;
          font-size: 17px;
          border-radius: 5px;
          border: 1px solid var(--primary-color);
          outline: none;
        }
        .search_box .search .icon{
          width: 50px;
          display: flex;
          border-radius: 5px;
          border: 1px solid var(--primary-color);
        }
        .search_box .search .icon:hover{
          background-color: var(--primary-color);
        }
        .search_box .search .icon:hover svg{
          color: aliceblue;
        }
        .search_box .search .icon svg{
          margin: auto;
        }
        /* ___________________ search box end */
        </style>

            <!-- ___________________________ product search start -->
            <div class="search_box">
                <form method="GET" action="{{ route('quick.software') }}">
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
             
             

        <!-- _______________________________________ suggesion for search start -->
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
                              url: '{{ route("quick.software.suggestion") }}',
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
        <!-- _______________________________________ suggesion for search end -->



        <div class="list_section">
            <!-- _____________________________ -->
            @if (empty($softwares))
                <p>কোনো সফটওয়্যার পাওয়া যায়নি</p>
            @else
                @foreach ($softwares as $software)
                <div class="soft_list">
                    <div class="img_sec">
                        <img src="{{ $software->thumbnail ? asset($software->thumbnail) : asset('no_image2.jpg') }}" alt="">
                    </div>
                    <div class="desc_sec">
                        <p class="sof_name">{{ $software->title }}</p>
                        <p class="desc">{{ strlen($software->description) > 100 ? substr($software->description, 0, 200) . '...' : $software->description }}</p>
                        <ul>
                            @php
                                $software->features = json_decode($software->features, true);
                            @endphp
                            @foreach ($software->features as $feature)
                                <li>{{ $feature }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="price_sec">
                        <div class="price_elem">
                                <div class="cart">
                                    <svg height="25px" width="25px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="var(--primary-color)">
                                        <path d="M7 18c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm10 0c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm2.756-3H6.465L4.522 4H2V2h3.065a1 1 0 0 1 .968.75L6.92 6h13.178a1 1 0 0 1 .94 1.342l-2.828 7A1 1 0 0 1 17.756 15z"/>
                                    </svg>
                                </div>
                                <div class="price">
                                @if(!empty($software->price))
                                    <p class="current_price">{{ $software->price }}<span>/টাকা প্রতি মাসে</span></p>
                                @endif
                                </div>
                                <div class="review">

                                  <!-- @php
                                      $star_rating = $software->star_rating;
                                  @endphp

                                  <ul>
                                  @for ($i = 1; $i <= 5; $i++)
                                      @if ($i <= $star_rating)
                                      <li class="active"><svg height="20px" width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" stroke="black">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87L18.18 22 12 18.27 5.82 22 7 14.14l-5-4.87 6.91-1.01L12 2z"/>
                                            </svg>
                                        </li>
                                      @else
                                      <li><svg height="20px" width="20px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" stroke="black">
                                            <path d="M12 2l3.09 6.26L22 9.27l-5 4.87L18.18 22 12 18.27 5.82 22 7 14.14l-5-4.87 6.91-1.01L12 2z"/>
                                            </svg>
                                        </li>
                                      @endif
                                  @endfor

                                </ul> -->

                            </div>
                            <div class="buttons">
                                @if($software->demo_link !='')
                                  <a href="{{ $software->demo_link }}" target="_blank"><button>ডেমো</button></a>
                                @else
                                  <button style=" background-color: #ccc;color: #666; cursor: not-allowed; opacity: 0.6; pointer-events: none;">ডেমো</button>
                                @endif
                                <button onclick="showDetails('{{ $software->id }}', '{{ $software->title }}', '{{ $software->price }}')" class="active">কিনুন</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
              <!-- Pagination Links -->
              <div class="d-flex justify-content-end">
                {{ $softwares->links('pagination::bootstrap-4') }}
            </div>
            <!-- _____________________________ -->
        </div>
    </div>
</div>




<!-- ______________________________ pop up show onlick by start -->
<div id="showDetails" class="buy_popup_section">
  <div class="centered_popup_section">
    <div onclick="closeDetails()" class="btn-close"></div>
    <div class="clear"></div>
    <div class="content">
      <form id="formAction" action="{{ route('software.order') }}" method="POST">
        @csrf
        <input id="soft_id" type="hidden" name="software_id" value="">
        <div class="details_box">
          <div class="list">
              <label for="">সফটওয়্যার টাইটেলঃ</label> 
              <p id="title"></p>
          </div>
          <div class="list">
            <label for="">সাবস্ক্রিপশন প্রাইজঃ</label>
            <p id="subsPrice"></p>
          </div>
          <div class="list">
            <label for="">সিলেক্ট করুনঃ</label>
            <select name="software_type" id="options" required>
              <option selected disabled value="">সিলেক্ট করুন</option>
              <option value="custom">কাস্টম অর্ডার করুন</option>
              <option value="subscription">সাবস্ক্রিপশন করুন</option>
            </select>
          </div>

          <!-- <div id="checkboxContainer" style="display: none; margin-top: 5px;">
            <input type="checkbox" id="buyCheckbox" name="hosting">
            <span for="buyCheckbox">With Hosting?</span>
          </div> -->

          <div class="button_section">
              <input type="submit" value="এখনই অর্ডার করুন">
          </div>

        </div>
      </form>
    </div>
  </div>
</div>
<!-- ______________________________ pop up show onlick by end -->

          
<script>
  // // Get the dropdown and checkbox container elements
  // const selectElement = document.getElementById("options");
  // const checkboxContainer = document.getElementById("checkboxContainer");

  // // Add event listener for change event
  // selectElement.addEventListener("change", function () {
  //   if (selectElement.value === "buy") {
  //     checkboxContainer.style.display = "block"; // Show checkbox
  //   } else {
  //     checkboxContainer.style.display = "none"; // Hide checkbox
  //   }
  // });
</script>

<script>
  function showDetails(soft_id,title,subscription_price){
    var modal = document.getElementById("showDetails");
    document.getElementById("soft_id").value = soft_id;
    document.getElementById("title").innerText = title;
    document.getElementById("subsPrice").innerText = subscription_price;

    modal.classList.add("open");
  }
  function closeDetails(){
    var modal = document.getElementById("showDetails");
    modal.classList.remove("open");
  }
</script>
<!-- ______________________________ pop up show onlick by end -->


<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href='https://fonts.googleapis.com/css?family=Anton' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Neucha' rel='stylesheet' type='text/css'>

<div id="preview_section" class="preview_section">
  <div class="center_preview">
      <div class="close_icon" onclick="closePreview()"><p>x</p></div>
       <!-- _______________ -->
       <div class="slider">
            <div class="slide_viewer">
            <div id="slide_group" class="slide_group">
                <div class="slide">
                  <img id="slider1" src="" alt="slider1">
                </div>
                <div class="slide">
                  <img id="slider2" src="" alt="slider2">
                </div>
                <div class="slide">
                  <img id="slider3" src="" alt="slider3">
                </div>
            </div>
            </div>
        </div><!-- End // .slider -->

        <div class="directional_nav">
            <div class="previous_btn" title="Previous">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="65px" height="65px" viewBox="-11 -11.5 65 66">
                    <g>
                    <g>
                        <path fill="#474544" d="M-10.5,22.118C-10.5,4.132,4.133-10.5,22.118-10.5S54.736,4.132,54.736,22.118
                        c0,17.985-14.633,32.618-32.618,32.618S-10.5,40.103-10.5,22.118z M-8.288,22.118c0,16.766,13.639,30.406,30.406,30.406 c16.765,0,30.405-13.641,30.405-30.406c0-16.766-13.641-30.406-30.405-30.406C5.35-8.288-8.288,5.352-8.288,22.118z" />
                        <path fill="#474544" d="M25.43,33.243L14.628,22.429c-0.433-0.432-0.433-1.132,0-1.564L25.43,10.051c0.432-0.432,1.132-0.432,1.563,0	c0.431,0.431,0.431,1.132,0,1.564L16.972,21.647l10.021,10.035c0.432,0.433,0.432,1.134,0,1.564	c-0.215,0.218-0.498,0.323-0.78,0.323C25.929,33.569,25.646,33.464,25.43,33.243z" />
                    </g>
                    </g>
                </svg>
            </div>
            <div class="next_btn" title="Next">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="65px" height="65px" viewBox="-11 -11.5 65 66">
                    <g>
                    <g>
                        <path fill="#474544" d="M22.118,54.736C4.132,54.736-10.5,40.103-10.5,22.118C-10.5,4.132,4.132-10.5,22.118-10.5	c17.985,0,32.618,14.632,32.618,32.618C54.736,40.103,40.103,54.736,22.118,54.736z M22.118-8.288	c-16.765,0-30.406,13.64-30.406,30.406c0,16.766,13.641,30.406,30.406,30.406c16.768,0,30.406-13.641,30.406-30.406 C52.524,5.352,38.885-8.288,22.118-8.288z" />
                        <path fill="#474544" d="M18.022,33.569c 0.282,0-0.566-0.105-0.781-0.323c-0.432-0.431-0.432-1.132,0-1.564l10.022-10.035 			L17.241,11.615c 0.431-0.432-0.431-1.133,0-1.564c0.432-0.432,1.132-0.432,1.564,0l10.803,10.814c0.433,0.432,0.433,1.132,0,1.564 L18.805,33.243C18.59,33.464,18.306,33.569,18.022,33.569z" />
                    </g>
                    </g>
                </svg>
            </div>
        </div><!-- End // .directional_nav -->

       <!-- _______________ -->
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

  <script>
    // __________________________show preview
    function showPreview(image_1,image_2,image_3){
      console.log(image_1,image_2,image_3);
      document.getElementById("slider1").src = image_1;
      document.getElementById("slider2").src = image_2;
      document.getElementById("slider3").src = image_3;

      document.getElementById("preview_section").style.display="flex";
    }
    // __________________________close preview
    function closePreview(image_1,image_2,image_3){
      
      document.getElementById("preview_section").style.display="none";
    }



    $('.slider').each(function() {
      var $this = $(this);
      var $group = $this.find('.slide_group');
      var $slides = $this.find('.slide');
      var bulletArray = [];
      var currentIndex = 0;
      var timeout;

      function move(newIndex) {
        var animateLeft, slideLeft;
        advance();
        if ($group.is(':animated') || currentIndex === newIndex) {
          return;
        }
        bulletArray[currentIndex].removeClass('active');
        bulletArray[newIndex].addClass('active');
        if (newIndex > currentIndex) {
          slideLeft = '100%';
          animateLeft = '-100%';
        } else {
          slideLeft = '-100%';
          animateLeft = '100%';
        }
        $slides.eq(newIndex).css({
          display: 'block',
          left: slideLeft
        });
        $group.animate({
          left: animateLeft
        }, function() {
          $slides.eq(currentIndex).css({
            display: 'none'
          });
          $slides.eq(newIndex).css({
            left: 0
          });
          $group.css({
            left: 0
          });
          currentIndex = newIndex;
        });
      }

      function advance() {
        clearTimeout(timeout);
        timeout = setTimeout(function() {
          if (currentIndex < ($slides.length - 1)) {
            move(currentIndex + 1);
          } else {
            move(0);
          }
        }, 4000);
      }
      $('.next_btn').on('click', function() {
        if (currentIndex < ($slides.length - 1)) {
          move(currentIndex + 1);
        } else {
          move(0);
        }
      });
      $('.previous_btn').on('click', function() {
        if (currentIndex !== 0) {
          move(currentIndex - 1);
        } else {
          move(3);
        }
      });
      $.each($slides, function(index) {
        var $button = $('<a class="slide_btn">&bull;</a>');
        if (index === currentIndex) {
          $button.addClass('active');
        }
        $button.on('click', function() {
          move(index);
        }).appendTo('.slide_buttons');
        bulletArray.push($button);
      });
      advance();
    });
  </script>




@endsection