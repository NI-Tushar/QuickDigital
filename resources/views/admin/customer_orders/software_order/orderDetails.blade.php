@extends('admin.layout.layout')


<style>
    .form-body h2{
        width: 100%;
        text-align:center;
        font-weight:700;
        padding-bottom:25px;
    }
    .img_section{
        background-color:rgba(0, 0, 0, 0.07);
        border-radius:5px;
        padding:5px;
    }
    .img_section .preview_img{
        display:flex;
        gap:5px;
    }
    .img_section .preview_img input{
        border-radius:5px;
    }
    .price_section{
        display:flex;
        width: 100%;
        gap:5px;
    }
    .price_section .form-group{
        width: 100%;
    }
    label{
        font-weight:600;
    }
    .form-group p{
        border:1px solid rgb(210, 210, 210);
        padding:10px;
        background-color:#f2f2f2;
        border-radius:7px;
        font-weight:600;
    }
    .form-group p select{
        padding:7px;
        width:100%;
        border:none;
        border-radius:5px;
    }
    .form-group ul {
        border:1px solid rgb(210, 210, 210);
        background-color:#f2f2f2;
        padding:10px;
        padding-left:35px;
        border-radius:7px;
    }
    .form-group ul li{
        list-style:decimal;
        line-height:2.5;
        border-bottom:1px solid rgb(210, 210, 210);
    }

    /* _______________________ button section */
    .form-actions {
        display:flex;
    }
    .form-actions a,
    .form-actions button{
        width: 50%;
    }
</style>


@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">Software Order</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Software Order</li>
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
                        <div class="card" style="max-width:1000px;margin:auto;border-top:5px solid rgb(1, 164, 167);border-radius:10px;">
                            <!-- _________ -->
                            <div class="card-content collapse show">
                                <div class="card-body">

                                    @if (Session::has('error_message'))
                                    <div class="alert bg-danger alert-icon-left alert-dismissible mb-2" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <strong>Oh snap! </strong>{{ Session::get('error_message') }}
                                    </div>
                                    @endif
                                    @if (Session::has('success_message'))
                                    <div class="alert bg-success alert-icon-left alert-dismissible mb-2" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <strong>Well done!</strong> {{ Session::get('success_message') }}
                                    </div>
                                    @endif

                                    @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    <form name="product" id="productForm" action="{{ url('admin/update_status_software_order') }}" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="order_id" value="{{$order->id}}">
                                    @csrf
                                        <div class="form-body">
                                            <h2>Customer Order Details</h2>
                                            <!-- ______________ -->
                                            <div class="price_section">
                                                <div class="form-group">
                                                    <label>Customer Name</label>
                                                    <p>{{$order->user->name}}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label>Customer Email</label>
                                                    <p>{{$order->user->email}}</p>
                                                </div>
                                                <div class="form-group">
                                                    <label>Customer Number</label>
                                                    <p>{{$order->user->mobile}}</p>
                                                </div>
                                            </div>
                                            <!-- ______________ -->

                                            <div class="form-group">
                                                <label>Order Id</label>
                                                <p>{{$order->order_id}}</p>
                                            </div>
                                            <div class="form-group">
                                                <label>Software Title</label>
                                                <p>{{$order->softwareList->title}}</p>
                                            </div>

                                            <div class="form-group">
                                                <label>Software Description</label>
                                                <p>{{$order->softwareList->description}}</p>
                                            </div>

                                            <div class="form-group">
                                                @if($order->software_type=='custom')
                                                @if( $order->Custom_requirement_list != null)
                                                    @php
                                                        $order->Custom_requirement_list = json_decode($order->Custom_requirement_list, true);
                                                    @endphp
                                                        <label>Clients Custom Feature</label>
                                                        <ul>
                                                            @foreach ($order->Custom_requirement_list as $list)
                                                                <li>{{ $list }}</li>
                                                            @endforeach
                                                        </ul>
                                                    @else
                                                        <p style="color:red;">Not Provided</p>
                                                    @endif
                                                @else
                                                    <label>Service Type</label>
                                                    <p>Ready Made (Subscription)</p>
                                                @endif
                                            </div>
                                            
                                            
                                            
                                            <!-- ______________ -->
                                            <div class="price_section">
                                                <div class="form-group">
                                                    <label>Order Date:</label>
                                                    <p>{{ date('F j, Y', strtotime($order->created_at)) }}</p>
                                                </div>
                                                
                                                <div class="form-group">
                                                   <label>Order Type:</label>
                                                    <p>{{$order->software_type}}</p>
                                                </div>
                                            </div>
                                            <!-- ______________ -->
                                            <div class="price_section">
                                                <div class="form-group">
                                                    <label>Start Date:</label>
                                                    <p>{{ date('F j, Y', strtotime($order->created_at)) }}</p>
                                                </div>
                                                
                                                <div class="form-group">
                                                   <label>Last Renew:</label>
                                                   <p>Date will Place here</p>
                                                </div>
                                            </div>
                                            <!-- ______________ -->
                                            <div class="price_section">
                                                <div class="form-group">
                                                    <label>Paid Amount:</label>
                                                    <p>{{$order->total}} BDT</p>
                                                </div>
                                                
                                                <div class="form-group">
                                                   <label>Payment Method:</label>
                                                   <p>{{$order->payment_method}} </p>
                                                </div>
                                                
                                                <div class="form-group">
                                                   <label>Transaction ID:</label>
                                                   <p>{{$order->bank_trx_id}}</p>
                                                </div>
                                            </div>

                                            <!-- ______________ -->
                                            <div class="price_section">                                              
                                                <div class="form-group">
                                                  
                                                </div>
                                                <div class="form-group">
                                                  
                                                </div>
                                                <div class="form-group">
                                                    <label>Status:</label>
                                                    <p>
                                                        <select name="delivery_status" id="">
                                                            <option value="Pending" {{ $order->delivery_status === 'Pending' ? 'selected' : '' }}>Pending</option>
                                                            <option value="In-progress" {{ $order->delivery_status === 'In-progress' ? 'selected' : '' }}>In-progress</option>
                                                            <option value="Disabled" {{ $order->delivery_status === 'Disabled' ? 'selected' : '' }}>Disabled</option>
                                                            <option value="Delivered" {{ $order->delivery_status === 'Delivered' ? 'selected' : '' }}>Active</option>
                                                        </select>
                                                    </p>
                                                </div>
                                            </div>

                                            <div class="form-actions center">
                                                <a href="{{route('software.order.list')}}" class="btn btn-warning mr-1">
                                                <i class="feather icon-arrow-left"></i>
                                                Back
                                                </a>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-check-square-o"></i> Save
                                                </button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <!-- _________ -->
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
@endsection
