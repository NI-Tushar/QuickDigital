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
                            <h3 class="no_post_msg">আপনার ডিজিটাল প্রোডাক্ট</h3>
                        </div>

                            @if ($orderedProducts->isEmpty())
                                <div class="order_headline">
                                    <p style="font-weight:600;font-size:20px;color:red;">কোনো অর্ডার নেই</p>
                                </div>
                            @else
                            
                            @foreach ($orderedProducts as $product)
                            <!-- _______________________ -->
                            <div class="expandable-item">
                                <div class="expandable-header">
                                    
                                <div class="collapsible-header">
                                    <div class="enr_img">
                                        <img src="{{ asset($product->digitalproduct->thumbnail) }}" alt="">
                                    </div>
                                    <div class="header_info">
                                        <div class="section_part">
                                            <label>সার্ভিস প্রোডাক্ট</label>
                                            <p>{{$product->digitalproduct->title}}</p>
                                        </div>      
                                        <div class="section_part">
                                            <label>মূল্য</label> 
                                            <p><span>{{$product->total}}</span> /BDT</p>
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
                                <div class="expandable-body">
                                    <div id="drop_text" class="drop_text">
                                        <div class="drop_section">
                                            <label>Description / বিবরণঃ:</label>
                                            <p>{{$product->digitalproduct->description}}</p>
                                        </div>
                                        <div class="drop_section file_section">
                                            <div class="file_box">

                                                <div class="file">
                                                    <img src="https://icon-library.com/images/zipped-file-icon/zipped-file-icon-4.jpg" alt="">
                                                    @if($product->digitalproduct && $product->digitalproduct->zip_file)
                                                    <a href="{{ asset($product->digitalproduct->zip_file) }}" 
                                                        download="DigitalProduct(QuickDigital){{ $product->id }}.zip">
                                                        <button type="button">Download</button>
                                                    </a>
                                                    @else
                                                    <p>No file available</p>
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


@endsection

@push('script')
<script>
    toggle = (idx) => {
        document.querySelectorAll('.expandable-item')[idx].classList.toggle('active');
    };
</script>
@endpush