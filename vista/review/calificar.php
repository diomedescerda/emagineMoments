<h1>Reseñar Servicio</h1>
<form method="POST" action="index.php?action=guardarReview&idContrato=<?=$idContrato ?>">

    <label for="Comentario">Comentario:</label>
    <input type="text" name="Comentario" required><br>

    <label for="Calificacion">Calificación:</label>
    <input type="number" name="Calificacion"><br>

    <button type="submit">Enviar</button>
</form>