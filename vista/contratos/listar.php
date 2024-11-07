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
                <?php if ($_SESSION['usuario']['IdRol'] == 2): ?>
                    <th>Nombre del Prestador</th>
                <?php endif; ?>
                <?php if ($_SESSION['usuario']['IdRol'] == 3): ?>
                    <th>Nombre de Cliente</th>
                <?php endif; ?>
                <th>Descripción</th>
                <th>Costo</th>
                <th>Fecha/Hora</th>
                <th>Estado del Servicio</th>
                <?php if ($_SESSION['usuario']['IdRol'] == 2): ?>
                <th>Acciones</th>
                <?php endif; ?>
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
                        <?php if ($_SESSION['usuario']['IdRol'] == 2): ?>
                            <td><?= $contrato['NombrePrestador'] ?></td>
                        <?php endif; ?>
                        <?php if ($_SESSION['usuario']['IdRol'] == 3): ?>
                            <td><?= $contrato['NombreCliente'] ?></td>
                        <?php endif; ?>
                        <td><?= $contrato['Descripcion'] ?></td>
                        <td><?= $contrato['Costo'] ?></td>
                        <td><?= $contrato['FechaYHora'] ?></td>
                        <td><?= $contrato['EstadoServicio'] ?></td>
                        <?php if ($_SESSION['usuario']['IdRol'] == 2 && $contrato['IdTipoEstadoContrato'] == 4): ?>
                        <td>
                            <a
                                href="index.php?action=crearReview&idServicio=<?= $contrato['IdServicio'] ?>&idContrato=<?= $contrato['IdContrato'] ?>">Reseñar</a>
                        </td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>

        </tbody>
    </table>
    <?php require_once('./vista/base/footer.php'); ?>
</body>