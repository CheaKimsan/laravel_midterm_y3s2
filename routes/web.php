<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnrollmentController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::get('/dashboard', [DashboardController::class, 'viewDashboard'])->name('dashboard');

Route::get('/student', [StudentController::class, 'viewStudent'])->name('student');

Route::get('/course', [CourseController::class, 'viewCourse'])->name('course');

Route::get('/enrollment', [EnrollmentController::class, 'viewEnrollment'])->name('enrollment');

Route::get('/testing', function () {
    return view('welcome');
})->name('testing');