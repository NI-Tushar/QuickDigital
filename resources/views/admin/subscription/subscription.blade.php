@extends('admin.layout.layout')

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">CMS PAGE</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            {{-- <li class="breadcrumb-item"><a href="{{ url('admin/subscription') }}">Subscription Packages</a></li> --}}
                            <li class="breadcrumb-item active">Subscription Packages</li>
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
                                @if($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                                <a href="{{ url('admin/add-edit-subscription') }}"><button type="button" class="btn btn-secondary btn-min-width mr-1 mb-1"><i class="feather icon-edit"></i> Add Subscription package</button></a>
                                @endif
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
                                    <table id="cmspages" class="table table-striped table-bordered custom-toolbar-elements">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>NAME</th>
                                                <th>PRICE</th>
                                                <th>DURATION(In Month's)</th>
                                                <th>Download Limit</th>
                                                <th>FEATURES</th>
                                                <th>CREATED ON</th>
                                                <th>ACTIONS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($Subscriptions as $subscriptions )
                                            <tr>
                                                <td>{!! $subscriptions['id'] !!}</td>
                                                <td>{{ $subscriptions['name'] }}</td>
                                                <td>{{ $subscriptions['price'] }}</td>
                                                <td>{{ $subscriptions['duration']  }}</td>
                                                <td>{{ $subscriptions['count'] }}</td>
                                                <td>
                                                    @foreach(json_decode($subscriptions['features']) as $feature)
                                                    <p>{{ $feature }}</p>
                                                    @endforeach
                                                </td>

                                                <td>{{ date("F j, Y, g:i a", strtotime($subscriptions['created_at'])) }}</td>
                                                <td>
                                                    @if($pagesModule['edit_access']==1 || $pagesModule['full_access']==1)
                                                    <a href="{{ url('admin/add-edit-subscription/'.$subscriptions['id']) }}"><i class="fa fa-edit"></i></a>
                                                    &nbsp;&nbsp;
                                                    @endif
                                                    @if($pagesModule['full_access']==1)
                                                    <a href="{{ url('admin/delete-subscription/'.$subscriptions['id']) }}"><i class="fa fa-trash"></i></a>
                                                    @endif
                                                </td>
                                                {{-- <td><!-- Add actions here if needed --></td> --}}
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>NAME</th>
                                                <th>PRICE</th>
                                                <th>DURATION</th>
                                                <th>COUNT</th>
                                                <th>FEATURES</th>
                                                <th>CREATED ON</th>
                                                <th>ACTIONS</th>
                                            </tr>
                                        </tfoot>
                                    </table>
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