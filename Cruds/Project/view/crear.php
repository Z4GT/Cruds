<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Proyecto</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>

<body>
    <h3>Crear nuevo Proyecto</h3>
    <form action="../controller/controller.php">
        <input type="hidden" value="guardar" name="opcion">
        <label for="name">Nombre:</label>
        <input type="text" name="name" required>
        <label for="description">Descripcion:</label>
        <input type="text" name="description" required>
        <label for="status">Estado:</label>
        <input type="text" name="status" required>
        <label for="progress">Progreso:</label>
        <input type="text" name="progress" required>
        <label for="start_date">Fecha de inicio:</label>
        <input type="date" name="start_date" required>
        <label for="end_date">Fecha de fin:</label>
        <input type="date" name="end_date" required>
        <label for="budget">Presupuesto:</label>
        <input type="number" name="budget" required>
        <input type="submit" value="Crear">
    </form>
</body>

</html>