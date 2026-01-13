<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    function viewCourse()
    {
        $courses = Course::orderBy('created_at', 'desc')->get();
        return view('course.index', compact('courses'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'course_code'    => 'required|unique:courses|max:255',
            'course_name'  => 'required|max:255',
            'credits'      => 'required|integer|min:0',
            'instructor'   => 'required|max:255',
            'status'       => 'required|in:active,inactive',
        ]);

        Course::create($validated);

        return redirect()->back()->with('success', 'Course "' . $validated['course_name'] . '" has been added successfully!');
    }

    public function update(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course->update($request->all());

        return redirect()
            ->route('courses')
            ->with('success', 'Course updated successfully');
    }

    public function destroy($id)
    {
        Course::findOrFail($id)->delete();

        return redirect()
            ->route('courses')
            ->with('success', 'Student deleted successfully');
    }
}
