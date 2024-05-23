<?php

class Kardex
{
    private $id;
    private $name;
    private $description;
    private $date;
    private $movement_type;
    private $quantity;
    private $unit_value;
    private $balance;
    private $item_id;

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

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    public function getMovement_type()
    {
        return $this->movement_type;
    }

    public function setMovement_type($movement_type)
    {
        $this->movement_type = $movement_type;
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

    public function getUnit_value()
    {
        return $this->unit_value;
    }

    public function setUnit_value($unit_value)
    {
        $this->unit_value = $unit_value;
        return $this;
    }

    public function getBalance()
    {
        return $this->balance;
    }

    public function setBalance($balance)
    {
        $this->balance = $balance;
        return $this;
    }

    public function getItem_id()
    {
        return $this->item_id;
    }

    public function setItem_id($item_id)
    {
        $this->item_id = $item_id;
        return $this;
    }
}
