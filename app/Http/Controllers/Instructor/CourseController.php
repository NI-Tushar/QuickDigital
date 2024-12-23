<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseCategory;
use App\Models\CourseLesson;
use App\Models\CourseTopic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function Courses()
    {
        Session::put('page', 'course');

        // Retrieve the logged-in user's ID using the custom guard
        $user = Auth::guard('user')->user();

        if (!$user || $user->is_instructor != 1) {
            abort(403, 'Unauthorized action.');
        }

        // Fetch courses for the logged-in instructor
        $courses = Course::with('category')
            ->withCount('topics')
            ->withCount('lessons')
            ->where('instructor_id', $user->id) // Filter courses by user_id
            ->get()
            ->toArray();

        $categories = CourseCategory::all();

        return view('instructor.course.courses')->with(compact('courses', 'categories'));
    }



    public function add_edit_course(Request $request, $id = null)
    {
        

        Session::put('page', 'add-edit-course');

        if ($id == "") {
            $title = "Add Course";
            $course = new Course();
            $message = "Course added successfully";
        } else {
            $title = "Edit Course";
            $course = Course::findOrFail($id);
            $course->description = $course->description;
            $message = "Course edited successfully";
            // Check if the user is authenticated and is an instructor of that course   
        $user = Auth::guard('user')->user();
        if (!$user || $user->id !== $course->instructor_id) {
            return redirect('instructor/manage-courses')->with('error_message', 'Unauthorized action');
        }
        }
        

        if ($request->isMethod('post')) {
            $data = $request->all();

            // dd($data);

            $rules = [
                'title' => 'required',
                'description' => 'required',
                'language' => 'required',
                'category_id' => 'required|exists:course_categories,id',
                'difficulty_level' => 'required',
                'course_type' => 'required',
                'what_will_i_learn' => 'required|array',
                'tageted_audience' => 'required|array',
                'materials_included' => 'required|array',
                'requirements' => 'required|array',
                'provider' => 'required',
                'course_intro_url' => 'required',
                'duration' => 'required',
                'course_thumbnail' => 'nullable|image|max:5000'
            ];

            $customMessages = [
                'title.required' => 'The course title is required.',
                'description.required' => 'The course description is required.',
                'language.required' => 'The course language is required.',
                'category_id.required' => 'A course category is required.',
                'category_id.exists' => 'The selected course category does not exist.',
                'difficulty_level.required' => 'The difficulty level is required.',
                'course_type.required' => 'The course type is required.',
                'what_will_i_learn.required' => 'The "What will I learn" section is required.',
                'what_will_i_learn.array' => 'The "What will I learn" section must be an array.',
                'tageted_audience.required' => 'The targeted audience section is required.',
                'tageted_audience.array' => 'The targeted audience section must be an array.',
                'materials_included.required' => 'The materials included section is required.',
                'materials_included.array' => 'The materials included section must be an array.',
                'requirements.required' => 'The requirements section is required.',
                'requirements.array' => 'The requirements section must be an array.',
                'provider.required' => 'The course provider is required.',
                'course_intro_url.required' => 'The course introduction URL is required.',
                'duration.required' => 'The course duration is required.',
            ];

            $fileFields = ['course_thumbnail'];

            foreach ($fileFields as $field) {
                if ($id === null || $request->hasFile($field)) {
                    $rules[$field] = 'required|image|max:4096';
                    $customMessages[$field . '.required'] = 'An image file is required.';
                    $customMessages[$field . '.image'] = 'The file must be an image.';
                    $customMessages[$field . '.max'] = 'The image size must not exceed 4MB.';
                }
            }

            $validator = Validator::make($data, $rules, $customMessages);

            // Check if validation fails
            if ($validator->fails()) {
                // If validation fails, set error message and redirect back
                return redirect()->back()->with('error_message', $validator->errors()->first());
            }

            $data['status'] = $data['status'] ?? 0;

            $course->title = $data['title'];
            $course->description = $data['description'];
            $course->instructor_id = $user->id; // Automatically set to the logged-in user's ID
            $course->language = $data['language'];
            $course->category_id = $data['category_id'];
            $course->difficulty_level = $data['difficulty_level'];
            $course->course_type = $data['course_type'];
            $course->price = $data['price'];
            $course->discount_price = $data['discount_price'];
            $course->what_will_i_learn = json_encode($data['what_will_i_learn'], JSON_UNESCAPED_UNICODE);
            $course->tageted_audience = json_encode($data['tageted_audience'], JSON_UNESCAPED_UNICODE);
            $course->materials_included = json_encode($data['materials_included'], JSON_UNESCAPED_UNICODE);
            $course->requirements = json_encode($data['requirements'], JSON_UNESCAPED_UNICODE);
            $course->provider = $data['provider'];
            $course->course_intro_url = $data['course_intro_url'];
            $course->duration = $data['duration'];
            $course->status = $data['status'];

            // Handle file uploads
            foreach ($fileFields as $field) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    if ($file->isValid()) {
                        $fileName = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
                        $filePath = 'front/assets/course_images/' . $fileName;
                        $file->move(public_path('front/assets/course_images'), $fileName);
                        $course->{$field} = $filePath;
                    }
                }
            }

            $course->save();
            return redirect('instructor/manage-courses')->with('success_message', $message);
        }

        $categories = CourseCategory::pluck('title', 'id');
        $course->what_will_i_learn = json_decode($course->what_will_i_learn, true);
        $course->tageted_audience = json_decode($course->tageted_audience, true);
        $course->materials_included = json_decode($course->materials_included, true);
        $course->requirements = json_decode($course->requirements, true);


        return view('instructor.course.add_course')->with(compact('title', 'course', 'categories'));
    }

    public function filterByCategory(Request $request)
    {
        $category = $request->input('category', null);

        $courses = Course::query();
        if ($category !== null) {
            $courses->where('category_id', $category);
        }

        $courses = $courses->get();
        return response()->json($courses);
    }

    // Filter courses by status
    public function filterByStatus(Request $request)
    {
        $status = $request->input('status', null);

        $courses = Course::query();
        if ($status !== null) {
            $courses->where('status', $status);
        }

        $courses = $courses->get();
        return response()->json($courses);
    }

    // Filter courses by price
    public function filterByPrice(Request $request)
    {
        $price = $request->input('price', null);

        $courses = Course::query();
        if ($price !== null) {
            $courses->where('course_type', $price);
        }

        $courses = $courses->get();
        return response()->json($courses);
    }

    // public function add_topic_to_course()
    // {
    //     Session::put('page', 'add_topic_to_course');
    //     return view('instructor.course.topics.add_course_topics');
    // }

    public function add_edit_course_topic(Request $request, $course_id, $id = null)
    {
        Session::put('page', 'add-edit-course-topic');

        if ($id == "") {
            $title = "Add Course Topic";
            $topic = new CourseTopic();
            $message = "Course Topic added successfully";
        } else {
            $title = "Edit Course Topic";
            $topic = CourseTopic::findOrFail($id);
            $message = "Course Topic edited successfully";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            // dd($data);

            $rules = [
                'title' => 'required',
                'summary' => 'required',
                'course_id' => 'required|exists:courses,id',
            ];

            $customMessages = [
                'title.required' => 'The course topic title is required.',
                'summary.required' => 'The topic summary is required.',
                'course_id.required' => 'A course is required.',
                'course.exists' => 'The selected course does not exist.',
            ];

            $validator = Validator::make($data, $rules, $customMessages);

            // Check if validation fails
            if ($validator->fails()) {
                // If validation fails, set error message and redirect back
                return redirect()->back()->with('error_message', $validator->errors()->first());
            }

            $data['summary'] = $data['summary'] ?? 0;

            $topic->title = $data['title'];
            $topic->summary = $data['summary'];
            $topic->course_id = $data['course_id'];

            $topic->save();
            return redirect('instructor/manage-courses')->with('success_message', $message);
        }


        return view('instructor.course.topics.add_course_topics')->with(compact('title', 'course_id', 'topic'));
    }

    public function add_lesson_to_topic()
    {
        Session::put('page', 'add_topic_to_course');
        return view('instructor.course.lesson.add_course_lesson');
    }

    public function add_edit_course_lesson(Request $request, $course_id, $id = null)
    {
        Session::put('page', 'add-edit-course-lesson');

        // Fetch topics related to the course
        $topics = CourseTopic::where('course_id', $course_id)->pluck('title', 'id');

        if ($id == null) {
            $title = "Add Course Lesson";
            $lesson = new CourseLesson();
            $message = "Course lesson added successfully";
        } else {
            $title = "Edit Course Lesson";
            $lesson = CourseLesson::findOrFail($id);
            $message = "Course lesson edited successfully";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            // Validation rules
            $rules = [
                'lesson_title' => 'required',
                'lesson_description' => 'required',
                'topic_id' => 'required|exists:course_topics,id',
                'lesson_video_source' => 'required',
                'lesson_video_url' => 'required|url',
                'lesson_playback_hour' => 'nullable|integer|min:0',
                'lesson_playback_min' => 'nullable|integer|min:0|max:59',
                'lesson_playback_second' => 'nullable|integer|min:0|max:59',
            ];

            // Custom validation messages
            $customMessages = [
                'lesson_title.required' => 'The lesson title is required.',
                'lesson_description.required' => 'The lesson description is required.',
                'topic_id.required' => 'Please select a topic.',
                'topic_id.exists' => 'The selected topic does not exist.',
                'lesson_video_source.required' => 'The video source is required.',
                'lesson_video_url.required' => 'The video URL is required.',
                'lesson_video_url.url' => 'The video URL must be a valid URL.',
            ];

            $validator = Validator::make($data, $rules, $customMessages);

            // Check if validation fails
            if ($validator->fails()) {
                return redirect()->back()->withInput()->withErrors($validator);
            }

            // Assign data to lesson model
            $lesson->lesson_title = $data['lesson_title'];
            $lesson->lesson_description = $data['lesson_description'];
            $lesson->topic_id = $data['topic_id'];
            $lesson->lesson_video_source = $data['lesson_video_source'];
            $lesson->lesson_video_url = $data['lesson_video_url'];

            // Calculate and assign lesson duration
            $hour = $data['lesson_playback_hour'] ?? 0;
            $minute = $data['lesson_playback_min'] ?? 0;
            $second = $data['lesson_playback_second'] ?? 0;
            $lesson->lesson_duration = sprintf('%02d:%02d:%02d', $hour, $minute, $second);

            $lesson->save();

            return redirect('instructor/manage-courses')->with('success_message', $message);
        }

        return view('instructor.course.lesson.add_course_lesson')->with(compact('title', 'course_id', 'lesson', 'topics'));
    }

    public function CourseCategory()
    {
        Session::put('page', 'course_category');

        $categories = CourseCategory::all();

        return view('instructor.course_category.course_category')->with(compact('categories'));
    }

    public function addEditCategory(Request $request, $id = null)
    {
        if ($id == '') {
            $title = "Add Category";
            $category = new CourseCategory;
            $message = "Category added successfully";
        } else {
            $title = "Edit Category";
            $category = CourseCategory::findOrFail($id);
            $message = "Category updated successfully";
        }

        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'title' => 'required|string|max:255',
            ];

            $customMessages = [
                'title.required' => 'শিরোনাম প্রদান করা আবশ্যক।',
                'title.string' => 'শিরোনাম অবশ্যই একটি লেখা হতে হবে।',
                'title.max' => 'শিরোনাম সর্বাধিক ২৫৫ অক্ষরের মধ্যে থাকতে হবে।',

            ];

            $validator = Validator::make($data, $rules, $customMessages);


            if ($validator->fails()) {
                return redirect()->back()->with('error_message', $validator->errors()->first());
            }



            $category->title = $data['title'];


            $category->save();

            return redirect('instructor/course-category')->with('success_message', $message);
        }
        return view('instructor.course_category.add_edit_course_category')->with(compact('title', 'category'));
    }

    public function destroyCategory(string $id)
    {
        $category = CourseCategory::find($id);

        if (!$category) {
            return redirect()->back()->with('error_message', 'Category not found');
        }

        $category->delete();
        return redirect()->back()->with('success_message', 'Category deleted successfully');
    }

    public function topics_with_lessons($id)
    {
        $course = Course::with(['topics.lessons'])->find($id);
    
        if (!$course) {
            return redirect('instructor/manage-courses')->with('error_message', 'Course not found');
        }
    
        $user = Auth::guard('user')->user();
        if (!$user || $user->id !== $course->instructor_id) {
            return redirect('instructor/manage-courses')->with('error_message', 'Unauthorized action');
        }
    
        return view('instructor.course.topics_with_lessons', compact('course'));
    }
    
}
