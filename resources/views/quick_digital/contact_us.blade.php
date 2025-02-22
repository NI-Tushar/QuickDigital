@extends('quick_digital.layout.layout')
@push('css')
  <link rel="stylesheet" href="{{ url('front/styles/contact_us.css') }}">
  <link rel="stylesheet" href="{{ url('front/styles/landing_page/about_us.css') }}">
@endpush

@section('content')

<script src="https://kit.fontawesome.com/5f7bc44e9f.js" crossorigin="anonymous"></script> 


<section class="bg_section">
  <img class="bg_image" src="{{ asset('front/assets/images/contact/bg.png') }}" alt="">
<!-- __________________ ABOUT US SECTION START -->
  <section class="about_us">
      <div class="section_center">
          <h3>আমাদের সম্পর্কে</h3>
          <p>কুইক ডিজিটাল"একটি ডিজিটাল সেবা, পন্য, এবং ট্রেনিং প্রদানকারী প্ল্যাটফর্ম । বর্তমানে মানুষের ডিজিটাল চাহিদার জন্য আমরা সদা সচেষ্ট।</p>
          <p>আমাদের ভান্ডারে আছে ইউজার ফ্রেন্ডলি এবং সুবিশাল ক্যাটালগ যেখান থেকে আপনি পাবেন: ই-বুক, ডিজিটাল পণ্য বা সেবা এবং ফ্রিল্যান্সিং কোর্স সমূহ। যার মাধ্যমে আপনি ঘরে বসেই আপনার পন্য বা সেবা গ্রহন করতে পারবেন খুব সহজেই।</p>
          <p>"কুইক ডিজিটাল"একটি ডিজিটাল উদ্ভাবনী প্ল্যাটফর্ম। আজকের যুবকদের গতিশীল ডিজিটাল চাহিদার জন্য আমরা সদা সচেষ্ট। কুইক ডিজিটাল হচ্ছে একটি সাম্প্রতিকতম বেস্টসেলার প্লাটফর্ম।</p>
      </div>
  </section>
  <!-- __________________ ABOUT US SECTION END -->

  <!-- ________________________________________________________________________ ABOUT US START -->
  <section class="about_us_section" style="padding:0px;padding-bottom:3rem;">
      <div class="center_about">
          <div class="about_part">
              <div class="img_div">
                  <img src="{{asset('front/assets/images/landing/about_us/tech_team.jpg')}}" alt="">
                  <div class="circle_div">

                      <div class="circle">
                          <div class="summery">
                              <h1>20K+</h1>
                              <p>Happy Clients</p>
                          </div>
                      </div>

                      <div class="circle">
                          <div class="summery">
                              <h1>2K+</h1>
                              <p>Delivered</p>
                          </div>
                      </div>

                      <div class="circle">
                          <div class="summery">
                              <h1>400+</h1>
                              <p>Affiliator</p>
                          </div>
                      </div>

                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- ________________________________________________________________________ ABOUT US END -->
   
