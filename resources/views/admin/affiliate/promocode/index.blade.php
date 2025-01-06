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
                <h3 class="content-header-title mb-0">Promo Codes LIST</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Promo Codes List</li>
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
                            <div class="card-header">
                                <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#exampleModal">Generate Promo Code</a>
                            </div>
                            <div class="card-body" style="overflow-x: auto;">

                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Affiliator Name</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Code #</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($promocodes as $promocode)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $promocode->user->name }}</td>
                                                <td>{{ $promocode->start_date }}</td>
                                                <td>{{ $promocode->end_date }}</td>
                                                <td>{{ $promocode->code }}</td>
                                                <td>
                                                    <form action="{{ route('admin.affiliate.promocode.status', $promocode->id) }}" method="GET" class="status-form">
                                                        @csrf
                                                        @method('GET')
                                                        @if ($promocode->status === 'Active')
                                                            <select style="border:1px solid green;color:green;font-weight:600;text-align:center;" name="status" class="form-control status_confirm" id="" 
                                                            {{ $promocode->status === 'Complete' || $promocode->status === 'Cencel' ? 'disabled' : '' }}>
                                                        @else
                                                            <select style="border:1px solid red;color:red;font-weight:600;text-align:center;" name="status" class="form-control status_confirm" id="" 
                                                            {{ $promocode->status === 'Complete' || $promocode->status === 'Cencel' ? 'disabled' : '' }}>
                                                        @endif
                                                            <option value="Active" {{ $promocode->status === 'Active' ? 'selected' : '' }}>Active</option>
                                                            <option value="In-active" {{ $promocode->status === 'In-active' ? 'selected' : '' }}>In-active</option>
                                                        </select>
                                                    </form>
                                                </td>
                                                <td>
                                                    <div class="d-flex" style="gap: 1em">
                                                        <form action="{{ route('admin.affiliate.promocode.destroy', $promocode->id) }}"
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


                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Generate Promo Code</h5>
                        </div>
                        <form action="{{ route('admin.affiliate.promocode.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="modal-body">
                                <div class="form-group mb-2">
                                    <label for="">Select Affiliator</label>
                                    <select name="affiliator" class="form-control" id="">
                                        @foreach ($affiliators as $affiliator)
                                        <option value="">Select Affiliator</option>
                                            <option value="{{ $affiliator->id }}">{{ $affiliator->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Start Date</label>
                                            <input class="form-control" type="date" name="start_date">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">End Date</label>
                                            <input class="form-control" type="date" name="end_date">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Generate</button>
                            </div>
                        </form>
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
