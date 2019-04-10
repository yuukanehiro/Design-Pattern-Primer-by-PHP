<?php

class Product
{
    private $name;

    public function __construct($name)
    {
        $this->name = (string) $name;
    }


    public function getName()
    {
        return $this->name;
    }
}
