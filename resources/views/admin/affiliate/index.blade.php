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
                <h3 class="content-header-title mb-0">Order LIST</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Order List</li>
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
                                            <th>Order Date</th>
                                            <th>Affiliator Name</th>
                                            <th>Order Number</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Order Status</th>
                                            <th>Payment Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $order->created_at->format('F j, Y') }}</td>
                                                <td>{{ $order->user->name }}</td>
                                                <td>{{ $order->order_id }}</td>
                                                <td>{{ $order->start_date }}</td>
                                                <td>{{ $order->end_date }}</td>
                                                <td>{{ $order->delivery_status }}</td>
                                                <td>{{ $order->payment_status }}</td>
                                                <td>
                                                    <div class="d-flex" style="gap: 1em">
                                                        <a href="{{ route('admin.affiliate.show', $order->id) }}" class="btn btn-sm btn-info">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <form action="{{ route('admin.affiliate.destroy', $order->id) }}"
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
    </script>
@endpush
