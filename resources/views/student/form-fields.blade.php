@php $isEdit = $edit ?? false; @endphp

<div>
    <label class="block text-sm mb-1 text-slate-300">Student Code</label>
    <input type="text" name="student_code" id="{{ $isEdit ? 'edit_student_code' : '' }}"
        class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 outline-none focus:ring-2 focus:ring-blue-500"
        required>
</div>

<div>
    <label class="block text-sm mb-1 text-slate-300">Name</label>
    <input type="text" name="name" id="{{ $isEdit ? 'edit_name' : '' }}"
        class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 outline-none focus:ring-2 focus:ring-blue-500"
        required>
</div>

<div>
    <label class="block text-sm mb-1 text-slate-300">Email</label>
    <input type="email" name="email" id="{{ $isEdit ? 'edit_email' : '' }}"
        class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 outline-none focus:ring-2 focus:ring-blue-500"
        required>
</div>

<div>
    <label class="block text-sm mb-1 text-slate-300">Phone</label>
    <input type="text" name="phone" id="{{ $isEdit ? 'edit_phone' : '' }}"
        class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 outline-none focus:ring-2 focus:ring-blue-500"
        required>
</div>

<div>
    <label class="block text-sm mb-1 text-slate-300">Address</label>
    <textarea name="address" id="{{ $isEdit ? 'edit_address' : '' }}" rows="3"
        class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 outline-none focus:ring-2 focus:ring-blue-500"></textarea>
</div>

<div>
    <label class="block text-sm mb-1 text-slate-300">Status</label>
    <select name="status" id="{{ $isEdit ? 'edit_status' : '' }}"
        class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 outline-none focus:ring-2 focus:ring-blue-500">
        <option value="active">Active</option>
        <option value="inactive">Inactive</option>
    </select>
</div>