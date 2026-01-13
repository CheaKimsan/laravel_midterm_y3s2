<div id="editStudentModal" class="fixed inset-0 bg-black/60 hidden items-center justify-center z-50">
    <div class="bg-slate-800 w-full max-w-xl rounded-xl shadow-lg p-6 text-white">

        <h2 class="text-xl mb-4">Edit Student</h2>

        <form id="editStudentForm" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            @include('student.form-fields', ['edit' => true])

            <div class="flex justify-end gap-2 pt-2">
                <button type="button" onclick="closeEditModal()"
                    class="px-4 py-2 bg-gray-600 rounded hover:bg-gray-500">
                    Cancel
                </button>

                <button class="px-4 py-2 bg-amber-500 rounded hover:bg-amber-600">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>