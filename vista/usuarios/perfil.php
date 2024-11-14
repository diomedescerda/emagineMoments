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
        <?php require_once('./vista/base/header.php'); ?>
        <div class="container">
            <h1>Bienvenido, <?= $_SESSION['usuario']['PrimerNombre'] ?></h1>
            <div class="dashboard">
                <div class="card">
                    <h3>Historial de Contratos</h3>
                    <p>Visualiza y gestiona tus contratos anteriores.</p>
                    <a href="index.php?action=listarContratos&idRol=<?= $_SESSION['usuario']['IdRol'] ?>" class="btn">Ver
                        Historial</a>
                </div>

                <?php if ($_SESSION['usuario']['IdRol'] == 3): ?>
                    <div class="card">
                        <h3>Mis Servicios</h3>
                        <p>Consulta y administra los servicios que has registrado.</p>
                        <a href="index.php?action=listarServicios&id=<?= $_SESSION['usuario']['IdRol'] ?>" class="btn">Listar
                            Servicios</a>
                    </div>
                <?php endif; ?>
                <div class="card">
                    <h3>Solicitudes de Contrato</h3>
                    <p>Revisa las solicitudes de contrato realizadas.</p>
                    <a href="index.php?action=listarSolicitudes" class="btn">Ver Solicitudes</a>
                </div>

                <div class="card">
                    <h3>Modificar Datos</h3>
                    <p>Actualiza tu información personal para mantener tu perfil al día.</p>
                    <a href="index.php?action=editarUsuario" class="btn">Modificar Datos</a>
                </div>
            </div>
            <div class="delete-account">
                <a href="#" class="btn" id="eliminarCuenta">Eliminar cuenta</a>
            </div>
        </div>
        <?php require_once('./vista/base/footer.php'); ?>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="./vista/js/delete.js"></script>
    </body>

    </html>

<?php endif; ?>