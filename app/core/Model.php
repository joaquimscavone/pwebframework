<?php


namespace Core;

use \Core\DataBase\Connection;
use Core\DataBase\DataBaseDriver;
use Exception;
use IntlException;


abstract class Model{

    protected $connection_name = CONNECTION_NAME_DEFAULT;
    protected $driver;

    protected $table;

    protected $pk;

    protected $columns = [];

    protected $data = [];

    protected $___exists___ = false;

    protected $where = [];

    protected $comparasion_operators = [
        '=','<>',">",'<','>=','<=','like'
    ];
    public function __construct()
    {
        //$this->connection_name = 'administrativo';
        $parameters = $this->loadParameters();
        $this->driver = new $parameters['class']($parameters);
    }
    /**
     * carrega as informações do arquivo CONFIGS_PATH/databases.php
     * @return array
     */
    private function loadParameters(){
        $databases = Configs::getConfig('databases');
        //arquivo existe?
        if ($databases === false) {
            throw new Exception('Arquivo' . CONFIGS_PATH . '/databases.php não foi encontrado');
        }
        //existe conexão com o nome do connection_name/
        if(!array_key_exists($this->connection_name,$databases)){
            throw new Exception("A Conexão {$this->connection_name} não foi encontrada no arquivo ". CONFIGS_PATH . '/databases.php.');
        }

        return $databases[$this->connection_name];

    }
    protected function getDriver():DataBaseDriver{
        return $this->driver;
    }

    //$usuarios->nome
    public function __get($name)
    {
        if(array_key_exists($name,$this->data)){
            return $this->data[$name];
        }
        return null;
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    //inserir
    private function insert($data){
        $id = $this->driver->insert($this->table, $data);
        $pk = $this->pk;
        $this->$pk = $id;
        $this->storage();
        return true;
    }

    private function update($data){
        return true;
    }

    public function save($data = []){
        $data = array_merge($this->data, $data);
        if($this->___exists___){
            return $this->update($data);
        }
        return $this->insert($data);

    }

    //todos os registros da base dados
    public function all(){
        $stm = $this->getDriver()->select($this->table, $this->columns, $this->where);
        $result = $stm->fetchAll(\PDO::FETCH_CLASS, $this::class);
        array_walk($result,function(&$tupla){
            $tupla->storage();
        });
        return $result;
    }

    protected function storage(){
        $this->___exists___ = true;
    }


    // trabalhando where
    protected function addWhere($column,$comparasion_operator,$value,$logic_operator = 'AND'){
        if(!in_array($column,$this->columns)){
            throw new Exception("$column não existe no array columns da class ".$this::class);
        }
        if(!in_array($comparasion_operator,$this->comparasion_operators)){
            throw new Exception("$comparasion_operator não existe na lista de Operadores aceitos na class ".Model::class);
        }
        $this->where[] = [
                        'column'=>$column,
                        'comparation'=>$comparasion_operator,
                        'value'=>$value,
                        'logic'=>$logic_operator
                        ];
        return $this;
    }

    public function where($column,$comparasion_operator,$value){
        return $this->addWhere($column, $comparasion_operator, $value);
    }
    public function orWhere($column,$comparasion_operator,$value){
        return $this->addWhere($column, $comparasion_operator, $value,'OR');
    }

  

}