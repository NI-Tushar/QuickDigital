@extends('quick_digital.layout.layout')
@section('content')
    <link rel="stylesheet" href="{{ url('front/styles/custom_order/custom_software_form.css') }}">

  <div class="form_section">
    <!-- _______________________________ FORM START -->
    <div class="form_wrapper">
      <a href="javascript:history.back();" class="close"><p>x</p></a>
        <div class="form_container">
          <div class="title_container">
            <h2>কাস্টম সফটওয়্যার অর্ডার ফর্ম</h2>          
          </div>
          <div class="row clearfix">
            <div class="">

              @if (Session::has('error_message'))
                  <div class="error_msg">{{ Session::get('error_message') }}</div>
              @endif

            <form method="POST" action="{{ route('custom.softOrder.post') }}" method="POST">
            @csrf
                <input type="hidden" name="item_id" value="{{$id}}" required>
                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                  <input type="text" name="title" placeholder="সফটওয়্যার টাইটেল লিখুন" value="{{$title}}" required />
                </div>

                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
                  <textarea name="details" placeholder="সর্ট ডিটেইল / কিংবা কাস্টম ফিচার লিখুন"></textarea>
                </div>
                
                @if (Auth::guard('user')->check())
                @php
                  $user = Auth::guard('user')->user();
                @endphp

                <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                  <input type="text" name="name" placeholder="আপনার নাম" value="{{ $user->name }}" required/>
                </div>

                <div class="row clearfix">
                  <div class="col_half">
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                      <input type="email" name="email" placeholder="আপনার ই-মেইল" value="{{ $user->email }}" readonly required />
                    </div>
                  </div>
                  <div class="col_half">
                    <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                      <input type="number" name="mobile" placeholder="মোবাইল নাম্বার" value="{{ $user->mobile }}" readonly required />
                    </div>
                  </div>
                </div>
                @else
                  <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                    <input type="text" name="name" placeholder="আপনার নাম" />
                  </div>

                  <div class="row clearfix">
                    <div class="col_half">
                      <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
                        <input type="email" name="email" placeholder="আপনার ই-মেইল" required />
                      </div>
                    </div>
                    <div class="col_half">
                      <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
                        <input type="number" name="number" placeholder="মোবাইল নাম্বার" required />
                      </div>
                    </div>
                  </div>
                @endif


                  <!-- 
                    <div class="input_field radio_option">
                      <input type="radio" name="radiogroup1" id="rd1">
                      <label for="rd1">Male</label>
                      <input type="radio" name="radiogroup1" id="rd2">
                      <label for="rd2">Female</label>
                    </div>
                    <div class="input_field select_option">
                      <select>
                        <option>Select a country</option>
                        <option>Option 1</option>
                        <option>Option 2</option>
                      </select>
                      <div class="select_arrow"></div>
                    </div>

                  <div class="input_field checkbox_option">
                      <input type="checkbox" id="cb1">
                      <label for="cb1">I agree with terms and conditions</label>
                  </div>
                  <div class="input_field checkbox_option">
                      <input type="checkbox" id="cb2">
                      <label for="cb2">I want to receive the newsletter</label>
                  </div>
                   -->
                  <div class="buttons">
                    <input class="button" type="reset" value="মুছুন" />
                    <input class="button" type="submit" value="সেন্ড করুন" />
                  </div>
              </form>
            </div>
          </div>
        </div>
      </div>
<!-- _______________________________ FORM END -->
</div>
@endsection

@push('script')
@endpush