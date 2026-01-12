@extends('layouts.index')

@section('title', 'Course')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
    integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="bg-slate-800 p-6 rounded-xl shadow-lg text-white">

    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold tracking-wide">
            🎓 Course Management
        </h1>

        <a href="#" class="bg-blue-600 hover:bg-blue-500 transition px-4 py-2 rounded-lg text-sm font-medium">
            + Add Course
        </a>
    </div>

    <!-- Table -->
    <div class="overflow-hidden rounded-xl border border-slate-700">
        <table class="w-full text-sm">
            <thead class="bg-slate-900 text-slate-300 uppercase text-xs">
                <tr>
                    <th class="px-6 py-4">Code</th>
                    <th class="px-6 py-4 text-center">Course Name</th>
                    <th class="px-6 py-4 text-center">Instructor</th>
                    <th class="px-6 py-4 text-center">Created</th>
                    <th class="px-6 py-4 text-center">Action</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-slate-700 font-lg ">
                @forelse ($courses as $course)
                <tr class="hover:bg-slate-700/50 transition">
                    <td class="px-6 py-4 text-center text-slate-400">
                        {{ $course->course_code }}
                    </td>
                    <td class="px-6 py-4 text-center font-medium text-slate-400">
                        {{ $course->course_name }}
                    </td>
                    <td class="px-6 py-4 text-center text-slate-400">
                        {{ $course->instructor }}
                    </td>
                    <td class="px-6 py-4 text-center text-slate-400">
                        {{ $course->created_at }}
                    </td>

                    <td class="px-6 py-4 text-center">
                        <div class="flex items-center justify-center gap-3">

                            <!-- Edit -->
                            <a href="#" class="inline-flex items-center gap-1.5 px-3 py-1.5
                  rounded-lg bg-amber-500 text-white text-sm font-medium
                  hover:bg-amber-600 transition shadow-sm">
                                <i class="fa-solid fa-pen-to-square text-xs"></i>
                                Edit
                            </a>

                            <!-- Delete -->
                            <a href="#" class="inline-flex items-center gap-1.5 px-3 py-1.5
                  rounded-lg bg-red-500 text-white text-sm font-medium
                  hover:bg-red-600 transition shadow-sm">
                                <i class="fa-solid fa-trash text-xs"></i>
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