<?php
///////////////////////////////////////////////////////////////////////
//Componente controller que verifica la opcion seleccionada
//por el usuario, ejecuta el modelo y enruta la navegacion de paginas.
///////////////////////////////////////////////////////////////////////
require_once '../model/ProjectModel.php';
session_start();
$projectModel = new ProjectModel();
$opcion = $_REQUEST['opcion'];
switch ($opcion) {
    case "listar":
        //obtenemos la lista de productos:
        $listado = $projectModel->getProjects();
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
        $description = $_REQUEST['description'];
        $status = $_REQUEST['status'];
        $progress = $_REQUEST['progress'];
        $start_date = $_REQUEST['start_date'];
        $end_date = $_REQUEST['end_date'];
        $budget = $_REQUEST['budget'];

        //creamos un nuevo producto:
        $projectModel->createProject($name, $description, $status, $progress, $start_date, $end_date, $budget);

        //actualizamos la lista de productos para grabar en sesion:
        $listado = $projectModel->getProjects();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;
    case "eliminar":
        //obtenemos el name del producto a eliminar:
        $name = $_REQUEST['name'];
        //eliminamos el producto:
        $projectModel->deleteProject($name);
        //actualizamos la lista de productos para grabar en sesion:
        $listado = $projectModel->getProjects();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;
    case "cargar":
        //para permitirle actualizar un producto al usuario primero
        //obtenemos los datos completos de ese producto:
        $name = $_REQUEST['name'];
        $project = $projectModel->getProject($name);
        //guardamos en sesion el producto para posteriormente visualizarlo
        //en un formulario para permitirle al usuario editar los valores:
        $_SESSION['project'] = $project;
        header('Location: ../view/actualizar.php');
        break;
    case "actualizar":
        //obtenemos los datos modificados por el usuario:
        $name = $_REQUEST['name'];
        $description = $_REQUEST['description'];
        $status = $_REQUEST['status'];
        $progress = $_REQUEST['progress'];
        $start_date = $_REQUEST['start_date'];
        $end_date = $_REQUEST['end_date'];
        $budget = $_REQUEST['budget'];
        //actualizamos los datos del producto:
        $projectModel->updateProject($name, $description, $status, $progress, $start_date, $end_date, $budget);
        //actualizamos la lista de productos para grabar en sesion:
        $listado = $projectModel->getProjects();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;
    default:
        //si no existe la opcion recibida por el controlador, siempre
        //redirigimos la navegacion a la pagina index:
        header('Location: ../view/index.php');
}
