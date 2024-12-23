@extends('instructor.layout.layout')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
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
        <div class="content-body">
            <section id="floating-point">
                <div class="row">
                    <div class="col-6 mb-2">
                        <h4 class="text-uppercase">COURSES</h4>
                    </div>
                    <!-- <div class="text-right col-6 mb-2">
                    <a href="{{ url('instructor/add-course') }}">
                        <button type="button" class="btn btn-secondary btn-min-width mr-1 mb-1">
                            <i class="feather icon-edit"></i> Add New Course
                        </button>
                    </a> -->
                </div>
        </div>
        <!-- Icon section with gradient bg color section start -->
        <div id="icon-section-bg-gradient">
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-primary bg-darken-2">
                                    <i class="icon-star font-large-2 white"></i>
                                </div>
                                <div class="p-2 bg-gradient-x-primary white media-body">
                                    <h5>Active Course</h5>
                                    <h5 class="text-bold-400 mb-0">28</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-danger bg-darken-2">
                                    <i class="icon-hourglass font-large-2 white"></i>
                                </div>
                                <div class="p-2 bg-gradient-x-danger white media-body">
                                    <h5>Pending Course</h5>
                                    <h5 class="text-bold-400 mb-0">1,22,356</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-success bg-darken-2">
                                    <i class="icon-badge font-large-2 white"></i>
                                </div>
                                <div class="p-2 bg-gradient-x-success white media-body">
                                    <h5>Total Course</h5>
                                    <h5 class="text-bold-400 mb-0">4,65,879</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="media align-items-stretch">
                                <div class="p-2 text-center bg-warning bg-darken-2">
                                    <i class="icon-graduation font-large-2 white"></i>
                                </div>
                                <div class="p-2 bg-gradient-x-warning white media-body">
                                    <h5>Total Students</h5>
                                    <h5 class="text-bold-400 mb-0">5.6 M</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- // Icon section with gradient bg color section end -->
        <div class="text-right">
            <a href="{{ url('instructor/add-edit-course') }}">
                <button type="button" class="btn btn-secondary btn-min-width mr-1 mb-1">
                    <i class="feather icon-edit"></i> Add New Course
                </button>
            </a>
        </div>

        <div class="content-body">
            <div id="column">
                <div class="row">
                    <div class="col-12">
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
                                <div class="card-body card-dashboard">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <!-- category -->
                                            <div class="form-group">
                                                <label for="category">Category:</label>
                                                <select class="form-control" id="category">
                                                    <option value="">All</option>
                                                    @foreach($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <!-- status -->
                                            <div class="form-group">
                                                <label for="status">Status:</label>
                                                <select class="form-control" id="status">
                                                    <option value="">All</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">Pending</option>
                                                    <option value="2">Draft</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <!-- price -->
                                            <div class="form-group">
                                                <label for="status">Price:</label>
                                                <select class="form-control" id="price">
                                                    <option value="">All</option>
                                                    <option value="paid">Paid</option>
                                                    <option value="free">Free</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="overflow-x: auto;">
                                        <table id="orders" class="table table-striped table-bordered custom-toolbar-elements">
                                            <!-- Table Header -->
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>TITLE</th>
                                                    <th>CATEGORY</th>
                                                    <th>LESSON AND SECTION</th>
                                                    <th>PRICE</th>
                                                    <th>ENROLLED STUDENT</th>
                                                    <th>STATUS</th>
                                                    <!-- <th>CREATED AT</th> -->
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <!-- Table Body  -->
                                            <tbody>
                                                @foreach($courses as $course)
                                                <tr>
                                                    <td>{{ $course['id'] }}</td>
                                                    <td>{{ $course['title'] }}</td>
                                                    <td>{{ $course['category']['title'] }}</td>
                                                    <td>
                                                        <ul>
                                                            <li>Total Topic: {{ $course['topics_count'] }}</li>
                                                            <li>Total Lesson: {{ $course['lessons_count'] }}</li>
                                                        </ul>
                                                    </td>
                                                    <td>
                                                        @if($course['course_type'] == 'free')
                                                        Free
                                                        @else
                                                        Price: {{ $course['price'] }} <br>
                                                        @if(!empty($course['discount_price']))
                                                        Discounted Price: {{ $course['discount_price'] }}
                                                        @endif
                                                        @endif
                                                    </td>
                                                    <td>166</td>
                                                    <td>
                                                        @if($course['status'] == 0)
                                                        <span class="badge badge-warning">Pending</span>
                                                        @elseif($course['status'] == 1)
                                                        <span class="badge badge-success">Active</span>
                                                        @elseif($course['status'] == 2)
                                                        <span class="badge badge-danger">Draft</span>
                                                        @else
                                                        <span class="badge badge-secondary">Unknown</span>
                                                        @endif
                                                    </td>


                                                    <!-- <td>{{ \Carbon\Carbon::parse($course['created_at'])->format('F d, Y, h:i A') }}</td> -->
                                                    <td class="text-center">
                                                        <div class="btn-group mr-1 mb-1">
                                                            <button type="button" class="btn btn-light btn-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i></button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item" href="{{ url('instructor/add-edit-course/'.$course['id']) }}">Edit Course Details</a>
                                                                <a class="dropdown-item" href="{{ url('instructor/add-edit-course-topic/'.$course['id']) }}">Add Course Topic</a>
                                                                <a class="dropdown-item" href="{{ url('instructor/add-edit-course-lesson/'.$course['id']) }}">Add Course Lesson</a>
                                                                <a class="dropdown-item" href="{{ url('instructor/topic-with-lesson/'.$course['id']) }}">Edit Topics & Lessons</a>
                                                                <a class="dropdown-item" href="#">Something else here</a>
                                                                <div class="dropdown-divider"></div>
                                                                <a class="dropdown-item" href="#">Separated link</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <!-- Table Footer -->
                                            <tfoot>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>TITLE</th>
                                                    <th>CATEGORY</th>
                                                    <th>LESSON AND SECTION</th>
                                                    <th>PRICE</th>
                                                    <th>ENROLLED STUDENT</th>
                                                    <th>STATUS</th>
                                                    <!-- <th>CREATED AT</th> -->
                                                    <th>ACTION</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        function filterByCategory() {
            var category = $('#category').val();

            $.ajax({
                url: "{{ route('instructor.courses.filter.category') }}",
                type: 'GET',
                data: {
                    category: category
                },
                success: function(response) {
                    updateCourseTable(response);
                    $('#category').val("")
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        function filterByStatus() {
            var status = $('#status').val();

            $.ajax({
                url: "{{ route('instructor.courses.filter.status') }}",
                type: 'GET',
                data: {
                    status: status
                },
                success: function(response) {
                    updateCourseTable(response);
                    $('#status').val("")
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        function filterByPrice() {
            var price = $('#price').val();

            $.ajax({
                url: "{{ route('instructor.courses.filter.price') }}",
                type: 'GET',
                data: {
                    price: price
                },
                success: function(response) {
                    updateCourseTable(response);
                    $('#price').val("")
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }

        function updateCourseTable(courses) {
            var tableBody = $('#orders tbody');
            tableBody.empty();

            $.each(courses, function(index, course) {
                var row = `<tr>
                    <td>${course.id}</td>
                    <td>${course.title}</td>
                    <td>${course.category ? course.category.title : ''}</td>
                    <td>
                        <ul>
                            <li>Total Topic: ${course.topics_count}</li>
                            <li>Total Lesson: ${course.lessons_count}</li>
                        </ul>
                    </td>
                    <td>${course.course_type === 'free' ? 'Free' : 'Price: ' + course.price + (course.discount_price ? '<br>Discounted Price: ' + course.discount_price : '')}</td>
                    <td>166</td>
                    <td>${course.status === 0 ? '<span class="badge badge-warning">Pending</span>' : course.status === 1 ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Draft</span>'}</td>
                    <td class="text-center">
                        <div class="btn-group mr-1 mb-1">
                            <button type="button" class="btn btn-light btn-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-cog"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="{{ url('instructor/add-edit-course') }}/${course.id}">Edit Course Details</a>
                                <a class="dropdown-item" href="{{ url('instructor/add-edit-course-topic') }}/${course.id}">Add Course Topic</a>
                                <a class="dropdown-item" href="{{ url('instructor/add-edit-course-lesson') }}/${course.id}">Add Course Lesson</a>
                            </div>
                        </div>
                    </td>
                </tr>`;
                tableBody.append(row);
            });
        }

        $('#category').on('change', function() {
            filterByCategory();
        });

        $('#status').on('change', function() {
            filterByStatus();
        });

        $('#price').on('change', function() {
            filterByPrice();
        });
    });
</script>
@endsection