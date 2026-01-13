<div id="enrollmentModal" class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50">
    <div class="bg-slate-800 w-full max-w-xl rounded-xl shadow-lg p-6 text-white">

        <h2 class="text-xl mb-4">Add Student</h2>

        <form action="{{ route('enrollment.store') }}" method="POST" class="space-y-4">
            @csrf

            @include('enrollment.form-fields')

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