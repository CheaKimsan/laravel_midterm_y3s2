<script>
    // ADD MODAL
    function openModal() {
        document.getElementById('studentModal').classList.remove('hidden');
        document.getElementById('studentModal').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('studentModal').classList.add('hidden');
        document.getElementById('studentModal').classList.remove('flex');
    }

    // EDIT MODAL
    function openEditModal(id, student_id, name, email, phone, address, status) {
        const form = document.getElementById('editStudentForm');
        form.action = `/students/${id}`;

        document.getElementById('edit_student_id').value = student_id;
        document.getElementById('edit_name').value = name;
        document.getElementById('edit_email').value = email;
        document.getElementById('edit_phone').value = phone;
        document.getElementById('edit_address').value = address ?? '';
        document.getElementById('edit_status').value = status;

        const modal = document.getElementById('editStudentModal');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeEditModal() {
        const modal = document.getElementById('editStudentModal');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    // DELETE CONFIRM
    function confirmDelete(btn) {
        Swal.fire({
            title: 'Delete student?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33'
        }).then(result => {
            if (result.isConfirmed) {
                btn.nextElementSibling.submit();
            }
        });
    }
</script>