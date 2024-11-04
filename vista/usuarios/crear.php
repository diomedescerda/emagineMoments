<h1>Crear Usuario</h1>
<form method="POST" action="index.php?action=guardarUsuario">
    <label for="PrimerNombre">Primer Nombre:</label>
    <input type="text" name="PrimerNombre" required><br>

    <label for="OtrosNombres">Otros Nombres:</label>
    <input type="text" name="OtrosNombres"><br>

    <label for="PrimerApellido">Primer Apellido:</label>
    <input type="text" name="PrimerApellido" required><br>

    <label for="OtrosApellidos">Otros Apellidos:</label>
    <input type="text" name="OtrosApellidos"><br>

    <label for="Email">Correo:</label>
    <input type="email" name="Email" required><br>

    <label for="Direccion">Dirección:</label>
    <input type="text" name="Direccion" required><br>

    <label for="Telefono">Teléfono:</label>
    <input type="text" name="Telefono" required><br>

    <label for="Contrasena">Contraseña:</label>
    <input type="password" name="Contrasena" required><br>

    <label for="IdRol">Rol:</label>
    <select name="IdRol" id="roleSelect" required>
        <?php foreach ($roles as $rol): ?>
            <option value="<?= $rol['IdRol'] ?>"><?= htmlspecialchars($rol['Nombre']) ?></option>
        <?php endforeach; ?>
    </select><br>

    <div id="additionalSelects" style="display: none;">
        <select name="IdTipoPrestador" id="tipoPrestadorSelect" required>
            <?php foreach ($tipoPrestadores as $tipoPrestador): ?>
                <option value="<?= $tipoPrestador['IdTipoPrestador'] ?>"><?= htmlspecialchars($tipoPrestador['Nombre']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <script>
        document.getElementById('roleSelect').addEventListener('change', function () {
            const additionalSelects = document.getElementById('additionalSelects');
            additionalSelects.style.display = this.value === '3' ? 'block' : 'none';
        });
    </script>

    <button type="submit">Crear</button>
</form>