@extends('quick_digital.layout.layout')
@section('content')
    <main>
        <section class="container max-width custom-padding my-5">
            <form action="{{ route('cart.product.payment') }}" method="post">@csrf
                <div class="row justify-content-between g-3">
                    <div class="col-12 col-md-7">
                        <h4 class="p-2 bg-black text-white rounded">আপনি এই পর্যন্ত এসেছেন,তারমানে আপনি একজন একশন টেকার 💪
                        </h4>
                        <h4 class="py-2">প্রোডাক্টটি অর্ডার করতে নিচের ফরমটি পূরণ করুন</h4>
                        <input type="hidden" name="cart_id" value="{{ $cartDetails->id }}">
                        <div class="mt-3 px-3">
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-check-label fw-semibold" for="name">আপনার নাম</label>
                                    <input class="form-control" type="text" name="name" id="name" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-check-label fw-semibold" for="phone">মোবাইল</label>
                                    <input class="form-control" type="tel" name="phone" id="phone" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-check-label fw-semibold" for="email">ইমেইল </label>
                                    <input class="form-control" type="email" name="email" id="email" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col">
                                    <label class="form-check-label fw-semibold" for="address">ঠিকানা </label>
                                    <input class="form-control " type="text" name="address" id="address" required>
                                </div>
                            </div>
                            <div class="row row-cols-1 row-cols-md-2 g-3 mb-3">
                                <div class="col">
                                    <label class="form-check-label fw-semibold" for="district">জেলা </label>
                                        <select class="form-select" name="district" id="district" required>
                                            <option value="" disabled readonly selected>সিলেক্ট করুন </option>
                                            <optgroup label="ঢাকা বিভাগ">
                                                <option value="Dhaka">ঢাকা</option>
                                                <option value="Faridpur">ফরিদপুর</option>
                                                <option value="Gazipur">গাজীপুর</option>
                                                <option value="Gopalganj">গোপালগঞ্জ</option>
                                                <option value="Kishoreganj">কিশোরগঞ্জ</option>
                                                <option value="Madaripur">মাদারীপুর</option>
                                                <option value="Manikganj">মানিকগঞ্জ</option>
                                                <option value="Munshiganj">মুন্সিগঞ্জ</option>
                                                <option value="Narayanganj">নারায়ণগঞ্জ</option>
                                                <option value="Narsingdi">নরসিংদী</option>
                                                <option value="Rajbari">রাজবাড়ী</option>
                                                <option value="Shariatpur">শরীয়তপুর</option>
                                                <option value="Tangail">টাঙ্গাইল</option>
                                            </optgroup>
                                            <optgroup label="ময়মনসিংহ বিভাগ">
                                                <option value="Jamalpur">জামালপুর</option>
                                                <option value="Mymensingh">ময়মনসিংহ</option>
                                                <option value="Netrokona">নেত্রকোনা</option>
                                                <option value="Sherpur">শেরপুর</option>
                                            </optgroup>
                                            <optgroup label="রাজশাহী বিভাগ">
                                                <option value="Bogra">বগুড়া</option>
                                                <option value="Joypurhat">জয়পুরহাট</option>
                                                <option value="Naogaon">নওগাঁ</option>
                                                <option value="Natore">নাটোর</option>
                                                <option value="Chapai Nawabganj">চাঁপাইনবাবগঞ্জ</option>
                                                <option value="Pabna">পাবনা</option>
                                                <option value="Rajshahi">রাজশাহী</option>
                                                <option value="Sirajganj">সিরাজগঞ্জ</option>
                                            </optgroup>
                                            <optgroup label="রংপুর বিভাগ">
                                                <option value="Dinajpur">দিনাজপুর</option>
                                                <option value="Gaibandha">গাইবান্ধা</option>
                                                <option value="Kurigram">কুড়িগ্রাম</option>
                                                <option value="Lalmonirhat">লালমনিরহাট</option>
                                                <option value="Nilphamari">নীলফামারী</option>
                                                <option value="Panchagarh">পঞ্চগড়</option>
                                                <option value="Rangpur">রংপুর</option>
                                                <option value="Thakurgaon">ঠাকুরগাঁও</option>
                                            </optgroup>
                                            <optgroup label="সিলেট বিভাগ">
                                                <option value="Habiganj">হবিগঞ্জ</option>
                                                <option value="Moulvibazar">মৌলভীবাজার</option>
                                                <option value="Sunamganj">সুনামগঞ্জ</option>
                                                <option value="Sylhet">সিলেট</option>
                                            </optgroup>
                                            <optgroup label="চট্টগ্রাম বিভাগ">
                                                <option value="Bandarban">বান্দরবান</option>
                                                <option value="Brahmanbaria">ব্রাহ্মণবাড়িয়া</option>
                                                <option value="Chandpur">চাঁদপুর</option>
                                                <option value="Chattogram">চট্টগ্রাম</option>
                                                <option value="Cumilla">কুমিল্লা</option>
                                                <option value="Cox's Bazar">কক্সবাজার</option>
                                                <option value="Feni">ফেনী</option>
                                                <option value="Khagrachari">খাগড়াছড়ি</option>
                                                <option value="Lakshmipur">লক্ষ্মীপুর</option>
                                                <option value="Noakhali">নোয়াখালী</option>
                                                <option value="Rangamati">রাঙ্গামাটি</option>
                                            </optgroup>
                                            <optgroup label="খুলনা বিভাগ">
                                                <option value="Bagerhat">বাগেরহাট</option>
                                                <option value="Chuadanga">চুয়াডাঙ্গা</option>
                                                <option value="Jashore">যশোর</option>
                                                <option value="Jhenaidah">ঝিনাইদহ</option>
                                                <option value="Khulna">খুলনা</option>
                                                <option value="Kushtia">কুষ্টিয়া</option>
                                                <option value="Magura">মাগুরা</option>
                                                <option value="Meherpur">মেহেরপুর</option>
                                                <option value="Narail">নড়াইল</option>
                                                <option value="Satkhira">সাতক্ষীরা</option>
                                            </optgroup>
                                            <optgroup label="বরিশাল বিভাগ">
                                                <option value="Barguna">বরগুনা</option>
                                                <option value="Barisal">বরিশাল</option>
                                                <option value="Bhola">ভোলা</option>
                                                <option value="Jhalokati">ঝালকাঠি</option>
                                                <option value="Patuakhali">পটুয়াখালী</option>
                                                <option value="Pirojpur">পিরোজপুর</option>
                                            </optgroup>
                                        </select>
                                </div>
                                <div class="col">
                                    <label class="form-check-label fw-semibold" for="police_station">থানা </label>
                                    <input class="form-control" type="text" name="police_station" id="police_station">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4" style="border: 2px solid rgb(181, 181, 181)">
                        <h4 class="px-4 my-5">আপনার অর্ডার </h4>
                        <div class="px-4">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">প্রোডাক্ট</th>
                                        <th scope="col" class="text-end">সাবটোটাল</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="py-3">{{ $cartDetails->product_title }} </td>
                                        <td class="py-3 text-end font_change">{{ $cartDetails->price }} ৳</td>
                                    </tr>
                                    <tr>
                                        <td class="py-3">সাবটোটাল</td>
                                        <td class="py-3 text-end font_change">{{ $cartDetails->price }} ৳</td>
                                    </tr>
                                    <tr>
                                        <th class="py-3" scope="row">টোটাল</th>
                                        <td class="py-3 text-end font_change">{{ $cartDetails->price }} ৳</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="d-flex align-items-center gap-3 pt-3">
                                <h6 class="m-0">ShurjoPay</h6>
                                <img class="mb-1"
                                    src="https://quickdigital.online/wp-content/plugins/shurjoPay/template/images/logo.png"
                                    alt="ShurjoPay">
                            </div>
                            <div class="pb-3">
                                <div class="triangle-container">
                                    <div class="triangle"></div>
                                </div>
                                <p class="bg-light py-2 px-3">Pay securely using ShurjoPay</p>
                            </div>
                            <p>আপনার ব্যক্তিগত ডেটা আপনার অর্ডার প্রক্রিয়া করতে, এই ওয়েবসাইট জুড়ে আপনার অভিজ্ঞতা সমর্থন
                                করতে এবং আমাদের প্রাইভেসি পলিসিতে বর্ণিত অন্যান্য উদ্দেশ্যে ব্যবহার করা হবে।</p>
                            <button type="submit" class="btn btn-primary btn-lg w-100 mb-4">অর্ডার সম্পূর্ণ করুন</button>
                        </div>
                    </div>
                </div>
            </form>
            <div class="mt-3">
                <h4 class="p-2 bg-black text-white rounded">ম্যানুয়ালি ওর্ডার করতে হোয়াটসঅ্যাপ অথবা ফেসবুকে মেসেজ দিন ⤵️
                </h4>
                <div class="row gap-5 px-3 mt-4">
                    <div class="col-12 col-md-3">
                        <a class="text-decoration-none"
                            href="https://api.whatsapp.com/send?phone=8801973784939&text=%E0%A6%B2%E0%A6%BE%E0%A6%AD%E0%A7%87%E0%A6%B0%20%E0%A6%96%E0%A6%A8%E0%A6%BF%20%E0%A6%AA%E0%A6%BE%E0%A6%87%E0%A6%95%E0%A6%BE%E0%A6%B0%E0%A6%BF%20%E0%A6%AC%E0%A6%BE%E0%A6%9C%E0%A6%BE%E0%A6%B0%20%E0%A6%AC%E0%A6%87%E0%A6%9F%E0%A6%BF%20%E0%A6%A8%E0%A6%BF%E0%A6%A4%E0%A7%87%20%E0%A6%9A%E0%A6%BE%E0%A6%87">
                            <div class="py-2 px-3 rounded border border-2 d-flex gap-3 align-items-center">
                                <svg class="text-success" height='20px' width='20px'
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12.001 2C17.5238 2 22.001 6.47715 22.001 12C22.001 17.5228 17.5238 22 12.001 22C10.1671 22 8.44851 21.5064 6.97086 20.6447L2.00516 22L3.35712 17.0315C2.49494 15.5536 2.00098 13.8345 2.00098 12C2.00098 6.47715 6.47813 2 12.001 2ZM8.59339 7.30019L8.39232 7.30833C8.26293 7.31742 8.13607 7.34902 8.02057 7.40811C7.93392 7.45244 7.85348 7.51651 7.72709 7.63586C7.60774 7.74855 7.53857 7.84697 7.46569 7.94186C7.09599 8.4232 6.89729 9.01405 6.90098 9.62098C6.90299 10.1116 7.03043 10.5884 7.23169 11.0336C7.63982 11.9364 8.31288 12.8908 9.20194 13.7759C9.4155 13.9885 9.62473 14.2034 9.85034 14.402C10.9538 15.3736 12.2688 16.0742 13.6907 16.4482C13.6907 16.4482 14.2507 16.5342 14.2589 16.5347C14.4444 16.5447 14.6296 16.5313 14.8153 16.5218C15.1066 16.5068 15.391 16.428 15.6484 16.2909C15.8139 16.2028 15.8922 16.159 16.0311 16.0714C16.0311 16.0714 16.0737 16.0426 16.1559 15.9814C16.2909 15.8808 16.3743 15.81 16.4866 15.6934C16.5694 15.6074 16.6406 15.5058 16.6956 15.3913C16.7738 15.2281 16.8525 14.9166 16.8838 14.6579C16.9077 14.4603 16.9005 14.3523 16.8979 14.2854C16.8936 14.1778 16.8047 14.0671 16.7073 14.0201L16.1258 13.7587C16.1258 13.7587 15.2563 13.3803 14.7245 13.1377C14.6691 13.1124 14.6085 13.1007 14.5476 13.097C14.4142 13.0888 14.2647 13.1236 14.1696 13.2238C14.1646 13.2218 14.0984 13.279 13.3749 14.1555C13.335 14.2032 13.2415 14.3069 13.0798 14.2972C13.0554 14.2955 13.0311 14.292 13.0074 14.2858C12.9419 14.2685 12.8781 14.2457 12.8157 14.2193C12.692 14.1668 12.6486 14.1469 12.5641 14.1105C11.9868 13.8583 11.457 13.5209 10.9887 13.108C10.8631 12.9974 10.7463 12.8783 10.6259 12.7616C10.2057 12.3543 9.86169 11.9211 9.60577 11.4938C9.5918 11.4705 9.57027 11.4368 9.54708 11.3991C9.50521 11.331 9.45903 11.25 9.44455 11.1944C9.40738 11.0473 9.50599 10.9291 9.50599 10.9291C9.50599 10.9291 9.74939 10.663 9.86248 10.5183C9.97128 10.379 10.0652 10.2428 10.125 10.1457C10.2428 9.95633 10.2801 9.76062 10.2182 9.60963C9.93764 8.92565 9.64818 8.24536 9.34986 7.56894C9.29098 7.43545 9.11585 7.33846 8.95659 7.32007C8.90265 7.31384 8.84875 7.30758 8.79459 7.30402C8.66053 7.29748 8.5262 7.29892 8.39232 7.30833L8.59339 7.30019Z">
                                    </path>
                                </svg>
                                <h6 class="m-0">Chat on Whatsapp</h6>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-3">
                        <a class="text-decoration-none" href="https://www.facebook.com/quickdigital01973784939/">
                            <div class="py-2 px-3 rounded border border-2 d-flex gap-3 align-items-center">
                                <svg class="text-primary" height='20px' width='20px'
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M12.001 2C6.47813 2 2.00098 6.47715 2.00098 12C2.00098 16.9913 5.65783 21.1283 10.4385 21.8785V14.8906H7.89941V12H10.4385V9.79688C10.4385 7.29063 11.9314 5.90625 14.2156 5.90625C15.3097 5.90625 16.4541 6.10156 16.4541 6.10156V8.5625H15.1931C13.9509 8.5625 13.5635 9.33334 13.5635 10.1242V12H16.3369L15.8936 14.8906H13.5635V21.8785C18.3441 21.1283 22.001 16.9913 22.001 12C22.001 6.47715 17.5238 2 12.001 2Z">
                                    </path>
                                </svg>
                                <h6 class="m-0">Chat on Facebook</h6>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
