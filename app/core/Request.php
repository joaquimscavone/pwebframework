<?php

namespace Core;

class Request{

    private static $request;
    private static $excluded = [];

    private function __construct()
    {
        
    }

    public static function getRequest(){
        if(is_null(self::$request)){
            self::$request = new Request();
        }
        return self::$request;
    }


    public function all(){
        return $_REQUEST;
    }

    public function __get($name){
        return (array_key_exists($name, $_REQUEST)) ? $_REQUEST[$name] : null;
    }

    public function input($name,$default=null){
        return (array_key_exists($name, $_REQUEST)) ? $_REQUEST[$name] : $default;
    }

    public function __isset($name)
    {
        return array_key_exists($name, $_REQUEST);
    }

    public function isEmpty($name){
        return empty(str_replace(' ','',$this->$name));
    }

    public function getData(){

    }
}