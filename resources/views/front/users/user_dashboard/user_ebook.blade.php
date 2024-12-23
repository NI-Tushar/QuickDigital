
@extends('quick_digital.layout.layout')
@extends('front.users.user_dashboard.sidebar')

<link rel="stylesheet" href="{{ url ('front/styles/user_ebook.css') }}">
<link rel="stylesheet" href="{{ url ('front/styles/pdf_show/dflip.min.css') }}">

@section('content')

<section class="home-section">
    <div class="home-content">

        <div class="ebook_section">
            <div class="section_heading">
                <h4>আপনার ই-বুক</h4>
            </div>
              <!-- ____________________________  SHOW MULTIPLE PDF POPUP SART -->
            <div class="centered_pdf">

                 <!-- ______________ -->
                 <div class="card">
                     <div class="_df_button"  source="{{ asset('admin/images/ebook_images/sample-local-pdf.pdf') }}">
                         <img src="{{url('admin/images/ebook_images/cover_image_1734414345.png')}}" alt="Sample Document">
                        </div> 
                    </div>
                <!-- ______________ -->
                 <div class="card">
                     <div class="_df_button"  source="{{ asset('admin/images/ebook_images/sample-local-pdf.pdf') }}">
                         <img src="{{url('admin/images/ebook_images/cover_image_1734414345.png')}}" alt="Sample Document">
                        </div> 
                    </div>
                <!-- ______________ -->
                 <div class="card">
                     <div class="_df_button"  source="{{ asset('admin/images/ebook_images/sample-local-pdf.pdf') }}">
                         <img src="{{url('admin/images/ebook_images/cover_image_1734414345.png')}}" alt="Sample Document">
                        </div> 
                    </div>
                <!-- ______________ -->


            </div>
            <!-- ____________________________  SHOW MULTIPLE PDF POPUP END -->
        </div>

    </div>
</section>

@endsection
<!-- for show pdf -->





