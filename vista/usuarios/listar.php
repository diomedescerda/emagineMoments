<?php if (isset($_SESSION['usuario'])): ?>
    <p>Bienvenido, <?= $_SESSION['usuario']['PrimerNombre'] ?> | <a href="index.php?action=cerrarSesion">Cerrar Sesión</a></p>
<?php endif; ?>

<?php echo "Administrador"; ?>
<h1>Lista de Usuarios</h1>
<a href="index.php?action=crear">Crear Usuario</a>


<table border="1">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Otros Nombres</th>
            <th>Primer Apellido</th>
            <th>Otros Apellidos</th>
            <th>Email</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Rol</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?= $usuario['IdUsuario'] ?></td>
                <td><?= $usuario['PrimerNombre'] ?></td>
                <td><?= $usuario['OtrosNombres'] ?></td>
                <td><?= $usuario['PrimerApellido'] ?></td>
                <td><?= $usuario['OtrosApellidos'] ?></td>
                <td><?= $usuario['Email'] ?></td>
                <td><?= $usuario['Direccion'] ?></td>
                <td><?= $usuario['Telefono'] ?></td>
                <td><?= $usuario['Nombre'] ?></td>
                <td>
                    <a href="index.php?action=editar&id=<?= $usuario['IdUsuario'] ?>">Editar</a>
                    <a href="index.php?action=eliminar&id=<?= $usuario['IdUsuario'] ?>" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>