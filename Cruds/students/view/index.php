<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD estudiantes</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>

<body>
    <h3>CRUD estudiantes</h3>
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
                    <input type="submit" value="Crear estudiante">
                </form>
            </td>
        </tr>
    </table>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Curso</th>
                <th>Horas</th>
                <th>ELIMINAR</th>
                <th>ACTUALIZAR</th>
            </tr>
        </thead>
        <tbody>
            <?php
            session_start();
            include_once '../model/Student.php';

            // verificamos si existe en sesion el listado de productos:
            if (isset($_SESSION['listado'])) {
                $listado = unserialize($_SESSION['listado']);
                foreach ($listado as $stud) {
                    echo "<tr>";
                    echo "<td>" . $stud->getId() . "</td>";
                    echo "<td>" . $stud->getName() . "</td>";
                    echo "<td>" . $stud->getLast_name() . "</td>";
                    echo "<td>" . $stud->getCourse() . "</td>";
                    echo "<td>" . $stud->getHours() . "</td>";
                    // opciones para invocar al controlador indicando la opcion eliminar o cargar
                    // y la fila que selecciono el usuario (con el codigo del producto):
                    echo "<td><a href='../controller/controller.php?opcion=eliminar&id=" . $stud->getId() . "'>eliminar</a></td>";
                    echo "<td><a href='../controller/controller.php?opcion=cargar&id=" . $stud->getId() . "'>actualizar</a></td>";
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