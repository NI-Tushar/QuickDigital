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

                <div class="card bg-white mt-3" style="width: 100%;">
                    <div class="card-header">
                        <div class="d-flex flex-wrap justify-content-between align-items-center" style="gap: 1em">

                            <h5>Setup Your Account</h5>
                            <a class="btn btn-primary" href="{{ route('user.dashboard') }}">Back</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 style="padding: 10px;box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">Get Paid within 2 days of withdrawal Request</h5>
                        <form action="{{ route('affiliate.account.setup.store') }}" method="POST" class="mt-3">
                            @csrf
                            @method('POST')
                            <div class="form-group mb-3">
                                <label for="account_type">Select Account Type (*)</label>
                                <select class="form-control" name="account_type" id="account_type">
                                    <option value="">Select Account Type</option>
                                    <option value="bank" {{ $account_details->account_type === 'bank' ? 'selected' : '' }}>Bank Account</option>
                                    <option value="mobile_banking" {{ $account_details->account_type === 'mobile_banking' ? 'selected' : '' }}>Mobile Banking</option>
                                </select>
                                @error('account_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Bank Details -->
                            <div id="bank_details" class="account-details {{ $account_details->account_type === 'bank' ? '' : 'd-none' }}">
                                <div class="form-group mb-3">
                                    <label for="bank_name">Bank Name (*)</label>
                                    <input type="text" class="form-control" name="bank_name" id="bank_name" value="{{ old('bank_name', $account_details->bank_name) }}">
                                    @error('bank_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="account_number">Account Number (*)</label>
                                    <input type="text" class="form-control" name="account_number" id="account_number" value="{{ old('account_number', $account_details->account_number) }}">
                                    @error('account_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="branch_name">Branch Name (*)</label>
                                    <input type="text" class="form-control" name="branch_name" id="branch_name" value="{{ old('branch_name', $account_details->branch_name) }}">
                                    @error('branch_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="routing_number">Routing Number (*)</label>
                                    <input type="text" class="form-control" name="routing_number" id="routing_number" value="{{ old('routing_number', $account_details->routing_number) }}">
                                    @error('routing_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Mobile Banking Details -->
                            <div id="mobile_banking_details" class="account-details {{ $account_details->account_type === 'mobile_banking' ? '' : 'd-none' }}">
                                <div class="form-group mb-3">
                                    <label for="mobile_banking_type">Mobile Banking Type (*)</label>
                                    <select class="form-control" name="mobile_banking_type" id="mobile_banking_type">
                                        <option value="">Select Mobile Banking Type</option>
                                        <option value="bkash" {{ $account_details->mobile_banking_type === 'bkash' ? 'selected' : '' }}>bKash</option>
                                        <option value="rocket" {{ $account_details->mobile_banking_type === 'rocket' ? 'selected' : '' }}>Rocket</option>
                                        <option value="nagad" {{ $account_details->mobile_banking_type === 'nagad' ? 'selected' : '' }}>Nagad</option>
                                    </select>
                                    @error('mobile_banking_type')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="mobile_banking_number">Mobile Banking Number (*)</label>
                                    <input type="text" class="form-control" name="mobile_banking_number" id="mobile_banking_number" value="{{ old('routing_number', $account_details->mobile_banking_number) }}">
                                    @error('mobile_banking_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                </div>
                            </div>

                            <div class="form-group mb-3">
                                <label for="holder_name">Account Holder's Name (*)</label>
                                <input type="text" class="form-control" name="holder_name" id="holder_name" value="{{ old('routing_number', $account_details->holder_name) }}">
                                @error('holder_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="email">Email Address</label>
                                <input type="email" class="form-control" name="email" id="email" value="{{ old('routing_number', $account_details->email) }}">
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="phone">Phone Number</label>
                                <input type="text" class="form-control" name="phone" id="phone" value="{{ old('routing_number', $account_details->phone) }}">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mt-3">Save Details</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>

    </section>

@endsection
@push('script')
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const accountTypeSelect = document.getElementById('account_type');

            if (accountTypeSelect) {
                accountTypeSelect.addEventListener('change', function () {
                    const accountType = this.value;

                    // Hide all account details sections
                    document.querySelectorAll('.account-details').forEach(section => {
                        section.classList.add('d-none');
                    });

                    // Show the selected account type section
                    if (accountType === 'bank') {
                        document.getElementById('bank_details').classList.remove('d-none');
                    } else if (accountType === 'mobile_banking') {
                        document.getElementById('mobile_banking_details').classList.remove('d-none');
                    }

                    // Get the form containing the account type dropdown
                    const form = accountTypeSelect.closest("form");

                    // Reset all inputs in the form except the account type dropdown
                    const inputs = form.querySelectorAll("input:not([type='hidden']), textarea, select:not([name='account_type'])");
                    inputs.forEach(input => {
                        if (input.type === "checkbox" || input.type === "radio") {
                            input.checked = false; // Uncheck checkboxes and radios
                        } else {
                            input.value = ""; // Clear other inputs
                        }
                    });
                });
            }
        });
    </script>

@endpush
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
