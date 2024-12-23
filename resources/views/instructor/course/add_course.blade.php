@extends('instructor.layout.layout')
@section('content')

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
        font-size: 16px;
        display: none;
        background-color: #f3f3f3;
    }

    .accordion__item .accordion__arrow-item {
        font-weight: 700;
    }

    /*-------------------------------------*/
</style>

@if (Session::has('error_message'))
<div class="alert bg-danger alert-icon-left alert-dismissible mb-2" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    {{ Session::get('error_message') }}
</div>
@endif
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

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
                                <form id="course-form" method="POST" enctype="multipart/form-data" @if(empty($course['id'])) action="{{ url('instructor/add-edit-course') }}" @else action="{{ url('instructor/add-edit-course/'.$course['id']) }}" @endif> @csrf
                                    <div class="row justify-content-md-center">
                                        <div class="col-md-6">
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label for="title">Title</label>
                                                    <input type="text" id="title" class="form-control" placeholder="Course Title" name="title" @if(!empty($course->title)) value="{{ $course->title }}" @endif>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <!-- Display the editor content with HTML formatting -->
                                                    <div id="editor">{!! html_entity_decode($course->description) !!}</div> <!-- Hidden input to store the editor content -->
                                                    <input type="hidden" name="description" id="description">
                                                </div>



                                                <!-- <div class="form-group">
                                                        <label for="author">Author</label>
                                                        <select class="custom-select block" name="author" id="author">
                                                            <option selected disabled aria-readonly="true">Select Course Author</option>
                                                            <option value="1">One</option>
                                                            <option value="2">Two</option>
                                                            <option value="3">Three</option>
                                                        </select>
                                                    </div> -->

                                                <!-- <div class="form-group">
                                                    <label for="language">Language</label>
                                                    <input type="text" class="form-control" name="language" id="language" placeholder="Course Language">
                                                </div> -->
                                                <div class="form-group">
                                                    <label for="language">Language</label>
                                                    <select class="custom-select block" id="language" name="language">
                                                        <option selected disabled>Select Course Language</option>
                                                        <option value="1" @if(!empty($course->language) && $course->language == 1) selected @endif>English</option>
                                                        <option value="2" @if(!empty($course->language) && $course->language == 2) selected @endif>Bangla</option>
                                                        <!-- Add more options for other languages as needed -->
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="category">Category</label>
                                                    <select class="custom-select block" name="category_id" id="category">
                                                        <option selected disabled aria-readonly="true">Select Course Category</option>
                                                        @foreach($categories as $categoryId => $categoryName)
                                                        <option value="{{ $categoryId }}" @if(old('category_id', $course['category_id'] ?? '' )==$categoryId) selected @endif>{{ $categoryName }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                <div class="form-group">
                                                    <label for="difficulty_level">Difficulty Level</label>
                                                    <select class="custom-select block" id="difficulty_level" name="difficulty_level">
                                                        <option selected disabled>Select Course Difficulty Level</option>
                                                        <option value="1" @if(!empty($course->difficulty_level) && $course->difficulty_level == 1) selected @endif>Beginner</option>
                                                        <option value="2" @if(!empty($course->difficulty_level) && $course->difficulty_level == 2) selected @endif>Intermediate</option>
                                                        <option value="3" @if(!empty($course->difficulty_level) && $course->difficulty_level == 3) selected @endif>Professional</option>
                                                        <!-- Add more options for other difficulty levels as needed -->
                                                    </select>
                                                </div>


                                                <div class="form-group">
                                                    <label>Course Type</label>
                                                    <div class="input-group">
                                                        <div class="d-inline-block custom-control custom-radio mr-1">
                                                            <input type="radio" name="course_type" class="custom-control-input" id="free" value="free" onclick="togglePaymentFields()" @if(!empty($course->course_type) && $course->course_type == 'free') checked @endif>
                                                            <label class="custom-control-label" for="free">Free</label>
                                                        </div>
                                                        <div class="d-inline-block custom-control custom-radio">
                                                            <input type="radio" name="course_type" class="custom-control-input" id="paid" value="paid" onclick="togglePaymentFields()" @if(!empty($course->course_type) && $course->course_type == 'paid') checked @endif>
                                                            <label class="custom-control-label" for="paid">Paid</label>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div id="paymentFields" @if(!empty($course->course_type) && $course->course_type == 'paid') style="display:block;" @else style="display:none;" @endif>
                                                    <div class="form-group">
                                                        <label for="price">Price</label>
                                                        <input type="number" id="price" class="form-control" name="price" placeholder="Actual Price" value="{{ $course->price ?? '' }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="discount_price">Discount Price</label>
                                                        <input type="number" id="discount_price" class="form-control" name="discount_price" placeholder="Discounted Price" value="{{ $course->discount_price ?? '' }}">
                                                    </div>
                                                </div>



                                                <div class="form-group border border-secondary shadow-sm rounded-sm p-2">
                                                    <label for="what-will-i-learn">What Will I Learn</label>
                                                    <div id="what-will-i-learn-container">
                                                        @if (isset($course->what_will_i_learn) && is_array($course->what_will_i_learn))
                                                        @foreach ($course->what_will_i_learn as $index => $feature)
                                                        <div class="input-group mb-2">
                                                            <input type="text" name="what_will_i_learn[]" class="form-control" value="{{ old('what_will_i_learn.' . $index, $feature) }}">
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-danger remove-feature">X</button>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        @else
                                                        <div class="input-group mb-2">
                                                            <input type="text" name="what_will_i_learn[]" class="form-control">
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-danger remove-feature">X</button>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <button type="button" id="add-feature" class="btn btn-secondary">Add Another</button>
                                                </div>


                                                <div class="form-group border border-secondary shadow-sm rounded-sm p-2">
                                                    <label for="tergated-audience">Targeted Audience</label>
                                                    <div id="targeted-audience-container">
                                                        @if (isset($course->tageted_audience) && is_array($course->tageted_audience))
                                                        @foreach ($course->tageted_audience as $index => $audience)
                                                        <div class="input-group mb-2">
                                                            <input type="text" name="tageted_audience[]" class="form-control" value="{{ old('tageted_audience.' . $index, $audience) }}">
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-danger remove-targeted-audience">X</button>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        @else
                                                        <div class="input-group mb-2">
                                                            <input type="text" name="tageted_audience[]" class="form-control">
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-danger remove-targeted-audience">X</button>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <button type="button" id="add-targeted-audience" class="btn btn-secondary">Add Another</button>
                                                </div>


                                                <div class="form-group border border-secondary shadow-sm rounded-sm p-2">
                                                    <label for="materials-included">Materials Included</label>
                                                    <div id="materials-included-container">
                                                        @if (isset($course->materials_included) && is_array($course->materials_included))
                                                        @foreach ($course->materials_included as $index => $material)
                                                        <div class="input-group mb-2">
                                                            <input type="text" name="materials_included[]" class="form-control" value="{{ old('materials_included.' . $index, $material) }}">
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-danger remove-materials-included">X</button>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        @else
                                                        <div class="input-group mb-2">
                                                            <input type="text" name="materials_included[]" class="form-control">
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-danger remove-materials-included">X</button>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <button type="button" id="add-materials-included" class="btn btn-secondary">Add Another</button>
                                                </div>



                                                <div class="form-group border border-secondary shadow-sm rounded-sm p-2">
                                                    <label for="requirements">Requirements/Prerequisites</label>
                                                    <div id="requirements-container">
                                                        @if (isset($course->requirements) && is_array($course->requirements))
                                                        @foreach ($course->requirements as $index => $requirement)
                                                        <div class="input-group mb-2">
                                                            <input type="text" name="requirements[]" class="form-control" value="{{ old('requirements.' . $index, $requirement) }}">
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-danger remove-requirement">X</button>
                                                            </div>
                                                        </div>
                                                        @endforeach
                                                        @else
                                                        <div class="input-group mb-2">
                                                            <input type="text" name="requirements[]" class="form-control">
                                                            <div class="input-group-append">
                                                                <button type="button" class="btn btn-danger remove-requirement">X</button>
                                                            </div>
                                                        </div>
                                                        @endif
                                                    </div>
                                                    <button type="button" id="add-requirements" class="btn btn-secondary">Add Another</button>
                                                </div>


                                                <div class="form-group">
                                                    <label for="provider">Course Intro Provider</label>
                                                    <select class="custom-select block" name="provider" id="provider">
                                                        <option selected disabled>Select an option</option>
                                                        <optgroup label="Theropods">
                                                            <option value="youtube" @if(!empty($course->provider) && $course->provider == 'youtube') selected @endif>YouTube link</option>
                                                            <option value="vimeo" @if(!empty($course->provider) && $course->provider == 'vimeo') selected @endif>Vimeo link</option>
                                                        </optgroup>
                                                    </select>
                                                </div>


                                                <div class="form-group">
                                                    <label for="course_intro_url">Course Intro Url</label>
                                                    <input type="url" class="form-control" name="course_intro_url" id="course_intro_url" value="{{ old('course_intro_url', $course->course_intro_url) }}">
                                                </div>


                                                <div class="form-group">
                                                    <label for="duration">Course Duration</label>
                                                    <input type="text" class="form-control" name="duration" id="duration" value="{{ old('duration', $course->duration) }}">
                                                </div>


                                                <div class="form-group">
                                                    <label for="course_thumbnail">Course Thumbnail</label>
                                                    <input type="file" class="form-control" name="course_thumbnail" id="course_thumbnail">
                                                    @if (!empty($course->course_thumbnail))
                                                    <img src="{{ asset($course->course_thumbnail) }}" alt="Course Thumbnail" style="max-width: 200px; margin-top: 10px;">
                                                    @endif
                                                </div>

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
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>

<script>
    // Function to add dynamic input fields
    function addDynamicInput(containerId, inputName) {
        var container = document.getElementById(containerId);
        var inputGroup = document.createElement('div');
        inputGroup.classList.add('input-group', 'mb-2');

        var input = document.createElement('input');
        input.type = 'text';
        input.name = inputName;
        input.classList.add('form-control');

        var inputGroupAppend = document.createElement('div');
        inputGroupAppend.classList.add('input-group-append');

        var button = document.createElement('button');
        button.type = 'button';
        button.classList.add('btn', 'btn-danger', 'remove-feature');
        button.textContent = 'X';

        inputGroupAppend.appendChild(button);
        inputGroup.appendChild(input);
        inputGroup.appendChild(inputGroupAppend);
        container.appendChild(inputGroup);

        button.addEventListener('click', function() {
            container.removeChild(inputGroup);
        });
    }

    // Add event listeners for adding dynamic inputs
document.getElementById('add-feature').addEventListener('click', function() {
    addDynamicInput('what-will-i-learn-container', 'what_will_i_learn[]');
});

document.getElementById('add-targeted-audience').addEventListener('click', function() {
    addDynamicInput('targeted-audience-container', 'tageted_audience[]');
});

document.getElementById('add-materials-included').addEventListener('click', function() {
    addDynamicInput('materials-included-container', 'materials_included[]');
});

document.getElementById('add-requirements').addEventListener('click', function() {
    addDynamicInput('requirements-container', 'requirements[]');
});

    // Function to toggle payment fields visibility
    function togglePaymentFields() {
        const isPaid = document.getElementById('paid').checked;
        const paymentFields = document.getElementById('paymentFields');
        if (isPaid) {
            paymentFields.style.display = 'block';
        } else {
            paymentFields.style.display = 'none';
        }
    }

    // Initial call to set payment fields visibility based on checked radio button
    togglePaymentFields();

    //text editor
    var quill = new Quill('#editor', {
        theme: 'snow'  // Specify the theme if needed
    });

    // Populate the Quill editor with existing description
    const existingDescription = '{!! addslashes($course->description) !!}';
    quill.root.innerHTML = existingDescription;

    // Update the hidden input with the Quill editor content on form submit
    document.getElementById('course-form').addEventListener('submit', function() {
        const description = quill.root.innerHTML;
        document.getElementById('description').value = description;
    });
</script>
@endsection