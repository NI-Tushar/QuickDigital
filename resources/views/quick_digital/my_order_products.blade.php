@extends('quick_digital.layout.layout')
@section('content')
<section class="my-5 container max-width custom-padding">
    <div class="row gap-5">
        <div class="col-md-8 order-md-2 shadow p-5 rounded">
            <div>
                <table id="example" class="table table-striped align-middle text-center" style="width:100%">
                    <thead>
                        <tr>
                            <th>আপনার প্রোডাক্ট </th>
                            <th></th>
                            <th>পেমেন্টের পদ্ধতি</th>
                            <th>মূল্য</th>
                            <th>তারিখ</th>
                            <th>অপসন</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        @php
                        $payment_info = json_decode($order->payment_info, true);
                        @endphp
                        <tr>
                            <td>
                                @if($order->product && $order->product->image_1)
                                <img class="img-fluid" width="80px" height="auto" src="{{ asset($order->product->image_1) }}" alt="product">
                                @else
                                <img class="img-fluid" width="80px" height="auto" src="{{ asset('front/product_images/no_image.jpg') }}" alt="no-image">
                                @endif
                            </td>
                            <td>
                                {{ $order->product_title }}
                            </td>
                            <td> {{ $payment_info['method'] ?? '' }}
                            </td>
                            <td>{{ $order->price  }}</td>
                            <td>{{ date("F j, Y", strtotime($order->created_at)) }}</td>
                            <td>
                                <a href="{{ route('track.order', $order->id) }}" class="btn btn-dark d-flex gap-1 align-items-center"><svg height="16px" width="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M17 8H20L23 12.0557V18H20.9646C20.7219 19.6961 19.2632 21 17.5 21C15.7368 21 14.2781 19.6961 14.0354 18H8.96456C8.72194 19.6961 7.26324 21 5.5 21C3.73676 21 2.27806 19.6961 2.03544 18H1V6C1 5.44772 1.44772 5 2 5H16C16.5523 5 17 5.44772 17 6V8ZM17 10V13H21V12.715L18.9917 10H17Z"></path></svg> ট্র্যাক</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>আপনার প্রোডাক্ট </th>
                            <th></th>
                            <th>পেমেন্টের পদ্ধতি</th>
                            <th>মূল্য</th>
                            <th>তারিখ</th>
                            <th>অপসন</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="col-md-3 order-md-1">
            @include('quick_digital.layout.sidebar')
        </div>
    </div>
</section>
@endsection