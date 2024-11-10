$(document).ready(function () {
    $('#roleSelect').change(function () {
        const additionalSelects = $('#additionalSelects');
        const tipoPrestadorSelect = $('#tipoPrestadorSelect');

        if ($(this).val() === '3') {
            additionalSelects.show();
            tipoPrestadorSelect.prop('required', true);
        } else {
            additionalSelects.hide();
            tipoPrestadorSelect.prop('required', false);
        }
    });

    $('#roleSelect').trigger('change');
});

function ajaxActualizarUsuario() {
    const primerNombre = $("#PrimerNombre").val().trim();
    const primerApellido = $("#PrimerApellido").val().trim();
    const email = $("#Email").val().trim();
    const direccion = $("#Direccion").val().trim();
    const telefono = $("#Telefono").val().trim();
    const idRol = $("#roleSelect").val();

    if (!primerNombre || !primerApellido || !email || !direccion || !telefono || !idRol) {
        Swal.fire({
            title: "Error",
            text: "Todos los campos requeridos deben estar completos",
            icon: "error"
        });
        return;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        Swal.fire({
            title: "Error",
            text: "Por favor ingrese un correo electrónico válido",
            icon: "error"
        });
        return;
    }

    const userData = {
        PrimerNombre: primerNombre,
        OtrosNombres: $("#OtrosNombres").val().trim(),
        PrimerApellido: primerApellido,
        OtrosApellidos: $("#OtrosApellidos").val().trim(),
        Email: email,
        Direccion: direccion,
        Telefono: telefono,
        IdRol: idRol,
        IdTipoPrestador: idRol === '3' ? $("#tipoPrestadorSelect").val() : null
    };

    const urlParams = new URLSearchParams(window.location.search);
    const userId = urlParams.get('id');
    
    $.ajax({
        data: userData,
        type: "POST",
        dataType: "json",
        url: "index.php?action=actualizarUsuario" + (userId ? `&id=${userId}` : ''),
    })
    .done(function(response) {
        Swal.fire({
            text: response.message,
            icon: "success",
            title: "Actualización de Usuario"
        }).then(() => {
            window.location.href = 'index.php?action=listarUsuarios';
        });
    })
    .fail(function(jqXHR, textStatus, errorThrown) {
        Swal.fire({
            title: "Error",
            text: "Error al actualizar: " + jqXHR.responseJSON?.message || errorThrown,
            icon: "error"
        });
    });
}