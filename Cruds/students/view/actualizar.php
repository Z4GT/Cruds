<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar estudiante</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>

<body>
    <h3>Actualizar estudiante</h3>
    <?php
    include_once '../model/Student.php';
    // obtenemos los datos de sesión:
    session_start();
    if (isset($_SESSION['student'])) {
        $student = unserialize($_SESSION['student']);
    } else {
        echo "No se han encontrado datos del estudiante.";
        exit;
    }
    ?>
    <form action="../controller/controller.php">
        <input type="hidden" value="actualizar" name="opcion">
        <!-- Utilizamos pequeños scripts PHP para obtener los valores del estudiante: -->
        <input type="hidden" value="<?php echo $student->getId(); ?>" name="id">
        <label>ID:</label>
        <b><?php echo $student->getId(); ?></b>
        <label>Nombre:</label>
        <input type="text" name="name" required value="<?php echo $student->getName(); ?>">
        <label>Apellido:</label>
        <input type="text" name="last_name" required value="<?php echo $student->getLast_name(); ?>">
        <label>Curso:</label>
        <input type="text" name="course" required value="<?php echo $student->getCourse(); ?>">
        <label>Horas:</label>
        <input type="number" min="1" name="hours" value="<?php echo $student->getHours(); ?>"><br>

        <input type="submit" value="Actualizar">
    </form>
</body>

</html>