<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="./vista/styles/registro.css">
    <link rel="icon" href="./vista/img/favicon.png" type="image/png" sizes="64x64">
</head>
<body>
    <?php require_once('./vista/base/header.php'); ?>
    <div class="container">
        <h1>Registro de Usuario</h1>
        
        <form id="registerForm" method="POST" action="index.php?action=registrarUsuario">
            <div class="form-grid">
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
                        <button type="button" id="togglePassword" class="button">Mostrar</button>
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
                    <label for="roleSelect">Rol</label>
                    <select name="IdRol" id="roleSelect" required>
                        <?php foreach ($roles as $rol): ?>
                            <option value="<?= $rol['IdRol'] ?>"><?= htmlspecialchars($rol['Nombre']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div id="additionalSelects" style="display: none;">
                    <label for="tipoPrestadorSelect">Tipo de Prestador</label>
                    <select name="IdTipoPrestador" id="tipoPrestadorSelect" required>
                        <?php foreach ($tipoPrestadores as $tipoPrestador): ?>
                            <option value="<?= $tipoPrestador['IdTipoPrestador'] ?>">
                                <?= htmlspecialchars($tipoPrestador['Nombre']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="button-group">
                    <button class="btnSubmit" type="submit">Registrarse</button>
                </div>
            </div>
        </form>
        
        <p class="login-text">¿Ya tienes cuenta? <a href="login.html">Iniciar sesión aquí</a></p>
    </div>

    <script>
        document.getElementById('roleSelect').addEventListener('change', function () {
            const additionalSelects = document.getElementById('additionalSelects');
            additionalSelects.style.display = this.value === '3' ? 'block' : 'none';
        });

        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                this.textContent = 'Ocultar';
            } else {
                passwordInput.type = 'password';
                this.textContent = 'Mostrar';
            }
        });
    </script>
    <?php require_once('./vista/base/footer.php'); ?>
</body>
</html>