<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar registro en Kardex</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>

<body>
    <h3>Actualizar registro en Kardex</h3>
    <?php
    include_once '../model/Kardex.php';
    // obtenemos los datos de sesión:
    session_start();
    if (isset($_SESSION['kardex'])) {
        $kardex = unserialize($_SESSION['kardex']);
    } else {
        echo "No se han encontrado datos del registro en el Kardex.";
        exit;
    }
    ?>
    <form action="../controller/controller.php">
        <input type="hidden" value="actualizar" name="opcion">
        <!-- Utilizamos pequeños scripts PHP para obtener los valores del registro en el Kardex: -->
        <input type="hidden" value="<?php echo $kardex->getId(); ?>" name="id">
        <label>ID:</label>
        <b><?php echo $kardex->getId(); ?></b>
        <label>Nombre:</label>
        <input type="text" name="name" value="<?php echo $kardex->getName(); ?>">
        <label>Descripción:</label>
        <input type="text" name="description" value="<?php echo $kardex->getDescription(); ?>">
        <label>Fecha:</label>
        <input type="datetime-local" name="date" value="<?php echo $kardex->getDate(); ?>">
        <label>Tipo de Movimiento:</label>
        <input type="text" name="movement_type" value="<?php echo $kardex->getMovement_type(); ?>">
        <label>Cantidad:</label>
        <input type="number" name="quantity" value="<?php echo $kardex->getQuantity(); ?>">
        <label>Valor Unitario:</label>
        <input type="number" step="0.01" name="unit_value" value="<?php echo $kardex->getUnit_value(); ?>">
        <label>Balance:</label>
        <input type="number" name="balance" value="<?php echo $kardex->getBalance(); ?>">
        <label>ID del Ítem:</label>
        <input type="text" name="item_id" value="<?php echo $kardex->getItem_id(); ?>"><br>
        <input type="submit" value="Actualizar">
    </form>
</body>

</html>