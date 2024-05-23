<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Kardex</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>

<body>
    <h3>CRUD Kardex</h3>
    <table>
        <tr>
            <td>
                <form action="../controller/controller.php">
                    <input type="hidden" value="listar" name="opcion">
                    <input type="submit" value="Consultar listado">
                </form>
            </td>
            <td>
                <form action="../controller/controller.php">
                    <input type="hidden" value="crear" name="opcion">
                    <input type="submit" value="Crear registro">
                </form>
            </td>
        </tr>
    </table>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Fecha</th>
                <th>Tipo de Movimiento</th>
                <th>Cantidad</th>
                <th>Valor Unitario</th>
                <th>Balance</th>
                <th>ID del Ítem</th>
                <th>ELIMINAR</th>
                <th>ACTUALIZAR</th>
            </tr>
        </thead>
        <tbody>
            <?php
            session_start();
            include_once '../model/Kardex.php';

            // verificamos si existe en sesion el listado de registros del kardex:
            if (isset($_SESSION['listado'])) {
                $listado = unserialize($_SESSION['listado']);
                foreach ($listado as $kardex) {
                    echo "<tr>";
                    echo "<td>" . $kardex->getId() . "</td>";
                    echo "<td>" . $kardex->getName() . "</td>";
                    echo "<td>" . $kardex->getDescription() . "</td>";
                    echo "<td>" . $kardex->getDate() . "</td>";
                    echo "<td>" . $kardex->getMovement_type() . "</td>";
                    echo "<td>" . $kardex->getQuantity() . "</td>";
                    echo "<td>" . $kardex->getUnit_value() . "</td>";
                    echo "<td>" . $kardex->getBalance() . "</td>";
                    echo "<td>" . $kardex->getItem_id() . "</td>";
                    // opciones para invocar al controlador indicando la opcion eliminar o cargar
                    // y la fila que selecciono el usuario (con el codigo del registro del kardex):
                    echo "<td><a href='../controller/controller.php?opcion=eliminar&id=" . $kardex->getId() . "'>eliminar</a></td>";
                    echo "<td><a href='../controller/controller.php?opcion=cargar&id=" . $kardex->getId() . "'>actualizar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='11'>No se han cargado datos.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>