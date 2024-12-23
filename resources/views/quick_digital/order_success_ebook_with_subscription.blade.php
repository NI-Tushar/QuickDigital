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
                        <tr>
                            <th scope="col">নাম</th>
                            <th scope="col">দাম</th>
                            <th scope="col">ফাইল</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="align-middle">
                            <td> {{ $order->ebook_title }} </td>
                            <td> {{ $order->price }} ৳</td>
                            <td>
                                <a
                                    class="add__to__cart__btn btn btn-lg text-white fw-bold"
                                    href="{{ route('generate.pdf', ['orderId' => $order->id]) }}">
                                    ডাউনলোড করুন
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <p class="text-center">
                    হোমপেজে ফিরে যেতে <a href="/">এখানে ক্লিক করুন</a>।
                </p>
            @endif
        </div>
    </main>
@endsection
