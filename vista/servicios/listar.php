<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista Usuarios</title>
    <link href="./vista/styles/lista.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <?php require_once('./vista/base/header.php'); ?>
    <div class="info">
        <h1>Lista de Servicios</h1>
        <a href="index.php?action=crearServicio" class="button">Crear Servicio</a>
    </div>

    <table border="1">
        <thead>
            <tr>
                <th>Tipo de Servicio</th>
                <th>Costo</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($servicios)): ?>
                <tr>
                    <td colspan="4">No hay servicios disponibles.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($servicios as $servicio): ?>
                    <tr>
                        <td><?= $servicio['TipoServicio'] ?></td>
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
    <?php require_once('./vista/base/footer.php'); ?>
</body>