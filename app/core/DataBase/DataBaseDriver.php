<?php


namespace Core\DataBase;

abstract class DataBaseDriver{
    protected $connection_parameters_default = [];

    protected $conneciton;
    
    public function __construct(array $parameters)
    {
        $this->conneciton = Connection::getConncetion(
                array_merge($this->connection_parameters_default, $parameters)
            );
    }

    protected function getConnection(){
        return $this->conneciton;
    }

    public function insert(string $table, array $data){
         $columns = implode(', ',array_keys($data));
         $values = ":".implode(', :',array_keys($data));
         $sql = "INSERT INTO $table ($columns) values ($values);";
         $this->query($sql, $data);
         return $this->lastInsertId($table);
    }

    public function query(string $sql,array $data = []){
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute($data);
        return $stm;

    }

    public function lastInsertId(string $table){
        return $this->getConnection()->lastInsertId($table);
    }

    protected function prepareWhere(array $where){
        $sql = "";
        $data = [];
        foreach($where as $key => $cond){
            $sql.= ($key) ? " {$cond['logic']} " : " WHERE ";
            $sql .= "{$cond['column']} {$cond['comparation']} :where_cond_value_$key";
            $data[":where_cond_value_$key"] = $cond['value'];
        }
        return [$sql, $data];

    }

    public function select(string $table, array $columns, array $where = []){
        $columns = implode(',',$columns);
        $sql = "SELECT $columns FROM $table";
        $data = [];
        if(count($where)){
            [$wsql, $wdata] = $this->prepareWhere($where);
            $sql .= $wsql;
            $data = array_merge($data,$wdata);
        }
        return $this->query("$sql;",$data);
    }

}