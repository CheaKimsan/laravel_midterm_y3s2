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

Route::get('/students', [StudentController::class, 'viewStudent'])->name('students');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');



Route::get('/courses', [CourseController::class, 'viewCourse'])->name('courses');
Route::post('/courses', [CourseController::class, 'store'])->name('course.store');;
Route::put('/courses/{id}', [CourseController::class, 'update'])->name('course.update');
Route::delete('/courses/{id}', [CourseController::class, 'destroy'])->name('course.destroy');

Route::get('/enrollments', [EnrollmentController::class, 'viewEnrollment'])->name('enrollment');
Route::post('/enrollments', [EnrollmentController::class, 'store'])->name('enrollment.store');;
Route::put('/enrollments/{id}', [EnrollmentController::class, 'update'])->name('enrollment.update');
Route::delete('/enrollments/{id}', [EnrollmentController::class, 'destroy'])->name('enrollment.destroy');

Route::get('/testing', function () {
    return view('welcome');
})->name('testing');
