@extends('quick_digital.layout.layout')
@extends('front.users.user_dashboard.sidebar')
<link rel="stylesheet" href="{{ url ('front/styles/wellcome_text.css') }}">

@section('content')


  <section class="home-section">
      <div class="home-content">

        <!-- _________________________________________________ user dashboard boady -->
        <div class="animated_name">
          <ul class="fly-in-text">
              <li class="hiddeen">W</li>
              <li class="hiddeen">E</li>
              <li class="hiddeen">L</li>
              <li class="hiddeen">C</li>
              <li class="hiddeen">O</li>
              <li class="hiddeen">M</li>
              <li class="hiddeen">E</li>
          </ul>     
          <ul class="fly-in-text2">
              <li class="hiddeen">T</li>
              <li class="hiddeen">O</li>
          </ul>
          <ul class="fly-in-text3">
              <li style="color:rgb(225, 33, 68);text-shadow: 2px 2px 4px #000000;" class="hiddeen">Q</li>
              <li style="color:rgb(225, 33, 68);text-shadow: 2px 2px 4px #000000;" class="hiddeen">u</li>
              <li style="color:rgb(225, 33, 68);text-shadow: 2px 2px 4px #000000;" class="hiddeen">i</li>
              <li style="color:rgb(225, 33, 68);text-shadow: 2px 2px 4px #000000;" class="hiddeen">c</li>
              <li style="color:rgb(225, 33, 68);text-shadow: 2px 2px 4px #000000;" class="hiddeen">k</li>
              <li style="color:rgb(193, 255, 114); text-shadow: 2px 2px 4px #000000;" class="hiddeen">D</li>
              <li style="color:rgb(193, 255, 114); text-shadow: 2px 2px 4px #000000;" class="hiddeen">i</li>
              <li style="color:rgb(193, 255, 114);text-shadow: 2px 2px 4px #000000;" class="hiddeen">g</li>
              <li style="color:rgb(193, 255, 114);text-shadow: 2px 2px 4px #000000;" class="hiddeen">i</li>
              <li style="color:rgb(193, 255, 114);text-shadow: 2px 2px 4px #000000;" class="hiddeen">t</li>
              <li style="color:rgb(193, 255, 114);text-shadow: 2px 2px 4px #000000;" class="hiddeen">a</li>
              <li style="color:rgb(193, 255, 114);text-shadow: 2px 2px 4px #000000;" class="hiddeen">l</li>
          </ul>
      </div>
        <!-- _________________________________________________ user dashboard boady -->

      </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            'use strict';
          
            var texxt = $('ul li');
            texxt.removeClass('hiddeen');

        });
    </script>
    
  @endsection