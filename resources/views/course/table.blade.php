<div class="overflow-hidden rounded-xl border border-slate-700">
    <table class="w-full text-sm">
        <thead class="bg-slate-900 text-slate-300">
            <th class="px-6 py-4">Code</th>
            <th class="px-6 py-4 text-center">Course Name</th>
            <th class="px-6 py-4 text-center">Instructor</th>
            <th class="px-6 py-4 text-center">Status</th>
            <th class="px-6 py-4 text-center">Created</th>
            <th class="px-6 py-4 text-center">Action</th>
        </thead>

        <tbody class="divide-y divide-slate-700">
            @forelse($courses as $course)
            <tr class="hover:bg-slate-700/50">
                <td class="px-6 py-4 text-center text-slate-400">{{ $course->course_code }}</td>
                <td class="px-6 py-4 text-center font-medium text-slate-400">{{ $course->course_name }}</td>
                <td class="px-6 py-4 text-center text-slate-400">{{ $course->instructor }}</td>
                <td class="p-4 text-center">
                    <span class="px-2 py-1 rounded-full text-xs
               {{($course->status === 'active' ? 'bg-green-600' : 'bg-red-600') }}">
                        {{ ucfirst($course->status) }}
                    </span>
                </td>
                <td class="px-6 py-4 text-center text-slate-400">{{ $course->created_at->format('Y-m-d H:i:s') }}
                </td>
                <td class="text-center">
                    <div class="flex justify-center gap-2">
                        <button onclick="openEditModal(
                            '{{ $course->id }}',
                            '{{ $course->course_code }}',
                            '{{ $course->course_name }}',
                            '{{ $course->credits }}',
                            '{{ $course->instructor }}',
                            '{{ $course->status }}'
                        )" class="bg-amber-500 px-3 py-1 rounded text-white hover:bg-amber-600">
                            Edit
                        </button>

                        <button onclick="confirmDelete(this)"
                            class="bg-red-500 px-3 py-1 rounded text-white hover:bg-red-600">
                            Delete
                        </button>

                        <form action="{{ route('course.destroy', $course->id) }}" method="POST" class="hidden">
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