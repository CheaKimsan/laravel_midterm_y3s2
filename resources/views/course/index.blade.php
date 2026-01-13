@extends('layouts.index')

@section('title', 'Course')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="bg-slate-800 p-6 rounded-xl shadow-lg text-white">

    <div class="flex items-center justify-between mb-6">
        <h1 class="text-2xl font-semibold">🎓 Course Management</h1>
        <button onclick="openModal()"
            class="bg-blue-600 hover:bg-blue-500 transition px-4 py-2 rounded-lg text-sm font-medium">
            + Add Course
        </button>
    </div>
    @include('course.table', ['courses' => $courses])

</div>

@include('course.add-modal');
@include('course.edit-modal')


@include('course.scripts')

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