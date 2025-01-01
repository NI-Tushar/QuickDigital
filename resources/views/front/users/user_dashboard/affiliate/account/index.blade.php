@extends('quick_digital.layout.layout')
@push('css')
    <link rel="stylesheet" href="{{ url('front/styles/software.css') }}">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
    <style>
        .quantity-input {
            display: none;
        }

        #qtyinput {
            display: block;
        }

        .select2-container--bootstrap4 .select2-selection {
            height: calc(2.25rem + 2px);
        }
    </style>

    <link rel="stylesheet" href="{{ url('front/styles/quick_business.css') }}">
@endpush
@section('content')
    @include('front.users.user_dashboard.sidebar')


    <section class="home-section">

        <div class="home-content">

            <div class="software_section">

                <div class="card bg-white mt-3" style="width: 100%">
                    <div class="card-header">
                      <div class="d-flex flex-wrap justify-content-between align-items-center" style="gap: 1em">
                          <h3>Curent Balance - {{ $account->balance ?? '' }}</h3>
                          <a class="btn btn-primary" href="#">Withdrawl</a>
                      </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                          <thead>
                              <tr>
                                <th>Sl</th>
                                <th>Withdrawal Date</th>
                                <th>Amount</th>
                                <th>Status</th>
                              </tr>
                          </thead>
                          <tbody>
                            @if ($transactions->isNotEmpty())
                                @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $transaction->created_at->format('F j, Y') }}</td>
                                        <td>{{ number_format($transaction->amount, 2) }}</td>
                                        <td>
                                            <span style="padding: 2px 15px; border: 1px solid #007bff; color: #007bff; border-radius: 10px;">
                                                {{ $transaction->status }}
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" style="text-align: center;">No transactions found</td>
                                </tr>
                            @endif
                        </tbody>
                        </table>

                        {{-- Pagination --}}
                        @if ($transactions instanceof \Illuminate\Pagination\LengthAwarePaginator)
                            {{ $transactions->links('pagination::bootstrap-4') }}
                        @endif


                    </div>
                  </div>
            </div>

        </div>

    </section>

@endsection
