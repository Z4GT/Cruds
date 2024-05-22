<?php
///////////////////////////////////////////////////////////////////////
//Componente controller que verifica la opcion seleccionada
//por el usuario, ejecuta el modelo y enruta la navegacion de paginas.
///////////////////////////////////////////////////////////////////////
require_once '../model/PeriodModel.php';
session_start();
$periodModel = new PeriodModel();
$opcion = $_REQUEST['opcion'];
switch ($opcion) {
    case "listar":
        //obtenemos la lista de productos:
        $listado = $periodModel->getPeriods();
        //y los guardamos en sesion:
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;
    case "crear":
        //navegamos a la pagina de creacion:
        header('Location: ../view/crear.php');
        break;
    case "guardar":
        //obtenemos los valores ingresados por el usuario en el formulario:
        $name = $_REQUEST['name'];
        $academic_year = $_REQUEST['academic_year'];
        $start_date = $_REQUEST['start_date'];
        $end_date = $_REQUEST['end_date'];

        //creamos un nuevo producto:
        $periodModel->createPeriod($name, $academic_year, $start_date, $end_date);

        //actualizamos la lista de productos para grabar en sesion:
        $listado = $periodModel->getPeriods();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;
    case "eliminar":
        //obtenemos el name del producto a eliminar:
        $name = $_REQUEST['name'];
        //eliminamos el producto:
        $periodModel->deletePeriod($name);
        //actualizamos la lista de productos para grabar en sesion:
        $listado = $periodModel->getPeriods();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;
    case "cargar":
        //para permitirle actualizar un producto al usuario primero
        //obtenemos los datos completos de ese producto:
        $name = $_REQUEST['name'];
        $period = $periodModel->getPeriod($name);
        //guardamos en sesion el producto para posteriormente visualizarlo
        //en un formulario para permitirle al usuario editar los valores:
        $_SESSION['period'] = $period;
        header('Location: ../view/actualizar.php');
        break;
    case "actualizar":
        //obtenemos los datos modificados por el usuario:
        $name = $_REQUEST['name'];
        $academic_year = $_REQUEST['academic_year'];
        $start_date = $_REQUEST['start_date'];
        $end_date = $_REQUEST['end_date'];
        //actualizamos los datos del producto:
        $periodModel->updatePeriod($name, $academic_year, $start_date, $end_date);
        //actualizamos la lista de productos para grabar en sesion:
        $listado = $periodModel->getPeriods();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;
    default:
        //si no existe la opcion recibida por el controlador, siempre
        //redirigimos la navegacion a la pagina index:
        header('Location: ../view/index.php');
}
