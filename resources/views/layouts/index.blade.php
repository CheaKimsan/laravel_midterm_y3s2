<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')
</head>

<body class="bg-slate-900 font-sans">

    <!-- Sidebar -->
    <aside class="fixed inset-y-0 left-0 w-64 bg-slate-800 text-white font-semibold shadow p-6">
        <h2 class="text-xl font-semibold mb-8 pb-4 border-b border-slate-700">
            📚 Enrollment System
        </h2>

        <nav class="space-y-2">

            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}" class="flex items-center text-gray px-4 py-2 rounded-md transition
            {{ request()->routeIs('dashboard') ? 'bg-slate-700' : 'hover:bg-slate-700' }}">
                <!-- Icon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18v18H3V3z" />
                </svg>
                Dashboard
            </a>

            <!-- Students -->
            <a href="{{ route('students') }}" class="flex items-center px-4 py-2 rounded-md transition
            {{ request()->routeIs('student') ? 'bg-slate-700' : 'hover:bg-slate-700' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5.121 17.804A9 9 0 1118.879 6.196M12 12v.01" />
                </svg>
                Students
            </a>

            <!-- Courses -->
            <a href="{{ route('courses') }}" class="flex items-center px-4 py-2 rounded-md transition
            {{ request()->routeIs('course') ? 'bg-slate-700' : 'hover:bg-slate-700' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 14l6.16-3.422A12.083 12.083 0 0121 12.085M12 14v7m0-7L5.84 10.578A12.083 12.083 0 003 12.085" />
                </svg>
                Courses
            </a>

            <!-- Enrollments -->
            <a href="{{ route('enrollment') }}" class="flex items-center px-4 py-2 rounded-md transition
            {{ request()->routeIs('enrollment') ? 'bg-slate-700' : 'hover:bg-slate-700' }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
                Enrollments
            </a>

        </nav>
    </aside>


    <!-- Main Content -->
    <main class="ml-64 p-6">
        @yield('content')
    </main>

</body>

</html>