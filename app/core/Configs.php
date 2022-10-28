<?php


namespace Core;

class Configs{

    private static $configs = [];

    private function __construct(){}
    public static function getConfig($filename){
        $filename = preg_replace('(\.php$)', '', $filename);
        $keyname = str_replace(' ', '_', $filename);
        if(!array_key_exists($keyname,self::$configs)){
            echo "carregou $filename<br/>";
            self::$configs[$keyname] = include CONFIGS_PATH . '/' . $filename . '.php';
        }
        return self::$configs[$keyname];
    }
}