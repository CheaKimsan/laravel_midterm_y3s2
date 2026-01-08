<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans">

    <!-- Sidebar -->
    <aside class="fixed inset-y-0 left-0 w-64 bg-slate-800 text-white p-6">
        <h2 class="text-xl font-semibold mb-8 pb-4 border-b border-slate-700">
            📚 Enrollment System
        </h2>

        <nav class="space-y-2">


            <a href="{{ route('dashboard') }}" class="block px-4 py-2 rounded-md transition
   {{ request()->routeIs('dashboard') ? 'bg-slate-700' : 'hover:bg-slate-700' }}">
                📊 Dashboard
            </a>




        </nav>
    </aside>

    <!-- Main Content -->
    <main class="ml-64 p-6">
        @yield('content')
    </main>

</body>

</html>