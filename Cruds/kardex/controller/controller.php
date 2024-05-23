<?php
///////////////////////////////////////////////////////////////////////
// Componente controller que verifica la opción seleccionada
// por el usuario, ejecuta el modelo y enruta la navegación de páginas.
///////////////////////////////////////////////////////////////////////
require_once '../model/KardexModel.php';
session_start();
$kardexModel = new KardexModel();
$opcion = $_REQUEST['opcion'];

switch ($opcion) {
    case "listar":
        // obtenemos la lista de kardex:
        $listado = $kardexModel->getKardexes();
        // y los guardamos en sesión:
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;

    case "crear":
        // navegamos a la página de creación:
        header('Location: ../view/crear.php');
        break;

    case "guardar":
        // obtenemos los valores ingresados por el usuario en el formulario:
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $description = $_REQUEST['description'];
        $date = $_REQUEST['date'];
        $movement_type = $_REQUEST['movement_type'];
        $quantity = $_REQUEST['quantity'];
        $unit_value = $_REQUEST['unit_value'];
        $balance = $_REQUEST['balance'];
        $item_id = $_REQUEST['item_id'];

        // creamos un nuevo registro en el kardex:
        $kardexModel->crearKardex($id, $name, $description, $date, $movement_type, $quantity, $unit_value, $balance, $item_id);
        // actualizamos la lista de kardexes para guardar en sesión:
        $listado = $kardexModel->getKardexes();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;

    case "eliminar":
        // obtenemos el código del registro del kardex a eliminar:
        $id = $_REQUEST['id'];
        // eliminamos el registro del kardex:
        $kardexModel->eliminarKardex($id);
        // actualizamos la lista de kardexes para guardar en sesión:
        $listado = $kardexModel->getKardexes();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;

    case "cargar":
        // obtenemos los datos completos del registro del kardex:
        $id = $_REQUEST['id'];
        $kardex = $kardexModel->getKardex($id);
        // guardamos en sesión el registro del kardex para visualizarlo en el formulario:
        $_SESSION['kardex'] = serialize($kardex);
        header('Location: ../view/actualizar.php');
        break;

    case "actualizar":
        // obtenemos los datos modificados por el usuario:
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $description = $_REQUEST['description'];
        $date = $_REQUEST['date'];
        $movement_type = $_REQUEST['movement_type'];
        $quantity = $_REQUEST['quantity'];
        $unit_value = $_REQUEST['unit_value'];
        $balance = $_REQUEST['balance'];
        $item_id = $_REQUEST['item_id'];

        // actualizamos los datos del registro del kardex:
        $kardexModel->actualizarKardex($id, $name, $description, $date, $movement_type, $quantity, $unit_value, $balance, $item_id);
        // actualizamos la lista de kardexes para guardar en sesión:
        $listado = $kardexModel->getKardexes();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;

    default:
        // si no existe la opción recibida por el controlador, siempre
        // redirigimos la navegación a la página index:
        header('Location: ../view/index.php');
}
