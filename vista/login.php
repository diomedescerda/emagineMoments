<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="./vista/styles/styles.css">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="icon" href="./vista/img/favicon.png" type="image/png" sizes="64x64">
</head>

<body>
    <div class="login-container">
        <a href="index.php"><img src="./vista/img/logo.png" class="logo" alt="Logo"></a>
        <h2>Iniciar Sesión</h2>

        <form id="miForm" method="POST" action="index.php?action=iniciarSesion" data-ajax="true">
            <label for="email">Correo</label>
            <input type="email" id="email" name="email" placeholder="example@gmail.com" required>
            <span id="emailError" class="error-message"></span>

            <label for="password">Contraseña</label>
            <div class="password-container">
                <input type="password" id="contrasena" name="contrasena" placeholder="********" required>
                <button type="button" id="togglePassword">Mostrar</button>
            </div>
            <span id="passwordError" class="error-message"></span>

            <button id="btnSubmit" class="submit-button" type="submit">Entrar</button>

            <div class="social-login">
                <p>O ingresar con:</p>
                <button type="button" id="loginGoogle" class="google-btn">Iniciar sesión con Google</button>
                <button type="button" id="loginFacebook" class="facebook-btn">Iniciar sesión con Facebook</button>
            </div>
        </form>
        <p class="signup-text">¿No tienes cuenta? <a href="?action=mostrarRegistro">Regístrate aquí</a></p>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>
    <script src="./vista/js/login.js"></script>
</body>

</html>