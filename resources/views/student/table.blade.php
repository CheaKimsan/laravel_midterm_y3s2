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
                <td class="p-4 text-center text-slate-400">{{ $student->student_id }}</td>
                <td class="text-center text-slate-400 font-medium">{{ $student->name }}</td>
                <td class="text-center text-slate-400">{{ $student->address ?? '—' }}</td>
                <td class="text-center text-slate-400">{{ $student->created_at->format('Y-m-d H:i:s') }}</td>

                <td class="p-4 text-center">
                    <span class="px-2 py-1 rounded-full text-xs
               {{($student->status === 'active' ? 'bg-green-600' : 'bg-red-600') }}">
                        {{ ucfirst($student->status) }}
                    </span>
                </td>
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