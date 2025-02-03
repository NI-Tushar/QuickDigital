@extends('admin.layout.layout')

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">Service List</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Service List</li>
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
                                <a href="{{ route('add.digialservice') }}"><button type="button" class="btn btn-secondary btn-min-width mr-1 mb-1"><i class="feather icon-edit"></i> Add Service</button></a>
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
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Service Title</th>
                                                    <th>Description</th>
                                                    <th>Features</th>
                                                    <th>Price</th>
                                                    <th>Affiliator Commission</th>
                                                    <th>Thumbnail</th>
                                                    <th>Last Update</th>
                                                    <th>Is Populer?</th>
                                                    <th>ACTIONS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($digService as $digSer)
                                                <tr>
                                                    <td style="text-align:center;">{{ $digSer->id }}</td>
                                                    <td style="text-align:left;">{{ $digSer->title }}</td>
                                                    <td style="text-align:left;">{{ $digSer->description }}</td>
                                                    <td style="text-align:center;">
                                                        @php
                                                            $digSer->features = json_decode($digSer->features, true);
                                                            $index=1;
                                                        @endphp
                                                        <ol style="margin: 0; padding:0px;">
                                                            @foreach ($digSer->features as $feature)
                                                                <li style="text-align:left;"><span style="font-weight:700;">{{$index}}:</span> {{ $feature }}</li>
                                                                    @php $index=$index+1; @endphp
                                                            @endforeach
                                                        </ol>

                                                    </td>
                                                    <td style="text-align:center;width:50px;">{{ $digSer->price }} BDT</td>
                                                    <td style="text-align:center;width:50px;">{{ $digSer->affiliator_commission }} %</td>
                                                    <td style="width: 100px; height: 100px; padding: 3px;">
                                                        <img src="{{ $digSer->thumbnail ? asset($digSer->thumbnail) : asset('no_image2.jpg') }}" class="img-fluid rounded" alt="No Image" style="width: 100%; height: 100%; object-fit: cover;margin:auto;">
                                                    </td>
                                                    <td style="text-align:center;width: 100px;">{{ date('F j, Y, g:i a', strtotime($digSer->updated_at)) }}</td>
                                                    <td style="text-align:center;width: 100px;">
                                                    <style>
                                                        .fa-toggle-on,
                                                        .fa-toggle-off{
                                                            font-size:35px;
                                                        }
                                                        .fa-toggle-on{
                                                            color:green;
                                                        }
                                                        .fa-toggle-off{
                                                            color:gray;
                                                        }
                                                    </style>

                                                        <a user_id="{{ $digSer->id }}" href="{{ url('admin/enable/populer/services/'.$digSer['id']) }}">
                                                            @if($digSer->is_populer == 1)
                                                                <i class="fa fa-toggle-on" status="Active"></i>
                                                            @else
                                                                <i class="fa fa-toggle-off" status="Inactive"></i>
                                                            @endif
                                                        </a>

                                                    </td>
                                                    <td style="text-align:center;">
                                                        <a href="{{ url('admin/update_digitalService/'.$digSer['id']) }}"><i class="fa fa-edit"></i></a>
                                                        &nbsp;&nbsp;
                                                        <a href="javascript:void(0);" onclick="confirmAndRedirect('{{ url('admin/delete-digService/'.$digSer['id']) }}')">
                                                            <i class="fa fa-trash"></i>
                                                        </a>
                                                    </td>
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
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Service Title</th>
                                                    <th>Description</th>
                                                    <th>Features</th>
                                                    <th>Subscription Price</th>
                                                    <th>Affiliator Commission</th>
                                                    <th>Thumbnail</th>
                                                    <th>Last Update</th>
                                                    <th>Is Populer?</th>
                                                    <th>ACTIONS</th>
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
