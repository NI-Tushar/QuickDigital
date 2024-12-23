<?php

namespace App\Http\Controllers\Instructor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class InstructorController extends Controller
{
    public function dashboard()
    {
        Session::put('page', 'dashboard');
        $users = User::all();
        $userCount = User::count();

        return view('instructor.dashboard', compact('users', 'userCount'));
    }
}
