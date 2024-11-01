<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="./vista/styles/register.css">
    <link rel="icon" href="./vista/img/favicon.png" type="image/png" sizes="64x64">
</head>
<body>
    <div class="register-container">
        <img src="./vista/img/logo.png" class="logo" alt="Logo">
        <h2>Registro de Usuario</h2>
        <form id="registerForm" method="POST" action="index.php?action=registrar">
            <div class="form-group">
                <label for="primerNombre">Primer Nombre</label>
                <input type="text" id="primerNombre" name="primerNombre" required>
            </div>

            <div class="form-group">
                <label for="otrosNombres">Otros Nombres</label>
                <input type="text" id="otrosNombres" name="otrosNombres">
            </div>

            <div class="form-group">
                <label for="primerApellido">Primer Apellido</label>
                <input type="text" id="primerApellido" name="primerApellido" required>
            </div>

            <div class="form-group">
                <label for="otrosApellidos">Otros Apellidos</label>
                <input type="text" id="otrosApellidos" name="otrosApellidos">
            </div>

            <div class="form-group">
                <label for="email">Correo</label>
                <input type="email" id="email" name="email" placeholder="example@gmail.com" required>
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <div class="password-container">
                    <input type="password" id="password" name="contrasena" placeholder="********" required>
                    <button type="button" id="togglePassword">Mostrar</button>
                </div>
            </div>

            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" id="direccion" name="direccion" required>
            </div>

            <div class="form-group">
                <label for="telefono">Teléfono</label>
                <input type="text" id="telefono" name="telefono" placeholder="1234567890" pattern="\d{10}" required>
            </div>

            <div class="form-group">
                <label for="rol">Rol</label>
                <select id="rol" name="idRol" required>
                    <option value=2>Usuario</option>
                    <option value=3>Proveedor</option>
                </select>
            </div>

            <button class="submit-button" type="submit">Registrarse</button>
        </form>
        <p class="login-text">¿Ya tienes cuenta? <a href="login.html">Iniciar sesión aquí</a></p>
    </div>

    <script src="./js/script.js"></script>
</body>
</html>
