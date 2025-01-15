@extends('admin.layout.layout')

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">Software Order List</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Software Order List</li>
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
                                <a href="{{ route('digProduct.add') }}"><button type="button" class="btn btn-secondary btn-min-width mr-1 mb-1"><i class="feather icon-edit"></i> Add product</button></a>
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
                                    <div style="overflow-x: auto;">
                                        <table id="subadmins" class="table table-striped table-bordered custom-toolbar-elements">
                                            <thead>
                                                <tr style="background:rgb(3, 126, 128);color:aliceblue;">
                                                    <th style="width:30px;">ID</th>
                                                    <th style="width:150px;">Order ID</th>
                                                    <th>Title</th>
                                                    <th style="width:150px;text-align:center;">Start-End</th>
                                                    <th style="width:100px;">Order Type</th>
                                                    <th>Pay-Amount</th>
                                                    <th>Pay-Method</th>
                                                    <th>TXN-ID</th>
                                                    <th>Order Date</th>
                                                    <th style="text-align:center;">ACTIONS</th>
                                                </tr>
                                            </thead>
                                            <style>
                                                table tbody tr:hover{
                                                    background:rgba(3, 126, 128, 0.18) !important;
                                                }
                                            </style>
                                            <tbody>
                                                @foreach ($order_softwares as $order)
                                                <tr>
                                                    <td style="text-align:center; padding:5px;">{{ $order->id }}</td>
                                                    <td style="text-align:left;font-size:14px;padding:5px;">{{ $order->order_id }}</td>
                                                    <td style="text-align:left;font-size:14px;padding:5px;">{{$order->softwareList->title}}</td>
                                                    <td style="text-align:left;font-size:12px;padding:5px; font-weight:600;">
                                                        <span style="color:rgb(3, 126, 128);">Last Renew: {{ date('F j, Y', strtotime($order->created_at)) }}</span>
                                                        <br>
                                                        <span style="color:rgb(3, 126, 128);">End Date: {{ date('F j, Y', strtotime($order->created_at)) }}</span>
                                                    </td>
                                                    <td style="text-align:center;color:rgb(3, 126, 128);font-weight:600;padding:5px;">{{ $order->software_type}} <br>
                                                        @if($order->software_type=='custom')
                                                        <button style="border:1.5px solid green;color:green:font-size:12px;border-radius:5px;padding-left:5px;padding-right:5px;">Features</button>
                                                        @endif
                                                    </td>
                                                    <td style="text-align:center;width:50px;padding:5px;">{{ $order->total}} BDT</td>
                                                    <td style="text-align:center;width:50px;padding:5px;">{{ $order->payment_method}}</td>
                                                    <td style="text-align:center;width:50px;padding:5px;">{{ $order->bank_trx_id}}</td>
                                                    <td style="text-align:center;width: 100px;padding:5px;">{{ date('F j, Y, g:i a', strtotime($order->created_at)) }}</td>
                                                    <td style="text-align:center;padding:5px;">
                                                        <a href="{{ url('admin/update_product/'.$order['id']) }}"><i class="fa fa-edit"></i></a>
                                                        &nbsp;&nbsp;
                                                        <a href="javascript:void(0);" onclick="confirmAndRedirect('{{ url('admin/delete-digProduct/'.$order['id']) }}')">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                        <script>
                                                            function confirmAndRedirect(route) {
                                                                    // Show a confirmation popup
                                                                    if (confirm("Are you sure you want to delete this item?")) {
                                                                        // If confirmed, redirect to the route
                                                                        window.location.href = route;
                                                                    }
                                                                    // If canceled, do nothing
                                                                }
                                                            </script>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr style="color:rgb(3, 126, 128);border:1px solid rgb(3, 126, 128);">
                                                    <th>ID</th>
                                                    <th>Order ID</th>
                                                    <th>Title</th>
                                                    <th>Start-End</th>
                                                    <th>Order Type</th>
                                                    <th>Pay-Amount</th>
                                                    <th>Pay-Method</th>
                                                    <th>TXN-ID</th>
                                                    <th>Order Date</th>
                                                    <th style="text-align:center;">ACTIONS</th>
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
