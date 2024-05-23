<?php

include 'Database.php';
include 'Operation.php';

class OperationModel
{
    public function getOperations()
    {
        // obtenemos la información de la bdd:
        $pdo = Database::connect();
        $sql = "SELECT * FROM inv_operations ORDER BY id";
        $resultado = $pdo->query($sql);
        // transformamos los registros en objetos de tipo Operation:
        $listado = array();

        foreach ($resultado as $res) {
            $operation = new Operation();
            $operation->setId($res['id']);
            $operation->setProject_id($res['project_id']);
            $operation->setIntem_id($res['intem_id']);
            $operation->setOperation($res['operation']);
            $operation->setQuantity($res['quantity']);
            array_push($listado, $operation);
        }

        Database::disconnect();
        // retornamos el listado resultante:
        return $listado;
    }

    public function getOperation($id)
    {
        // obtenemos la información de la operación específica:
        $pdo = Database::connect();
        // utilizamos parámetros para la consulta:
        $sql = "SELECT * FROM inv_operations WHERE id=?";
        $consulta = $pdo->prepare($sql);
        // ejecutamos y pasamos los parámetros para la consulta:
        $consulta->execute(array($id));
        // extraemos el registro específico:
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        // transformamos el registro obtenido a objeto:
        $operation = new Operation();
        $operation->setId($dato['id']);
        $operation->setProject_id($dato['project_id']);
        $operation->setIntem_id($dato['intem_id']);
        $operation->setOperation($dato['operation']);
        $operation->setQuantity($dato['quantity']);
        Database::disconnect();

        return $operation;
    }

    public function crearOperation($id, $project_id, $intem_id, $operation, $quantity)
    {
        // preparamos la conexión a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // preparamos la sentencia con parámetros:
        $sql = "INSERT INTO inv_operations (id, project_id, intem_id, operation, quantity) VALUES (?, ?, ?, ?, ?)";
        $consulta = $pdo->prepare($sql);
        // ejecutamos y pasamos los parámetros:
        $consulta->execute(array($id, $project_id, $intem_id, $operation, $quantity));
        Database::disconnect();
    }

    public function eliminarOperation($id)
    {
        // preparamos la conexión a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM inv_operations WHERE id=?";
        $consulta = $pdo->prepare($sql);
        // ejecutamos la sentencia incluyendo a los parámetros:
        $consulta->execute(array($id));
        Database::disconnect();
    }

    public function actualizarOperation($id, $project_id, $intem_id, $operation, $quantity)
    {
        // preparamos la conexión a la bdd:
        $pdo = Database::connect();
        $sql = "UPDATE inv_operations SET project_id=?, intem_id=?, operation=?, quantity=? WHERE id=?";
        $consulta = $pdo->prepare($sql);
        // ejecutamos la sentencia incluyendo a los parámetros:
        $consulta->execute(array($project_id, $intem_id, $operation, $quantity, $id));
        Database::disconnect();
    }
}
