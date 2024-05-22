<?php
include 'Database.php';
include 'Permissions.php';
/**
 * Componente model para el manejo de productos.
 *
 * @author mrea
 */
class PermissionsModel
{
    /**
     * Obtiene todos los productos de la base de datos.
     * @return array
     */
    public function getPermissions()
    {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();

        $sql = "select * from contr_permissions;";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos de tipo Producto:
        $listado = array();
        foreach ($resultado as $res) {
            $permission = new Permission();
            $permission->setName($res['name']);
            $permission->setDescription($res['description']);
            array_push($listado, $permission);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }
    /**
     * Obtiene un producto especifico.
     * @param type $id El codigo del producto a buscar.
     * @return \permission
     */
    public function getpermission($name)
    {
        //Obtenemos la informacion del producto especifico:
        $pdo = Database::connect();
        //Utilizamos parametros para la consulta:
        $sql = "select * from contr_permissions where name=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros para la consulta:
        $consulta->execute(array($name));
        //Extraemos el registro especifico:
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        //Transformamos el registro obtenido a objeto:
        $permission = new permission();
        $permission->setName($dato['name']);
        $permission->setDescription($dato['description']);
        Database::disconnect();
        return $permission;
    }
    /**
     * Crea un nuevo producto en la base de datos.
     * @param type $codigo
     * @param type $nombre
     * @param type $precio
     * @param type $cantidad
     */
    public function createpermission($name, $description)
    {
        //Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Preparamos la sentencia con parametros:
        $sql = "insert into contr_permissions (name, description) values(?, ?)";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        $consulta->execute(array($name, $description));
        Database::disconnect();
    }
    /**
     * Elimina un producto especifico de la bdd.
     * @param type $codigo
     */
    public function deletepermission($name)
    {
        //Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from contr_permissions where name=?";
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
    public function updatepermission($name, $description)
    {
        //Preparamos la conexión a la bdd:
        $pdo = Database::connect();
        $sql = "update contr_permissions set description=? where name=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($name, $description));
        Database::disconnect();
    }
}
