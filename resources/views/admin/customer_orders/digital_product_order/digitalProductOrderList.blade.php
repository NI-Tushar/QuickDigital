@extends('admin.layout.layout')

 <!-- for featureDetails show -->
 <link rel="stylesheet" href="{{ url('front/styles/admin_ordered_feature.css') }}">

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">Digital Product Order List</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Digital Product Order List</li>
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
                                <h3>Total Digital Product Order: {{$totalCount}}</h3>
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
                                                    <th>Customer Name</th>
                                                    <th>Mobile</th>
                                                    <th>Title</th>
                                                    <th>Paid-Amount</th>
                                                    <th>Pay-Method</th>
                                                    <th>TXN-ID</th>
                                                    <th>Affiliate?</th>
                                                    <th>Order Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <style>
                                                .card-header h3{
                                                    margin:0;
                                                    padding:0;
                                                    font-weight:600;
                                                }
                                                table tbody tr:hover{
                                                    background:rgba(3, 126, 128, 0.08) !important;
                                                }
                                                table tbody tr td button:hover{
                                                    background-color:rgb(3, 126, 128);
                                                    color:aliceblue;
                                                }
                                                .requirement_list{
                                                    padding:0;
                                                    padding-left:15px;
                                                    margin:0;
                                                    font-weight:600;
                                                }
                                                .requirement_list li{
                                                    list-style: decimal;
                                                    text-align:left;
                                                    color:black;
                                                    font-size:12px;
                                                }
                                            </style>
                                            <tbody>
                                                @foreach ($order_softwares as $order)
                                                <tr>
                                                    <td style="text-align:center; padding:5px;">{{ $order->id }}</td>
                                                    <td style="text-align:left;font-size:14px;padding:5px;">{{ $order->order_id }}</td>
                                                    <td style="text-align:left;font-size:14px;padding:5px;">{{$order->user->name}}</td>
                                                    <td style="text-align:left;font-size:14px;padding:5px;">{{$order->user->mobile}}</td>
                                                    <td style="text-align:left;font-size:14px;padding:5px;">{{$order->digitalproduct->title}}</td>
                                                    <td style="text-align:center;width:50px;padding:5px;">{{ $order->total}} BDT</td>
                                                    <td style="text-align:center;width:50px;padding:5px;">{{ $order->payment_method}}</td>
                                                    <td style="text-align:center;width:50px;padding:5px;">{{ $order->bank_trx_id}}</td>
                                                    <td style="text-align:center;width:50px;padding:5px;">@if($order->affiliator_promocode_id != null)Yes @endif</td>
                                                    <td style="text-align:center;width: 100px;padding:5px;">{{ date('F j, Y, g:i a', strtotime($order->created_at)) }}</td>
                                                    <td style="text-align:center;width: 100px;padding:5px;">
                                                        <p style="border:2px solid green; background-color: green;color:aliceblue;border-radius:5px;padding-top:5px;padding-bottom:5px;font-weight:600;font-size:13px;">Paid</p>
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr style="color:rgb(3, 126, 128);border:1px solid rgb(3, 126, 128);">
                                                    <th>ID</th>
                                                    <th>Order ID</th>
                                                    <th>Customer Name</th>
                                                    <th>Mobile</th>
                                                    <th>Title</th>
                                                    <th>Paid-Amount</th>
                                                    <th>Pay-Method</th>
                                                    <th>TXN-ID</th>
                                                    <th>Affiliate?</th>
                                                    <th>Order Date</th>
                                                    <th>Status</th>
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


<!-- ____________________________________ SOFTWARE FEATURE LIST START -->
 
<div id="showFeatures" class="buy_popup_section">
    <div class="centered_popup_section">
      <div onclick="closeFeatures()" class="btn-close"></div>
    <div class="clear"></div>
    <div class="feature_list">
        <span>Software Name:</span>
        <h5 id="title"></h5>
        <p>Customer Provide Features:</p>
        <ul>
            <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique cupiditate rerum animi iste autem placeat</li>
            <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique cupiditate rerum animi iste autem placeat</li>
            <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique cupiditate rerum animi iste autem placeat</li>
            <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique cupiditate rerum animi iste autem placeat</li>
            <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Similique cupiditate rerum animi iste autem placeat</li>
        </ul>                                                 
    </div>
  </div>
</div>


<script>


    // function showFeatures(title, requirement_list) {
        // var modal = document.getElementById("showFeatures");
        // document.getElementById("title").innerText = title;
        // modal.classList.add("open");
        // var modal = document.getElementById("requirement_list");
        
    // }

//   function closeFeatures(){
//     var modal = document.getElementById("showFeatures");
//     modal.classList.remove("open");
//   }
</script>
<!-- ____________________________________ SOFTWARE FEATURE LIST END -->

