<html>
<head>
    <link href="./vista/styles/editar.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <h1>Editar Usuario</h1>

    <form id="editUserForm" onsubmit="event.preventDefault(); ajaxActualizarUsuario();">
        <label for="PrimerNombre">Primer Nombre:</label>
        <input type="text" id="PrimerNombre" name="PrimerNombre" value="<?= $usuario['PrimerNombre'] ?>" required>

        <label for="OtrosNombres">Otros Nombres:</label>
        <input type="text" id="OtrosNombres" name="OtrosNombres" value="<?= $usuario['OtrosNombres'] ?>">

        <label for="PrimerApellido">Primer Apellido:</label>
        <input type="text" id="PrimerApellido" name="PrimerApellido" value="<?= $usuario['PrimerApellido'] ?>" required>

        <label for="OtrosApellidos">Otros Apellidos:</label>
        <input type="text" id="OtrosApellidos" name="OtrosApellidos" value="<?= $usuario['OtrosApellidos'] ?>">

        <label for="Email">Correo:</label>
        <input type="email" id="Email" name="Email" value="<?= $usuario['Email'] ?>" required>

        <label for="Direccion">Dirección:</label>
        <input type="text" id="Direccion" name="Direccion" value="<?= $usuario['Direccion'] ?>" required>

        <label for="Telefono">Teléfono:</label>
        <input type="text" id="Telefono" name="Telefono" value="<?= $usuario['Telefono'] ?>" required>

        <label for="IdRol">Rol:</label>
        <select name="IdRol" id="roleSelect" required>
            <?php
            foreach ($roles as $rol) {
                if ($rol['IdRol'] == 1 && $_SESSION['usuario']['IdRol'] !== 1) {
                    continue;
                }
                $selected = ($usuario['IdRol'] == $rol['IdRol']) ? 'selected' : '';
                echo "<option value='{$rol['IdRol']}' $selected>" . htmlspecialchars($rol['Nombre']) . "</option>";
            }
            ?>
        </select>

        <div id="additionalSelects" style="display: none;">
            <select name="IdTipoPrestador" id="tipoPrestadorSelect">
                <?php foreach ($tipoPrestadores as $tipoPrestador): ?>
                    <option value="<?= $tipoPrestador['IdTipoPrestador'] ?>">
                        <?= htmlspecialchars($tipoPrestador['Nombre']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <button type="submit">Actualizar</button>
    </form>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>
    <script src="./vista/js/editar.js"></script>
</body>
</html>