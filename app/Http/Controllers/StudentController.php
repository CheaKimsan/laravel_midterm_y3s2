<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    function viewStudent()
    {
        $students = Student::all(); // <-- MUST exist
        return view('student.index', compact('students'));
    }
}
