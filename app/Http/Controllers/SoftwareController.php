<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SoftwareController extends Controller
{
    public function index()
    {
        return view('quick_digital.software.software_view');
    }

    public function add_software()
    {
        dd('add software');
        return view('quick_digital.software.software_view');
    }
    public function manage_software()
    {
        dd('manage software');
        return view('quick_digital.software.software_view');
    }

}
