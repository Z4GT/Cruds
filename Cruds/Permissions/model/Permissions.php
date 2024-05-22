<?php

/**
 * Entidad Producto. Representa a la tabla producto en la base de datos.
 *
 * @author mrea
 */
class permission
{
    private $id;
    private $name;
    private $description;

    function getId()
    {
        return $this->id;
    }
    function getName()
    {
        return $this->name;
    }
    function getDescription()
    {
        return $this->description;
    }
    function setId($id)
    {
        $this->id = $id;
    }
    function setName($name)
    {
        $this->name = $name;
    }
    function setDescription($description)
    {
        $this->description = $description;
    }
}
