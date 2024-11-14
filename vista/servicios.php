<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista Usuarios</title>
    <link href="./vista/styles/servicios.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <?php require_once('./vista/base/header.php'); ?>
    <div class="info">
        <h1>Lista de Servicios</h1>
    </div>
    <div class="cards-container">
        <?php if (empty($servicios)): ?>
            <p>No hay servicios disponibles.</p>
        <?php else: ?>
            <?php foreach ($servicios as $servicio): ?>
                <div class="card">
                    <img src="./vista/img/example1.jpg" alt="<?= $servicio['TipoServicio'] ?>" class="card-image">
                    <h3 class="card-title"><?= $servicio['TipoServicio'] ?></h3>
                    <p class="card-cost">Costo $<?= $servicio['Costo'] ?></p>
                    <p class="card-description"><?= $servicio['Descripcion'] ?></p>
                    <?php if (isset($_SESSION['usuario']) && $_SESSION['usuario']['IdRol'] == 2): ?>
                        <div class="btn-center">
                            <a href="index.php?action=contratarServicio&idServicio=<?= $servicio['IdServicio'] ?>"
                                class="button">Contratar</a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    <?php require_once('./vista/base/footer.php'); ?>
</body>

</html>