<script>
    // ADD MODAL
    function openModal() {
        document.getElementById('enrollmentModal').classList.remove('hidden');
        document.getElementById('enrollmentModal').classList.add('flex');
    }

    function closeModal() {
        document.getElementById('enrollmentModal').classList.add('hidden');
        document.getElementById('enrollmentModal').classList.remove('flex');
    }

    function openEditEnrollmentModal(id, student_id, course_id, grade, enrollment_date, status) {
        // Set the form action
        const form = document.getElementById('editEnrollmentForm');
        form.action = `/enrollments/${id}`;

        // Populate form fields
        document.getElementById('edit_student_id').value = student_id;
        document.getElementById('edit_course_id').value = course_id;
        document.getElementById('edit_grade').value = grade !== 'null' && grade !== '' ? grade : '';
        document.getElementById('edit_enrollment_date').value = enrollment_date;
        document.getElementById('edit_status').value = status;

        // Open modal (use correct modal container ID)
        const modal = document.getElementById('editEnrollmentModalContainer');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeEditEnrollmentModal() {
        const modal = document.getElementById('editEnrollmentModalContainer');
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