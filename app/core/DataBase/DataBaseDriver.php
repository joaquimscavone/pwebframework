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

    public function insert($table,$data){
        /**
         * ['nome'=>jkdkjdasklf, 'email']
         * INSERT INTO usuarios (nome,email,senha) values ('Lucas','lucas@mail.com',md5('123456'))
         */

         $columns = implode(', ',array_keys($data));
         $values = ":".implode(', :',array_keys($data));
         $sql = "INSERT INTO $table ($columns) values ($values);";
         $this->query($sql, $data);
    }

    public function query($sql,$data){
        $stm = $this->conneciton->prepare($sql);
        $stm->execute($data);
        return $stm;

    }
}