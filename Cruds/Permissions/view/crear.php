<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear permissiono</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>

<body>
    <h3>Crear nuevo permissiono</h3>
    <form action="../controller/controller.php">
        <input type="hidden" value="guardar" name="opcion">
        <label>Nombre:</label>
        <input type="text" name="name" required>
        <label>Anio Lectivo:</label>
        <input type="text" name="academic_year" required>
        <label>Fecha de Inicio:</label>
        <input type="text" name="start_date">
        <label>Fecha de Fin:</label>
        <input type="text" name="end_date"><br>
        <input type="submit" value="Crear">
    </form>
</body>

</html>