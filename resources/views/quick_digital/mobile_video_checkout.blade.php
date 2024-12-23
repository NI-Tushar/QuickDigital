@extends('quick_digital.layout.layout')
@section('content')
<main class="my-5">
    @if (Session::has('error_message'))
    <div class="alert bg-danger alert-icon-left alert-dismissible mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Oh snap! </strong>{{ Session::get('error_message') }}
    </div>
    @endif
    @if (Session::has('success_message'))
    <div class="alert bg-success alert-icon-left alert-dismissible mb-2" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Well done!</strong> {{ Session::get('success_message') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <section class="container custom-padding" style="max-width: 1000px">
        <div class="d-flex justify-content-center">
            <form action="{{ url('quick-digital/mobile-video-order-submit') }}" method="POST" class="bg-light py-4 px-5">@csrf
                <h2 class="fw-bold">মোবাইল দিয়ে ভিডিও এডিটিং কোর্স এ ভর্তি হতে নিচের তথ্য গুলো পূরণ করুন</h2>
                <div class="my-3">
                    <label class="fw-bold form-check-label" for="name"><span class="font_change">১ঃ</span>
                        নাম:</label>
                    <input class="form-control" type="text" name="name" id="name">
                </div>
                <div class="mb-3">
                    <label class="fw-bold form-check-label" for="email">২ঃ ইমেইল:</label>
                    <input class="form-control" type="email" name="email" id="email">
                </div>
                <div class="mb-3">
                    <label class="fw-bold form-check-label" for="phone">৩ঃ ফোন নাম্বার:</label>
                    <input class="form-control" type="tel" name="phone" id="phone">
                </div>
                <div style="background-color: #dbd9d9" class="py-5 px-4 rounded-4 mb-3">
                    <h5 style="margin-bottom: 20px; font-size: 18.72px !important; font-weight: 700; line-height: 24px" class="fw-bold">কোর্স ফিঃ ১৫০০টাকা</h5>

                    {{-- <p class="m-0"><span class="font_change">১</span>ম কিস্তিঃ ৩৫০টাকা</p>
                    <p class="m-0">২য় কিস্তিঃ ৪৪৯টাকা (কোর্স চলাকালীন সময়)</p> --}}
                    <p class="fw-bold" style="margin: 15px 0px; line-height: 20px">কোর্স ফি পরিশোধ করতে নিচের নম্বর-এ
                        বিকাশ বা নগদ-এ টাকা পাঠান।</p>
                    <p class="font_change fw-bold text-primary m-0" style='line-height: 26px'>০১৩০৪ ৭৬৬ ৯১৮ (বিকাশ /নগদ
                        – পার্সোনাল)</p>
                    <p class="font_change fw-bold text-primary m-0" style='line-height: 26px'>01304 766 918 (বিকাশ /নগদ
                        – পার্সোনাল)</p>
                </div>
                <div class="mb-3">
                    <label class="fw-bold" for="payment_option">৪ঃ কোর্স ফি পরিশোধের জন্য একটি মাধ্যম সিলেক্ট
                        করুন:</label>
                    <div class="d-flex gap-5 mt-2">
                        <label class="form-check-label d-flex align-items-center gap-3 border border-2 py-2 px-4 rounded" for="bkash">
                            <input class="form-check-input" type="radio" name="payment_option" id="bkash" value="bkash">
                            <img class="rounded-4" height="60px" width="60px" src="https://quickdigital.online/wp-content/uploads/2024/04/unnamed.png" alt="bkash">
                        </label>
                        {{-- <div class="">
                            </div> --}}
                        <label class="form-check-label d-flex align-items-center gap-3 border border-2 py-2 px-4 rounded" for="nagad">
                            <input class="form-check-input" type="radio" name="payment_option" id="nagad" value="bkash">
                            <img class="" height="60px" width="60px" src="https://quickdigital.online/wp-content/uploads/2024/04/1679248787Nagad-Logo.png" alt="nagad">
                        </label>
                        {{-- <div class="">
                            </div> --}}
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-check-label fw-bold" for="did_you_pay">০৫ঃ উপরোক্ত নম্বর-এ কোর্স ফি পরিশোধ
                        করেছেন?</label>
                    <div class="d-flex gap-5">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="did_you_pay" id="yes">
                            <label class="form-check-label" for="yes">
                                হ্যা
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="did_you_pay" id="no">
                            <label class="form-check-label" for="no">
                                না
                            </label>
                        </div>
                    </div>
                </div>
                <div class="my-3">
                    <label class="fw-bold form-check-label" for="confirm_number"><span class="font_change">১ঃ</span>
                        যেই নাম্বার থেকে কোর্স ফি পরিশোধ করেছেন সেটি লিখুন:</label>
                    <input class="form-control" type="tel" name="confirm_number" id="confirm_number">
                </div>
                <button type="submit" class="btn btn-lg btn-primary">সাবমিট করুন</button>
            </form>
        </div>
    </section>
</main>
@endsection
