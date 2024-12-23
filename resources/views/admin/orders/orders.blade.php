@extends('admin.layout.layout')

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">Order List</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Users List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @if (Session::has('success_message'))
        <div class="alert bg-success alert-icon-left alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Well done!</strong> {{ Session::get('success_message') }}
        </div>
        @endif
        <div class="content-body">
            <section id="column">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <div class="form-group">
                                        <label for="status">Filter by Status:</label>
                                        <select class="form-control" id="status" onchange="filterOrders()">
                                            <option value="">All</option>
                                            <option value="PENDING">Pending</option>
                                            <option value="PROCESSING">Processing</option>
                                            <option value="WRITING">Writing</option>
                                            <option value="ON-PRINT">On-Print</option>
                                            <option value="SHIFT">Shift</option>
                                            <option value="DELIVERED">Delivered</option>
                                        </select>
                                    </div>
                                    <div style="overflow-x: auto;">
                                        <table id="orders" class="table table-striped table-bordered custom-toolbar-elements">
                                            <!-- Table Header -->
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>SERVICE TITLE</th>
                                                    <th>PRICE</th>
                                                    <th>CUSTOMER INFO</th>
                                                    <th>PAYMENT INFO</th>
                                                    <th>LATEST STATUS</th>
                                                    <th>ACTION</th>
                                                    <th>CREATED AT</th>
                                                </tr>
                                            </thead>
                                            <!-- Table Body  -->
                                            <tbody>
                                                @foreach ($orders as $order)
                                                @php
                                                $cus_info = json_decode($order->customer_info, true);
                                                $payment_info = json_decode($order->payment_info, true);
                                                @endphp
                                                <tr>
                                                    <td>{{ $order->id }}</td>
                                                    <td>{{ $order->ebook_title }}</td>
                                                    <td>{{ $order->price }}</td>
                                                    <td>
                                                        <ul>
                                                            <li>
                                                                Customer Name:{{ $cus_info['name'] ?? '' }}
                                                            </li>
                                                            <li>
                                                                Customer phone:{{ $cus_info['phone'] ?? '' }}
                                                            </li>
                                                            <li>
                                                                Customer Email:{{ $cus_info['email'] ?? '' }}
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        <ul>
                                                            <li>Amount: {{ $payment_info['received_amount'] ?? '' }}</li>
                                                            <li>Bank TRX ID: {{ $payment_info['bank_trx_id'] ?? '' }}</li>
                                                            <li>Order ID: {{ $payment_info['customer_order_id'] ?? '' }}</li>
                                                            <li>Method: {{ $payment_info['method'] ?? '' }}</li>
                                                            <li>Date Time: {{ $payment_info['date_time'] ?? '' }}</li>
                                                        </ul>
                                                    </td>
                                                    <td>{{ $order->latestStatus->status ?? 'No Status' }}</td>
                                                    <td class="text-center">
                                                        <li>
                                                            <div class="form-group">
                                                                <!-- Button trigger modal -->
                                                                <button type="button" class="btn btn-outline-warning block btn-sm" data-toggle="modal" data-target="#iconForm{{ $order->id }}">
                                                                    UPDATE-STATUS
                                                                </button>

                                                                <!-- Modal -->
                                                                <div class="modal fade text-left" id="iconForm{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel34" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h3 class="modal-title" id="myModalLabel34">UPDATE ORDER STATUS</h3>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <form action="{{ route('admin.order.updateStatus', $order->id) }}" method="POST">
                                                                                @csrf
                                                                                <div class="modal-body">
                                                                                    <label>Status: </label>
                                                                                    <div class="form-group position-relative has-icon-left">
                                                                                        <select class="form-control" name="status">
                                                                                            <option selected disabled>SELECT ONE</option>
                                                                                            <option value="PENDING">PENDING</option>
                                                                                            <option value="PROCESSING">PROCESSING</option>
                                                                                            <option value="WRITING">WRITING</option>
                                                                                            <option value="ON-PRINT">ON-PRINT</option>
                                                                                            <option value="SHIFT">SHIFT</option>
                                                                                            <option value="DELIVERED">DELIVERED</option>
                                                                                        </select>
                                                                                        <div class="form-control-position">
                                                                                            <i class="fa fa-tasks font-large-1 line-height-1 text-muted icon-align"></i>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <input type="reset" class="btn btn-outline-secondary btn-lg" data-dismiss="modal" value="cancel">
                                                                                    <input type="submit" class="btn btn-outline-primary btn-lg" value="UPDATE">
                                                                                </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </td>
                                                    <td>{{ date("F j, Y, g:i a", strtotime($order->created_at)) }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <!-- Table Footer -->
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>SERVICE TITLE</th>
                                                    <th>PRICE</th>
                                                    <th>CUSTOMER INFO</th>
                                                    <th>PAYMENT INFO</th>
                                                    <th>LATEST STATUS</th>
                                                    <th>ACTION</th>
                                                    <th>CREATED AT</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
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

<script>
    function filterOrders() {
        var status = document.getElementById("status").value;
        window.location.href = "{{ route('admin.order.filter', '') }}/" + status;
    }
</script>
