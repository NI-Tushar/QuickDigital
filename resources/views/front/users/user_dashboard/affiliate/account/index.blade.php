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
                          <h3>বর্তমান ব্যালেন্স - {{ optional($account)->balance ?? '0' }} BDT</h3>
                          <a class="btn btn-primary" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">টাকা তুলুন</a>
                      </div>
                    </div>
                    <div class="card-body">
                        <table style="overflow-x: auto;" class="table table-bordered">
                          <thead>
                              <tr>
                                <th>নং</th>
                                <th>উইথড্রো তারিখ</th>
                                <th>এমাউন্ট</th>
                                <th>স্ট্যাটাস</th>
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
                                            @if($transaction->status=='Cancel')
                                            <span style="padding: 2px 15px; border: 1px solid rgba(233, 39, 39, 0.87); color:rgba(233, 39, 39, 0.87); border-radius: 10px;">
                                                {{ $transaction->status }}
                                            </span>
                                            @else
                                            <span style="padding: 2px 15px; border: 1px solid #007bff; color: #007bff; border-radius: 10px;">
                                                {{ $transaction->status }}
                                            </span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" style="text-align: center;">কোনো ট্রানজ্যকশন নেই</td>
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
                <h5 class="modal-title" id="exampleModalLabel">উইথড্রো রিকোয়েস্ট</h5>
                </div>
                <form action="{{ route('affiliate.transaction.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        @if (optional(Auth::guard('user')->user()->bankSetup)->account_type)
                        <div class="form-group mb-2">
                            <label for="">একাউন্ট টাইপ</label>
                            <select class="form-control" disabled>
                                <option value="bank" {{ optional(Auth::guard('user')->user()->bankSetup)->account_type === 'bank' ? 'selected' : '' }}>ব্যাংক একাউন্ট</option>
                                <option value="mobile_banking" {{ optional(Auth::guard('user')->user()->bankSetup)->account_type === 'mobile_banking' ? 'selected' : '' }}>মোবাইল ব্যাংকিং</option>
                            </select>
                        </div>

                        @if (optional(Auth::guard('user')->user()->bankSetup)->account_type === 'mobile_banking')
                        <div class="form-group mb-2">
                            <label for="">মোবাইল ব্যাংকের নাম</label>
                            <select class="form-control" disabled>
                                <option value="bkash" {{ optional(Auth::guard('user')->user()->bankSetup)->mobile_banking_type === 'bkash' ? 'selected' : '' }}>বিকাশ</option>
                                <option value="rocket" {{ optional(Auth::guard('user')->user()->bankSetup)->mobile_banking_type === 'rocket' ? 'selected' : '' }}>রকেট</option>
                                <option value="nagad" {{ optional(Auth::guard('user')->user()->bankSetup)->mobile_banking_type === 'nagad' ? 'selected' : '' }}>নগদ</option>
                            </select>
                        </div>
                        @endif

                        <div class="form-group mb-2">
                            <label for="">একাউন্ট নাম্বার</label>
                            <input class="form-control" type="text" value="{{ optional(Auth::guard('user')->user()->bankSetup)->account_type === 'mobile_banking' ?optional(Auth::guard('user')->user()->bankSetup)->mobile_banking_number : optional(Auth::guard('user')->user()->bankSetup)->account_number }}" readonly>
                        </div>
                        <div class="form-group mb-2">
                            <label for="">টাকার পরিমান</label>
                            <input class="form-control" type="text" name="amount" placeholder="সর্বনিম্ন ৫00 BDT">
                        </div>
                        @else
                        <div class="gorm-group">
                            <label for="">কোনো একাউন্ট সম্পর্কিত তথ্য পাওয়া যায় নি। একাউন্ট সেটাপ পেইজে গিয়ে আপানার একাউন্ট সম্পর্কিত তথ্য দিন।</label>
                        </div>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        @if (optional(Auth::guard('user')->user()->bankSetup)->account_type)
                            <button type="submit" class="btn btn-primary">রিকোয়েস্ট সামবিট করুন</button>
                        @endif
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
                icon: 'সাকসেস',
                title: 'ধন্যবাদ',
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
