<div class="overflow-hidden rounded-xl border border-slate-700">
    <table class="w-full text-sm">
        <thead class="bg-slate-900 text-slate-300">
            <tr>
                <th class="p-4">ID</th>
                <th>Name</th>
                <th>Course</th>
                <th>Grade</th>
                <th>Created</th>
                <th>Status</th>
                <th class="text-center">Action</th>
            </tr>
        </thead>

        <tbody class="divide-y divide-slate-700">
            @forelse($enrollments as $enroll)
            <tr class="hover:bg-slate-700/50">
                <td class="p-4 text-center text-slate-400">
                    {{ $enroll->id }}
                </td>

                <td class="p-4 text-center text-slate-400">
                    {{ $enroll->student->name }}
                </td>

                <td class="p-4 text-center text-slate-400">
                    {{ $enroll->course->course_name }}
                </td>

                <td class="p-4 text-center text-slate-400">
                    {{ $enroll-> grade ?? '___' }}
                </td>

                <td class="p-4 text-center text-slate-400">
                    {{ $enroll->enrollment_date}}
                </td>

                <td class="p-4 text-center">
                    <span class="px-3 py-1 rounded-full text-xs
            {{ $enroll->status === 'completed' ? 'bg-green-600' :
               ($enroll->status === 'enrolled' ? 'bg-blue-600' : 'bg-red-600') }}">
                        {{ ucfirst($enroll->status) }}
                    </span>
                </td>

                <td class="text-center">
                    <div class="flex justify-center gap-2">

                        <button onclick="openEditEnrollmentModal(
                            '{{ $enroll->id }}',
                            '{{ $enroll->student_id }}',
                            '{{ $enroll->course_id }}',
                            '{{ $enroll->grade  }}',
                            '{{ $enroll->enrollment_date }}',
                            '{{ $enroll->status }}'
                        )" class="bg-amber-500 px-3 py-1 rounded text-white hover:bg-amber-600">
                            Edit
                        </button>

                        <button onclick="confirmDelete(this)"
                            class="bg-red-500 px-3 py-1 rounded text-white hover:bg-red-600">
                            Delete
                        </button>

                        <form action="{{ route('enrollment.destroy', $enroll->id) }}" method="POST" class="hidden">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="py-10 text-center text-gray-400">
                    No enrollments found
                </td>
            </tr>
            @endforelse
        </tbody>

    </table>
</div>