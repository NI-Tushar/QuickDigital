@extends('instructor.layout.layout')
@section('content')
    <!-- Include stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
    <style>
        /*-------------------------------------*/

        .accordion__item {
            margin: 5px auto;
        }

        .accordion__item .accordion__title {
            position: relative;
            display: block;
            padding: 13px 60px 15px 13px;
            margin-bottom: 2px;
            color: #202020;
            font-size: 28px;
            text-decoration: none;
            background-color: #eaeaea;
            border-radius: 3px;
            -webkit-transition: background-color 0.2s;
            transition: background-color 0.2s;
            cursor: pointer;
        }

        .accordion__item .accordion__title:hover {
            background-color: #e5e4e4;
            transition: all 0.5s ease-out;
        }

        .accordion__item .accordion-active {
            background-color: #e5e4e4;
        }

        .accordion__item .accordion__title .accordion__arrow {
            position: absolute;
            top: 13px;
            right: 10px;
            display: inline-block;
            vertical-align: middle;
            width: 30px;
            height: 30px;
            text-align: center;
            color: #fff;
            line-height: 30px;
            font-size: 20px;
            font-weight: 700;
            margin-right: 5px;
            background-color: #c9c9c9;
            border-radius: 50%;
            -webkit-transition: all 0.2s ease-out;
            transition: all 0.2s ease-out;
        }

        .accordion__item .accordion__rotate {
            transform: rotate(225deg);
        }

        .accordion__item .accordion__content {
            padding: 30px;
            margin-bottom: 2px;
            font-size: 14px;
            display: none;
            background-color: #f3f3f3;
        }

        .accordion__item .accordion__arrow-item {
            font-weight: 700;
        }

        /*-------------------------------------*/
    </style>

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title" id="from-actions-multiple">Edit Topics & Lessons</h4>
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
                        <div class="card-content collpase show">
                            <div class="card-body">

                                <div class="row justify-content-md-center">
                                    <div class="col-md-6">
                                        <div class="form-body">
                                        @foreach ($course->topics as $topic)
                                        <div class="accordion">
                                                    <div class="accordion__item">
                                                        <div class="accordion__title">
                                                            <div class="accordion__arrow"><span
                                                                    class="accordion__arrow-item ">+</span></div>
                                                            <span class="accordion__title-text">
                                                                {{ $topic->title }}
                                                                <button type="button" class="btn btn-primary btn-sm"
                                                                    data-toggle="modal"
                                                                    data-target="#editTopicModal{{ $topic->id }}">
                                                                    Edit
                                                                </button>
                                                                <a class="btn btn-danger btn-sm" href="#">Delete</a>
                                                            </span>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="editTopicModal{{ $topic->id }}"
                                                                tabindex="-1" role="dialog"
                                                                aria-labelledby="editTopicModalLabel{{ $topic->id }}"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered"
                                                                    role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="editTopicModalLabel{{ $topic->id }}">
                                                                                Edit Topic: {{ $topic->title }}</h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <input hidden type="text" id="course_id"
                                                                                class="form-control" name="course_id"
                                                                                value="{{ $topic->course_id }}">
                                                                            <div class="form-group">
                                                                                <label for="title">Topic
                                                                                    Title</label>
                                                                                <input type="text" id="title"
                                                                                    class="form-control"
                                                                                    placeholder="Enter topic title"
                                                                                    name="title"
                                                                                    value="{{ old('title', $topic->title) }}">
                                                                            </div>

                                                                            <div class="form-group">
                                                                                <label for="summary">Topic
                                                                                    Summary</label>
                                                                                <textarea id="summary" class="form-control" placeholder="Enter topic summary" name="summary">{{ old('summary', $topic->summary) }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-dismiss="modal">Close</button>
                                                                            <button type="button"
                                                                                class="btn btn-primary">Save
                                                                                changes</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            {{-- Modal end --}}
                                                        </div>
                                                        <div class="accordion__content">
                                                        @foreach ($topic->lessons as $lesson)
                                                                    <div class="rounded bg-white p-1 mb-2">
                                                                        <div class="d-flex justify-content-between">
                                                                            <h5>{{ $lesson->lesson_title }}</h5>
                                                                            <div>
                                                                                <!-- Button trigger modal -->
                                                                                <button type="button"
                                                                                    class="btn btn-info btn-sm"
                                                                                    onclick="initQuill({{ $lesson->id }})"
                                                                                    data-toggle="modal"
                                                                                    data-target="#editModal{{ $lesson->id }}">
                                                                                    Edit
                                                                                </button>
                                                                                <a href="#"
                                                                                    class="btn btn-danger btn-sm">Delete</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Modal -->
                                                                    <div class="modal fade text-left"
                                                                        id="editModal{{ $lesson->id }}" tabindex="-1"
                                                                        role="dialog"
                                                                        aria-labelledby="editModalLabel{{ $lesson->id }}"
                                                                        aria-hidden="true">
                                                                        <div class="modal-dialog modal-lg modal-dialog-scrollable"
                                                                            role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h4 class="modal-title"
                                                                                        id="editModalLabel{{ $lesson->id }}">
                                                                                        Edit Lesson</h4>
                                                                                    <button type="button" class="close"
                                                                                        data-dismiss="modal"
                                                                                        aria-label="Close">
                                                                                        <span
                                                                                            aria-hidden="true">&times;</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <!-- Lesson title -->
                                                                                    <div class="form-group">
                                                                                        <label for="lesson_title">Lesson
                                                                                            Title</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="lesson_title"
                                                                                            name="lesson_title"
                                                                                            value="{{ $lesson->lesson_title }}">
                                                                                    </div>
                                                                                    <!-- Lesson description -->
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="lesson_description">Description</label>
                                                                                        <div
                                                                                            id="{{ 'editor' . $lesson->id }}">
                                                                                            {{ $lesson->lesson_description }}
                                                                                        </div>
                                                                                        <input type="hidden"
                                                                                            name="lesson_description"
                                                                                            id="lesson_description"
                                                                                            value="{{ $lesson->lesson_description }}">
                                                                                    </div>
                                                                                    <!-- Topic this course belongs to -->
                                                                                    <div class="form-group">
                                                                                        <input type="number" hidden
                                                                                            value="{{ $topic->id }}">
                                                                                    </div>
                                                                                    <!-- Video Source -->
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="lesson_video_source">Video
                                                                                            Source</label>
                                                                                        <select class="custom-select block"
                                                                                            id="lesson_video_source"
                                                                                            name="lesson_video_source">
                                                                                            <option selected disabled>
                                                                                                Choose video source
                                                                                            </option>
                                                                                            <option value="Youtube"
                                                                                                @if ($lesson->lesson_video_source == 'Youtube') selected @endif>
                                                                                                Youtube</option>
                                                                                            <option value="Vimeo"
                                                                                                @if ($lesson->lesson_video_source == 'Vimeo') selected @endif>
                                                                                                Vimeo</option>
                                                                                        </select>
                                                                                    </div>
                                                                                    <!-- Video Url -->
                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="lesson_video_url">Lesson
                                                                                            Video URL</label>
                                                                                        <input type="url"
                                                                                            class="form-control"
                                                                                            id="lesson_video_url"
                                                                                            name="lesson_video_url"
                                                                                            value="{{ $lesson->lesson_video_url }}">
                                                                                    </div>
                                                                                    @php
                                                                                        $timeString =
                                                                                            $lesson->lesson_duration;
                                                                                        $timeParts = explode(
                                                                                            ':',
                                                                                            $timeString,
                                                                                        );

                                                                                        $hours = (int) $timeParts[0];
                                                                                        $minutes = (int) $timeParts[1];
                                                                                        $seconds = (int) $timeParts[2];
                                                                                    @endphp
                                                                                    <!-- Video playback time -->
                                                                                    <label for="">Video
                                                                                        Playback Time</label>
                                                                                    <div class="row">
                                                                                        <div class="col-md-4">
                                                                                            <input type="number"
                                                                                                id="lesson_playback_hour"
                                                                                                name="lesson_playback_hour"
                                                                                                class="form-control"
                                                                                                value="{{ $hours }}">
                                                                                            <p>Hour</p>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <input type="number"
                                                                                                id="lesson_playback_min"
                                                                                                name="lesson_playback_min"
                                                                                                class="form-control"
                                                                                                value="{{ $minutes }}">
                                                                                            <p>Minute</p>
                                                                                        </div>
                                                                                        <div class="col-md-4">
                                                                                            <input type="number"
                                                                                                id="lesson_playback_second"
                                                                                                name="lesson_playback_second"
                                                                                                class="form-control"
                                                                                                value="{{ $seconds }}">
                                                                                            <p>Second</p>
                                                                                        </div>
                                                                                    </div>
                                                                                    <input type="hidden"
                                                                                        id="lesson_duration"
                                                                                        name="lesson_duration"
                                                                                        value="{{ old('lesson_duration', $lesson->lesson_duration ?? '') }}">
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <button type="button"
                                                                                        class="btn btn-secondary"
                                                                                        data-dismiss="modal">Close</button>
                                                                                    <button type="button"
                                                                                        class="btn btn-primary">Save
                                                                                        changes</button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Include the Quill library -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script>
        $(function() {

            //BEGIN
            $(".accordion__title").on("click", function(e) {

                e.preventDefault();
                var $this = $(this);

                if (!$this.hasClass("accordion-active")) {
                    // $(".accordion__content").slideUp(400);
                    $(".accordion__title").removeClass("accordion-active");
                    $('.accordion__arrow').removeClass('accordion__rotate');
                }

                $this.toggleClass("accordion-active");
                $this.next().slideToggle();
                $('.accordion__arrow', this).toggleClass('accordion__rotate');
            });
            //END

        });
    </script>
    <script>
        function initQuill(peram) {
            const phrase = "#editor";
            let quillId = phrase + peram;
            console.log(quillId);
            const quill = new Quill(quillId, {
                theme: 'snow'
            });
        }
    </script>
@endsection
