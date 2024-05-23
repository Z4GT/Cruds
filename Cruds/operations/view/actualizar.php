<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar operación</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>

<body>
    <h3>Actualizar operación</h3>
    <?php
    include_once '../model/Operation.php';
    // obtenemos los datos de sesión:
    session_start();
    if (isset($_SESSION['operation'])) {
        $operation = unserialize($_SESSION['operation']);
    } else {
        echo "No se han encontrado datos de la operación.";
        exit;
    }
    ?>
    <form action="../controller/controller.php">
        <input type="hidden" value="actualizar" name="opcion">
        <!-- Utilizamos pequeños scripts PHP para obtener los valores de la operación: -->
        <input type="hidden" value="<?php echo $operation->getId(); ?>" name="id">
        <label>ID:</label>
        <b><?php echo $operation->getId(); ?></b>
        <label>ID Proyecto:</label>
        <input type="text" name="project_id" value="<?php echo $operation->getProject_id(); ?>">
        <label>ID Item:</label>
        <input type="text" name="item_id" value="<?php echo $operation->getIntem_id(); ?>">
        <label>Operación:</label>
        <input type="text" name="operation" value="<?php echo $operation->getOperation(); ?>">
        <label>Cantidad:</label>
        <input type="number" name="quantity" value="<?php echo $operation->getQuantity(); ?>"><br>
        <input type="submit" value="Actualizar">
    </form>
</body>

</html>