<!-- ________________________________________________________________________ WHY QUICK START -->
<section class="service_section">
    <div class="service_heading">
        <h1>কেন Quick Digital নির্বাচন করবেন?</h1>
    </div>
    <div class="service_card">
        <div class="blank-1"></div>
            <div class="cards">

                <!-- _____________________________ -->
                  <div class="signle_card">
                      <div class="card-body">
                          <div class="body_icon">
                            <svg width="30" height="30" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 20L20 10L30 20L20 30L10 20Z" fill="#E3274A" fill-opacity="0.5"/>
                            <path d="M20 5C22.9667 5 25.8668 5.87973 28.3336 7.52796C30.8003 9.17618 32.7229 11.5189 33.8582 14.2597C34.9935 17.0006 35.2906 20.0166 34.7118 22.9264C34.133 25.8361 32.7044 28.5088 30.6066 30.6066C28.5088 32.7044 25.8361 34.133 22.9264 34.7118C20.0166 35.2906 17.0006 34.9935 14.2598 33.8582C11.5189 32.7229 9.17618 30.8003 7.52796 28.3336C5.87974 25.8668 5.00001 22.9667 5.00001 20C5.00464 16.0232 6.58648 12.2106 9.39852 9.39851C12.2106 6.58647 16.0232 5.00463 20 5ZM20 2.5C16.5388 2.5 13.1554 3.52636 10.2775 5.44928C7.39967 7.37221 5.15665 10.1053 3.83212 13.303C2.50758 16.5007 2.16102 20.0194 2.83627 23.4141C3.51151 26.8087 5.17822 29.9269 7.62564 32.3744C10.0731 34.8218 13.1913 36.4885 16.5859 37.1637C19.9806 37.839 23.4993 37.4924 26.697 36.1679C29.8947 34.8434 32.6278 32.6003 34.5507 29.7225C36.4737 26.8446 37.5 23.4612 37.5 20C37.5 15.3587 35.6563 10.9075 32.3744 7.62563C29.0925 4.34374 24.6413 2.5 20 2.5Z" fill="#E3274A" fill-opacity="0.5"/>
                            </svg>
                          </div>
                          <div class="card_desc">
                              <p class="title">প্রতিটি সেবা ডেটা এবং বিশ্লেষণের ভিত্তিতে করা হয়, যাতে সেরা ফলাফল নিশ্চিত করা যায়।</p>
                          </div>
                      </div>
                  </div>                  
                <!-- ____________________________ -->
                  <div class="signle_card">
                      <div class="card-body">
                          <div class="body_icon">
                            <svg width="30" height="30" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 20L20 10L30 20L20 30L10 20Z" fill="#E3274A" fill-opacity="0.5"/>
                            <path d="M20 5C22.9667 5 25.8668 5.87973 28.3336 7.52796C30.8003 9.17618 32.7229 11.5189 33.8582 14.2597C34.9935 17.0006 35.2906 20.0166 34.7118 22.9264C34.133 25.8361 32.7044 28.5088 30.6066 30.6066C28.5088 32.7044 25.8361 34.133 22.9264 34.7118C20.0166 35.2906 17.0006 34.9935 14.2598 33.8582C11.5189 32.7229 9.17618 30.8003 7.52796 28.3336C5.87974 25.8668 5.00001 22.9667 5.00001 20C5.00464 16.0232 6.58648 12.2106 9.39852 9.39851C12.2106 6.58647 16.0232 5.00463 20 5ZM20 2.5C16.5388 2.5 13.1554 3.52636 10.2775 5.44928C7.39967 7.37221 5.15665 10.1053 3.83212 13.303C2.50758 16.5007 2.16102 20.0194 2.83627 23.4141C3.51151 26.8087 5.17822 29.9269 7.62564 32.3744C10.0731 34.8218 13.1913 36.4885 16.5859 37.1637C19.9806 37.839 23.4993 37.4924 26.697 36.1679C29.8947 34.8434 32.6278 32.6003 34.5507 29.7225C36.4737 26.8446 37.5 23.4612 37.5 20C37.5 15.3587 35.6563 10.9075 32.3744 7.62563C29.0925 4.34374 24.6413 2.5 20 2.5Z" fill="#E3274A" fill-opacity="0.5"/>
                            </svg>
                          </div>
                          <div class="card_desc">
                              <p class="title">গ্রাহকদের চাহিদার প্রতি সর্বদা মনোযোগী এবং কাস্টমাইজড সেবা প্রদান করে।</p>
                          </div>
                      </div>
                  </div>
                <!-- ____________________________ -->
                  <div class="signle_card">
                      <div class="card-body">
                          <div class="body_icon">
                            <svg width="30" height="30" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 20L20 10L30 20L20 30L10 20Z" fill="#E3274A" fill-opacity="0.5"/>
                            <path d="M20 5C22.9667 5 25.8668 5.87973 28.3336 7.52796C30.8003 9.17618 32.7229 11.5189 33.8582 14.2597C34.9935 17.0006 35.2906 20.0166 34.7118 22.9264C34.133 25.8361 32.7044 28.5088 30.6066 30.6066C28.5088 32.7044 25.8361 34.133 22.9264 34.7118C20.0166 35.2906 17.0006 34.9935 14.2598 33.8582C11.5189 32.7229 9.17618 30.8003 7.52796 28.3336C5.87974 25.8668 5.00001 22.9667 5.00001 20C5.00464 16.0232 6.58648 12.2106 9.39852 9.39851C12.2106 6.58647 16.0232 5.00463 20 5ZM20 2.5C16.5388 2.5 13.1554 3.52636 10.2775 5.44928C7.39967 7.37221 5.15665 10.1053 3.83212 13.303C2.50758 16.5007 2.16102 20.0194 2.83627 23.4141C3.51151 26.8087 5.17822 29.9269 7.62564 32.3744C10.0731 34.8218 13.1913 36.4885 16.5859 37.1637C19.9806 37.839 23.4993 37.4924 26.697 36.1679C29.8947 34.8434 32.6278 32.6003 34.5507 29.7225C36.4737 26.8446 37.5 23.4612 37.5 20C37.5 15.3587 35.6563 10.9075 32.3744 7.62563C29.0925 4.34374 24.6413 2.5 20 2.5Z" fill="#E3274A" fill-opacity="0.5"/>
                            </svg>
                          </div>
                          <div class="card_desc">
                              <p class="title">বিভিন্ন ধরনের ডিজিটাল মার্কেটিং সেবা দিয়ে ব্যবসাগুলির জন্য সাফল্যের পথ প্রশস্ত করে।</p>
                          </div>
                      </div>
                  </div>                   
                <!-- ____________________________ -->
                  <div class="signle_card">
                      <div class="card-body">
                          <div class="body_icon">
                            <svg width="30" height="30" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 20L20 10L30 20L20 30L10 20Z" fill="#E3274A" fill-opacity="0.5"/>
                            <path d="M20 5C22.9667 5 25.8668 5.87973 28.3336 7.52796C30.8003 9.17618 32.7229 11.5189 33.8582 14.2597C34.9935 17.0006 35.2906 20.0166 34.7118 22.9264C34.133 25.8361 32.7044 28.5088 30.6066 30.6066C28.5088 32.7044 25.8361 34.133 22.9264 34.7118C20.0166 35.2906 17.0006 34.9935 14.2598 33.8582C11.5189 32.7229 9.17618 30.8003 7.52796 28.3336C5.87974 25.8668 5.00001 22.9667 5.00001 20C5.00464 16.0232 6.58648 12.2106 9.39852 9.39851C12.2106 6.58647 16.0232 5.00463 20 5ZM20 2.5C16.5388 2.5 13.1554 3.52636 10.2775 5.44928C7.39967 7.37221 5.15665 10.1053 3.83212 13.303C2.50758 16.5007 2.16102 20.0194 2.83627 23.4141C3.51151 26.8087 5.17822 29.9269 7.62564 32.3744C10.0731 34.8218 13.1913 36.4885 16.5859 37.1637C19.9806 37.839 23.4993 37.4924 26.697 36.1679C29.8947 34.8434 32.6278 32.6003 34.5507 29.7225C36.4737 26.8446 37.5 23.4612 37.5 20C37.5 15.3587 35.6563 10.9075 32.3744 7.62563C29.0925 4.34374 24.6413 2.5 20 2.5Z" fill="#E3274A" fill-opacity="0.5"/>
                            </svg>
                          </div>
                          <div class="card_desc">
                              <p class="title">প্রতিটি সেবা ডেটা এবং বিশ্লেষণের ভিত্তিতে করা হয়, যাতে সেরা ফলাফল নিশ্চিত করা যায়।</p>
                          </div>
                      </div>
                  </div>                   
                <!-- ____________________________ -->
                  <div class="signle_card">
                      <div class="card-body">
                          <div class="body_icon">
                            <svg width="30" height="30" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 20L20 10L30 20L20 30L10 20Z" fill="#E3274A" fill-opacity="0.5"/>
                            <path d="M20 5C22.9667 5 25.8668 5.87973 28.3336 7.52796C30.8003 9.17618 32.7229 11.5189 33.8582 14.2597C34.9935 17.0006 35.2906 20.0166 34.7118 22.9264C34.133 25.8361 32.7044 28.5088 30.6066 30.6066C28.5088 32.7044 25.8361 34.133 22.9264 34.7118C20.0166 35.2906 17.0006 34.9935 14.2598 33.8582C11.5189 32.7229 9.17618 30.8003 7.52796 28.3336C5.87974 25.8668 5.00001 22.9667 5.00001 20C5.00464 16.0232 6.58648 12.2106 9.39852 9.39851C12.2106 6.58647 16.0232 5.00463 20 5ZM20 2.5C16.5388 2.5 13.1554 3.52636 10.2775 5.44928C7.39967 7.37221 5.15665 10.1053 3.83212 13.303C2.50758 16.5007 2.16102 20.0194 2.83627 23.4141C3.51151 26.8087 5.17822 29.9269 7.62564 32.3744C10.0731 34.8218 13.1913 36.4885 16.5859 37.1637C19.9806 37.839 23.4993 37.4924 26.697 36.1679C29.8947 34.8434 32.6278 32.6003 34.5507 29.7225C36.4737 26.8446 37.5 23.4612 37.5 20C37.5 15.3587 35.6563 10.9075 32.3744 7.62563C29.0925 4.34374 24.6413 2.5 20 2.5Z" fill="#E3274A" fill-opacity="0.5"/>
                            </svg>
                          </div>
                          <div class="card_desc">
                              <p class="title">গ্রাহকদের চাহিদার প্রতি সর্বদা মনোযোগী এবং কাস্টমাইজড সেবা প্রদান করে।</p>
                          </div>
                      </div>
                  </div>                   
                <!-- ____________________________ -->
                  <div class="signle_card">
                      <div class="card-body">
                          <div class="body_icon">
                            <svg width="30" height="30" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 20L20 10L30 20L20 30L10 20Z" fill="#E3274A" fill-opacity="0.5"/>
                            <path d="M20 5C22.9667 5 25.8668 5.87973 28.3336 7.52796C30.8003 9.17618 32.7229 11.5189 33.8582 14.2597C34.9935 17.0006 35.2906 20.0166 34.7118 22.9264C34.133 25.8361 32.7044 28.5088 30.6066 30.6066C28.5088 32.7044 25.8361 34.133 22.9264 34.7118C20.0166 35.2906 17.0006 34.9935 14.2598 33.8582C11.5189 32.7229 9.17618 30.8003 7.52796 28.3336C5.87974 25.8668 5.00001 22.9667 5.00001 20C5.00464 16.0232 6.58648 12.2106 9.39852 9.39851C12.2106 6.58647 16.0232 5.00463 20 5ZM20 2.5C16.5388 2.5 13.1554 3.52636 10.2775 5.44928C7.39967 7.37221 5.15665 10.1053 3.83212 13.303C2.50758 16.5007 2.16102 20.0194 2.83627 23.4141C3.51151 26.8087 5.17822 29.9269 7.62564 32.3744C10.0731 34.8218 13.1913 36.4885 16.5859 37.1637C19.9806 37.839 23.4993 37.4924 26.697 36.1679C29.8947 34.8434 32.6278 32.6003 34.5507 29.7225C36.4737 26.8446 37.5 23.4612 37.5 20C37.5 15.3587 35.6563 10.9075 32.3744 7.62563C29.0925 4.34374 24.6413 2.5 20 2.5Z" fill="#E3274A" fill-opacity="0.5"/>
                            </svg>
                          </div>
                          <div class="card_desc">
                              <p class="title">বিভিন্ন ধরনের ডিজিটাল মার্কেটিং সেবা দিয়ে ব্যবসাগুলির জন্য সাফল্যের পথ প্রশস্ত করে।</p>
                          </div>
                      </div>
                  </div>                   

              </div>
        <div class="blank-2"></div>
    </div>
