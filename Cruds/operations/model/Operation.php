<?php

class Operation
{
    private $id;
    private $project_id;
    private $intem_id;
    private $operation;
    private $quantity;

    // Getters y Setters

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getProject_id()
    {
        return $this->project_id;
    }

    public function setProject_id($project_id)
    {
        $this->project_id = $project_id;
        return $this;
    }

    public function getIntem_id()
    {
        return $this->intem_id;
    }

    public function setIntem_id($item_id)
    {
        $this->intem_id = $item_id;
        return $this;
    }

    public function getOperation()
    {
        return $this->operation;
    }

    public function setOperation($operation)
    {
        $this->operation = $operation;
        return $this;
    }

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }
}
