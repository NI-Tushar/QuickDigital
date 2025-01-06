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

                      {{--<h3>Curent Balance - {{ number_format($account->balance) ?? '' }} BDT</h3>--}}
                           <h3>Curent Balance - {{ $account->balance ?? '' }} BDT</h3>

                          <h3>Curent Balance - {{ number_format($account->balance) ?? '' }} BDT</h3>

                          <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Withdrawl</a>
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

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Withdrawal Request</h5>
                </div>
                <form action="{{ route('affiliate.transaction.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <label for="">Account Type</label>
                            <input class="form-control" type="text" value="Bkash" readonly>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Account Number</label>
                            <input class="form-control" type="text" value="01643381009" readonly>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">Withdrawal Amount</label>
                            <input class="form-control" type="text" name="amount" placeholder="Minimum 500 BDT">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit Request</button>
                    </div>
                </form>
            </div>
            </div>
        </div>

    </section>

@endsection
@push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Thank You',
                text: '{{ session('success') }}',
                confirmButtonText: 'OK',
            });
        </script>
    @elseif (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Opps..',
                text: '{{ session('error') }}',
                confirmButtonText: 'OK',
            });
        </script>
    @endif
@endpush
