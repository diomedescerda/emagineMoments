<html>

<head>
    <link href="./vista/styles/editar.css" rel="stylesheet">
</head>

<body>
    <h1>Editar Servicio</h1>

    <form method="POST" action="index.php?action=actualizarServicio&id=<?php echo $servicio['IdServicio'];?>">

        <label for="IdTipoServicio">Tipo de Servicio:</label>
        <select name="IdTipoServicio" id="serviceTypeSelect" required>
            <option value=1 <?= $servicio['IdTipoServicio'] == 1 ? 'selected' : '' ?>>Música y Entretenimiento</option>
            <option value=2 <?= $servicio['IdTipoServicio'] == 2 ? 'selected' : '' ?>>Gastronomía y Bebidas</option>
            <option value=3 <?= $servicio['IdTipoServicio'] == 3 ? 'selected' : '' ?>>Espectáculo y Animación</option>
            <option value=4 <?= $servicio['IdTipoServicio'] == 4 ? 'selected' : '' ?>>Decoración y Ambientación</option>
            <option value=5 <?= $servicio['IdTipoServicio'] == 5 ? 'selected' : '' ?>>Logística y Mobiliario</option>
        </select><br>

        <label for="Costo">Costo:</label>
        <input type="number" name="Costo" value="<?= $servicio['Costo'] ?>">

        <label for="Descripcion">Descrición:</label>
        <input type="text" name="Descripcion" value="<?= $servicio['Descripcion'] ?>" required>

        <button type="submit">Actualizar</button>
    </form>
</body>

</html>