@extends('layouts.index')

@section('title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Students -->
        <div class="bg-slate-800 rounded-xl shadow-lg p-6 border border-slate-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-400 text-sm font-medium uppercase">Total Students</p>
                    <h3 class="text-3xl font-bold text-white mt-2">{{ $totalStudents }}</h3>
                </div>
                <div class="bg-blue-600/20 p-3 rounded-lg">
                    <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Total Courses -->
        <div class="bg-slate-800 rounded-xl shadow-lg p-6 border border-slate-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-400 text-sm font-medium uppercase">Total Courses</p>
                    <h3 class="text-3xl font-bold text-white mt-2">{{ $totalCourses }}</h3>
                </div>
                <div class="bg-purple-600/20 p-3 rounded-lg">
                    <svg class="w-8 h-8 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253">
                        </path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Active Enrollments -->
        <div class="bg-slate-800 rounded-xl shadow-lg p-6 border border-slate-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-400 text-sm font-medium uppercase">Active Enrollments</p>
                    <h3 class="text-3xl font-bold text-white mt-2">{{ $activeEnrollments }}</h3>
                </div>
                <div class="bg-green-600/20 p-3 rounded-lg">
                    <svg class="w-8 h-8 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Completed Courses -->
        <div class="bg-slate-800 rounded-xl shadow-lg p-6 border border-slate-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-slate-400 text-sm font-medium uppercase">Completed Courses</p>
                    <h3 class="text-3xl font-bold text-white mt-2">{{ $completedEnrollments }}</h3>
                </div>
                <div class="bg-amber-600/20 p-3 rounded-lg">
                    <svg class="w-8 h-8 text-amber-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z">
                        </path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Enrollments -->
    <div class="bg-slate-800 rounded-xl shadow-lg p-6 border border-slate-700">
        <div class="flex items-center justify-between mb-6">
            <h2 class="text-xl font-semibold text-white">Recent Enrollments</h2>
            <a href="{{ route('enrollment') }}"
                class="bg-blue-600 hover:bg-blue-500 transition px-4 py-2 rounded-lg text-sm font-medium text-white">
                View All
            </a>
        </div>

        <div class="overflow-hidden rounded-xl border border-slate-700">
            <table class="w-full text-sm">
                <thead class="bg-slate-900 text-slate-300">
                    <tr>
                        <th class="p-4 text-left">Student</th>
                        <th class="p-4 text-left">Course</th>
                        <th class="p-4 text-left">Enrollment Date</th>
                        <th class="p-4 text-center">Status</th>
                        <th class="p-4 text-center">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-700">
                    @forelse($recentEnrollments as $enrollment)
                    <tr class="hover:bg-slate-700/50 transition">
                        <td class="p-4 text-slate-300">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-full bg-blue-600/20 flex items-center justify-center">
                                    <span class="text-blue-500 font-semibold text-sm">
                                        {{ substr($enrollment->student->name, 0, 1) }}
                                    </span>
                                </div>
                                <span>{{ $enrollment->student->name }}</span>
                            </div>
                        </td>

                        <td class="p-4 text-slate-300">
                            {{ $enrollment->course->course_name }}
                        </td>

                        <td class="p-4 text-slate-400">
                            {{ \Carbon\Carbon::parse($enrollment->enrollment_date)->format('M d, Y') }}
                        </td>

                        <td class="p-4 text-center">
                            <span
                                class="px-3 py-1 rounded-full text-xs font-medium
                                {{ $enrollment->status === 'completed' ? 'bg-green-600/20 text-green-400' :
                                   ($enrollment->status === 'enrolled' ? 'bg-blue-600/20 text-blue-400' : 'bg-red-600/20 text-red-400') }}">
                                {{ ucfirst($enrollment->status) }}
                            </span>
                        </td>

                        <td class="p-4">
                            <div class="flex justify-center gap-2">
                                <a href="{{ route('enrollment') }}"
                                    class="bg-blue-600 hover:bg-blue-500 px-3 py-1 rounded text-white text-xs transition">
                                    View
                                </a>
                                <button
                                    class="bg-amber-500 hover:bg-amber-600 px-3 py-1 rounded text-white text-xs transition">
                                    Edit
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="py-10 text-center text-slate-400">
                            No recent enrollments found
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection