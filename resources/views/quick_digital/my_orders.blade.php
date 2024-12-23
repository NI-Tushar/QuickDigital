@extends('quick_digital.layout.layout')
@section('content')
<section class="my-5 container max-width custom-padding">
    <div class="row gap-5">
        <div class="col-md-8 order-md-2 shadow p-5 rounded">
            <div>
                <table id="example" class="table table-striped align-middle text-center" style="width:100%">
                    <thead>
                        <tr>
                            <th>আপনার ইবুক</th>
                            <th></th>
                            <th>পেমেন্টের পদ্ধতি</th>
                            <th>মূল্য</th>
                            <th>তারিখ</th>
                            <th>ডাউনলোড </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        @php
                        $payment_info = json_decode($order->payment_info, true);
                        @endphp
                        <tr>
                            <td>
                                @if($order->ebook && $order->ebook->cover_image)
                                <img class="img-fluid" width="80px" height="auto" src="{{ asset($order->ebook->cover_image) }}" alt="ebook">
                                @else
                                <img class="img-fluid" width="80px" height="auto" src="{{ asset('admin/images/ebook_images/no_image.jpg') }}" alt="no-image">
                                @endif
                            </td>
                            <td>
                                {{ $order->ebook_title }}
                            </td>
                            <td> {{ $payment_info['method'] ?? '' }}
                            </td>
                            <td>{{ $order->price  }}</td>
                            <td>{{ date("F j, Y, g:i a", strtotime($order->created_at)) }}</td>
                            <td> 
                            <a class="btn btn-dark" href="{{ route('generate.pdf', ['orderId' => $order->id]) }}">ডাউনলোড</a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>আপনার ইবুক</th>
                            <th></th>
                            <th>পেমেন্টের পদ্ধতি</th>
                            <th>মূল্য</th>
                            <th>তারিখ</th>
                            <th>ডাউনলোড </th>
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