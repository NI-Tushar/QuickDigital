@extends('quick_digital.layout.layout')
@section('content')
    <main class="max-width container custom-padding d-flex align-items-center justify-content-center"
    style="min-height: 80vh">
        <div class="d-flex flex-column align-items-center">
            <h4 class="text-success fs-2 fw-bold py-3">অভিনন্দন। আপনার অর্ডারটি কনফার্ম করা হয়েছে।</h4>

            <div class="col-md-8">
                @if(isset($order))
            <table class="table table-secondary table-responsive mx-auto">
                <tbody>
                    <tr>
                        <th scope="col">প্রোডাক্ট</th>
                        <td scope="col"> {{$order->product_title}} </td>
                    </tr>
                    <tr>
                        <th scope="col">দাম</th>
                        <td scope="col"> {{$order->price}} ৳</td>

                    </tr>
                    <tr>
                        <th scope="col">মোট পরিমাণ</th>
                        <td scope="col"> 1 </td>
                    </tr>
                    @php
                        $cus = json_decode($order->customer_info);
                    @endphp
                    <tr>
                        <th scope="col">নাম </th>
                        <td scope="col"> {{$cus->name}} </td>
                    </tr>
                    <tr>
                        <th scope="col">ইমেইল </th>
                        <td scope="col"> {{$cus->email}} </td>
                    </tr>
                    <tr>
                        <th scope="col">ফোন </th>
                        <td scope="col"> {{$cus->phone}} </td>
                    </tr>
                    <tr>
                        <th scope="col">ঠিকানা </th>
                        <td scope="col"> {{$cus->address}}, {{$cus->district}}, {{$cus->police_station}}</td>
                    </tr>
                </tbody>
            </table>
            @endif
            </div>
            <p class="fs-4 text-center fw-semibold">
                অর্ডারের বিস্তারিত আপনার ইমেইলে পাঠানো হয়েছে। অনুগ্রহ করে আপনার ইমেইলটি চেক করুন।
            </p>
        </div>
    </main>
@endsection
