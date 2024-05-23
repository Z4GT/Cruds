<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear estudiante</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>

<body>
    <h3>Crear nuevo estudiante</h3>
    <form action="../controller/controller.php">
        <input type="hidden" value="guardar" name="opcion">
        <label>Codigo:</label>
        <input type="text" name="id" required>
        <label>Nombre:</label>
        <input type="text" name="name" required>
        <label>Apellido:</label>
        <input type="text" name="last_name" required>
        <label>Curso:</label>
        <input type="text" name="course" required>
        <label>Horas:</label>
        <input type="number" min="1" name="hours"><br>

        <input type="submit" value="Crear">
    </form>
</body>

</html>