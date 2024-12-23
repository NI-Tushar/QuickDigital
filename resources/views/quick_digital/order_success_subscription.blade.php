@extends('quick_digital.layout.layout')
@section('content')
    <main class="max-width container custom-padding d-flex align-items-center justify-content-center"
        style="min-height: 80vh">
        <div class="d-flex flex-column align-items-center">
            <h4 class="text-success fs-2 fw-bold py-3">অভিনন্দন। আপনার অর্ডারটি কনফার্ম করা হয়েছে।</h4>

            @if (isset($order))
                @if (Auth::guard('user')->check())
                    @php
                        $user = Auth::guard('user')->user();
                    @endphp
                @endif
                <table class="table table-secondary table-striped table-responsive mx-auto text-center">
                    <thead>
                        {{-- {{$order}} --}}
                        <tr>
                            <th scope="col">নাম</th>
                            <th scope="col">দাম</th>
                            <th scope="col">মেয়াদ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td> {{ $order->subscription_package }} প্যাকেজ </td>
                            <td> {{ $order->price }} ৳</td>
                            <td> {{$user->subscription_expire_date}} </td>
                        </tr>
                    </tbody>
                </table>
                <p class="fs-4 text-center fw-semibold">
                <ul>

                    <li>আপনি সফলভাবে {{ $order->subscription_package }} প্যাকেজটি কিনেছেন।</li>
                    <li>প্যাকেজটির মেয়াদ {{$user->subscription_expire_date}} পর্যন্ত।</li>
                    <li>এই প্যাকেজের অধীনে আপনি {{$user->download_count}}টি ইবুক এবং অফুরন্ত রিসোর্সে ডাউনলোড করতে পারবেন।</li>
                </ul>
                </p>
            @endif
            {{-- <a class="text-black text-center text-decoration-none px-3 py-2 col-md-3 btn-buy my-2 fw-bold rounded-3"
                href="{{ route('generate.pdf', ['orderId' => $order->id]) }}">এখানে ক্লিক করুন</a> --}}
        </div>
    </main>
@endsection
