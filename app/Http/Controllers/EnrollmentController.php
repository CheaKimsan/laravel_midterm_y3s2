<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function viewEnrollment()
    {
        $enrollments = Enrollment::with(['student', 'course'])
            ->orderBy('created_at', 'desc')
            ->get();

        $students = Student::orderBy('name')->get();
        $courses = Course::orderBy('course_name')->get();

        return view('enrollment.index', compact(
            'enrollments',
            'students',
            'courses'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'course_id' => 'required|exists:courses,id',
            'enrollment_date' => 'required|date',
            'status' => 'required|in:enrolled,completed,dropped',
        ]);

        // Create enrollment safely
        Enrollment::create($validated);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Enrollment added successfully!');
    }

    public function update(Request $request, $id)
    {
        $enrollments = Enrollment::findOrFail($id);
        $enrollments->update($request->all());

        return redirect()
            ->route('enrollment')
            ->with('success', 'Student updated successfully');
    }

    public function destroy($id)
    {
        Enrollment::findOrFail($id)->delete();

        return redirect()
            ->route('enrollment')
            ->with('success', 'Student deleted successfully');
    }
}
