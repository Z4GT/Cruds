<?php
include 'Database.php';
include 'Period.php';
/**
 * Componente model para el manejo de productos.
 *
 * @author mrea
 */
class PeriodModel
{
    /**
     * Obtiene todos los productos de la base de datos.
     * @return array
     */
    public function getPeriods()
    {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();

        $sql = "select * from dat_periods;";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos de tipo Producto:
        $listado = array();
        foreach ($resultado as $res) {
            $period = new Period();
            $period->setName($res['name']);
            $period->setAcademic_year($res['academic_year']);
            $period->setStart_date($res['start_date']);
            $period->setEnd_date($res['end_date']);
            array_push($listado, $period);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }
    /**
     * Obtiene un producto especifico.
     * @param type $id El codigo del producto a buscar.
     * @return \Period
     */
    public function getPeriod($name)
    {
        //Obtenemos la informacion del producto especifico:
        $pdo = Database::connect();
        //Utilizamos parametros para la consulta:
        $sql = "select * from dat_periods where name=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros para la consulta:
        $consulta->execute(array($name));
        //Extraemos el registro especifico:
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        //Transformamos el registro obtenido a objeto:
        $period = new Period();
        $period->setName($dato['name']);
        $period->setAcademic_year($dato['academic_year']);
        $period->setStart_date($dato['start_date']);
        $period->setEnd_date($dato['end_date']);
        Database::disconnect();
        return $period;
    }
    /**
     * Crea un nuevo producto en la base de datos.
     * @param type $codigo
     * @param type $nombre
     * @param type $precio
     * @param type $cantidad
     */
    public function createPeriod($name, $academic_year, $start_date, $end_date)
    {
        //Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Preparamos la sentencia con parametros:
        $sql = "insert into dat_periods (name,academic_year,start_date,end_date) values(?,?,?,?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        $consulta->execute(array($name, $academic_year, $start_date, $end_date));
        Database::disconnect();
    }
    /**
     * Elimina un producto especifico de la bdd.
     * @param type $codigo
     */
    public function deletePeriod($name)
    {
        //Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from dat_periods where name=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($name));
        Database::disconnect();
    }
    /**
     * Actualiza un producto existente.
     * @param type $codigo
     * @param type $nombre
     * @param type $precio
     * @param type $cantidad
     */
    public function updatePeriod($name, $academic_year, $start_date, $end_date)
    {
        //Preparamos la conexión a la bdd:
        $pdo = Database::connect();
        $sql = "update dat_periods set name=?,academic_date=?,start_date=?, end_date=? where name=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($name, $academic_year, $start_date, $end_date));
        Database::disconnect();
    }
}
