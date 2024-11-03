document.getElementById('eliminarCuenta').addEventListener('click', function(event) {
    event.preventDefault(); // Prevenir el comportamiento predeterminado del enlace

    Swal.fire({
        title: '¿Estás seguro?',
        text: "No podrás revertir esta acción",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Sí, eliminar',
        cancelButtonText: 'Cancelar',
        position:'top'
    }).then((result) => {
        if (result.isConfirmed) {
            // Si el usuario confirma, redirigimos a la acción de eliminar
            window.location.href = 'index.php?action=eliminarUsuario';
        }
    });
});