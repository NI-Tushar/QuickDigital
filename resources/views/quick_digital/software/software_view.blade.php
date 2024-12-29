@extends('quick_digital.layout.layout')
@section('content')
<link rel="stylesheet" href="{{ url ('front/styles/software.css') }}">

<div class="software_section">
    <div class="centered_list">
        <div class="soft_heading">
            <h3>ম্যানেজমেন্ট সফটওয়্যার লিস্টঃ</h3>
        </div>
        <div class="list_section">
            <!-- _____________________________ -->
            @if (empty($softwares))
                <p>No software available.</p>
            @else
                @foreach ($softwares as $software)
                <div class="soft_list">
                    <div class="img_sec">
                        <img src="{{ $software->poster_image ? asset($software->poster_image) : asset('no_image2.jpg') }}" alt="">
                    </div>
                    <div class="desc_sec">
                        <p class="sof_name">{{ $software->title }}</p>
                        <p class="desc">{{ $software->desc }}</p>
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
                                @if(!empty($software->current_price))
                                    <p class="current_price">{{ $software->current_price }}<span>/BDT</span></p>
                                @endif
                                @if(!empty($software->before_price))
                                  <p class="before_price">{{ $software->before_price }}<span>/BDT</span></p>
                                  @endif
                                @if(!empty($software->subscription_price))
                                  <p style="text-decoration:none;" class="before_price"><span>OR</span></p>
                                  <p class="current_price">{{ $software->subscription_price }}<span>/BDT per Month</span></p>
                                @endif
                                </div>
                                <div class="review">

                                  @php
                                      $star_rating = $software->star_rating; // Assuming it's a number like 3
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

                                </ul>
                            </div>
                            <div class="buttons">
                                <button onclick="showPreview('{{ asset($software->image_1) }}', '{{ asset($software->image_2) }}', '{{ asset($software->image_3) }}')">Preview</button>
                                <button onclick="showDetails('{{ $software->id }}', '{{ $software->title }}', '{{ $software->current_price }}', '{{ $software->subscription_price }}')" class="active">Buy</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            @endif
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
        <input id="soft_id" type="hidden" name="soft_id" value="">
        <div class="details_box">
          <div class="list">
              <label for="">Software Title:</label> 
              <p id="title"></p>
          </div>
          <div class="list">
            <label for="">Sell Price:</label>
            <p id="sellPrice"></p>
          </div>
          <div class="list">
            <label for="">Subscription Price:</label>
            <p id="subsPrice"></p>
          </div>
          <div class="list">
            <label for="">Select Option:</label>
            <select name="software_type" id="options" required>
              <option selected value=""></option>
              <option value="buy">Go to Customization Charge</option>
              <option value="subscription">Go to Subscription</option>
            </select>
          </div>

          <div id="checkboxContainer" style="display: none; margin-top: 5px;">
            <input type="checkbox" id="buyCheckbox" name="hosting">
            <span for="buyCheckbox">With Hosting?</span>
          </div>

          <div class="button_section">
              <input type="submit" value="Order Now">
          </div>

        </div>
      </form>
    </div>
  </div>
</div>

<!-- ______________________________ pop up show onlick by end -->

          
<script>
  // Get the dropdown and checkbox container elements
  const selectElement = document.getElementById("options");
  const checkboxContainer = document.getElementById("checkboxContainer");

  // Add event listener for change event
  selectElement.addEventListener("change", function () {
    if (selectElement.value === "buy") {
      checkboxContainer.style.display = "block"; // Show checkbox
    } else {
      checkboxContainer.style.display = "none"; // Hide checkbox
    }
  });
</script>

<script>
  function showDetails(soft_id,title,current_price,subscription_price){
    var modal = document.getElementById("showDetails");
    // console.log(id,title,current_price,subscription_price);
    document.getElementById("soft_id").value = soft_id;
    document.getElementById("title").innerText = title;
    document.getElementById("sellPrice").innerText = current_price;
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