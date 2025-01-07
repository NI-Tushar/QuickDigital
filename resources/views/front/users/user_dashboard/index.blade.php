@extends('quick_digital.layout.layout')
@push('css')
    <link rel="stylesheet" href="{{ url('front/styles/software.css') }}">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />

    <link rel="stylesheet" href="{{ url('front/styles/quick_business.css') }}">
@endpush
@section('content')
    @include('front.users.user_dashboard.sidebar')


<style>
.software_section .col-md-3 .card{
    background-image: linear-gradient(var(--primary-hover-color), black);
}
</style>

    <section class="home-section">

        <div class="home-content">

            <div class="software_section">

                <div class="card bg-white mt-3 p-3" style="width: 100%;">
                    <div class="row">

                        <div class="col-md-3">
                            <div class="card p-3 text-white">
                                <p>টোটাল অর্ডার</p>
                                <h5>{{ $totalOrders }}</h5>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card p-3 text-white">
                                <p>কমপ্লিট অর্ডার</p>
                                <h5>{{ $completeOrders }}</h5>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card p-3 text-white">
                                <p>পেন্ডিং অর্ডার</p>
                                <h5>{{ $pendingOrders }}</h5>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card p-3 text-white">
                                <p>বাতিল করা অর্ডার</p>
                                <h5>{{ $cancelOrders }}</h5>
                            </div>
                        </div>
                        
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <h5>সর্বশেষ 10 টি অর্ডার</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>তারিখ</th>
                                        <th>এমাউন্ট</th>
                                        <th>বর্তমান অবস্থা</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->created_at->format('F j, Y') }}</td>
                                        <td>{{ $order->amount }} BDT</td>
                                        <td>{{ $order->status }} BDT</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>

@endsection
