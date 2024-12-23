@extends('instructor.layout.layout')
@section('content')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
<!-- BEGIN: Content-->
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <!-- Basic form layout section start -->
            <section id="basic-form-layouts">
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title" id="basic-layout-form-center">{{ $title }}</h4>
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
                                    <form class="form" id="lesson-form" method="POST" enctype="multipart/form-data" action="{{ url('instructor/add-edit-course-lesson/'.$course_id.($lesson->id ? '/'.$lesson->id : '')) }}">
                                        @csrf
                                        <div class="row justify-content-md-center">
                                            <div class="col-md-8">
                                                <div class="form-body">
                                                    <!-- Lesson title -->
                                                    <div class="form-group">
                                                        <label for="lesson_title">Lesson Title</label>
                                                        <input type="text" class="form-control" id="lesson_title" name="lesson_title" value="{{ old('lesson_title', $lesson->lesson_title ?? '') }}">
                                                    </div>
                                                    <!-- Lesson description -->
                                                    <div class="form-group">
                                                        <label for="lesson_description">Description</label>
                                                        <div id="editor">{!! old('lesson_description', $lesson->lesson_description ?? '') !!}</div>
                                                        <input type="hidden" name="lesson_description" id="lesson_description" value="{{ old('lesson_description', $lesson->lesson_description ?? '') }}">
                                                    </div>
                                                    <!-- Topic this course belongs to -->
                                                    <div class="form-group">
                                                        <label for="topic_id">Select Topic</label>
                                                        <select class="custom-select block" id="topic_id" name="topic_id">
                                                            <option selected disabled>Select Topic this course belongs to</option>
                                                            @if($topics->isEmpty())
                                                            <option disabled>No topics found. Please create a course topic first.</option>
                                                            @else
                                                            @foreach($topics as $topicId => $topicTitle)
                                                            <option value="{{ $topicId }}" @if(old('topic_id', $lesson->topic_id ?? '') == $topicId) selected @endif>{{ $topicTitle }}</option>
                                                            @endforeach
                                                            @endif
                                                        </select>
                                                    </div>
                                                    <!-- Video Source -->
                                                    <div class="form-group">
                                                        <label for="lesson_video_source">Video Source</label>
                                                        <select class="custom-select block" id="lesson_video_source" name="lesson_video_source">
                                                            <option selected disabled>Choose video source</option>
                                                            <option value="Youtube" @if(old('lesson_video_source', $lesson->lesson_video_source ?? '') == 'Youtube') selected @endif>Youtube</option>
                                                            <option value="Vimeo" @if(old('lesson_video_source', $lesson->lesson_video_source ?? '') == 'Vimeo') selected @endif>Vimeo</option>
                                                        </select>
                                                    </div>
                                                    <!-- Video Url -->
                                                    <div class="form-group">
                                                        <label for="lesson_video_url">Lesson Video URL</label>
                                                        <input type="url" class="form-control" id="lesson_video_url" name="lesson_video_url" value="{{ old('lesson_video_url', $lesson->lesson_video_url ?? '') }}">
                                                    </div>
                                                    <!-- Video playback time -->
                                                    <label for="">Video Playback Time</label>
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <input type="number" id="lesson_playback_hour" name="lesson_playback_hour" class="form-control" value="{{ old('lesson_playback_hour', '00') }}">
                                                            <p>Hour</p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="number" id="lesson_playback_min" name="lesson_playback_min" class="form-control" value="{{ old('lesson_playback_min', '00') }}">
                                                            <p>Minute</p>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <input type="number" id="lesson_playback_second" name="lesson_playback_second" class="form-control" value="{{ old('lesson_playback_second', '00') }}">
                                                            <p>Second</p>
                                                        </div>
                                                    </div>
                                                    <input type="hidden" id="lesson_duration" name="lesson_duration" value="{{ old('lesson_duration', $lesson->lesson_duration ?? '') }}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-actions center">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

<script>
    // Text editor
    var quill = new Quill('#editor', {
        theme: 'snow' // Specify the theme if needed
    });

    // Populate the Quill editor with existing description
    const existingDescription = "{!! addslashes(old('lesson_description', $lesson->lesson_description ?? '')) !!}";
    quill.root.innerHTML = existingDescription;

    // Update the hidden input with the Quill editor content on form submit
    document.getElementById('lesson-form').addEventListener('submit', function() {
        const lesson_description = quill.root.innerHTML;
        document.getElementById('lesson_description').value = lesson_description;
    });

    $('#lesson-form').on('submit', function(e) {
        const hour = $('#lesson_playback_hour').val() || '00';
        const minute = $('#lesson_playback_min').val() || '00';
        const second = $('#lesson_playback_second').val() || '00';
        const duration = `${String(hour).padStart(2, '0')}:${String(minute).padStart(2, '0')}:${String(second).padStart(2, '0')}`;
        $('#lesson_duration').val(duration);
    });
</script>
@endsection
