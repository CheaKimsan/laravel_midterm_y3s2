<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    function viewCourse()
    {
        $courses = Course::all(); // <-- MUST exist
        return view('course.index', compact('courses'));
    }
}
