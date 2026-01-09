<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    function viewCourse()
    {
        return view('course.index');
    }
}
