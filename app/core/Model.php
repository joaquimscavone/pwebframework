<?php


namespace Core;

use \Core\DataBase\Connection;
use Exception;
use IntlException;


abstract class Model{

    protected $connection_name = CONNECTION_NAME_DEFAULT;
    protected $driver;

    protected $table;

    protected $pk;

    protected $columns = [];

    protected $data = [];

    public $___exists___ = false;
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

}