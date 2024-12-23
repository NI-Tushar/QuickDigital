@extends('quick_digital.layout.layout')
@section('content')
<section class="container max-width custom-padding mb-5">
    <h3 class="resources-heading text-center custom-padding">
        আমাদের প্যাকেজ সমূহ
        <span class="d-flex justify-content-center">
            <div class="b-bottom-middle"></div>
        </span>
    </h3>
    <p class="resources-description py-2 custom-padding">
        বিশেষ সুবিধা পেতে আপনার পছন্দের প্যাকেজটি বেছে নিন এবং আকর্ষণীয় অফার উপভোগ করুন।
    </p>
    <div class="row row-cols-1 row-cols-md-3 g-3 d-flex justify-content-center pricing-section">

        <!-- 2nd plan -->
        @foreach($subscriptions as $subscription)
        <div class="col-12 col-lg-4 col-md-5 d-flex justify-content-center p-1 card-container">
            <div class="card h-100 pricing-plan" style="max-width: 22rem; width: 22rem;">
                <div class="pricing-plan-top">
                    <div class="pricing-plan-title">
                        <span>{{ $subscription->name }}</span>
                        @if($subscription->name == 'গোল্ড')
                        <div class="pricing-plan-title-badge">
                            <svg fill="none" height="16" viewBox="0 0 16 16" width="16" xmlns="http://www.w3.org/2000/svg" q:key="B4_0">
                                <path d="M8.00065 14.1667C10.8541 14.1667 13.1673 11.6667 13.1673 8.66667C13.1673 5.222 10.0918 2.78077 8.85307 1.9372C8.56929 1.74395 8.19435 1.82757 7.99678 2.10835L6.38863 4.39386C6.15096 4.73163 5.66501 4.77276 5.37203 4.48167C5.11194 4.22325 4.68797 4.22046 4.45454 4.5032C3.37417 5.81171 2.83398 7.44093 2.83398 8.66667C2.83398 11.6667 5.14718 14.1667 8.00065 14.1667ZM8.00065 14.1667C9.10522 14.1667 10.0007 13.1446 10.0007 11.8838C10.0007 10.495 8.89191 9.48319 8.32548 9.05691C8.13084 8.91044 7.87046 8.91044 7.67583 9.05691C7.1094 9.48319 6.00065 10.495 6.00065 11.8838C6.00065 13.1446 6.89608 14.1667 8.00065 14.1667Z" stroke="#FCFBFA" stroke-linejoin="round" stroke-width="1.5"></path>
                            </svg>
                            <span>Popular</span>
                        </div>
                        @endif
                    </div>
                    <div class="pricing-plan-price ">
                        <div class="pricing-plan-price-value">
                            ৳ {{ $subscription->price }}
                        </div>
                        <div class="pricing-plan-price-label"><span class="font_change">{{ $subscription->duration }}</span> মাস </div>
                    </div>
                    <a href="{{ route('cartSubscription.create', $subscription->id) }}" class="button button-primary text-decoration-none" q:key="qO_1" q:id="1z">
                        প্যাকেজটি কিনুন
                    </a>
                </div>
                <div class="pricing-plan-separator">
                    <svg fill="none" height="2" viewBox="0 0 232 2" width="232" xmlns="http://www.w3.org/2000/svg" q:key="4c_0">
                        <line stroke="#D6CFC2" stroke-dasharray="0.01 6" stroke-linecap="round" stroke-width="1.5" x1="0.75" x2="231.25" y1="1.25" y2="1.25"></line>
                    </svg>
                </div>
                <div class="pricing-plan-features">
                    @foreach(json_decode($subscription->features, true) as $feature)
                    <div class="pricing-plan-features-item d-flex align-items-center">
                        <div class="p-0 m-0 d-flex justify-content-center align-items-center me-2">
                            <svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle">
                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                            </svg>
                        </div>
                        <span>{{ $feature }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection
