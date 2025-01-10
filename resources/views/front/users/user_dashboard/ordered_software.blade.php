@extends('quick_digital.layout.layout')
@extends('front.users.user_dashboard.sidebar')

<script src="https://kit.fontawesome.com/5f7bc44e9f.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ url ('front/styles/digital_product_user.css') }}">

@section('content')
  <section class="home-section">
      <section class="home-content">
        <div class="software_section">


            <div class="centered_list">
                <main class="order_section">
                    <section class="container max-width custom-padding my-5">
                        <div class="order_center">

                     

                        <div class="order_headline">
                            <h3 class="no_post_msg">আপনার সফটওয়্যার সল্যুশন</h3>
                        </div>

                            @if ($orderedSoftware->isEmpty())
                                <div class="order_headline">
                                    <p style="font-weight:600;font-size:20px;color:red;">কোনো অর্ডার নেই</p>
                                </div>
                            @else
                            
                            @foreach ($orderedSoftware as $software)
                            <!-- _______________________ -->
                            <div class="expandable-item">
                                <div class="expandable-header">
                                    
                                <div class="collapsible-header">
                                    <div class="enr_img">
                                        <img src="{{ asset($software->softwareList->thumbnail) }}" alt="">
                                    </div>
                                    <div class="header_info">
                                        <div class="section_part">
                                            <label>সফটওয়্যার টাইটেলঃ</label>
                                            <p>{{$software->softwareList->title}}</p>
                                        </div>      
                                        @if($software->software_type=='custom')            
                                        <div class="section_part custom">
                                            <label>কাস্টম ফিচার</label>
                                            @php
                                                $software['Custom_requirement_list'] = json_decode($software['Custom_requirement_list'], true);
                                            @endphp
                                            <p onclick="showDetails('{{ $software->id }}', {{ json_encode($software->Custom_requirement_list) }})">
                                                <span>ফিচার এড করুন</span>
                                            </p>

                                        </div>
                                        @endif           
                                        <div class="section_part price_section">
                                            <label>পেইড এমাউন্ট</label> 
                                            <p><span>{{$software->total}}</span> /BDT</p>
                                        </div>
                                    </div>
                                    <div class="section_part">
                                        <div class="down_icon" onclick="toggle('<?php echo $loop->index; ?>')">

                                            <div class="up_down_arrow">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M12 19V5"></path> <!-- Vertical line -->
                                                    <path d="M5 9l7-7 7 7"></path> <!-- Upward arrow -->
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M12 5v14"></path> <!-- Vertical line -->
                                                    <path d="M19 15l-7 7-7-7"></path> <!-- Downward arrow -->
                                                </svg>
                                            </div>

                                        </div>
                                    </div>

                                </div>    
                                </div>
                                <div class="expandable-body software">
                                    <div id="drop_text" class="drop_text">
                                        <div class="drop_section">
                                            <label>Description / বিবরণঃ:</label>
                                            <p>{{$software->softwareList->description}}</p>
                                        </div>
                                        <div class="drop_section">
                                            <label>Features / বৈশিষ্ট্যসমূহঃ</label>
                                            <ul>
                                                @php
                                                    $software->softwareList->features = json_decode($software->softwareList->features, true);
                                                @endphp
                                                @foreach ($software->softwareList->features as $feature)
                                                    <li>{{ $feature }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        <div class="drop_section file_section">
                                            <div class="file_box">
                                                <div class="software_datetime">
                                                    <label>সাবস্ক্রিপশন তারিখ:</label>
                                                    <p>{{$software->created_at->format('F j, Y')}}</p> 
                                                    @if($software->start_date!=null)
                                                        <label>সর্বশেষ রিনিউ তারিখ:</label>
                                                        <p>{{$software->start_date}}</p>
                                                    @endif 
                                                    @if($software->end_date!=null)
                                                        <label>মেয়াদের শেষ তারিখ:</label>
                                                        <p>{{$software->end_date}}</p> 
                                                    @endif 
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                </div>
                            <!-- _______________________ -->
                            @endforeach
                            @endif
                        </div>
                    </section>
                </main>

        </div>
    </div>
</section>


<!-- ____________________________________ Custom Features start -->

<div id="showDetails" class="buy_popup_section">
  <div class="centered_popup_section">
    <div onclick="closeDetails()" class="btn-close"></div>
    <div class="clear"></div>
    <div class="content">
      <form id="formAction" action="{{ route('add.custom.feature') }}" method="POST">
        @csrf
       
        <!--  start form input -->
          <div class="feature_box">
            <input id="soft_id" name="software_id" type="hidden"value="">
            <p class="feature_heading">কাস্টম ফিচার এড করুনঃ</p>
            <div class="input_fields_wrap">
                <div>
                    <textarea type="text" name="features[]"></textarea><a href="#" class="remove_field"><p>Remove</p></a>
                </div>
            </div>
            <div class="add_feature">
                <button class="add_field_button">আরও এড করুন</button>
            </div>
        </div>
        <!--  end form input -->

          <div class="button_section">
              <input type="submit" value="সাবমিট করুন">
          </div>

        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script>

  function showDetails(software_id,Custom_requirement_list){
    var centered_popup_section = document.getElementById("showDetails");
    document.getElementById("soft_id").value = software_id;
    console.log(Custom_requirement_list);
    centered_popup_section.classList.add("open");
  }
  function closeDetails(){
    var centered_popup_section = document.getElementById("showDetails");
    centered_popup_section.classList.remove("open");
  }

//   __________________________________________________________________ for adding a new feature input table start
    $(document).ready(function() {
        var max_fields      = 10; //maximum input boxes allowed
        var wrapper         = $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID
        
        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div> <textarea name="features[' + x + ']"/></textarea>  <a href="#" class="remove_field"><p>Remove</p></a> </div>'); // add input boxes.
            }
        });
        
        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });
//   __________________________________________________________________ for adding a new feature input table start
</script>

<!-- ____________________________________ Custom Features end -->


@endsection

@push('script')
<script>
    toggle = (idx) => {
        document.querySelectorAll('.expandable-item')[idx].classList.toggle('active');
    };
</script>
@endpush