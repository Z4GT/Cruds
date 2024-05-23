<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operaciones</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>

<body>
    <h3>CRUD Operaciones</h3>
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
                    <input type="submit" value="Crear operación">
                </form>
            </td>
        </tr>
    </table>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Proyecto</th>
                <th>ID Item</th>
                <th>Operación</th>
                <th>Cantidad</th>
                <th>ELIMINAR</th>
                <th>ACTUALIZAR</th>
            </tr>
        </thead>
        <tbody>
            <?php
            session_start();
            include_once '../model/Operation.php';

            // verificamos si existe en sesion el listado de operaciones:
            if (isset($_SESSION['listado'])) {
                $listado = unserialize($_SESSION['listado']);
                foreach ($listado as $op) {
                    echo "<tr>";
                    echo "<td>" . $op->getId() . "</td>";
                    echo "<td>" . $op->getProject_id() . "</td>";
                    echo "<td>" . $op->getIntem_id() . "</td>";
                    echo "<td>" . $op->getOperation() . "</td>";
                    echo "<td>" . $op->getQuantity() . "</td>";
                    // opciones para invocar al controlador indicando la opcion eliminar o cargar
                    // y la fila que selecciono el usuario (con el codigo de la operación):
                    echo "<td><a href='../controller/controller.php?opcion=eliminar&id=" . $op->getId() . "'>eliminar</a></td>";
                    echo "<td><a href='../controller/controller.php?opcion=cargar&id=" . $op->getId() . "'>actualizar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No se han cargado datos.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>