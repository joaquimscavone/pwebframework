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

    protected function getConnection(){
        return $this->conneciton;
    }

    public function insert($table,$data){
         $columns = implode(', ',array_keys($data));
         $values = ":".implode(', :',array_keys($data));
         $sql = "INSERT INTO $table ($columns) values ($values);";
         $this->query($sql, $data);
         return $this->lastInsertId($table);
    }

    public function query($sql,$data){
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute($data);
        return $stm;

    }

    public function lastInsertId($table){
        return $this->getConnection()->lastInsertId($table);
    }
}