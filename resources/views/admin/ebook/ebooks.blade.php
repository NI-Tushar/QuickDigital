@extends('admin.layout.layout')

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">E-book List</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">E-book List</li>
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
                                <a href="{{ url('admin/add-edit-ebook') }}"><button type="button" class="btn btn-secondary btn-min-width mr-1 mb-1"><i class="feather icon-edit"></i> Add E-book</button></a>
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
                                                    <th>COVER IMAGE</th>
                                                    <th>TITLE</th>
                                                    <th>AUTHOR</th>
                                                    <th>PRICE</th>
                                                    <th>PAGE</th>
                                                    <th>RELEASE DATE</th>
                                                    <th>DESCRIPTION</th>
                                                    <th>PDF</th>
                                                    <th>CREATED AT</th>
                                                    <th>ACTIONS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($ebooks as $ebook)
                                                <tr>
                                                    <td>{{ $ebook->id }}</td>
                                                    <td style="width: 100px; height: 100px; padding: 0;">
                                                        @if (!empty($ebook->cover_image))
                                                        <img src="{{ asset('admin/images/ebook_images/' . basename($ebook->cover_image)) }}" class="img-fluid rounded" alt="Cover Image" style="width: 100%; height: 100%; object-fit: cover;">
                                                        @else
                                                        <img src="{{ asset('admin/images/ebook_images/no_image.jpg') }}" class="img-fluid rounded" alt="No Image" style="width: 100%; height: 100%; object-fit: cover;">
                                                        @endif
                                                    </td>

                                                    <td>{{ $ebook->title }}</td>
                                                    <td>{{ $ebook->author }}</td>
                                                    <td>{{ $ebook->price }}</td>
                                                    <td>{{ $ebook->total_page }}</td>

                                                    <td>{{ date('F j, Y, g:i a', strtotime($ebook->release_date)) }}</td>
                                                    <td>{{ $ebook->description }}</td>
                                                    <td>
                                                        @if (!empty($ebook->pdf))
                                                        <a href="{{ asset('admin/images/ebook_images/' . basename($ebook->pdf)) }}" target="_blank">View PDF</a>
                                                        @else
                                                        No File
                                                        @endif
                                                    </td>

                                                    <td>{{ date('F j, Y, g:i a', strtotime($ebook->created_at)) }}</td>
                                                    <td>
                                                        <a href="{{ url('admin/add-edit-ebook/' . $ebook->id) }}"><i class="fa fa-edit"></i></a>
                                                        &nbsp;&nbsp;
                                                        <a href="{{ url('admin/delete-ebook/' . $ebook->id) }}"><i class="fa fa-trash"></i></a>

                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>COVER IMAGE</th>
                                                    <th>TITLE</th>
                                                    <th>AUTHOR</th>
                                                    <th>PRICE</th>
                                                    <th>PAGE</th>
                                                    <th>RELEASE DATE</th>
                                                    <th>DESCRIPTION</th>
                                                    <th>PDF</th>
                                                    <th>CREATED AT</th>
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
