<h1>Crear Servicio</h1>
<form method="POST" action="index.php?action=guardarServicio">
    <label for="IdTipoServicio">Tipo de Servicio:</label>
    <select name="IdTipoPrestador" id="tipoPrestadorSelect" required>
        <?php foreach ($tipoServicios as $tipoServicio): ?>
            <option value="<?= $tipoServicio['IdTipoServicio'] ?>"><?= htmlspecialchars($tipoServicio['Nombre']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="Costo">Costo:</label>
    <input type="number" name="Costo"><br>

    <label for="Descripcion">Descripción:</label>
    <input type="text" name="Descripcion" required><br>

    <button type="submit">Crear</button>
</form>