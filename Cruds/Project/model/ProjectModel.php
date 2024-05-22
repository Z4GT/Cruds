<?php
include 'Database.php';
include 'Project.php';
/**
 * Componente model para el manejo de productos.
 *
 * @author mrea
 */
class ProjectModel
{
    /**
     * Obtiene todos los productos de la base de datos.
     * @return array
     */
    public function getProjects()
    {
        //obtenemos la informacion de la bdd:
        $pdo = Database::connect();

        $sql = "select * from pro_project;";
        $resultado = $pdo->query($sql);
        //transformamos los registros en objetos de tipo Producto:
        $listado = array();
        foreach ($resultado as $res) {
            $project = new Project();
            $project->setName($res['name']);
            $project->setDescription($res['description']);
            $project->setStatus($res['status']);
            $project->setProgress($res['progress']);
            $project->setStartDate($res['start_date']);
            $project->setEndDate($res['end_date']);
            $project->setBudget($res['budget']);
            array_push($listado, $project);
        }
        Database::disconnect();
        //retornamos el listado resultante:
        return $listado;
    }
    /**
     * Obtiene un producto especifico.
     * @param type $id El codigo del producto a buscar.
     * @return \project
     */
    public function getProject($name)
    {
        //Obtenemos la informacion del producto especifico:
        $pdo = Database::connect();
        //Utilizamos parametros para la consulta:
        $sql = "select * from pro_project where name=?";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros para la consulta:
        $consulta->execute(array($name));
        //Extraemos el registro especifico:
        $dato = $consulta->fetch(PDO::FETCH_ASSOC);
        //Transformamos el registro obtenido a objeto:
        $project = new project();
        $project->setName($dato['name']);
        $project->setDescription($dato['description']);
        $project->setStatus($dato['status']);
        $project->setProgress($dato['progress']);
        $project->setStartDate($dato['start_date']);
        $project->setEndDate($dato['end_date']);
        $project->setBudget($dato['budget']);
        Database::disconnect();
        return $project;
    }
    /**
     * Crea un nuevo producto en la base de datos.
     * @param type $codigo
     * @param type $nombre
     * @param type $precio
     * @param type $cantidad
     */
    public function createProject($name, $description, $status, $progress, $start_date, $end_date, $budget)
    {
        //Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //Preparamos la sentencia con parametros:
        $sql = "insert into pro_project (name, description, status, progress, start_date, end_date, budget) values(?,?,?,?,?,?,?);";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos y pasamos los parametros:
        $consulta->execute(array($name, $description, $status, $progress, $start_date, $end_date, $budget));
        Database::disconnect();
    }
    /**
     * Elimina un producto especifico de la bdd.
     * @param type $codigo
     */
    public function deleteProject($name)
    {
        //Preparamos la conexion a la bdd:
        $pdo = Database::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from pro_project where name=?";
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
    public function updateProject($name, $description, $status, $progress, $start_date, $end_date, $budget)
    {
        //Preparamos la conexión a la bdd:
        $pdo = Database::connect();
        $sql = "update pro_project set description=?, status=?, progress=?, start_date=?, end_date=?, budget=? where name=?;";
        $consulta = $pdo->prepare($sql);
        //Ejecutamos la sentencia incluyendo a los parametros:
        $consulta->execute(array($name, $description, $status, $progress, $start_date, $end_date, $budget));
        Database::disconnect();
    }
}
