<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar permission</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>

<body>
    <h3>Actualizar permiso</h3>
    <?php
    include_once '../model/Permissions.php';
    //obtenemos los datos de sesion:
    session_start();
    $permission = $_SESSION['permission'];
    ?>
    <form action="../controller/controller.php">
        <input type="hidden" value="actualizar" name="opcion">
        <!-- Utilizamos pequeños scripts PHP para obtener los valores del permission: -->
        <input type="hidden" value="<?php echo $permission->getName(); ?>" name="name">
        <label for="name">Nombre:</label>
        <input type="text" name="name" disabled value="<?php echo $permission->getName(); ?>">
        <label for="description">Descripcion:</label>
        <input type="text" name="description" value="<?php echo $permission->getDescription(); ?>">
        <input type="submit" value="Actualizar">
    </form>
</body>

</html>