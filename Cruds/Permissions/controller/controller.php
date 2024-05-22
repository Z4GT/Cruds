<?php
///////////////////////////////////////////////////////////////////////
//Componente controller que verifica la opcion seleccionada
//por el usuario, ejecuta el modelo y enruta la navegacion de paginas.
///////////////////////////////////////////////////////////////////////
require_once '../model/PermissionsModel.php';
session_start();
$permissionsModel = new PermissionsModel();
$opcion = $_REQUEST['opcion'];
switch ($opcion) {
    case "listar":
        //obtenemos la lista de productos:
        $listado = $permissionsModel->getPermissions();
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

        //creamos un nuevo producto:
        $permissionsModel->createpermission($name, $description);

        //actualizamos la lista de productos para grabar en sesion:
        $listado = $permissionsModel->getPermissions();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;
    case "eliminar":
        //obtenemos el name del producto a eliminar:
        $name = $_REQUEST['name'];
        //eliminamos el producto:
        $permissionsModel->deletepermission($name);
        //actualizamos la lista de productos para grabar en sesion:
        $listado = $permissionsModel->getPermissions();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;
    case "cargar":
        //para permitirle actualizar un producto al usuario primero
        //obtenemos los datos completos de ese producto:
        $name = $_REQUEST['name'];
        $permission = $permissionsModel->getpermission($name);
        //guardamos en sesion el producto para posteriormente visualizarlo
        //en un formulario para permitirle al usuario editar los valores:
        $_SESSION['permission'] = $permission;
        header('Location: ../view/actualizar.php');
        break;
    case "actualizar":
        //obtenemos los datos modificados por el usuario:
        $name = $_REQUEST['name'];
        $description = $_REQUEST['description'];
        //actualizamos los datos del producto:
        $permissionsModel->updatepermission($name, $description);
        //actualizamos la lista de productos para grabar en sesion:
        $listado = $permissionsModel->getPermissions();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;
    default:
        //si no existe la opcion recibida por el controlador, siempre
        //redirigimos la navegacion a la pagina index:
        header('Location: ../view/index.php');
}
