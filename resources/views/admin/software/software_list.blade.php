@extends('admin.layout.layout')

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">Software List</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">Software List</li>
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
                                <a href="{{ route('software.add_edit') }}"><button type="button" class="btn btn-secondary btn-min-width mr-1 mb-1"><i class="feather icon-edit"></i> Add Software</button></a>
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
                                                    <th>Software Title</th>
                                                    <th>Description</th>
                                                    <th>Features</th>
                                                    <th>Current Price</th>
                                                    <th>Before Price</th>
                                                    <th>Rating</th>
                                                    <th>Poster Image</th>
                                                    <th style="width:300px;">Preview Images</th>
                                                    <th>Last Update</th>
                                                    <th>ACTIONS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($softwares as $software)
                                                <tr>
                                                    <td style="text-align:center;">{{ $software->id }}</td>
                                                    <td style="text-align:left;">{{ $software->title }}</td>
                                                    <td style="text-align:left;">{{ $software->desc }}</td>
                                                    <td style="text-align:center;">
                                                        @php
                                                            $software->features = json_decode($software->features, true);
                                                            $index=1;
                                                        @endphp
                                                        <ol style="margin: 0; padding:0px;">
                                                            @foreach ($software->features as $feature)
                                                                <li style="text-align:left;"><span style="font-weight:700;">{{$index}}:</span> {{ $feature }}</li>
                                                                    @php $index=$index+1; @endphp
                                                            @endforeach
                                                        </ol>

                                                    </td>
                                                    <td style="text-align:center;width:50px;">{{ $software->current_price }}</td>
                                                    <td style="text-align:center;width:50px;">{{ $software->before_price }}</td>
                                                    <td style="text-align:center;width:15px;">{{ $software->star_rating }}</td>
                                                    <td style="width: 100px; height: 100px; padding: 3px;">
                                                        <img src="{{ $software->image_2 ? asset($software->poster_image) : asset('no_image2.jpg') }}" class="img-fluid rounded" alt="No Image" style="width: 100%; height: 100%; object-fit: cover;margin:auto;">
                                                    </td>
                                                    <td style="width: 300px; height: 100px; padding: 3px; display:flex;gap:3px; position:relative;">
                                                        <img src="{{ $software->image_2 ? asset($software->image_1) : asset('no_image2.jpg') }}" class="img-fluid rounded" alt="No Image" style="width:33%; height: 100%; object-fit: cover;border:1px solid black;margin:auto;">
                                                        <img src="{{ $software->image_2 ? asset($software->image_2) : asset('no_image2.jpg') }}" class="img-fluid rounded" alt="No Image" style="width:33%; height: 100%; object-fit: cover;border:1px solid black;margin:auto;">
                                                        <img src="{{ $software->image_2 ? asset($software->image_3) : asset('no_image2.jpg') }}" class="img-fluid rounded" alt="No Image" style="width:33%; height: 100%; object-fit: cover;border:1px solid black;margin:auto;">
                                                    </td>
                                                    <td style="text-align:center;width: 100px;">{{ date('F j, Y, g:i a', strtotime($software->updated_at)) }}</td>
                                                    <td style="text-align:center;">
                                                        <a href=""><i class="fa fa-edit"></i></a>
                                                        &nbsp;&nbsp;
                                                        <a href="{{ url('admin/delete-software/'.$software['id']) }}"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>Software Title</th>
                                                    <th>Description</th>
                                                    <th>Features</th>
                                                    <th>Current Price</th>
                                                    <th>Before Price</th>
                                                    <th>Rating</th>
                                                    <th>Poster Image</th>
                                                    <th>Preview Images</th>
                                                    <th>Last Update</th>
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
