<?php


namespace Core\DataBase;

use PDOException;

class Connection{


    private static $conncetions = [];

    private function __construct()
    {}

    public static function getConncetion($parameters){
        $key = $parameters['driver'] . "_" . $parameters['database'];
        if(!array_key_exists($key,self::$conncetions)){
            $dns = "{$parameters['driver']}:host={$parameters['host']};"
            . "port={$parameters['port']};dbname={$parameters['database']}";
            try{
                $conn = new \PDO($dns,$parameters['user'], $parameters['password'],$parameters['options']);
                APPLICATION_ENV === 'production' || $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            }catch(PDOException $e){
                throw new \Exception("Não foi possível se connectar a base de dados verifique suas credenciais");
            }
            self::$conncetions[$key] = $conn;
        }
        return self::$conncetions[$key];
    }
}