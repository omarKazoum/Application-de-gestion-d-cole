document.querySelectorAll('.btn-danger').forEach((btn) => {
    btn.addEventListener('click', (e) => {
        e.preventDefault();
        Swal.fire({
            icon: 'warning',
            title: 'Do you want to delete this row?',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                window.location.href = e.target.href;
            }
        })
    })

})