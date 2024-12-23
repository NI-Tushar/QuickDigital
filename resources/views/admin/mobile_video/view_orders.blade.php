@extends('admin.layout.layout')

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">ORDER LIST - MOBILE VIDEO COURSE</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            {{-- <li class="breadcrumb-item"><a href="{{ url('admin/cms-page') }}">Cms Page</a></li> --}}
                            <li class="breadcrumb-item active">ORDER LIST - MOBILE VIDEO COURSE</li>
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
                                    <div class="table-responsive">
                                        <table id="cmspages" class="table table-striped table-bordered custom-toolbar-elements">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>CUSTOMER NAME</th>
                                                    <th>CUSTOMER EMAIL</th>
                                                    <th>CUSTOMER PHONE</th>
                                                    <th>PAYMENT OPTION</th>
                                                    <th>PAYED ??</th>
                                                    <th>PAYMENT MOBILE NUMBER </th>
                                                    <th>CREATED AT>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($courseOrders as $courseOrder )
                                                <tr>
                                                    <td>{!! $courseOrder['id'] !!}</td>

                                                    <td>{{ $courseOrder['name'] }}</td>
                                                    <td>{{ $courseOrder['email'] }}</td>
                                                    <td>{{ $courseOrder['phone'] }}</td>
                                                    <td>{{ $courseOrder['payment_option'] }}</td>
                                                    <td>{{ $courseOrder['did_you_pay'] }}</td>
                                                    <td>{{ $courseOrder['confirm_number'] }}</td>
                                                    <td>{{ date("F j, Y, g:i a", strtotime($courseOrder->created_at)) }}</td>

                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>CUSTOMER NAME</th>
                                                    <th>OCUSTOMER EMAIL</th>
                                                    <th>USTOMER PHONE</th>
                                                    <th>PAYMENT OPTION</th>
                                                    <th>PAYED ??</th>
                                                    <th>PAYMENT MOBILE NUMBER </th>
                                                    <th>CREATED AT>
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