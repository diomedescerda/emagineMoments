<?php
if (isset($_SESSION['usuario'])): ?>
    <p>Bienvenido, <?= $_SESSION['usuario']['PrimerNombre'] ?> | <a href="index.php?action=cerrarSesion">Cerrar Sesión</a>
    </p>
<?php endif; ?>

<?php echo "Prestador"; ?>
<h1>Lista de Usuarios</h1>
<a href="index.php?action=crearServicio">Crear Servicio</a>

<table border="1">
    <thead>
        <tr>
            <th>IdServicio</th>
            <th>IdTipoServicio</th>
            <th>IdPrestador</th>
            <th>Costo</th>
            <th>Descripción</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($servicios)): ?>
            <tr>
                <td colspan="6">No hay servicios disponibles.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($servicios as $servicio): ?>
                <tr>
                    <td><?= $servicio['IdServicio'] ?></td>
                    <td><?= $servicio['IdTipoServicio'] ?></td>
                    <td><?= $servicio['IdPrestador'] ?></td>
                    <td><?= $servicio['Costo'] ?></td>
                    <td><?= $servicio['Descripcion'] ?></td>
                    <td>
                        <a href="index.php?action=editarServicio&id=<?= $servicio['IdServicio'] ?>">Editar</a>
                        <a href="index.php?action=eliminarServicio&id=<?= $servicio['IdServicio'] ?>"
                            onclick="return confirm('¿Estás seguro de eliminar este Servicio?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>

    </tbody>
</table>