@extends('admin.layout.layout')
@push('css')
<style>
    .badge {
        display: inline-block;
        padding: 0.5em 0.75em;
        font-size: 0.875em;
        font-weight: 600;
        color: #fff;
        background-color: #007bff;
        border-radius: 0.25rem;
    }
    .me-1 {
        margin-right: 0.25rem;
    }
</style>
@endpush
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">Transaction LIST</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Transaction List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @if (Session::has('success'))
        <div class="alert bg-success alert-icon-left alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Well done!</strong> {{ Session::get('success') }}
        </div>
        @endif
        <div class="content-body">
            <section id="column">
                <div class="row">
                    <div class="col-12">


                        <div class="card">
                            <div class="card-body" style="overflow-x: auto;">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Transaction Date</th>
                                            <th>Affiliator Name</th>
                                            <th>Account Type</th>
                                            <th>Account Number</th>
                                            <th>Amount</th>
                                            <th style="width:150px">Withdrawal Status</th>
                                            <th  style="width:50px">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $transaction)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $transaction->created_at->format('F j, Y') }}</td>
                                                <td>{{ $transaction->user->name }}</td>
                                                <td>{{ 'Bkash' }}</td>
                                                <td>{{ '01643381009' }}</td>
                                                <td>{{ $transaction->amount}} </td>
                                                <td>
                                                    <form action="{{ route('admin.affiliate.transaction.status', $transaction->id) }}" method="GET" class="status-form">
                                                        @csrf
                                                        @method('GET')
                                                        <select name="status" class="form-control status_confirm" id="" {{ $transaction->status === 'Complete' || $transaction->status === 'Cencel' ? 'disabled' : '' }}>
                                                            <option value="Pending" {{ $transaction->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                                                            <option value="Complete" {{ $transaction->status === 'Complete' ? 'selected' : '' }}>Complete</option>
                                                            <option value="Cencel" {{ $transaction->status === 'Cencel' ? 'selected' : '' }}>Cencel</option>
                                                        </select>
                                                    </form>
                                                </td>
                                                <td>
                                                    <div class="d-flex" style="gap: 1em">
                                                        <form action="{{ route('admin.affiliate.transaction.destroy', $transaction->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="show_confirm btn btn-sm btn-danger"
                                                                data-toggle="tooltip" title='Delete'>
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        $('.show_confirm').click(function(event) {
            event.preventDefault(); // Prevent form submission

            var form = $(this).closest("form"); // Get the closest form

            Swal.fire({
                title: "Are you sure you want to delete this record?",
                text: "If you delete this, it will be gone forever.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "Cancel",
                dangerMode: true
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit the form if the user confirms
                }
            });
        });

        $(document).on('change', '.status_confirm', function(event) {
            event.preventDefault(); // Prevent immediate form submission

            var form = $(this).closest('form'); // Get the closest form
            var selectedStatus = $(this).val(); // Get the selected status value

            Swal.fire({
                title: "Are you sure you want to update this Transaction Status?",
                text: "If you update this, it will be updated permanently.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Yes, update it!",
                cancelButtonText: "Cancel",
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit(); // Submit the form if confirmed
                } else {
                    // Revert the dropdown to the previous value if canceled
                    form.find('select[name="status"]').val(form.find('select[name="status"]').data('previous-value'));
                }
            });

            // Store the previous value of the select for reverting if needed
            $(this).data('previous-value', $(this).val());
        });

    </script>
@endpush
