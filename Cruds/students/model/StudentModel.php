<?php

include 'Database.php';
include 'Student.php';

class StudentModel
{
    public function getStudents()
    {
        // obtenemos la información de la bdd:
        $pdo = Database::connect();
        $sql = "SELECT * FROM dat_students ORDER BY last_name";
        $resultado = $pdo->query($sql);
        // transformamos los registros en objetos de tipo Student:
        $listado = array();

        foreach ($resultado as $res) {
            $student = new Student();
            $student->setId($res['id']);
            $student->setName($res['name']);
            $student->setLast_name($res['last_name']);
            $student->setCourse($res['course']);
            $student->setHours($res['hours']);
            array_push($listado, $student);
        }

        Database::disconnect();
        // retornamos el listado resultante:
        return $listado;
    }

    public function getStudent($id)
    {
        // obtenemos la información del estudiante específico:
        $pdo = Database::connect();
        // utilizamos parámetros para la consulta:
        $sql = "SELECT * FROM dat_students WHERE id=?";
        $consulta = $pdo->prepare($sql);
        // ejecutamos y pasamos los parámetros para la consulta:
        $consulta->execute(array($id));
        // extraemos el registro específico:
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        // transformamos el registro obtenido a objeto:
        $student = new Student();
        $student->setId($dato['id']);
        $student->setName($dato['name']);
        $student->setLast_name($dato['last_name']);
        $student->setCourse($dato['course']);
        $student->setHours($dato['hours']);
        Database::disconnect();

        return $student;
    }

    public function crearStudent($id, $name, $last_name, $course, $hours)
    {
        // preparamos la conexión a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // preparamos la sentencia con parámetros:
        $sql = "INSERT INTO dat_students (id, name, last_name, course, hours) VALUES (?, ?, ?, ?, ?)";
        $consulta = $pdo->prepare($sql);
        // ejecutamos y pasamos los parámetros:
        $consulta->execute(array($id, $name, $last_name, $course, $hours));
        Database::disconnect();
    }

    public function eliminarStudent($id)
    {
        // preparamos la conexión a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM dat_students WHERE id=?";
        $consulta = $pdo->prepare($sql);
        // ejecutamos la sentencia incluyendo a los parámetros:
        $consulta->execute(array($id));
        Database::disconnect();
    }

    public function actualizarStudent($id, $name, $last_name, $course, $hours)
    {
        // preparamos la conexión a la bdd:
        $pdo = Database::connect();
        $sql = "UPDATE dat_students SET name=?, last_name=?, course=?, hours=? WHERE id=?";
        $consulta = $pdo->prepare($sql);
        // ejecutamos la sentencia incluyendo a los parámetros:
        $consulta->execute(array($name, $last_name, $course, $hours, $id));
        Database::disconnect();
    }
}
