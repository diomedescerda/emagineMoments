<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Servicio</title>
    <link rel="stylesheet" href="./vista/styles/editar.css">
</head>
<body>

    <?php require_once('./vista/base/header.php'); ?>

    <div class="container">
        <h1>Editar Servicio</h1>

        <form method="POST" action="index.php?action=actualizarServicio&id=<?php echo $servicio['IdServicio']; ?>" id="editServiceForm">
            <div class="form-grid">
                <div class="form-group">
                    <label for="IdTipoServicio">Tipo de Servicio:</label>
                    <select name="IdTipoServicio" id="serviceTypeSelect" required>
                        <?php foreach ($tipoServicios as $tipoServicio): ?>
                            <option value="<?= $tipoServicio['IdTipoServicio'] ?>"
                                <?= $servicio['IdTipoServicio'] == $tipoServicio['IdTipoServicio'] ? 'selected' : '' ?>>
                                <?= htmlspecialchars($tipoServicio['Nombre']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="Costo">Costo:</label>
                    <input type="number" name="Costo" value="<?= $servicio['Costo'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="Descripcion">Descripción:</label>
                    <input type="text" name="Descripcion" value="<?= $servicio['Descripcion'] ?>" required>
                </div>

                <div class="button-group">
                    <button type="submit" class="button">Actualizar</button>
                </div>
            </div>
        </form>
    </div>

    <?php require_once('./vista/base/footer.php'); ?>

</body>
</html>