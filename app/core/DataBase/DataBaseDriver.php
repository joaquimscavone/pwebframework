<?php


namespace Core\DataBase;

abstract class DataBaseDriver{
    protected $connection_parameters_default = [];

    protected $conneciton;
    
    public function __construct($parameters)
    {
        $this->conneciton = Connection::getConncetion(
                array_merge($this->connection_parameters_default, $parameters)
            );
    }
}