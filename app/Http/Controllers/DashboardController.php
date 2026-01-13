<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function viewDashboard()
    {
        $totalStudents = Student::count();
        $totalCourses = Course::count();
        $activeEnrollments = Enrollment::where('status', 'enrolled')->count();
        $completedEnrollments = Enrollment::where('status', 'completed')->count();

        // Get 5 most recent enrollments
        $recentEnrollments = Enrollment::with(['student', 'course'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('dashboard.index', compact(
            'totalStudents',
            'totalCourses',
            'activeEnrollments',
            'completedEnrollments',
            'recentEnrollments'
        ));
    }
}
