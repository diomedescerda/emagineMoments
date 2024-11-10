$(document).ready(function () {
    const form = $('#miForm');
    
    if (form.data('ajax')) {
        form.on('submit', function (e) {
            e.preventDefault();
            
            $.ajax({
                url: this.action,
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json'
            })
            .done(function (response) {
                if (response.success) {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Bienvenido!',
                        text: 'Inicio de sesión exitoso',
                        timer: 500,
                        showConfirmButton: false
                    }).then(() => {
                        let redirectUrl;
                        switch(response.usuario.IdRol) {
                            case 1:
                                redirectUrl = 'index.php?action=listarUsuarios';
                                break;
                            case 3:
                                redirectUrl = `index.php?action=listarServicios&id=${response.usuario.IdUsuario}`;
                                break;
                            default:
                                redirectUrl = 'index.php';
                        }
                        window.location.href = redirectUrl;
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: response.message || 'Credenciales inválidas',
                        confirmButtonText: 'Intentar nuevamente'
                    });
                }
            })
            .fail(function (textStatus) {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Hubo un problema al conectar con el servidor',
                    footer: `Error: ${textStatus}`,
                    confirmButtonText: 'Cerrar'
                });
            });
        });
    }
});