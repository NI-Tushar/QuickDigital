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
                          <h3>কমিশন হিস্টরী</h3>
                      </div>
                    </div>
                    <div class="card-body" style="overflow-x: auto;">
                        <table style="overflow-x: auto;" class="table table-bordered">
                          <thead>
                              <tr>
                                <th>নং</th>
                                <th>অর্ডার ডেইট</th>
                                <th>অর্ডার আইডি</th>
                                <th>লক্ষ্য</th>
                                <th>সার্ভিস টাইপ</th>
                                <th>এমাউন্ট</th>
                              </tr>
                          </thead>
                          <tbody>
                              @foreach ($commissions as $commission)
                                  <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>{{ $commission->created_at->format('F j, Y') }}</td>
                                    <td>{{ $commission->order_id }}</td>
                                    <td>{{ $commission->purpose }}</td>
                                    <td>{{ $commission->service_type }}</td>
                                    <td>{{ $commission->amount }}</td>
                                  </tr>
                              @endforeach
                          </tbody>
                          <tfoot>
                            <tr>
                                <th colspan="5" style="text-align: right">টোটাল</th>
                                <td>{{ $totalCommission }} BDT</td>
                            </tr>
                          </tfoot>
                      </table>
                        {{ $commissions->links('pagination::bootstrap-4') }}
                    </div>
                  </div>
            </div>

        </div>

    </section>

@endsection
