<html>

<head>
    <link href="./vista/styles/editar.css" rel="stylesheet">
</head>

<body>
    <h1>Editar Servicio</h1>

    <form method="POST" action="index.php?action=actualizarServicio&id=<?php echo $servicio['IdServicio']; ?>">

        <label for="IdTipoServicio">Tipo de Servicio:</label>
        <select name="IdTipoServicio" id="serviceTypeSelect" required>
            <?php foreach ($tipoServicios as $tipoServicio): ?>
                <option value="<?= $tipoServicio['IdTipoServicio'] ?>"
                    <?= $servicio['IdTipoServicio'] == $tipoServicio['IdTipoServicio'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($tipoServicio['Nombre']) ?>
                </option>
            <?php endforeach; ?>
        </select><br>

        <label for="Costo">Costo:</label>
        <input type="number" name="Costo" value="<?= $servicio['Costo'] ?>">

        <label for="Descripcion">Descrición:</label>
        <input type="text" name="Descripcion" value="<?= $servicio['Descripcion'] ?>" required>

        <button type="submit">Actualizar</button>
    </form>
</body>

</html>