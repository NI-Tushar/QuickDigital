@extends('quick_digital.layout.layout')
@section('content')

<section class="my-5">
    <div class="container max-width custom-padding">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="all_course_heading">আমাদের কোর্স</div>
            <div class="d-none d-md-flex justify-content-between">
                <a class="all_course_type" href="#">সকল কোর্স</a>
                <a class="all_course_type" href="#">ট্রেন্ডিং</a>
                <a class="all_course_type" href="#">জনপ্রিয়</a>
                <a class="all_course_type" href="#">ফিচার্ড</a>
            </div>
        </div>
        <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3">
            @foreach($courses as $course)
            <div class="col">
                <div class="position-relative">
                    <a href="{{ url('quick-digital/course-details/' . $course->id) }}">
                        <img class="course__item__main__img" src="{{ asset($course->course_thumbnail) }}" alt="">
                    </a>
                    <div class="position-absolute top-0 left-0 pt-3 px-2">
                        <!-- <span class="bg-danger text-white px-2 fw-bold rounded">Featured</span> -->
                        @if($course->course_type == 'free')
                        <span class="bg-success text-white px-2 fw-bold rounded">Free</span>
                        @endif
                        @if($course->course_type == 'paid' && $course->discount_price && $course->price > 0)
                        @php
                        $discountPercentage = (($course->price - $course->discount_price) / $course->price) * 100;
                        @endphp
                        <span class="bg-primary text-white px-2 fw-bold rounded">-{{ round($discountPercentage) }}%</span>
                        @endif
                    </div>
                </div>
                <div style="margin-top: 20px;">
                    @if($course->difficulty_level == 1)
                    <span class="__course__difficulty__level__beginner">Beginner</span>
                    @elseif($course->difficulty_level == 2)
                    <span class="__course__difficulty__level__intermediate">Intermediate</span>
                    @else
                    <span class="__course__difficulty__level__expert">Expert</span>
                    @endif
                </div>
                <a href="{{ url('quick-digital/course-details/' . $course->id) }}" class="__course__title__main">{{ $course->title }}</a>
                <div style="margin-bottom: 10px;">
                    <a class="couse__instructor__name__main" href="#">{{ $course->instructor->name }}</a>
                </div>
                @if($course->course_type == 'free')
                <span class="__course__item__price__main font_change">Free</span>
                @elseif($course->discount_price)
                <div class="d-flex align-items-center gap-3">
                    {{-- discounted price --}}
                    <span class="__course__item__price__main font_change">&#2547; {{ $course->discount_price }}</span>
                    <span class="__course__item__price__discounted font_change">&#2547; {{ $course->price }}</span>
                </div>
                @else
                <span class="__course__item__price__main font_change">&#2547; {{ $course->price }}</span>
                @endif

                {{-- rating --}}
                <div class="mt-2 d-flex gap-3">
                    <div class="d-flex gap-1 align-items-center">
                        <div>
                            <svg height="14px" width="14px" class="text-warning" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path>
                            </svg>
                        </div>
                        <div>
                            <svg height="14px" width="14px" class="text-warning" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path>
                            </svg>
                        </div>
                        <div>
                            <svg height="14px" width="14px" class="text-warning" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path>
                            </svg>
                        </div>
                        <div>
                            <svg height="14px" width="14px" class="text-warning" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection