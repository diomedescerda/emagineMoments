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
    <select name="IdRol" required>
        <option value="1">Administrador</option>
        <option value="2">Cliente</option>
        <option value="3">Prestador</option>
    </select><br>

    <button type="submit">Crear</button>
</form>