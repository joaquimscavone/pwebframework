<?php


namespace Core\DataBase;

abstract class DataBaseDriver
{
    protected $connection_parameters_default = [];

    protected $conneciton;

    public function __construct(array $parameters)
    {
        $this->conneciton = Connection::getConncetion(
            array_merge($this->connection_parameters_default, $parameters)
        );
    }

    protected function getConnection()
    {
        return $this->conneciton;
    }

    public function insert(string $table, array $data)
    {
        $columns = implode(', ', array_keys($data));
        $values = ":" . implode(', :', array_keys($data));
        $sql = "INSERT INTO $table ($columns) values ($values);";
        $this->query($sql, $data);
        return $this->lastInsertId($table);
    }
    public function update(string $table, array $data, array $where)
    {
        if (count($where) == 0) {
            throw new \Exception("Não se pode executar update sem where");
        }
        $sql = "UPDATE $table SET";
        $comma = "";
        foreach($data as $key => $value){
            $sql .= "$comma $key = :$key";
            $comma = ",";
        }
        [$wsql, $wdata] = $this->prepareWhere($where);
        $sql .= $wsql;
        $data = array_merge($data, $wdata);
        return $this->query("$sql;", $data);
    }
    public function delete(string $table, array $where)
    {
        if (count($where) == 0) {
            throw new \Exception("Não se pode executar delete sem where");
        }
        $sql = "DELETE FROM $table";
        [$wsql, $data] = $this->prepareWhere($where);
        $sql .= $wsql;
        return $this->query("$sql;", $data);
    }

    public function query(string $sql, array $data = [])
    {
        $stm = $this->getConnection()->prepare($sql);
        $stm->execute($data);
        return $stm;
    }

    public function lastInsertId(string $table)
    {
        return $this->getConnection()->lastInsertId($table);
    }

    protected function prepareWhere(array $where)
    {
        $sql = "";
        $data = [];
        foreach ($where as $key => $cond) {
            $sql .= ($key) ? " {$cond['logic']} " : " WHERE ";
            if($cond['comparation']==='IS'){
                $sql .= "{$cond['column']} {$cond['comparation']} ".
                ((strtoupper($cond['value'])==='NULL')?'NULL':'NOT NULL');
            }else{
                $sql .= "{$cond['column']} {$cond['comparation']} :where_cond_value_$key";
                $data[":where_cond_value_$key"] = $cond['value'];
            }
         
        }
        return [$sql, $data];
    }

    private function prepareOrder(array $order)
    {
        //ORDER BY nome DESC, email ASC

        $sql = " ORDER BY";
        $comma = " ";
        foreach ($order as $exp) {
            $sql .= $comma . implode(" ", $exp);
            $comma = ", ";
        }
        return $sql;
    }

    protected function prepareLimit(array $limit)
    {
        return " LIMIT " . implode(',', $limit);
    }

    public function select(string $table, array $columns, array $where = [], array $order = [], array $limit = null)
    {
        $columns = implode(',', $columns);
        $sql = "SELECT $columns FROM $table";
        $data = [];
        if (count($where)) {
            [$wsql, $wdata] = $this->prepareWhere($where);
            $sql .= $wsql;
            $data = array_merge($data, $wdata);
        }
        if (count($order)) {
            $sql .= $this->prepareOrder($order);
        }
        if ($limit) {
            $sql .= $this->prepareLimit($limit);
        }
        return $this->query("$sql;", $data);
    }
}
