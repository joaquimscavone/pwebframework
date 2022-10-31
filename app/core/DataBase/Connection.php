<?php


namespace Core\DataBase;


class Connection{


    private static $conncetions = [];

    private function __construct()
    {}

    public static function getConncetion($parameters){
        $key = $parameters['driver'] . "_" . $parameters['database'];
        if(!array_key_exists($key,self::$conncetions)){
            $dns = "{$parameters['driver']}:host={$parameters['host']};"
            . "port={$parameters['port']};dbname={$parameters['database']}";
            $conn = new \PDO($dns,$parameters['user'], $parameters['password']);
        }
    }
}