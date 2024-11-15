<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="./vista/styles/editar.css">
</head>

<body>

    <?php require_once('./vista/base/header.php'); ?>
    <div class="container">
        <h1>Editar Usuario</h1>
        <form id="editUserForm" onsubmit="event.preventDefault(); ajaxActualizarUsuario();">
            <div class="form-grid">
                <div class="form-group">
                    <label for="PrimerNombre">Primer Nombre:</label>
                    <input type="text" id="PrimerNombre" name="PrimerNombre" value="<?= $usuario['PrimerNombre'] ?>"
                        required>
                </div>

                <div class="form-group">
                    <label for="OtrosNombres">Otros Nombres:</label>
                    <input type="text" id="OtrosNombres" name="OtrosNombres" value="<?= $usuario['OtrosNombres'] ?>">
                </div>

                <div class="form-group">
                    <label for="PrimerApellido">Primer Apellido:</label>
                    <input type="text" id="PrimerApellido" name="PrimerApellido"
                        value="<?= $usuario['PrimerApellido'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="OtrosApellidos">Otros Apellidos:</label>
                    <input type="text" id="OtrosApellidos" name="OtrosApellidos"
                        value="<?= $usuario['OtrosApellidos'] ?>">
                </div>

                <div class="form-group">
                    <label for="Email">Correo:</label>
                    <input type="email" id="Email" name="Email" value="<?= $usuario['Email'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="Telefono">Teléfono:</label>
                    <input type="text" id="Telefono" name="Telefono" value="<?= $usuario['Telefono'] ?>" required>
                </div>

                <div class="form-group">
                    <label for="Direccion">Dirección:</label>
                    <input type="text" id="Direccion" name="Direccion" value="<?= $usuario['Direccion'] ?>" required>
                </div>

                <div class="form-group">
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
                </div>

                <div id="additionalSelects" class="form-group" style="display: none;">
                    <label for="tipoPrestadorSelect">Tipo de Prestador:</label>
                    <select name="IdTipoPrestador" id="tipoPrestadorSelect">
                        <?php foreach ($tipoPrestadores as $tipoPrestador): ?>
                            <option value="<?= $tipoPrestador['IdTipoPrestador'] ?>">
                                <?= htmlspecialchars($tipoPrestador['Nombre']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="button-group">
                    <button type="submit" class="button">Actualizar</button>
                </div>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./vista/js/editar.js"></script>
    <?php require_once('./vista/base/footer.php'); ?>
</body>

</html>