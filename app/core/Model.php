<?php


namespace Core;

use Exception;
use IntlException;


abstract class Model{

    protected $connection_name = CONNECTION_NAME_DEFAULT;
    public function __construct()
    {
        $parameters = $this->loadParameters();
        var_dump($parameters);
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

    //inserir
    public function insert($data = null){

    }

}