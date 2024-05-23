<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear operación</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>

<body>
    <h3>Crear nueva operación</h3>
    <form action="../controller/controller.php">
        <input type="hidden" value="guardar" name="opcion">
        <label>ID:</label>
        <input type="text" name="id" required>
        <label>ID Proyecto:</label>
        <input type="text" name="project_id">
        <label>ID Item:</label>
        <input type="text" name="item_id">
        <label>Operación:</label>
        <input type="text" name="operation">
        <label>Cantidad:</label>
        <input type="number" name="quantity"><br>
        <input type="submit" value="Crear">
    </form>
</body>

</html>