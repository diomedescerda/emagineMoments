<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista Usuarios</title>
    <link href="./vista/styles/lista.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">
</head>

<body>
    <?php require_once('./vista/base/header.php'); ?>

    <div class="info">
        <h1>Lista de Usuarios</h1>
        <a href="index.php?action=crearUsuario" class="button">Crear Usuario</a>
    </div>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Otros Nombres</th>
                <th>Primer Apellido</th>
                <th>Otros Apellidos</th>
                <th>Email</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Rol</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?= $usuario['IdUsuario'] ?></td>
                    <td><?= $usuario['PrimerNombre'] ?></td>
                    <td><?= $usuario['OtrosNombres'] ?></td>
                    <td><?= $usuario['PrimerApellido'] ?></td>
                    <td><?= $usuario['OtrosApellidos'] ?></td>
                    <td><?= $usuario['Email'] ?></td>
                    <td><?= $usuario['Direccion'] ?></td>
                    <td><?= $usuario['Telefono'] ?></td>
                    <td><?= $usuario['Nombre'] ?></td>
                    <td>
                        <a href="index.php?action=editarUsuario&id=<?= $usuario['IdUsuario'] ?>">Editar</a>
                        <a href="index.php?action=eliminarUsuario&id=<?= $usuario['IdUsuario'] ?>&IdRol=<?= $usuario['IdRol'] ?>"
                            onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php require_once('./vista/base/footer.php'); ?>
</body>