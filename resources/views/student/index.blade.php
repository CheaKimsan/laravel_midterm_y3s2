@extends('layouts.index')

@section('title', 'Student')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="bg-slate-800 p-6 rounded-xl shadow-lg text-white">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">🎓 Student Management</h1>
        <button onclick="openModal()" class="bg-blue-600 px-4 py-2 rounded-lg hover:bg-blue-500">
            + Add Student
        </button>
    </div>

    <!-- Table -->
    <div class="overflow-hidden rounded-xl border border-slate-700">
        <table class="w-full text-sm">
            <thead class="bg-slate-900 text-slate-300">
                <tr>
                    <th class="p-4">ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Created</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-700">
                @forelse($students as $student)
                <tr class="hover:bg-slate-700/50">
                    <td class="p-4 text-center">{{ $student->student_id }}</td>
                    <td class="text-center">{{ $student->name }}</td>
                    <td class="text-center">{{ $student->address ?? '—' }}</td>
                    <td class="text-center">{{ $student->created_at->format('d M Y') }}</td>
                    <td class="text-center">{{ ucfirst($student->status) }}</td>

                    <td class="text-center">
                        <div class="flex justify-center gap-2">

                            <button onclick="openEditModal(
    '{{ $student->id }}',
    '{{ $student->student_id }}',
    '{{ $student->name }}',
    '{{ $student->email }}',
    '{{ $student->phone }}',
    '{{ $student->address }}',
    '{{ $student->status }}'
)" class="bg-amber-500 px-3 py-1 rounded text-white hover:bg-amber-600">
                                Edit
                            </button>


                            <!-- DELETE -->
                            <button onclick="confirmDelete(this)"
                                class="bg-red-500 px-3 py-1 rounded text-white hover:bg-red-600">
                                Delete
                            </button>

                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="hidden">
                                @csrf
                                @method('DELETE')
                            </form>

                        </div>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="6" class="py-10 text-center text-gray-400">
                        No students found
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- ADD MODAL -->
<div id="studentModal" class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50">
    <div class="bg-slate-800 w-full max-w-xl rounded-xl shadow-lg p-6 text-white">

        <h2 class="text-xl mb-4">Add Student</h2>

        <form action="{{ route('students.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Student ID -->
            <div>
                <label class="block text-sm mb-1 text-slate-300">Student ID</label>
                <input type="text" name="student_id"
                    class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="STD-001" required>
            </div>

            <!-- Name -->
            <div>
                <label class="block text-sm mb-1 text-slate-300">Name</label>
                <input type="text" name="name"
                    class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Student Name" required>
            </div>

            <div>
                <label class="block text-sm mb-1 text-slate-300">Email</label>
                <input type="email" name="email"
                    class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Email" required>
            </div>

            <div>
                <label class="block text-sm mb-1 text-slate-300">Phone</label>
                <input type="text" name="phone"
                    class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Phone Number" required>
            </div>

            <!-- Address -->
            <div>
                <label class="block text-sm mb-1 text-slate-300">Address</label>
                <textarea name="address" rows="3"
                    class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 outline-none focus:ring-2 focus:ring-blue-500"
                    placeholder="Student Address"></textarea>
            </div>

            <!-- Status -->
            <div>
                <label class="block text-sm mb-1 text-slate-300">Status</label>
                <select name="status"
                    class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <div class="flex justify-end gap-2 pt-2">
                <button type="button" onclick="closeModal()" class="px-4 py-2 bg-gray-600 rounded hover:bg-gray-500">
                    Cancel
                </button>

                <button class="px-4 py-2 bg-blue-600 rounded hover:bg-blue-500">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>


<!-- EDIT MODAL -->
<div id="editStudentModal" class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50">
    <div class="bg-slate-800 w-full max-w-xl rounded-xl shadow-lg p-6 text-white">

        <h2 class="text-xl mb-4">Edit Student</h2>

        <form id="editStudentForm" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <!-- Student ID -->
            <div>
                <label class="block text-sm mb-1 text-slate-300">Student ID</label>
                <input type="text" id="edit_student_id" name="student_id"
                    class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Name -->
            <div>
                <label class="block text-sm mb-1 text-slate-300">Name</label>
                <input type="text" id="edit_name" name="name"
                    class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm mb-1 text-slate-300">Email</label>
                <input type="email" id="edit_email" name="email"
                    class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Phone -->
            <div>
                <label class="block text-sm mb-1 text-slate-300">Phone</label>
                <input type="text" id="edit_phone" name="phone"
                    class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 outline-none focus:ring-2 focus:ring-blue-500"
                    required>
            </div>

            <!-- Address -->
            <div>
                <label class="block text-sm mb-1 text-slate-300">Address</label>
                <textarea id="edit_address" name="address" rows="3"
                    class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 outline-none focus:ring-2 focus:ring-blue-500"></textarea>
            </div>

            <!-- Status -->
            <div>
                <label class="block text-sm mb-1 text-slate-300">Status</label>
                <select id="edit_status" name="status"
                    class="w-full rounded-lg bg-slate-900 border border-slate-700 px-4 py-2 outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>

            <div class="flex justify-end gap-2 pt-2">
                <button type="button" onclick="closeEditModal()"
                    class="px-4 py-2 bg-gray-600 rounded hover:bg-gray-500">
                    Cancel
                </button>

                <button class="px-4 py-2 bg-amber-500 rounded hover:bg-amber-600">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>





<script>
    function openModal() {
        document.getElementById('studentModal').classList.remove('hidden');
        document.getElementById('studentModal').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('studentModal').classList.add('hidden');
        document.getElementById('studentModal').classList.remove('flex');
    }

    function confirmDelete(btn) {
        Swal.fire({
            title: 'Delete student?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33'
        }).then(result => {
            if (result.isConfirmed) {
                btn.nextElementSibling.submit();
            }
        });
    }

    function openEditModal(id, student_id, name, email, phone, address, status) {
        // set form action
        document.getElementById('editStudentForm').action = `/students/${id}`;

        // set values
        document.getElementById('edit_student_id').value = student_id;
        document.getElementById('edit_name').value = name;
        document.getElementById('edit_email').value = email;
        document.getElementById('edit_phone').value = phone;
        document.getElementById('edit_address').value = address ?? '';
        document.getElementById('edit_status').value = status;

        // show modal
        const modal = document.getElementById('editStudentModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeEditModal() {
        const modal = document.getElementById('editStudentModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>

@if(session('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Success',
        text: "{{ session('success') }}",
        timer: 2000,
        showConfirmButton: false
    });
</script>
@endif

@endsection