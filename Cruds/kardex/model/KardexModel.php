<?php

include 'Database.php';
include 'Kardex.php';

class KardexModel
{
    public function getKardexes()
    {
        // obtenemos la información de la bdd:
        $pdo = Database::connect();
        $sql = "SELECT * FROM cont_kardex ORDER BY date";
        $resultado = $pdo->query($sql);
        // transformamos los registros en objetos de tipo Kardex:
        $listado = array();

        foreach ($resultado as $res) {
            $kardex = new Kardex();
            $kardex->setId($res['id']);
            $kardex->setName($res['name']);
            $kardex->setDescription($res['description']);
            $kardex->setDate($res['date']);
            $kardex->setMovement_type($res['movement_type']);
            $kardex->setQuantity($res['quantity']);
            $kardex->setUnit_value($res['unit_value']);
            $kardex->setBalance($res['balance']);
            $kardex->setItem_id($res['item_id']);
            array_push($listado, $kardex);
        }

        Database::disconnect();
        // retornamos el listado resultante:
        return $listado;
    }

    public function getKardex($id)
    {
        // obtenemos la información del registro del kardex específico:
        $pdo = Database::connect();
        // utilizamos parámetros para la consulta:
        $sql = "SELECT * FROM cont_kardex WHERE id=?";
        $consulta = $pdo->prepare($sql);
        // ejecutamos y pasamos los parámetros para la consulta:
        $consulta->execute(array($id));
        // extraemos el registro específico:
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        // transformamos el registro obtenido a objeto:
        $kardex = new Kardex();
        $kardex->setId($dato['id']);
        $kardex->setName($dato['name']);
        $kardex->setDescription($dato['description']);
        $kardex->setDate($dato['date']);
        $kardex->setMovement_type($dato['movement_type']);
        $kardex->setQuantity($dato['quantity']);
        $kardex->setUnit_value($dato['unit_value']);
        $kardex->setBalance($dato['balance']);
        $kardex->setItem_id($dato['item_id']);
        Database::disconnect();

        return $kardex;
    }

    public function crearKardex($id, $name, $description, $date, $movement_type, $quantity, $unit_value, $balance, $item_id)
    {
        // preparamos la conexión a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // preparamos la sentencia con parámetros:
        $sql = "INSERT INTO cont_kardex (id, name, description, date, movement_type, quantity, unit_value, balance, item_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $consulta = $pdo->prepare($sql);
        // ejecutamos y pasamos los parámetros:
        $consulta->execute(array($id, $name, $description, $date, $movement_type, $quantity, $unit_value, $balance, $item_id));
        Database::disconnect();
    }

    public function eliminarKardex($id)
    {
        // preparamos la conexión a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM cont_kardex WHERE id=?";
        $consulta = $pdo->prepare($sql);
        // ejecutamos la sentencia incluyendo a los parámetros:
        $consulta->execute(array($id));
        Database::disconnect();
    }

    public function actualizarKardex($id, $name, $description, $date, $movement_type, $quantity, $unit_value, $balance, $item_id)
    {
        // preparamos la conexión a la bdd:
        $pdo = Database::connect();
        $sql = "UPDATE cont_kardex SET name=?, description=?, date=?, movement_type=?, quantity=?, unit_value=?, balance=?, item_id=? WHERE id=?";
        $consulta = $pdo->prepare($sql);
        // ejecutamos la sentencia incluyendo a los parámetros:
        $consulta->execute(array($name, $description, $date, $movement_type, $quantity, $unit_value, $balance, $item_id, $id));
        Database::disconnect();
    }
}