</section>
<!-- ________________________________________________________________________ WHY QUICK END -->
</section>


<!-- ________________________________________________________________________ CONTACT US START -->
<section class="contact_us_section">
    <div class="service_heading">
        <h1>আমাদের সাথে যোগাযোগ করুন</h1>
    </div>
    <div class="contact_card">
        <div class="blank-1"></div>
            <div class="cards">

                <!-- _____________________________ -->
                  <div class="signle_card">
                      <div class="card-body">
                          <div class="body_icon">
                          <svg width="50" height="50" viewBox="0 0 62 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M45.7774 29.6051C45.7767 26.1574 44.4068 22.8511 41.9689 20.4132C39.5311 17.9753 36.2248 16.6054 32.7771 16.6048M54.6893 28.6954C54.6893 25.9638 54.1512 23.2589 53.1058 20.7352C52.0604 18.2115 50.528 15.9185 48.5964 13.987C46.6647 12.0556 44.3714 10.5235 41.8476 9.47841C39.3238 8.43328 36.6188 7.89554 33.8872 7.89587M32.3633 52.7817C31.5924 52.4296 30.824 52.0776 30.0557 51.6587C26.2867 49.5294 22.8244 46.8979 19.7638 43.8364C15.7979 40.1015 12.5394 35.6807 10.1453 30.7872C8.86452 28.1587 7.99936 25.3473 7.58065 22.4535C7.01576 19.5295 7.33977 16.5033 8.5109 13.7652C9.2334 12.5882 10.1059 11.5101 11.1063 10.5581C11.5123 10.1039 12.0059 9.73637 12.5575 9.4776C13.109 9.21883 13.7071 9.07415 14.316 9.05226C15.5829 9.24242 16.7315 9.90542 17.523 10.9102C19.255 12.8349 21.113 14.5669 22.94 16.394C23.6596 17.0108 24.1093 17.8845 24.1915 18.8302C24.1607 19.6268 23.8549 20.3849 23.3255 20.9785C22.7165 21.7494 21.979 22.4535 21.2748 23.1885C20.8491 23.5986 20.5234 24.1011 20.3228 24.6572C20.1223 25.2133 20.0524 25.8081 20.1185 26.3955C20.5605 27.7703 21.3185 29.0244 22.331 30.0523C23.5457 31.7096 24.8186 33.3235 26.1471 34.8911C28.6249 37.7494 31.5601 40.1766 34.8328 42.0736C35.286 42.4158 35.8218 42.6318 36.3856 42.6995C36.9495 42.7672 37.5212 42.6842 38.0425 42.459C39.1295 41.85 40.0983 41.0457 40.8949 40.0871C41.5851 39.2476 42.573 38.7071 43.6522 38.5787C44.6133 38.6301 45.5179 39.0412 46.186 39.7351C47.0494 40.47 47.787 41.336 48.5887 42.1378C49.3905 42.9396 50.0329 43.5178 50.7062 44.2527C51.5131 44.9654 52.2712 45.7243 52.9804 46.5295C53.5304 47.2413 53.795 48.1356 53.7179 49.0299C53.4315 50.1007 52.8147 51.0539 51.9551 51.7538C50.7446 53.0124 49.2741 53.9917 47.6461 54.6232C46.018 55.2548 44.2718 55.5235 42.5293 55.4106C39.001 55.2148 35.544 54.3213 32.3633 52.7817Z" stroke="#00750C" stroke-width="2.97797" stroke-miterlimit="10" stroke-linecap="round"/>
                          </svg>
                          </div>
                          <div class="card_desc">
                            <h5>Contact</h5>
                             <p>Mobile: (+88) - 0000 - 11111</p>
                             <p>Hotline: 12345 - 2233</p>
                          </div>
                      </div>
                  </div>                  
                <!-- ____________________________ -->
                  <div class="signle_card">
                      <div class="card-body">
                          <div class="body_icon">
                          <svg width="50" height="50" viewBox="0 0 62 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M46.4184 16.2476H15.5814C12.7429 16.2476 10.4419 18.5486 10.4419 21.3871V41.9451C10.4419 44.7835 12.7429 47.0846 15.5814 47.0846H46.4184C49.2569 47.0846 51.5579 44.7835 51.5579 41.9451V21.3871C51.5579 18.5486 49.2569 16.2476 46.4184 16.2476Z" stroke="#00750C" stroke-width="2.97797"/>
                          <path d="M10.4419 23.9568L28.7025 33.0871C29.4159 33.4436 30.2024 33.6292 30.9999 33.6292C31.7974 33.6292 32.5839 33.4436 33.2973 33.0871L51.5579 23.9568" stroke="#00750C" stroke-width="2.97797"/>
                          </svg>
                          </div>
                          <div class="card_desc">
                              <h5>Email</h5>
                              <p>quickdigital121@gmail.com</p>
                          </div>
                      </div>
                  </div>
                <!-- ____________________________ -->
                  <div class="signle_card">
                      <div class="card-body">
                          <div class="body_icon">
                          <svg width="50" height="50" viewBox="0 0 62 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" clip-rule="evenodd" d="M31.6351 54.7141C34.5906 52.0323 37.3259 49.1174 39.8146 45.9975C45.0569 39.4112 48.246 32.9175 48.4618 27.1432C48.5473 24.7965 48.1588 22.4567 47.3197 20.2635C46.4806 18.0702 45.208 16.0686 43.578 14.3782C41.948 12.6878 39.994 11.3433 37.8328 10.425C35.6715 9.50664 33.3474 9.03333 30.9991 9.03333C28.6508 9.03333 26.3267 9.50664 24.1654 10.425C22.0042 11.3433 20.0502 12.6878 18.4202 14.3782C16.7902 16.0686 15.5176 18.0702 14.6785 20.2635C13.8394 22.4567 13.4509 24.7965 13.5364 27.1432C13.7548 32.9175 16.9464 39.4112 22.1861 45.9975C24.6749 49.1174 27.4102 52.0323 30.3657 54.7141C30.65 54.9711 30.8616 55.1578 31.0004 55.2743L31.6351 54.7141ZM29.1039 57.7079C29.1039 57.7079 10.4424 41.9913 10.4424 26.5265C10.4424 21.0742 12.6083 15.8452 16.4637 11.9898C20.3191 8.13443 25.5481 5.96851 31.0004 5.96851C36.4527 5.96851 41.6817 8.13443 45.5371 11.9898C49.3925 15.8452 51.5584 21.0742 51.5584 26.5265C51.5584 41.9913 32.8969 57.7079 32.8969 57.7079C31.8587 58.6638 30.1498 58.6535 29.1039 57.7079ZM31.0004 33.7218C32.9087 33.7218 34.7389 32.9637 36.0882 31.6144C37.4376 30.265 38.1957 28.4348 38.1957 26.5265C38.1957 24.6182 37.4376 22.788 36.0882 21.4387C34.7389 20.0893 32.9087 19.3312 31.0004 19.3312C29.0921 19.3312 27.2619 20.0893 25.9125 21.4387C24.5632 22.788 23.8051 24.6182 23.8051 26.5265C23.8051 28.4348 24.5632 30.265 25.9125 31.6144C27.2619 32.9637 29.0921 33.7218 31.0004 33.7218ZM31.0004 36.8055C28.2742 36.8055 25.6597 35.7225 23.732 33.7949C21.8043 31.8672 20.7214 29.2527 20.7214 26.5265C20.7214 23.8004 21.8043 21.1858 23.732 19.2582C25.6597 17.3305 28.2742 16.2475 31.0004 16.2475C33.7265 16.2475 36.3411 17.3305 38.2687 19.2582C40.1964 21.1858 41.2794 23.8004 41.2794 26.5265C41.2794 29.2527 40.1964 31.8672 38.2687 33.7949C36.3411 35.7225 33.7265 36.8055 31.0004 36.8055Z" fill="#00750C"/>
                          </svg>
                          </div>
                          <div class="card_desc">
                              <h5>Address</h5>
                              <p>H-417, R-07, Baridhara DOHS,</p>
                              <p>Dhaka-1206</p>
                          </div>
                      </div>
                  </div>                                    
                <!-- ____________________________ -->
                  <div class="signle_card">
                      <div class="card-body">
                          <div class="body_icon">
                          <svg width="50" height="50" viewBox="0 0 62 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                          <path d="M41.279 42.7534C41.279 43.0454 41.444 43.3124 41.7051 43.4429L48.3886 46.7847C48.7325 46.9566 48.8971 47.3555 48.7746 47.7199L48.2911 49.158C48.1343 49.6243 47.5867 49.8265 47.1645 49.5739L39.0843 44.7392C38.8517 44.6 38.7092 44.3488 38.7092 44.0776V32.4369C38.7092 32.0111 39.0544 31.666 39.4801 31.666H40.508C40.9338 31.666 41.279 32.0111 41.279 32.4369V42.7534ZM59.2672 41.945C59.2672 51.8899 51.2239 59.9332 41.279 59.9332C35.3069 59.9332 30.0453 57.0174 26.7624 52.5496C26.6137 52.3471 26.379 52.224 26.1278 52.224H11.2129C10.7871 52.224 10.442 51.8788 10.442 51.4531V29.8672C10.442 29.4414 10.0968 29.0962 9.67105 29.0962H6.30503C5.57852 29.0962 5.25529 28.1832 5.81996 27.7261L27.9267 9.83033C28.2178 9.59467 28.6362 9.60234 28.9185 9.8485L44.9704 23.8466C45.0536 23.9192 45.151 23.9726 45.2565 24.0052C52.6197 26.2764 59.2672 33.8574 59.2672 41.945ZM23.5536 48.3694C24.0657 48.3694 24.4317 47.8803 24.2836 47.39C23.8322 45.8957 23.2907 44.0303 23.2907 41.945C23.2907 31.7545 29.9719 26.0615 37.1146 24.2872C37.7461 24.1303 37.9729 23.3125 37.4832 22.8839L28.9212 15.3922C28.6378 15.1442 28.2168 15.1373 27.9253 15.3757L14.5793 26.2951C14.4004 26.4416 14.2966 26.6606 14.2966 26.8918V47.5984C14.2966 48.0242 14.6418 48.3694 15.0675 48.3694H23.5536ZM55.4126 41.945C55.4126 34.8525 48.3715 27.8114 41.279 27.8114C34.1865 27.8114 27.1453 34.8525 27.1453 41.945C27.1453 49.0375 34.1865 56.0786 41.279 56.0786C48.3715 56.0786 55.4126 49.0375 55.4126 41.945Z" fill="#00750C"/>
                          </svg>
                          </div>
                          <div class="card_desc">
                              <h5>Office hour</h5>
                              <p>Saturday - thursday</p>
                              <p>09:00 a.m - 09:00 p.m</p>
                          </div>
                      </div>
                  </div>                                    

              </div>
        <div class="blank-2"></div>
    </div>
