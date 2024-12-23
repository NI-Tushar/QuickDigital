@extends('admin.layout.layout')

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">Order Details</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('quick-shopping-order.index') }}">Orders</a></li>
                            <li class="breadcrumb-item active">Order Details</li>
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
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-4">
                                        <form action="{{ route('quick-shopping-order.paymentStatus', $order->id) }}" onchange="submit()" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="">Payment Status</label>
                                                <select name="payment_status" class="form-control" id="">
                                                    <option value="Un-paid" {{ $order->payment_status == 'Un-Paid' ? 'selected' : '' }}>Un-paid</option>
                                                    <option value="Paid" {{ $order->payment_status == 'Paid' ? 'selected' : '' }}>Paid</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="col-4">
                                        <form action="{{ route('quick-shopping-order.orderStatus', $order->id) }}" onchange="submit()" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group">
                                                <label for="">Order Status</label>
                                                <select name="delivery_status" class="form-control" id="">
                                                    <option value="Pending" {{ $order->delivery_status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                    <option value="Confirmed" {{ $order->delivery_status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                                                    <option value="Picked Up" {{ $order->delivery_status == 'Picked Up' ? 'selected' : '' }}>Picked Up</option>
                                                    <option value="On The Way" {{ $order->delivery_status == 'On The Way' ? 'selected' : '' }}>On The Way</option>
                                                    <option value="Delivered" {{ $order->delivery_status == 'Delivered' ? 'selected' : '' }}>Delivered</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>

                                </div>

                                <div class="d-flex justify-content-between">
                                    <div class="">
                                        <table>
                                            <tr>
                                                <td style="padding:5px 20px">{{ $order->user ? $order->user->name : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:5px 20px">{{ $order->user ? $order->user->email : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:5px 20px">{{ $order->user ? $order->user->mobile : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:5px 20px">{{ $order->user ? $order->user->address : '' }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:5px 20px">{{ $order->user ? $order->user->country : 'Bangladesh' }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                    <div class="text-right">
                                        <table>
                                            <tr>
                                                <td style="padding:5px 20px">Order #</td>
                                                <td style="padding:5px 20px">{{ $order->order_code }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:5px 20px">Order status </td>
                                                <td style="padding:5px 20px"><span class="badge badge-primary ml-3">{{ $order->delivery_status }}</span></td>
                                            </tr>
                                            <tr>
                                                <td style="padding:5px 20px">Order date </td>
                                                <td style="padding:5px 20px">{{ $order->created_at->format('d-m-Y h:i A') }}</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:5px 20px">Total amount </td>
                                                <td style="padding:5px 20px">{{ $order->total }} Tk</td>
                                            </tr>
                                            <tr>
                                                <td style="padding:5px 20px">Payment method </td>
                                                <td style="padding:5px 20px">{{ $order->payment_method }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <br>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Photo</th>
                                            <th>Description</th>
                                            <th>Price</th>
                                            <th>Qty</th>
                                            <th>Discount</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->items as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                <img src="{{ asset($item->product_image) }}" alt="">
                                            </td>
                                            <td>{{ $item->product_name }} | Color: {{ $item->color ?? 'Default' }} | Size: {{ $item->size ?? 'Default' }}</td>
                                            <td>{{ number_format($item->price) }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>{{ number_format($item->discount) }}</td>
                                            <td>{{ number_format($item->total) }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                <div class="row justify-content-end">
                                    <div class="col-md-4 col-of">
                                        <table class="table">
                                            <tr>
                                                <td>Sub Total :</td>
                                                <td>{{ number_format($subTotal) }} Taka</td>
                                            </tr>
                                            <tr>
                                                <td>Shipping :</td>
                                                <td>{{ number_format($shipping) }} Taka</td>
                                            </tr>
                                            </tr>
                                            <tr>
                                                <td>Coupon :</td>
                                                <td>{{ number_format($order->coupon) }} Taka</td>
                                            </tr>
                                            <tr>
                                                <td>Total :</td>
                                                <td style="font-weight: 900">{{ number_format($total) }} Taka</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="row justify-content-end">
                                    <a target="_blank" href="{{ route('quick-shopping-order.DownloadOrderPDF', $order->id) }}"
                                       style="width: 50px; height: 50px; background: #00a4f0; color: #fff; text-align: center; line-height: 50px; border-radius: 5px; margin-right: 10px;">
                                        <i class="fa-solid fa-print" style="font-size: 20px"></i>
                                    </a>
                                </div>

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

        $('.editProduct').click(function(event) {

            var categoryId = $(this).data("id");

            $.ajax({
                url: '/admin/quick-shopping-category/' + categoryId + '/' + 'edit'
                , type: 'GET'
                , dataType: 'json'
                , success: function(res) {
                    $('#editId').val(res.id);
                    $('#editName').val(res.name);
                }
                , error: function(xhr, status, error) {
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
