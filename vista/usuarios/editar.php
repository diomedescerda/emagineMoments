<html>

<head>
    <link href="./vista/styles/editar.css" rel="stylesheet">
</head>

<body>
    <h1>Editar Usuario</h1>

    <form method="POST" action="index.php?action=actualizar<?php $selected = $usuario['IdUsuario'];
    if ($_SESSION['usuario']['IdRol'] === 1)
        echo "&id= $selected"; ?>">

        <label for="PrimerNombre">Primer Nombre:</label>
        <input type="text" name="PrimerNombre" value="<?= $usuario['PrimerNombre'] ?>" required>

        <label for="OtrosNombres">Otros Nombres:</label>
        <input type="text" name="OtrosNombres" value="<?= $usuario['OtrosNombres'] ?>">

        <label for="PrimerApellido">Primer Apellido:</label>
        <input type="text" name="PrimerApellido" value="<?= $usuario['PrimerApellido'] ?>" required>

        <label for="OtrosApellidos">Otros Apellidos:</label>
        <input type="text" name="OtrosApellidos" value="<?= $usuario['OtrosApellidos'] ?>">

        <label for="Email">Correo:</label>
        <input type="email" name="Email" value="<?= $usuario['Email'] ?>" required>

        <label for="Direccion">Dirección:</label>
        <input type="text" name="Direccion" value="<?= $usuario['Direccion'] ?>" required>

        <label for="Telefono">Teléfono:</label>
        <input type="text" name="Telefono" value="<?= $usuario['Telefono'] ?>" required>

        <label for="IdRol">Rol:</label>
        <select name="IdRol" id="roleSelect" required>
            <?php
            if ($_SESSION['usuario']['IdRol'] === 1) {
                $selected = $usuario['IdRol'] == 1 ? 'selected' : '';
                echo "<option value='1' $selected>Administrador</option>";
            }
            ?>
            <option value="2" <?= $usuario['IdRol'] == 2 ? 'selected' : '' ?>>Cliente</option>
            <option value="3" <?= $usuario['IdRol'] == 3 ? 'selected' : '' ?>>Prestador</option>
        </select>

        <div id="additionalSelects" style="display: <?= $usuario['IdRol'] == 3 ? 'block' : 'none' ?>;">
            <select name="IdTipoPrestador">
                <option value=1>Cantante Solista</option>
                <option value=2>Banda Musical</option>
                <option value=3>DJ</option>
                <option value=4>Chef</option>
                <option value=5>Comediante</option>
                <option value=6>Decorador</option>
                <option value=7>Alquiler de Mobiliario</option>
                <option value=8>Animador</option>
            </select>
        </div>

        <script>
            document.getElementById('roleSelect').addEventListener('change', function () {
                const additionalSelects = document.getElementById('additionalSelects');
                additionalSelects.style.display = this.value === '3' ? 'block' : 'none';
            });
        </script>

        <button type="submit">Actualizar</button>
    </form>
</body>

</html>