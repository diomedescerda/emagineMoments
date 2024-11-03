<?php 
session_start();
if (isset($_SESSION['usuario'])): ?>
<html>
    <head>
        <link rel="stylesheet" href="./vista/styles/perfil.css">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <div class="container">
            <h1>Bienvenido, <?= $_SESSION['usuario']['PrimerNombre'] ?></h1>
            <p>
                <a href="index.php?action=cerrarSesion" class="logout">Cerrar Sesión</a>
            </p>
            <p>Acciones:</p>
            <a href="index.php?action=editarUsuario" class="btn">Modificar datos</a>
            <a href="#" class="btn" id="eliminarCuenta">Eliminar cuenta</a>
        </div>

        <script src="./vista/js/delete.js"></script>
    </body>
</html>

    
<?php endif; ?>