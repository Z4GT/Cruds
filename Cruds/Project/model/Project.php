<?php

/**
 * Entidad Producto. Representa a la tabla producto en la base de datos.
 *
 * @author mrea
 */
class project
{
    private $id;
    private $name;
    private $description;
    private $status;
    private $progress;
    private $start_date;
    private $end_date;
    private $budget;
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
    function getStatus()
    {
        return $this->status;
    }
    function getProgress()
    {
        return $this->progress;
    }
    function getStartDate()
    {
        return $this->start_date;
    }
    function getEndDate()
    {
        return $this->end_date;
    }
    function getBudget()
    {
        return $this->budget;
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
    function setStatus($status)
    {
        $this->status = $status;
    }
    function setProgress($progress)
    {
        $this->progress = $progress;
    }
    function setStartDate($start_date)
    {
        $this->start_date = $start_date;
    }
    function setEndDate($end_date)
    {
        $this->end_date = $end_date;
    }
    function setBudget($budget)
    {
        $this->budget = $budget;
    }
}
