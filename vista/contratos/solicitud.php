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
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Descripción del Servicio</th>
                <th>Costo</th>
                <th>Fecha/Hora</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($contratos)): ?>
                <tr>
                    <td colspan="7">No hay contratos disponibles.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($contratos as $contrato): ?>
                    <?php
                    $estadoContrato = array_filter($estadoContratos, function ($estado) use ($contrato) {
                        return $estado['IdContrato'] == $contrato['IdContrato'];
                    });
                    $estadoContrato = reset($estadoContrato);
                    ?>
                    <tr>
                        <td><?= $contrato['Nombre'] ?></td>
                        <td><?= $contrato['Apellido'] ?></td>
                        <td><?= $contrato['Descripcion'] ?></td>
                        <td><?= $contrato['Costo'] ?></td>
                        <td><?= $contrato['FechaYHora'] ?></td>
                        <td>
                            <?php if ($_SESSION['usuario']['IdRol'] == 2): ?>
                                <a href="index.php?action=rechazarContrato&id=<?= $estadoContrato['IdEstadoContrato'] ?>&idTipoEstadoContrato=5"
                                    onclick="return confirm('¿Estás seguro de eliminar este Contrato?')">Cancelar</a>
                            <?php endif; ?>
                            <?php if ($_SESSION['usuario']['IdRol'] == 3): ?>
                                <a
                                    href="index.php?action=firmarContrato&id=<?= $estadoContrato['IdEstadoContrato'] ?>&idTipoEstadoContrato=3">Firmar</a>
                                <a href="index.php?action=rechazarContrato&id=<?= $estadoContrato['IdEstadoContrato'] ?>&idTipoEstadoContrato=5"
                                    onclick="return confirm('¿Estás seguro de eliminar este Contrato?')">Rechazar</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>

        </tbody>
    </table>
    <?php require_once('./vista/base/footer.php'); ?>
</body>