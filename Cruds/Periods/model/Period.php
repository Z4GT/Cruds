<?php

/**
 * Entidad Producto. Representa a la tabla producto en la base de datos.
 *
 * @author mrea
 */
class Period
{
    private $id;
    private $name;
    private $academic_year;
    private $start_date;
    private $end_date;

    function getId()
    {
        return $this->id;
    }

    function getName()
    {
        return $this->name;
    }
    function getAcademic_year()
    {
        return $this->academic_year;
    }
    function getStart_date()
    {
        return $this->start_date;
    }
    function getEnd_date()
    {
        return $this->end_date;
    }
    function setId($id)
    {
        $this->id = $id;
    }
    function setName($name)
    {
        $this->name = $name;
    }
    function setAcademic_year($academic_year)
    {
        $this->academic_year = $academic_year;
    }
    function setStart_date($start_date)
    {
        $this->start_date = $start_date;
    }
    function setEnd_date($end_date)
    {
        $this->end_date = $end_date;
    }
}
