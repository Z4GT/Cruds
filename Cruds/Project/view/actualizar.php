<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar project</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>

<body>
    <h3>Actualizar Periodo</h3>
    <?php
    include_once '../model/Project.php';
    //obtenemos los datos de sesion:
    session_start();
    $project = $_SESSION['project'];
    ?>
    <form action="../controller/controller.php">
        <input type="hidden" value="actualizar" name="opcion">
        <!-- Utilizamos pequeños scripts PHP para obtener los valores del project: -->
        <input type="hidden" value="<?php echo $project->getName(); ?>" name="name">
        <label for="description">Descripcion:</label>
        <input type="text" name="description" value="<?php echo $project->getDescription(); ?>" required>
        <label for="status">Estado:</label>
        <input type="text" name="status" value="<?php echo $project->getStatus(); ?>" required>
        <label for="progress">Progreso:</label>
        <input type="text" name="progress" value="<?php echo $project->getProgress(); ?>" required>
        <label for="start_date">Fecha de inicio:</label>
        <input type="date" name="start_date" value="<?php echo $project->getStartDate(); ?>" required>
        <label for="end_date">Fecha de fin:</label>
        <input type="date" name="end_date" value="<?php echo $project->getEndDate(); ?>" required>
        <label for="budget">Presupuesto:</label>
        <input type="number" name="budget" value="<?php echo $project->getBudget(); ?>" required>
        <input type="submit" value="Actualizar">
    </form>
</body>

</html>