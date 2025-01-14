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
            margin-bottom:5px;
        }
    </style>

    <section class="home-section">

        <div class="home-content">

            <div class="software_section">

                <div class="card bg-white mt-3 p-3" style="width: 100%;">
                    <div class="row">
                        
                        <div class="col-md-3">
                            <div class="card p-3 text-white">
                                <p>ব্যলেন্স</p>
                                <h5>{{ $balance }} BDT</h5>
                            </div>
                        </div>

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

                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <h5>সর্বশেষ 10 টি ট্রানজ্যকশন</h5>
                            <table style="overflow-x: auto;" class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>তারিখ</th>
                                        <th>এমাউন্ট</th>
                                        <th>বর্তমান অবস্থা</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->created_at->format('F j, Y') }}</td>
                                        <td>{{ $transaction->amount }}</td>
                                        <td>{{ $transaction->status }}</td>
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
