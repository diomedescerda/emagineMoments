<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laberinto Musical</title>
    <link href="./vista/styles/laberinto.css" rel="stylesheet">
</head>

<body>
    <?php
    session_start();
    require_once('base/header.php'); ?>
    <div class="options">
        <label for="dificultad">Elegir dificultad</label>

        <select name="dificultad" id="dificultad">
            <option value="facil">Facil</option>
            <option value="medio" selected>Medio</option>
            <option value="difícil">Dificil</option>
            <option value="extremo">Extremo</option>
        </select>
        <button class="button" id="generateMaze">Generar Nuevo Laberinto</button>
    </div>
    <div id="maze"></div>
    <?php require_once('base/footer.php'); ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./vista/js/maze.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>