<h1>Crear Servicio</h1>
<form method="POST" action="index.php?action=guardarServicio">
    <label for="IdTipoServicio">Tipo de Servicio:</label>
    <select name="IdTipoServicio" id="serviceTypeSelect" required>
        <option value=1>Música y Entretenimiento</option>
        <option value=2>Gastronomía y Bebidas</option>
        <option value=3>Espectáculo y Animación</option>
        <option value=4>Decoración y Ambientación</option>
        <option value=5>Logística y Mobiliario</option>
    </select><br>

    <label for="Costo">Costo:</label>
    <input type="number" name="Costo"><br>

    <label for="Descripcion">Descripción:</label>
    <input type="text" name="Descripcion" required><br>

    <button type="submit">Crear</button>
</form>