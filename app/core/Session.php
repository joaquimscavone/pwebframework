<?php

namespace Core;

use Core\Interfaces\UserAuthenticate;

class Session{
    private static $instance;

    private $session;
    private static $session_user = APPLICATION_SESSION_NAME . '_USER';

    private function __construct()
    {
        session_name(APPLICATION_SESSION_NAME);
        session_start();
        if(!array_key_exists(APPLICATION_SESSION_NAME,$_SESSION)){
            $_SESSION[APPLICATION_SESSION_NAME] = array();
        }
        $this->session = & $_SESSION[APPLICATION_SESSION_NAME];
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

    public function createSessionUser(UserAuthenticate $user){
        if($this->isLogged()){
            return false;
        }
        $_SESSION[self::$session_user] = $user;
    }


    public function isLogged(){
        return array_key_exists(self::$session_user, $_SESSION);
    }

    public function clearSessionUser():bool{
        if($this->isLogged()){
           unset($_SESSION[self::$session_user]);
            return true;
        }
        return false;
       
    }
    public function getUser(){
        return (array_key_exists(self::$session_user, $_SESSION))?$_SESSION[self::$session_user]:false;
    }

    public static function getSession(){
        if(is_null(self::$instance)){
            self::$instance = new Session();
        }
        return self::$instance;
    }
}