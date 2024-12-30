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
                                            <th>Client Name</th>
                                            <th>Client Phone</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $order->created_at->format('F j, Y') }}</td>
                                                <td>{{ $order->user->name }}</td>
                                                <td>{{ $order->order_number }}</td>
                                                <td>{{ $order->name }}</td>
                                                <td>{{ $order->phone }}</td>
                                                <td>{{ $order->start_date }}</td>
                                                <td>{{ $order->end_date }}</td>
                                                <td>{{ $order->status }}</td>
                                                <td>
                                                    <div class="d-flex" style="gap: 1em">
                                                        <a href="#" class="btn btn-sm btn-info showOrderData" data-toggle="modal" data-target="#orderViewModla" data-id="{{ $order->id }}">
                                                            <i class="fa fa-eye"></i>
                                                        </a>
                                                        <form action="{{ route('admin.digialservice.destroy', $order->id) }}"
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

<!-- Order View Modal -->
<div class="modal fade" id="orderViewModla" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <div class="">
                    <h4 class="modal-title" id="myLargeModalLabel">View Details - <span id="creator_name"></span></h4>
                    <span id="insert_date" style="display: block"></span>
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body dark-modal">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th style="text-transform: uppercase; width:200px">Client Name</th>
                                <td id="name">N/A</td>
                                <th style="text-transform: uppercase; width:200px">Client Number</th>
                                <td id="phone">N/A</td>
                            </tr>
                            <tr>
                                <th style="text-transform: uppercase; width:200px">Client Email</th>
                                <td id="email">N/A</td>
                                <th style="text-transform: uppercase; width:200px">Durations</th>
                                <td id="durations">N/A</td>
                            </tr>
                            <tr>
                                <th style="text-transform: uppercase; width:200px">Services</th>
                                <td id="services" colspan="3">N/A</td>
                            </tr>
                            <tr>
                                <th style="text-transform: uppercase; width:200px">Full Address</th>
                                <td id="address" colspan="3">N/A</td>
                            </tr>
                        </table>

                        {{-- <div class="card p2">
                            <button class="btn btn-success" id="orderStatus" data-id="">Status</button>
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>

        // Show Order data
        $('.showOrderData').click(function(event) {

            var orderId = $(this).data("id"); // Retrieve the data-id
            console.log(orderId);
            $.ajax({
                url: '/affiliate/digital-service/' + orderId + '/show',
                type: 'GET',
                dataType: 'json',
                success: function(res) {

                    //Populate Organization Information
                    $('#creator_name').text(res.user.name || 'N/A');
                        const date = new Date(res.created_at);
                        const formattedDate = date.toLocaleDateString('en-US', {
                            weekday: 'long',
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        });
                    $('#insert_date').text(formattedDate)
                    $('#name').text(res.name || 'N/A');
                    $('#email').text(res.email || 'N/A');
                    $('#phone').text(res.phone || 'N/A');
                    $('#durations').text(res.start_date + ' to ' + res.end_date  || 'N/A');

                    let services = res.services ? JSON.parse(res.services) : [];
                    if (services.length > 0) {
                        let badges = services.map(service => `<span class="badge bg-primary me-1">${service}</span>`).join('');
                        $('#services').html(badges);
                    } else {
                        $('#services').text('N/A');
                    }

                    $('#address').text(res.address  || 'N/A');
                    $('#orderStatus').data('id', res.id || 'N/A'); // Updates the jQuery data cache

                    // Show the modal
                    const modal = new bootstrap.Modal(document.getElementById('orderViewModla'));
                    modal.show();
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

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
