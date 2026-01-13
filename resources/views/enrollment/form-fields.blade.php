@php $isEdit = $edit ?? false; @endphp

<div>
    <label class="block text-sm mb-1 text-slate-300">Student</label>
    <select name="student_id" id="{{ $isEdit ? 'edit_student_id' : 'student_id' }}"
        class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2">
        <option value="" selected>Select Student</option>
        @foreach($students as $student)
        <option value="{{ $student->id }}">{{ $student->name }}</option>
        @endforeach
    </select>
</div>

<div>
    <label class="block text-sm mb-1 text-slate-300">Course</label>
    <select name="course_id" id="{{ $isEdit ? 'edit_course_id' : 'course_id' }}"
        class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2">
        <option value="" selected>Select Course</option>
        @foreach($courses as $course)
        <option value="{{ $course->id }}">{{ $course->course_name }}</option>
        @endforeach
    </select>
</div>

<div>
    <label class="block text-sm mb-1 text-slate-300">Grade</label>
    <input type="text" name="grade" id="{{ $isEdit ? 'edit_grade' : 'grade' }}"
        class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2">
</div>

<div>
    <label class="block text-sm mb-1 text-slate-300">Enrollment Date</label>
    <input type="date" name="enrollment_date" id="{{ $isEdit ? 'edit_enrollment_date' : 'enrollment_date' }}"
        class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2">
</div>

<div>
    <label class="block text-sm mb-1 text-slate-300">Status</label>
    <select name="status" id="{{ $isEdit ? 'edit_status' : 'status' }}"
        class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2">
        <option value="enrolled">Enrolled</option>
        <option value="completed">Completed</option>
        <option value="dropped">Dropped</option>
    </select>
</div>