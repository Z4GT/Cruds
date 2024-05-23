<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear registro en Kardex</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>

<body>
    <h3>Crear nuevo registro en Kardex</h3>
    <form action="../controller/controller.php">
        <input type="hidden" value="guardar" name="opcion">
        <label>ID:</label>
        <input type="text" name="id" required>
        <label>Nombre:</label>
        <input type="text" name="name">
        <label>Descripción:</label>
        <input type="text" name="description">
        <label>Fecha:</label>
        <input type="datetime-local" name="date">
        <label>Tipo de Movimiento:</label>
        <input type="text" name="movement_type">
        <label>Cantidad:</label>
        <input type="number" name="quantity">
        <label>Valor Unitario:</label>
        <input type="number" step="0.01" name="unit_value">
        <label>Balance:</label>
        <input type="number" name="balance">
        <label>ID del Ítem:</label>
        <input type="text" name="item_id"><br>
        <input type="submit" value="Crear">
    </form>
</body>

</html>