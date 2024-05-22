<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Project</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>

<body>
    <h3>CRUD Project</h3>
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
                    <input type="submit" value="Crear proyecto">
                </form>
            </td>
        </tr>
    </table>
    <table>
        <thead>
            <tr>
                <th>NOMBRE</th>
                <th>DESCRIPCION</th>
                <th>ESTADO</th>
                <th>PROGRESO</th>
                <th>FECHA DE INICIO</th>
                <th>FECHA DE FIN</th>
                <th>Presupuesto</th>
                <th>ELIMINAR</th>
                <th>ACTUALIZAR</th>
            </tr>
        </thead>
        <tbody>
            <?php
            session_start();
            include_once '../model/Project.php';
            //verificamos si existe en sesion el listado de productos:
            if (isset($_SESSION['listado'])) {
                $listado = unserialize($_SESSION['listado']);
                foreach ($listado as $prod) {
                    echo "<tr>";
                    echo "<td>" . $prod->getName() . "</td>";
                    echo "<td>" . $prod->getDescription() . "</td>";
                    echo "<td>" . $prod->getStatus() . "</td>";
                    echo "<td>" . $prod->getProgress() . "</td>";
                    echo "<td>" . $prod->getStartDate() . "</td>";
                    echo "<td>" . $prod->getEndDate() . "</td>";
                    echo "<td>" . $prod->getBudget() . "</td>";
                    //opciones para invocar al controlador indicando la opcion eliminar o cargar
                    //y la fila que selecciono el usuario (con el codigo del producto):
                    echo "<td><a href='../controller/controller.php?opcion=eliminar&name=" . $prod->getName() .
                        "'>eliminar</a></td>";
                    echo "<td><a href='../controller/controller.php?opcion=cargar&name=" . $prod->getName() .
                        "'>actualizar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan=6>No se han cargado datos.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>