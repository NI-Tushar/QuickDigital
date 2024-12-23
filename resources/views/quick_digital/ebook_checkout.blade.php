@extends('quick_digital.layout.layout')
@section('content')

<main>

    <section class="container max-width custom-padding my-5" id="shuropay">
        <form action="{{ route('initiate_payment') }}" method="post">
            @csrf
            <div class="row justify-content-center g-3">
                <div class="col-md-8">
                    <h4 class="p-2 bg-black text-white rounded" style="text-align:center;">আপনি এই পর্যন্ত এসেছেন,তারমানে আপনি একজন একশন টেকার 💪
                    </h4>
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <input type="hidden" name="price" value="{{ $book->price }}">
                    <input type="hidden" name="book_title" value="{{ $book->title }}">
                    <div class="px-4"  style="border: 2px solid rgb(181, 181, 181); padding-top:15px;" style="height:auto;">
                        <h4 class="order_heading">আপনার অর্ডার</h4>

                        <div class="order_div">

                          <div class="div_part active">
                            <div class="input_part">
                                <label for="number">আপনার মোবাইল নম্বর</label>
                                <br>
                                <input type="number" name="phone" placeholder="01700000000">
                                <p style="color:red;text-align:left;width:100%;padding:0;margin:0;">@error('phone'){{$message}}@enderror</p>
                                <br>
                                <label for="email">আপনার ই-মেইল</label>
                                <br>
                                @if (Auth::guard('user')->check())
                                    <input type="email" name="email" value="{{Auth::guard('user')->user()->email;}}" readonly required>
                                @else
                                    <input type="email" name="email" placeholder="ই-মেইল দিন">
                                @endif
                                <p style="color:red;text-align:left;width:100%;padding:0;margin:0;">@error('email'){{$message}}@enderror</p>
                            </div>
                          </div>

                          <div class="div_part">

                            <table class="table">
                              <thead>
                                  <tr style="background-color:red;">
                                      <th style="background-color:#e7c1fa;" scope="col">ই-বুক</th>
                                      <th style="background-color:#e7c1fa;" scope="col" class="text-end">সাবটোটাল</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      <td style="background-color:#eed0fd8b;" class="py-3">{{ $book->title }}</td>
                                      <td style="background-color:#eed0fd8b;" class="py-3 text-end font_change">{{ $book->price }} ৳</td>
                                  </tr>
                                  <tr>
                                      <td style="background-color:#eed0fd8b;" class="py-3">সাবটোটাল</td>
                                      <td style="background-color:#eed0fd8b;" class="py-3 text-end font_change">{{ $book->price }} ৳</td>
                                  </tr>
                                  <tr>
                                      <th style="background-color:#eed0fd8b;" class="py-3" scope="row">টোটাল</th>
                                      <td style="background-color:#eed0fd8b;" class="py-3 text-end font_change">{{ $book->price }} ৳</td>
                                  </tr>
                              </tbody>
                            </table>

                          </div>
                          
                        </div>

                        <!-- <div class="d-flex align-items-center gap-3 pt-3">
                            <h6 class="m-0">ShurjoPay</h6>
                            <img class="mb-1" style="height:50px;width:auto;" src="data:image/png;base64,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" alt="ShurjoPay">
                        </div>
                        <div class="pb-3">
                            <div class="triangle-container">
                                <div class="triangle"></div>
                            </div>
                            <p class="bg-light py-2 px-3">Pay securely using ShurjoPay</p>
                        </div> -->
                        <p class="order_description">আপনার ব্যক্তিগত ডেটা আপনার অর্ডার প্রক্রিয়া করতে, এই ওয়েবসাইট জুড়ে আপনার অভিজ্ঞতা সমর্থন
                            করতে এবং আমাদের প্রাইভেসি পলিসিতে বর্ণিত অন্যান্য উদ্দেশ্যে ব্যবহার করা হবে।</p>
                        <button type="submit" class="w-100 mb-4 submit_btn">অর্ডার সম্পূর্ণ করুন</button>
                        <!-- <span id="change_pay" style="color:rgb(13, 110, 253);font-weight:600;cursor:pointer;margin-bottom:15px;">Pay with SSL</span> -->

                    </div>
                    <div class="mt-3">
                        <h4 class="p-2 bg-black text-white rounded" style="text-align:center;">ম্যানুয়ালি ওর্ডার করতে হোয়াটসঅ্যাপ অথবা ফেসবুকে মেসেজ দিন ⤵️
                        </h4>
                        <div class="row gap-5 px-3 mt-4">
                            <div class="col-12 col-md-4">
                                <a class="text-decoration-none" href="https://api.whatsapp.com/send?phone=8801973784939&text=%E0%A6%B2%E0%A6%BE%E0%A6%AD%E0%A7%87%E0%A6%B0%20%E0%A6%96%E0%A6%A8%E0%A6%BF%20%E0%A6%AA%E0%A6%BE%E0%A6%87%E0%A6%95%E0%A6%BE%E0%A6%B0%E0%A6%BF%20%E0%A6%AC%E0%A6%BE%E0%A6%9C%E0%A6%BE%E0%A6%B0%20%E0%A6%AC%E0%A6%87%E0%A6%9F%E0%A6%BF%20%E0%A6%A8%E0%A6%BF%E0%A6%A4%E0%A7%87%20%E0%A6%9A%E0%A6%BE%E0%A6%87">
                                    <div class="py-2 px-3 rounded border border-2 d-flex gap-3 align-items-center">
                                        <svg class="text-success" height='20px' width='20px' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12.001 2C17.5238 2 22.001 6.47715 22.001 12C22.001 17.5228 17.5238 22 12.001 22C10.1671 22 8.44851 21.5064 6.97086 20.6447L2.00516 22L3.35712 17.0315C2.49494 15.5536 2.00098 13.8345 2.00098 12C2.00098 6.47715 6.47813 2 12.001 2ZM8.59339 7.30019L8.39232 7.30833C8.26293 7.31742 8.13607 7.34902 8.02057 7.40811C7.93392 7.45244 7.85348 7.51651 7.72709 7.63586C7.60774 7.74855 7.53857 7.84697 7.46569 7.94186C7.09599 8.4232 6.89729 9.01405 6.90098 9.62098C6.90299 10.1116 7.03043 10.5884 7.23169 11.0336C7.63982 11.9364 8.31288 12.8908 9.20194 13.7759C9.4155 13.9885 9.62473 14.2034 9.85034 14.402C10.9538 15.3736 12.2688 16.0742 13.6907 16.4482C13.6907 16.4482 14.2507 16.5342 14.2589 16.5347C14.4444 16.5447 14.6296 16.5313 14.8153 16.5218C15.1066 16.5068 15.391 16.428 15.6484 16.2909C15.8139 16.2028 15.8922 16.159 16.0311 16.0714C16.0311 16.0714 16.0737 16.0426 16.1559 15.9814C16.2909 15.8808 16.3743 15.81 16.4866 15.6934C16.5694 15.6074 16.6406 15.5058 16.6956 15.3913C16.7738 15.2281 16.8525 14.9166 16.8838 14.6579C16.9077 14.4603 16.9005 14.3523 16.8979 14.2854C16.8936 14.1778 16.8047 14.0671 16.7073 14.0201L16.1258 13.7587C16.1258 13.7587 15.2563 13.3803 14.7245 13.1377C14.6691 13.1124 14.6085 13.1007 14.5476 13.097C14.4142 13.0888 14.2647 13.1236 14.1696 13.2238C14.1646 13.2218 14.0984 13.279 13.3749 14.1555C13.335 14.2032 13.2415 14.3069 13.0798 14.2972C13.0554 14.2955 13.0311 14.292 13.0074 14.2858C12.9419 14.2685 12.8781 14.2457 12.8157 14.2193C12.692 14.1668 12.6486 14.1469 12.5641 14.1105C11.9868 13.8583 11.457 13.5209 10.9887 13.108C10.8631 12.9974 10.7463 12.8783 10.6259 12.7616C10.2057 12.3543 9.86169 11.9211 9.60577 11.4938C9.5918 11.4705 9.57027 11.4368 9.54708 11.3991C9.50521 11.331 9.45903 11.25 9.44455 11.1944C9.40738 11.0473 9.50599 10.9291 9.50599 10.9291C9.50599 10.9291 9.74939 10.663 9.86248 10.5183C9.97128 10.379 10.0652 10.2428 10.125 10.1457C10.2428 9.95633 10.2801 9.76062 10.2182 9.60963C9.93764 8.92565 9.64818 8.24536 9.34986 7.56894C9.29098 7.43545 9.11585 7.33846 8.95659 7.32007C8.90265 7.31384 8.84875 7.30758 8.79459 7.30402C8.66053 7.29748 8.5262 7.29892 8.39232 7.30833L8.59339 7.30019Z"></path>
                                        </svg>
                                        <h6 class="m-0">Chat on Whatsapp</h6>
                                    </div>
                                </a>
                            </div>
                            <div class="col-12 col-md-4">
                                <a class="text-decoration-none" href="https://www.facebook.com/quickdigital01973784939/">
                                    <div class="py-2 px-3 rounded border border-2 d-flex gap-3 align-items-center">
                                        <svg class="text-primary" height='20px' width='20px' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                            <path d="M12.001 2C6.47813 2 2.00098 6.47715 2.00098 12C2.00098 16.9913 5.65783 21.1283 10.4385 21.8785V14.8906H7.89941V12H10.4385V9.79688C10.4385 7.29063 11.9314 5.90625 14.2156 5.90625C15.3097 5.90625 16.4541 6.10156 16.4541 6.10156V8.5625H15.1931C13.9509 8.5625 13.5635 9.33334 13.5635 10.1242V12H16.3369L15.8936 14.8906H13.5635V21.8785C18.3441 21.1283 22.001 16.9913 22.001 12C22.001 6.47715 17.5238 2 12.001 2Z"></path>
                                        </svg>
                                        <h6 class="m-0">Chat on Facebook</h6>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </section>




    <script>
        function show_ssl(){
            document.getElementById("sslpay").style.display='flex';
            document.getElementById("shuropay").style.display='none';
        }
    </script>
</main>
@endsection
