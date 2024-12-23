<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InstructorRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class InstructorRequestController extends Controller
{
    public function requestInstructor(Request $request)
    {
        $user = Auth::guard('user')->user();
        // Check if the user has already applied
        $existingRequest = InstructorRequest::where('user_id', $user->id)->first();

        if ($existingRequest) {
            // User has already applied, return an error message
            return redirect()->back()->with('error_message', 'You have already applied to become an instructor.');
        }

        // Create a new instructor request
        InstructorRequest::create([
            'user_id' => $user->id,
            'is_approved' => 0, // Default value
            'is_new' => true, // Mark as new request
        ]);

        // Return a success message
        return redirect()->back()->with('success_message', 'Your request to become an instructor has been submitted.');
    }

    // Approve instructor request
public function approveInstructor($id)
{
    $request = InstructorRequest::findOrFail($id);
    $request->update(['is_approved' => 1]);
    $request->user->update(['is_instructor' => 1]);

    return redirect()->back()->with('message', 'Instructor request approved.');
}

// Reject instructor request
public function rejectInstructor($id)
{
    $request = InstructorRequest::findOrFail($id);
    $request->update(['is_approved' => 2]);

    return redirect()->back()->with('message', 'Instructor request rejected.');
}

// List instructor requests
public function instructorRequests()
{
    Session::put('page', 'instructor_requests');
    $requests = InstructorRequest::with('user')->get();

     // Reset the is_new flag
     InstructorRequest::where('is_new', true)->update(['is_new' => false]);

    return view('admin.instructor.instructor_requests')->with(compact('requests'));
}

public static function newRequestCount()
    {
        return InstructorRequest::where('is_new', true)->count();
    }

}
