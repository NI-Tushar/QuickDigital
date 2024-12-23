@extends('instructor.layout.layout')
@section('content')

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row justify-content-md-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-card-center">{{ $title }}</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
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
                                        <form class="form" method="POST" enctype="multipart/form-data" @if(empty($topic['id'])) action="{{ url('instructor/add-edit-course-topic/'.$course_id) }}" @else action="{{ url('instructor/add-edit-course-topic/'.$course_id.'/'.$topic['id']) }}" @endif>@csrf
                                            <div class="form-body">
                                                <input hidden type="text" id="course_id" class="form-control" name="course_id" value="{{ $course_id }}">
                                                <div class="form-group">
                                                    <label for="title">Topic Title</label>
                                                    <input type="text" id="title" class="form-control" placeholder="Enter topic title" name="title" value="{{ old('title', $topic->title) }}">
                                                </div>

                                                <div class="form-group">
                                                    <label for="summary">Topic Summary</label>
                                                    <textarea id="summary" class="form-control" placeholder="Enter topic summary" name="summary">{{ old('summary', $topic->summary) }}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-actions center border-0">
                                                <button type="reset" class="btn btn-warning mr-1">
                                                    <i class="feather icon-x"></i> Cancel
                                                </button>
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
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->
@endsection
