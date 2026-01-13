@php $isEdit = $edit ?? false; @endphp

<div>
    <label class="block text-sm mb-1 text-slate-300">Course ID</label>
    <input type="text" name="course_code" id="{{ $isEdit ? 'edit_course_code' : '' }}"
        class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 outline-none focus:ring-2 focus:ring-blue-500"
        required>
</div>

<div>
    <label class="block text-sm mb-1 text-slate-300">Course Name</label>
    <input type="text" name="course_name" id="{{ $isEdit ? 'edit_course_name' : '' }}"
        class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 outline-none focus:ring-2 focus:ring-blue-500"
        required>
</div>

<div>
    <label class="block text-sm mb-1 text-slate-300">Credits</label>
    <input type="number" name="credits" id="{{ $isEdit ? 'edit_credits' : '' }}" min="0"
        class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 outline-none focus:ring-2 focus:ring-blue-500"
        required>
</div>

<div>
    <label class="block text-sm mb-1 text-slate-300">Instructor</label>
    <input type="text" name="instructor" id="{{ $isEdit ? 'edit_instructor' : '' }}"
        class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 outline-none focus:ring-2 focus:ring-blue-500"
        required>
</div>

<div>
    <label class="block text-sm mb-1 text-slate-300">Status</label>
    <select name="status" id="{{ $isEdit ? 'edit_status' : '' }}"
        class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 outline-none focus:ring-2 focus:ring-blue-500">
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
    </select>
</div>