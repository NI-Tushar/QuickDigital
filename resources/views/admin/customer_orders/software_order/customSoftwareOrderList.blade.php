@extends('admin.layout.layout')

 <!-- for featureDetails show -->
 <link rel="stylesheet" href="{{ url('front/styles/admin_ordered_feature.css') }}">

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">Software Custom Order List</h3>
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
                                <h3>Total Custom Software Order: {{$totalCount}}</h3>
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
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Mobile</th>
                                                    <th>Request Date</th>
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


                                                tbody tr td select{
                                                    text-align:center;   
                                                    cursor:pointer;
                                                    font-weight:800;
                                                }
                                                tbody tr td .Pending{
                                                    color:rgb(248, 57, 9);
                                                    border:2px solid rgb(248, 57, 9);
                                                    font-weight:600;
                                                }
                                                tbody tr td .In-progress{
                                                    border:2px solid rgb(230, 184, 0);
                                                    color:rgb(230, 184, 0);
                                                    font-weight:600;
                                                }
                                                tbody tr td .Writing{
                                                    border:2px solid rgb(0, 116, 218);
                                                    color:rgb(0, 116, 218);
                                                    font-weight:600;
                                                }
                                                tbody tr td .Contacted{
                                                    border:2px solid rgb(43, 167, 78);
                                                    color:rgb(43, 167, 78);
                                                    font-weight:600;
                                                }
                                                tbody tr td .Orderd{
                                                    border:2px solid rgb(0, 179, 51);
                                                    color: rgb(0, 179, 51);
                                                    font-weight:600;
                                                }
                                                tbody tr td .Delivered{
                                                    background-color: rgb(0, 105, 30);
                                                    color: aliceblue;
                                                    font-weight:600;
                                                }
                                            </style>
                                            <tbody>
                                                @foreach ($custom_software_order as $order)
                                                <tr>
                                                    <td style="text-align:center; padding:5px;">{{ $order->id }}</td>
                                                    <td style="text-align:left;font-size:14px;padding:5px;">{{$order->title}}</td>
                                                    <td style="text-align:center;padding:5px;">{{ $order->description}}</td>
                                                    <td style="text-align:center;width:50px;padding:5px;">{{ $order->name}}</td>
                                                    <td style="text-align:center;width:50px;padding:5px;">{{ $order->email}}</td>
                                                    <td style="text-align:center;width:50px;padding:5px;">{{ $order->mobile}}</td>
                                                    <td style="text-align:center;width: 100px;padding:5px;">{{ date('F j, Y, g:i a', strtotime($order->created_at)) }}</td>
                                                    <td style="text-align:center;width: 100px;padding:5px;">

                                                        @if($order->status == 'Pending')
                                                            <select class="form-control Pending" onchange="updateStatus({{ $order->id }}, this)">
                                                        @elseif($order->status == 'Contacted')
                                                            <select class="form-control Contacted" onchange="updateStatus({{ $order->id }}, this)">
                                                        @elseif($order->status == 'In-progress')
                                                            <select class="form-control In-progress" onchange="updateStatus({{ $order->id }}, this)">
                                                        @elseif($order->status == 'Orderd')
                                                            <select class="form-control Orderd" onchange="updateStatus({{ $order->id }}, this)">
                                                        @elseif($order->status == 'Delivered')
                                                            <select class="form-control Delivered" onchange="updateStatus({{ $order->id }}, this)">
                                                        @else
                                                            <select class="form-control" onchange="updateStatus({{ $order->id }}, this)">
                                                        @endif
                                                            <option value="Pending" {{ $order->status === 'Pending' ? 'selected' : '' }}>Pending</option>
                                                            <option value="Contacted" {{ $order->status === 'Contacted' ? 'selected' : '' }}>Contacted</option>
                                                            <option value="In-progress" {{ $order->status === 'In-progress' ? 'selected' : '' }}>In-progress</option>
                                                            <option value="Orderd" {{ $order->status === 'Orderd' ? 'selected' : '' }}>Orderd</option>
                                                            <option value="Delivered" {{ $order->status === 'Delivered' ? 'selected' : '' }}>Active</option>
                                                        </select>

                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr style="color:rgb(3, 126, 128);border:1px solid rgb(3, 126, 128);">
                                                    <th style="width:30px;">ID</th>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Mobile</th>
                                                    <th>Request Date</th>
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

    
function updateStatus(orderId, selectElement){
        var status = selectElement.value;
            window.location.href = "{{ route('admin.custom.order.updateStatus', ['status' => '__status__', 'orderId' => '__orderId__']) }}".replace('__status__', status).replace('__orderId__', orderId);
    }


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

