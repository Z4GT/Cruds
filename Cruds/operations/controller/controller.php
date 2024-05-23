<?php
///////////////////////////////////////////////////////////////////////
// Componente controller que verifica la opción seleccionada
// por el usuario, ejecuta el modelo y enruta la navegación de páginas.
///////////////////////////////////////////////////////////////////////
require_once '../model/OperationModel.php';
session_start();
$operationModel = new OperationModel();
$opcion = $_REQUEST['opcion'];

switch ($opcion) {
    case "listar":
        // obtenemos la lista de operaciones:
        $listado = $operationModel->getOperations();
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
        $project_id = $_REQUEST['project_id'];
        $item_id = $_REQUEST['item_id'];
        $operation = $_REQUEST['operation'];
        $quantity = $_REQUEST['quantity'];

        // creamos una nueva operación:
        $operationModel->crearOperation($id, $project_id, $item_id, $operation, $quantity);
        // actualizamos la lista de operaciones para guardar en sesión:
        $listado = $operationModel->getOperations();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;

    case "eliminar":
        // obtenemos el código de la operación a eliminar:
        $id = $_REQUEST['id'];
        // eliminamos la operación:
        $operationModel->eliminarOperation($id);
        // actualizamos la lista de operaciones para guardar en sesión:
        $listado = $operationModel->getOperations();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;

    case "cargar":
        // obtenemos los datos completos de la operación:
        $id = $_REQUEST['id'];
        $operation = $operationModel->getOperation($id);
        // guardamos en sesión la operación para visualizarla en el formulario:
        $_SESSION['operation'] = serialize($operation);
        header('Location: ../view/actualizar.php');
        break;

    case "actualizar":
        // obtenemos los datos modificados por el usuario:
        $id = $_REQUEST['id'];
        $project_id = $_REQUEST['project_id'];
        $item_id = $_REQUEST['item_id'];
        $operation = $_REQUEST['operation'];
        $quantity = $_REQUEST['quantity'];

        // actualizamos los datos de la operación:
        $operationModel->actualizarOperation($id, $project_id, $item_id, $operation, $quantity);
        // actualizamos la lista de operaciones para guardar en sesión:
        $listado = $operationModel->getOperations();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;

    default:
        // si no existe la opción recibida por el controlador, siempre
        // redirigimos la navegación a la página index:
        header('Location: ../view/index.php');
}
