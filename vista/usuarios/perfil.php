<?php
session_start();
if (isset($_SESSION['usuario'])): ?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Perfil del Usuario</title>
        <link rel="stylesheet" href="./vista/styles/perfil.css">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <h1>Bienvenido, <?= $_SESSION['usuario']['PrimerNombre'] ?></h1>
            <p>
                <a href="index.php?action=cerrarSesion" class="logout">Cerrar Sesión</a>
            </p>
            <p>Acciones:</p>
            <a href="index.php?action=listarContratos&idRol=<?= $_SESSION['usuario']['IdRol'] ?>" class="btn">
                Ver Historial de Contratos
            </a>
            <?php if ($_SESSION['usuario']['IdRol'] == 3): ?>
            <a href="index.php?action=listarServicios&id=<?= $_SESSION['usuario']['IdRol'] ?>" class="btn">
                Listar Mis Servicios
            </a>
            <?php endif; ?>
            <a href="index.php?action=listarSolicitudes" class="btn">
                Solicitudes de Contrato
            </a>
            <a href="index.php?action=editarUsuario" class="btn">Modificar datos</a>
            <a href="#" class="btn" id="eliminarCuenta">Eliminar cuenta</a>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="./vista/js/delete.js"></script>
    </body>
    </html>


<?php endif; ?>