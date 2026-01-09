<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    //
    function viewStudent()
    {
        return view('student.index');
    }
}
