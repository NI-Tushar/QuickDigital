@extends('quick_digital.layout.layout')
@section('content')
    <main class="max-width container custom-padding d-flex align-items-center justify-content-center"
    style="min-height: 80vh">
        <div class="d-flex flex-column align-items-center">
            <h4 class="text-success fs-2 fw-bold py-3">অভিনন্দন। আপনার অর্ডারটি কনফার্ম করা হয়েছে।</h4>

            @if(isset($order))
            <table class="table table-secondary table-striped table-responsive mx-auto text-center">
                <thead>
                    <tr>
                        <th scope="col">নাম</th>
                        <th scope="col">দাম</th>
                        <th scope="col">মোট পরিমাণ</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> {{$order->ebook_title}} </td>
                        <td> {{$order->price}} ৳</td>
                        <td> 1 </td>
                    </tr>
                </tbody>
            </table>
            @endif
            <p class="fs-4 text-center fw-semibold">
                অর্ডারের বিস্তারিত আপনার ইমেইলে পাঠানো হয়েছে। অনুগ্রহ করে আপনার ইমেইলটি চেক করুন।
            </p>
            <p class="text-center fw-semibold">অথবা</p>
            <a class="text-black text-center text-decoration-none px-3 py-2 col-md-3 btn-buy my-2 fw-bold rounded-3" href="{{ route('generate.pdf', ['orderId' => $order->id]) }}">এখানে ক্লিক করুন</a>
        </div>
    </main>
@endsection
