<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Display all students
    public function viewStudent()
    {
        $students = Student::orderBy('created_at', 'desc')->get();
        return view('student.index', compact('students'));
    }

    // Store new student
    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|unique:students|max:255',
            'name' => 'required|max:255',
            'email' => 'required|email|unique:students|max:255',
            'phone' => 'required|max:20',
            'address' => 'nullable',
            'status' => 'required|in:active,inactive'
        ]);

        Student::create($validated);

        return redirect()->back()->with('success', 'Student "' . $validated['name'] . '" has been added successfully!');
    }
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $student->update($request->all());

        return redirect()
            ->route('students')
            ->with('success', 'Student updated successfully');
    }

    public function destroy($id)
    {
        Student::findOrFail($id)->delete();

        return redirect()
            ->route('students')   // ✅ IMPORTANT
            ->with('success', 'Student deleted successfully');
    }
}
