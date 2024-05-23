<?php

class Database
{

    //Propiedades estaticas con la informacion de la conexion (DSN):
    private static $dbName = 'uep_db';
    private static $dbHost = 'localhost';
    private static $dbUsername = 'root';
    private static $dbUserPassword = '';
    //Propiedad para control de la conexion:
    private static $conexion = null;


    /**
     * No se permite instanciar esta clase, se utilizan sus elementos
     * de tipo estatico.
     */
    public function __construct()
    {
        exit('No se permite instanciar esta clase. Solo se usan sus métodos estáticamente.');
    }

    /**
     * Metodo estatico que crea una conexion a la base de datos.
     * @return type
     */

    public static function connect()
    {
        // Una sola conexion para toda la aplicacion (singleton):
        if (self::$conexion == null) {
            try {
                self::$conexion = new PDO(
                    "mysql:host=" . self::$dbHost . ";" . "dbname=" . self::$dbName,
                    self::$dbUsername,
                    self::$dbUserPassword
                );
            } catch (PDOException $e) {
                die($e->getMessage());
            }
        }
        return self::$conexion;
    }

    /**
     * Metodo estatico para desconexion de la bdd.
     */
    public static function disconnect()
    {
        self::$conexion = null;
    }
}