</section>
<!-- ________________________________________________________________________ CONTACT US END -->


<!-- ________________________________________________________________________ CONTACT FORM START -->

 <section class="form_section">
  <div class="center_form">

    <h5>যোগাযোগ করতে</h5>

    <form action="#" method="post">
        <div class="input_div">
          <div class="input_field">
            <p for="">আপনার পুরো নাম</p>
            <input type="text" placeholder="নাম লিখুন">
          </div>
          <div class="input_field">
            <p for="">আপনার মোবাইল নম্বর</p>
            <input type="text" placeholder="মোবাইল নম্বর লিখুন">
          </div>
        </div>

        <div class="input_div">
          <div class="input_field">
            <p for="">আপানার ই-মেইল</p>
            <input type="text" placeholder="ই-মেইল লিখুন">
          </div>
          <div class="input_field">
            <p for="">বিষয়</p>
            <input type="text" placeholder="বিষয় লিখুন">
          </div>
        </div>

        <div class="input_div">
          <div class="input_field">
            <p for="">আপনার মন্তব্য</p>
            <textarea placeholder="আপনার মন্তব্য লিখুন" rows="5" name="" id=""></textarea>
          </div>
        </div>

        <div class="button_section">
          <div class="buttons">
            <input type="reset" value="মুছুন">
            <input class="active" type="submit" value="সাবমিট">
          </div>
        </div>

    </form>
  </div>
 </section>
<!-- ________________________________________________________________________ CONTACT FORM END -->


<!-- ________________________________________________________________________ LOCATION START -->
<section class="location_section">
  <div class="location_section">
    <div class="location_box">
      <h5>লোকেশন খুঁজে পেতে</h5>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d228.13624734576308!2d90.41317409999999!3d23.812199!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c70045a24763%3A0x67e9cca244b37c2f!2sQuick%20Digital!5e0!3m2!1sen!2sbd!4v1734868883817!5m2!1sen!2sbd" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>                                                                                 
    </div>
  </div>
</section>
<!-- ________________________________________________________________________ LOCATION END -->

@endsection


@push('script')
  <script src="https://kit.fontawesome.com/5f7bc44e9f.js" crossorigin="anonymous"></script> 
@endpush