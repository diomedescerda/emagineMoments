<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="./vista/styles/registro.css">
</head>

<body>
    <?php require_once('./vista/base/header.php'); ?>
    <div class="container">
        <h1>Crear Usuario</h1>
        <form method="POST" action="index.php?action=guardarUsuario" id="createUserForm"
            onsubmit="event.preventDefault(); ajaxGuardarUsuario();">
            <div class="form-grid">
                <div class="form-group">
                    <label for="PrimerNombre">Primer Nombre:</label>
                    <input type="text" name="PrimerNombre" required>
                </div>

                <div class="form-group">
                    <label for="OtrosNombres">Otros Nombres:</label>
                    <input type="text" name="OtrosNombres">
                </div>

                <div class="form-group">
                    <label for="PrimerApellido">Primer Apellido:</label>
                    <input type="text" name="PrimerApellido" required>
                </div>

                <div class="form-group">
                    <label for="OtrosApellidos">Otros Apellidos:</label>
                    <input type="text" name="OtrosApellidos">
                </div>

                <div class="form-group">
                    <label for="Email">Correo:</label>
                    <input type="email" name="Email" required>
                </div>

                <div class="form-group">
                    <label for="Direccion">Dirección:</label>
                    <input type="text" name="Direccion" required>
                </div>

                <div class="form-group">
                    <label for="Telefono">Teléfono:</label>
                    <input type="text" name="Telefono" required>
                </div>

                <div class="form-group">
                    <label for="Contrasena">Contraseña:</label>
                    <input type="password" name="Contrasena" required>
                </div>

                <div class="form-group">
                    <label for="IdRol">Rol:</label>
                    <select name="IdRol" id="roleSelect" required>
                        <?php foreach ($roles as $rol): ?>
                            <option value="<?= $rol['IdRol'] ?>"><?= htmlspecialchars($rol['Nombre']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div id="additionalSelects" class="form-group" style="display: none;">
                    <label for="tipoPrestadorSelect">Tipo de Prestador:</label>
                    <select name="IdTipoPrestador" id="tipoPrestadorSelect" required>
                        <?php foreach ($tipoPrestadores as $tipoPrestador): ?>
                            <option value="<?= $tipoPrestador['IdTipoPrestador'] ?>">
                                <?= htmlspecialchars($tipoPrestador['Nombre']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="button-group">
                    <button type="submit" class="btnSubmit">Crear Usuario</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('roleSelect').addEventListener('change', function () {
            const additionalSelects = document.getElementById('additionalSelects');
            additionalSelects.style.display = this.value === '3' ? 'block' : 'none';
        });
    </script>
    <?php require_once('./vista/base/footer.php'); ?>
</body>

</html>