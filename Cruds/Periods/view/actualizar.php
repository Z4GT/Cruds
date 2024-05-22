<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar period</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>

<body>
    <h3>Actualizar Periodo</h3>
    <?php
    include_once '../model/Period.php';
    //obtenemos los datos de sesion:
    session_start();
    $period = $_SESSION['period'];
    ?>
    <form action="../controller/controller.php">
        <input type="hidden" value="actualizar" name="opcion">
        <!-- Utilizamos pequeños scripts PHP para obtener los valores del period: -->
        <input type="hidden" value="<?php echo $period->getName(); ?>" name="name">
        <label>Nombre:</label>
        <b><?php echo $period->getName(); ?></b>
        <label>Anio Lectivo:</label>
        <input type="text" name="academic_year" required value="<?php echo $period->getAcademic_year(); ?>">
        <label>Fecha de Inicio:</label>
        <input type="text" name="start_date" value="<?php echo $period->getStart_date(); ?>">
        <label>Fecha de Fin:</label>
        <input type="text" name="end_date" value="<?php echo $period->getEnd_date(); ?>"><br>
        <input type="submit" value="Actualizar">
    </form>
</body>

</html>