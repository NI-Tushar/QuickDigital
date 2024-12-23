
@extends('quick_digital.layout.layout')
@extends('front.users.user_dashboard.sidebar')

<script src="https://kit.fontawesome.com/5f7bc44e9f.js" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{{ url ('front/styles/update_user_details.css') }}">

@section('content')


  <section class="home-section">
      <div class="home-content">


  <div class="form_section">



  <div class="form-container">
    <div class="progress-bar" style="width: 0%"></div>

    <form id="feedbackForm" method="POST"
    action="{{ url('user/update_user_details') }}" enctype="multipart/form-data">
    @csrf

    <div class="avatar-upload">
      <div class="avatar-preview">
      @if (!empty(Auth::guard('user')->user()->image))
        <div id="imagePreview" style="background-image: url({{ asset('admin/images/user_images/' . Auth::guard('user')->user()->image) }});">
        </div>
        <input type="hidden" value="{{Auth::guard('user')->user()->image}}" name="current_image">
        @else
        <div id="imagePreview" style="background-image: url({{asset('no_image.png')}});">
        </div>
      @endif
        </div>
        <div class="avatar-edit">
          <div class="nameplate">
          @if (!empty(Auth::guard('user')->user()->name))
            <h5>{{ Auth::guard('user')->user()->name }}</h5>
          @else
            <h5>ইউজার নেইম</h5>
          @endif
            <div class="edit">
       
              <label for="imageUpload">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                  <polyline points="17 8 12 3 7 8" />
                  <line x1="12" y1="3" x2="12" y2="15" />
                </svg>
              </label>

              <input type='file' name="user_image" id="imageUpload" accept=".png, .jpg, .jpeg" />
            </div>
          </div>
        </div>
     </div>

<script>

document.getElementById('imageUpload').addEventListener('change', function(event) {
    const input = event.target;
    
    // Ensure a file is selected
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const imagePreview = document.getElementById('imagePreview');
            imagePreview.style.backgroundImage = `url(${e.target.result})`; // Set the uploaded image
        };
        reader.readAsDataURL(input.files[0]); // Read the selected file
    }
});


</script>

   
      <div class="section">
        <h2 class="section-title">আপনার প্রোফাইল আপডেট করুন</h2>

        @if (Session::has('error_message'))
        <div class="result_message">
          <span>Oh snap! </span>{{ Session::get('error_message') }}
        </div>
        @endif
        @if (Session::has('success_message'))
        <div class="result_message">
          <span>Well done!</span> {{ Session::get('success_message') }}
        </div>
        @endif

        <div class="input-group">
          <label for="name">ই-মেইলঃ</label>
          <input type="email" name="email" id="name" placeholder="আপনার ই-মেইল" value="{{ Auth::guard('user')->user()->email }}" readonly>
       </div>

       <div class="input-group">
         <label for="user_name">নামঃ</label>
         <input type="text" id="user_name" name="user_name" value="{{ Auth::guard('user')->user()->name }}">
       </div>

       <div class="input-group">
         <label for="user_mobile">মোবাইলঃ</label>
         <input type="text" id="user_mobile" name="user_mobile" value="{{ Auth::guard('user')->user()->mobile }}">
       </div>

       <div class="input-group">
         <label for="user_address">ঠিকানাঃ</label>
         <input type="text" id="user_address" name="user_address" value="{{ Auth::guard('user')->user()->address }}">
       </div>

       <div class="input-group">
         <label for="user_city">শহরঃ</label>
         <input type="text"  id="user_city" name="user_city" value="{{ Auth::guard('user')->user()->city }}">
       </div>

       <div class="input-group">
         <label for="user_state">বিভাগঃ</label>
         <input type="text"  id="user_state" name="user_state" value="{{ Auth::guard('user')->user()->state }}">
       </div>

       <div class="input-group">
         <label for="user_country">দেশঃ</label>
         <input type="text"  id="user_country" name="user_country" value="{{ Auth::guard('user')->user()->country }}">
       </div>

       <div class="input-group">
         <label for="user_zipcode">জিপ-কোড / পোস্ট-কোড</label>
         <input type="text"  id="user_zipcode" name="user_zipcode" value="{{ Auth::guard('user')->user()->zipcode }}">
       </div>

       </div>
       <button type="submit">আফডেট করুন</button>
     </form>   
   </div>
 </div>

      </div>
    </section>
    
  @endsection