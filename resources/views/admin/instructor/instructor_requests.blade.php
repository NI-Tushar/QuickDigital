@extends('admin.layout.layout')

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">Instructor Requests</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Instructor Requests</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        @if (Session::has('message'))
        <div class="alert bg-success alert-icon-left alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Well done!</strong> {{ Session::get('message') }}
        </div>
        @endif
        <div class="content-body">
            <section id="column">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Pending Instructor Requests</h4>
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
                                        <table id="instructorRequests" class="table table-striped table-bordered custom-toolbar-elements">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>NAME</th>
                                                    <th>EMAIL</th>
                                                    <th>REQUEST DATE</th>
                                                    <th>STATUS</th>
                                                    <th>ACTIONS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($requests as $request)
                                                <tr>
                                                    <td>{{ $request->id }}</td>
                                                    <td>{{ $request->user->name }}</td>
                                                    <td>{{ $request->user->email }}</td>
                                                    <td>{{ date('F j, Y, g:i a', strtotime($request->created_at)) }}</td>
                                                    <td class="text-center">
                                                        @if ($request->is_approved == 1)
                                                        <span class="badge badge-success">Approved</span>
                                                        @elseif ($request->is_approved == 2)
                                                        <span class="badge badge-danger">Rejected</span>
                                                        @else
                                                        <span class="badge badge-warning">Pending</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($request->is_approved == 0)
                                                        <a href="{{ url('admin/approve-instructor/' . $request->id) }}" class="btn btn-success btn-sm">Approve</a>
                                                        <a href="{{ url('admin/reject-instructor/' . $request->id) }}" class="btn btn-danger btn-sm">Reject</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>NAME</th>
                                                    <th>EMAIL</th>
                                                    <th>REQUEST DATE</th>
                                                    <th>STATUS</th>
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
