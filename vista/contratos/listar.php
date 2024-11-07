<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Historial de Contratos</title>
    <link href="./vista/styles/lista.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <?php require_once('./vista/base/header.php'); ?>
    <div class="info">
        <h1>Historial de Contratos</h1>
        <a href="index.php?action=crearContrato" class="button">Crear Contrato</a>
    </div>

    <table border="1">
        <thead>
            <tr>
                <th>IdContrato</th>
                <th>IdCliente</th>
                <th>IdServicio</th>
                <th>Costo</th>
                <th>Fecha y Hora</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($contratos)): ?>
                <tr>
                    <td colspan="6">No hay contratos disponibles.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($contratos as $contrato): ?>
                    <tr>
                        <td><?= $contrato['IdContrato'] ?></td>
                        <td><?= $contrato['IdCliente'] ?></td>
                        <td><?= $contrato['IdServicio'] ?></td>
                        <td>working</td>
                        <td><?= $contrato['FechaYHora'] ?></td>
                        <td>
                            <a href="index.php?action=editarContrato&id=<?= $contrato['IdContrato'] ?>">Editar</a>
                            <a href="index.php?action=eliminarContrato&id=<?= $contrato['IdContrato'] ?>"
                                onclick="return confirm('¿Estás seguro de eliminar este Contrato?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>

        </tbody>
    </table>
    <?php require_once('./vista/base/footer.php'); ?>
</body>