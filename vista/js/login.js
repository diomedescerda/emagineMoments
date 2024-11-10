$(document).ready(function() {
    $(document).on('click', '#btnSubmit', function(e) {
        e.preventDefault();
        
        const email = $("#email").val();
        const contrasena = $("#contrasena").val();
        
        if(email != "" && contrasena != "") {
            ajaxLogin(email, contrasena);
        } else {
            Swal.fire({
                text: "Por favor complete todos los campos",
                icon: "warning",
                title: "Inicio de Sesión"
            });
        }
    });
});

function ajaxLogin(email, contrasena) {
    $.ajax({
        data: {
            "email": email,
            "contrasena": contrasena
        },
        type: "POST",
        dataType: "json",
        url: "index.php?action=iniciarSesion"
    })
    .done(function(response) {
        if(response.success) {
            Swal.fire({
                text: response.message,
                icon: "success",
                title: "Inicio de Sesión",
                timer: 1000,
                showConfirmButton: false
            }).then(() => {
                window.location.href = response.ruta;
            });
        } else {
            Swal.fire({
                text: response.message,
                icon: "error",
                title: "Error de Inicio de Sesión"
            });
        }
    })
    .fail(function(jqXHR, textStatus, errorThrown) {
        Swal.fire({
            title: "Error",
            icon: "error",
            text: "Ha ocurrido un error en la conexión: " + errorThrown
        });
    });
}