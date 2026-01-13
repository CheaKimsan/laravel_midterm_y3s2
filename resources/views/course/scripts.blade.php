<script>
// ADD MODAL
function openModal() {
    document.getElementById('courseModal').classList.remove('hidden');
    document.getElementById('courseModal').classList.add('flex');
}

function closeModal() {
    document.getElementById('courseModal').classList.add('hidden');
    document.getElementById('courseModal').classList.remove('flex');
}



function openEditModal(id, course_code, course_name, credits, instructor, status) {
    const form = document.getElementById('editCourseForm'); // make sure your form has this ID
    form.action = `/courses/${id}`;


    document.getElementById('edit_course_code').value = course_code;
    document.getElementById('edit_course_name').value = course_name;
    document.getElementById('edit_credits').value = credits;
    document.getElementById('edit_instructor').value = instructor;
    document.getElementById('edit_status').value = status;

    const modal = document.getElementById('editCourseModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}

function closeEditModal() {
    const modal = document.getElementById('editCourseModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}

// DELETE CONFIRM
function confirmDelete(btn) {
    Swal.fire({
        title: 'Delete Course?',
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