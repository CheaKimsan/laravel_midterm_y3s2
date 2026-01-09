@extends('layouts.index')

@section('title', 'Student')

@section('content')
<div class="bg-slate-800 p-6 rounded-xl shadow-lg text-white">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold tracking-wide">
            🎓 Student Management
        </h1>

        <a href="#" class="bg-blue-600 hover:bg-blue-500 transition px-4 py-2 rounded-lg text-sm font-medium">
            + Add Student
        </a>
    </div>

    <!-- Table -->
    <div class="overflow-hidden rounded-xl border border-slate-700">
        <table class="w-full text-sm">
            <thead class="bg-slate-900 text-slate-300 uppercase text-xs">
                <tr>
                    <th class="px-6 py-4">ID</th>
                    <th class="px-6 py-4 text-center">Name</th>
                    <th class="px-6 py-4 text-left">Address</th>
                    <th class="px-6 py-4">Created</th>
                    <th class="px-6 py-4 ">Status</th>
                    <th class="px-6 py-4 text-center">Action</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-700 font-lg ">
                @forelse ($students as $student)
                <tr class="hover:bg-slate-700/50 transition">
                    <td class="px-6 py-4 text-center text-slate-400">
                        {{ $student->student_id }}
                    </td>

                    <td class="px-6 py-4 text-center font-medium">
                        {{ $student->name }}
                    </td>

                    <td class="px-6 py-4 text-slate-300">
                        {{ $student->address }}
                    </td>

                    <td class="px-6 py-4 text-center text-slate-400">
                        {{ $student->created_at->format('d M Y') }}
                    </td>

                    <td class="px-6 py-4 text-center text-slate-400">
                        {{ $student->status }}
                    </td>

                    <td class="px-6 py-4">
                        <div class="flex items-center justify-center gap-2">
                            <a href="#"
                                class="px-3 py-1 rounded-md bg-emerald-600/20 text-emerald-400 hover:bg-emerald-600/40 transition">
                                Edit
                            </a>

                            <a href="#"
                                class="px-3 py-1 rounded-md bg-red-600/20 text-red-400 hover:bg-red-600/40 transition">
                                Delete
                            </a>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="py-10 text-center text-slate-400">
                        No students found
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection