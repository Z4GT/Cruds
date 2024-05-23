<?php
///////////////////////////////////////////////////////////////////////
// Componente controller que verifica la opción seleccionada
// por el usuario, ejecuta el modelo y enruta la navegación de páginas.
///////////////////////////////////////////////////////////////////////
require_once '../model/StudentModel.php';
session_start();
$studentModel = new StudentModel();
$opcion = $_REQUEST['opcion'];

switch ($opcion) {
    case "listar":
        // obtenemos la lista de estudiantes:
        $listado = $studentModel->getStudents();
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
        $last_name = $_REQUEST['last_name'];
        $course = $_REQUEST['course'];
        $hours = $_REQUEST['hours'];

        // creamos un nuevo estudiante:
        $studentModel->crearStudent($id, $name, $last_name, $course, $hours);
        // actualizamos la lista de estudiantes para guardar en sesión:
        $listado = $studentModel->getStudents();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;

    case "eliminar":
        // obtenemos el código del estudiante a eliminar:
        $id = $_REQUEST['id'];
        // eliminamos el estudiante:
        $studentModel->eliminarStudent($id);
        // actualizamos la lista de estudiantes para guardar en sesión:
        $listado = $studentModel->getStudents();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;

    case "cargar":
        // obtenemos los datos completos del estudiante:
        $id = $_REQUEST['id'];
        $student = $studentModel->getStudent($id);
        // guardamos en sesión el estudiante para visualizarlo en el formulario:
        $_SESSION['student'] = serialize($student);
        header('Location: ../view/actualizar.php');
        break;

    case "actualizar":
        // obtenemos los datos modificados por el usuario:
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $last_name = $_REQUEST['last_name'];
        $course = $_REQUEST['course'];
        $hours = $_REQUEST['hours'];

        // actualizamos los datos del estudiante:
        $studentModel->actualizarStudent($id, $name, $last_name, $course, $hours);
        // actualizamos la lista de estudiantes para guardar en sesión:
        $listado = $studentModel->getStudents();
        $_SESSION['listado'] = serialize($listado);
        header('Location: ../view/index.php');
        break;

    default:
        // si no existe la opción recibida por el controlador, siempre
        // redirigimos la navegación a la página index:
        header('Location: ../view/index.php');
}
