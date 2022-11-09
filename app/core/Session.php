<?php

namespace Core;


class Session{
    private static $instance;

    private $session;

    private function __construct()
    {
        session_name(APPLICATION_NAME);
        session_start();
        if(!array_key_exists(APPLICATION_NAME,$_SESSION)){
            $_SESSION[APPLICATION_NAME] = array();
        }
        $this->session = & $_SESSION[APPLICATION_NAME];
    }

    public function __set($name, $value){
        $this->session[$name] = $value;
    }

    public function __get($name)
    {
        return (array_key_exists($name, $this->session)) ? $this->session[$name] : null;
    }

    public function __isset($name)
    {
        return array_key_exists($name, $this->session);
    }

    public function __unset($name)
    {
        if(array_key_exists($name,$this->session)){
            unset($this->session[$name]);
        }
    }

    public static function getSession(){
        if(is_null(self::$instance)){
            self::$instance = new Session();
        }
        return self::$instance;
    }
}