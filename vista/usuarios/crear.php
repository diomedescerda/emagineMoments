<h1>Crear Usuario</h1>
<form method="POST" action="index.php?action=guardar">
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
        <option value="1">Administrador</option>
        <option value="2">Cliente</option>
        <option value="3">Prestador</option>
    </select><br>

    <div id="additionalSelects" style="display: none;">
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

    <button type="submit">Crear</button>
</form>