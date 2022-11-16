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
    protected $order = [];

    protected $limit;

    protected $comparasion_operators = [
        '=','<>',">",'<','>=','<=','LIKE', 'IS'
    ];
    public function __construct($id = null)
    {
        //$this->connection_name = 'administrativo';
        $parameters = $this->loadParameters();
        $this->driver = new $parameters['class']($parameters);
        if($id){
            $this->load($id);
        }
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
        return $this;
    }

    private function update($data){
        $pk = $this->pk;
        $this->where($this->pk, '=', $this->$pk);
        $result = $this->getDriver()->update($this->table, $data, $this->flushWhere());
        if($result){
            $this->data = $data;
        }
        return $this;
    }
    public function delete(){
        $pk = $this->pk;
        $this->where($this->pk, '=', $this->$pk);
        $result = $this->getDriver()->delete($this->table, $this->flushWhere());
        $this->storage(false);
        return $this;
    }

    public function save($data = []){
        $data = array_merge($this->data, $data);
        if($this->isStorage()){
            return $this->update($data);
        }
        return $this->insert($data);

    }
    private function load($id){
        $this->where($this->pk, '=', $id);
        $stm = $this->getDriver()->select($this->table, 
                                         $this->columns, 
                                         $this->flushWhere());
        $result = $stm->fetch(\PDO::FETCH_ASSOC);
        if($result){
            $this->data = $result;
            $this->storage();
        }
        return $this;
    }

    //todos os registros da base dados
    public function all(){
        $stm = $this->getDriver()->select($this->table, 
                                         $this->columns, 
                                         $this->flushWhere(), 
                                         $this->flushOrder(), 
                                         $this->flushLimit());
        $result = $stm->fetchAll(\PDO::FETCH_CLASS, $this::class);
        array_walk($result,function(&$tupla){
            $tupla->storage();
        });
        return $result;
    }
    public function get(){
        $stm = $this->getDriver()->select($this->table, 
                                         $this->columns, 
                                         $this->flushWhere(), 
                                         $this->flushOrder());
        $result = $stm->fetchObject($this::class);
        if($result){
            $result->storage();
        }
        return $result;
    }

    protected function storage($status = true){
        $this->___exists___ = $status;
    }

    public function isStorage(){
        return $this->___exists___;
    }


    // trabalhando where
    protected function addWhere($column,$comparasion_operator,$value,$logic_operator = 'AND'){
        if(!in_array($column,$this->columns)){
            throw new Exception("Impossível criar o where, $column não existe no array columns da class ".$this::class);
        }
        $comparasion_operator = strtoupper($comparasion_operator);
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

    protected function flushWhere(){
        $where = $this->where;
        $this->where = [];
        return $where;
    }

    public function where($column,$comparasion_operator,$value){
        return $this->addWhere($column, $comparasion_operator, $value);
    }
    public function orWhere($column,$comparasion_operator,$value){
        return $this->addWhere($column, $comparasion_operator, $value,'OR');
    }

    protected function addOrder($column, $order = 'ASC'){
        if(!in_array($column,$this->columns)){
            throw new Exception("Impossível criar o Order, $column não existe no array columns da class ".$this::class);
        }
       
        $this->order[] = [
                        'column'=>$column,
                        'order' => $order
                        ];
        return $this;
    }
    protected function flushOrder(){
        $order = $this->order;
        $this->order = [];
        return $order;
    }
    public function orderAsc($column){
        return $this->addOrder($column);
    }
    public function orderDesc($column){
        return $this->addOrder($column,'DESC');
    }
    protected function flushLimit(){
        $limit = $this->limit;
        unset($this->limit);
        return $limit;
    }
    public function limit(int $limit, int $offset = null){
        (is_null($offset)) || $this->limit['offset'] = $offset;
        $this->limit['limit'] = $limit;
        return $this;
    }

    public function exists($column,$value,$id_excluded = null){
        $this->addWhere($column, '=', $value);
        if(isset($id_excluded)){
            $this->addWhere($this->pk, '<>', $id_excluded);
        }
        return $this->get() !== false;
    }

}