@extends('admin.layout.layout')

@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2">
                <h3 class="content-header-title mb-0">{{ $title }}</h3>
                <div class="row breadcrumbs-top">
                    <div class="breadcrumb-wrapper col-12">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item active">{{ $title }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <section id="column">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-12">
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
                                    <form name="ebook" id="ebook" enctype="multipart/form-data" @if(empty($ebook['id'])) action="{{ url('admin/add-edit-ebook') }}" @else action="{{ url('admin/add-edit-ebook/'.$ebook['id']) }}" @endif method="POST">
                                        @csrf
                                        <div class="form-body">
                                            <div class="media">
                                                @if (!empty($ebook->cover_image))
                                                <a href="{{ asset('admin/images/ebook_images/' . $ebook->cover_image) }}" target="_blank">
                                                    <img src="{{ asset('admin/images/ebook_images/' . $ebook->cover_image) }}" class="rounded mr-75" alt="cover image" height="64" width="64">
                                                </a>
                                                @else
                                                <a href="{{ asset('admin/ebook/no_image.jpg') }}" target="_blank">
                                                    <img src="{{ asset('admin/images/ebook_images/no_image.jpg') }}" class="rounded mr-75" alt="cover image" height="64" width="64">
                                                </a>
                                                @endif
                                                <div class="media-body mt-75">
                                                    <div class="col-12 px-0 d-flex flex-sm-row flex-column justify-content-start">
                                                        <label class="btn btn-sm btn-primary ml-50 mb-50 mb-sm-0 cursor-pointer" for="cover_image">Upload new photo</label>
                                                        <input type="file" id="cover_image" name="cover_image" accept="image/*" hidden>
                                                        <button class="btn btn-sm btn-secondary ml-50">Reset</button>
                                                    </div>
                                                    <p class="text-muted ml-75 mt-50"><small>Allowed JPG, GIF or PNG. Max size of 2MB</small></p>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" id="title" class="form-control round" placeholder="Enter Title" name="title" @if(!empty($ebook->title)) value="{{ $ebook->title }}" @endif>
                                            </div>
                                            <div class="form-group">
                                                <label for="price">Price</label>
                                                <input type="number" id="price" class="form-control round" placeholder="Enter Price" name="price" @if(!empty($ebook->price)) value="{{ $ebook->price }}" @endif>
                                            </div>
                                            <div class="form-group">
                                                <label for="total_page">Page</label>
                                                <input type="number" id="total_page" class="form-control round" placeholder="Enter Total Page" name="total_page" step="1" @if(!empty($ebook->total_page)) value="{{ $ebook->total_page }}" @endif>
                                            </div>

                                            <div class="form-group">
                                                <label for="release_date">Release Date</label>
                                                <input type="date" id="release_date" class="form-control round" placeholder="Select release date" name="release_date" @if(!empty($ebook->release_date)) value="{{ $ebook->release_date }}" @endif>
                                            </div>
                                            <div class="form-group">
                                                <label for="author">Author</label>
                                                <input type="text" id="author" class="form-control round" placeholder="Enter author name" name="author" @if(!empty($ebook->author)) value="{{ $ebook->author }}" @endif>
                                            </div>
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <input type="text" id="description" class="form-control round" placeholder="Enter description" name="description" @if(!empty($ebook->description)) value="{{ $ebook->description }}" @endif>
                                            </div>
                                            <fieldset class="form-group">
                                                <label for="basicInputFile">PDF</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="pdf" name="pdf">
                                                    <label class="custom-file-label" for="pdf">Choose pdf</label>
                                                </div>
                                                @if (!empty($ebook->file))
                                                <a href="{{ asset('admin/images/ebook/' . $ebook->pdf) }}" target="_blank">View current file</a>
                                                @endif
                                            </fieldset>
                                        </div>
                                        <div class="form-actions center">
                                            <a href="{{ url('admin/ebooks') }}" class="btn btn-warning mr-1">
                                                <i class="feather icon-x"></i> Cancel
                                            </a>
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-check-square-o"></i> Save
                                            </button>
                                        </div>
                                    </form>
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