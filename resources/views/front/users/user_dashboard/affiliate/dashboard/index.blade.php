@extends('quick_digital.layout.layout')
@push('css')
    <link rel="stylesheet" href="{{ url('front/styles/software.css') }}">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />

    <link rel="stylesheet" href="{{ url('front/styles/quick_business.css') }}">
@endpush
@section('content')
    @include('front.users.user_dashboard.sidebar')


    <section class="home-section">

        <div class="home-content">

            <div class="software_section">

                <div class="card bg-white mt-3 p-3" style="width: 100%;">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card p-3 bg-success text-white">
                                <p>Balance</p>
                                <h5>{{ number_format($balance) }} BDT</h5>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card p-3 bg-secondary text-white">
                                <p>Total Orders</p>
                                <h5>{{ $totalOrders }}</h5>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card p-3 bg-info text-white">
                                <p>Complete Orders</p>
                                <h5>{{ $completeOrders }}</h5>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card p-3 bg-info text-white">
                                <p>Pending Orders</p>
                                <h5>{{ $pendingOrders }}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <h5>Last 10 Transactions</h5>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Amount</th>
                                        <th>Status</th>
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
