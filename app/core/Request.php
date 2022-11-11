<?php

namespace Core;

class Request{

    private static $request;
    private static $excluded = [];

    private function __construct()
    {
        $session = Session::getSession();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $request = md5(implode('', $_POST));
            if($request === $session->request_key){
                $this->getLastAction()->redirect();
            }
            $session->request_key = $request;
        }else{
            unset($session->request_key);
        }
        $session->last_page = $session->current_page;
        $session->current_page = $this->url;
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

    public function getLastAction(){
        return Action::getActionByUrl(Session::getSession()->last_page);
    }
}