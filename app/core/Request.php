<?php

namespace Core;

class Request{

    private static $request;
    private static $excluded = [];
    private $current_page;
    private $last_page;
    private function __construct()
    {
        $session = Session::getSession();
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $request = md5(implode('', $_REQUEST));
            if($request === $session->request_key){
               // $this->getLastAction()->redirect();
            }
            $session->request_key = $request;
        }else{
            unset($session->request_key);
        }
        $this->last_page = $session->current_page;
        $this->current_page = $this->url;
        $session->last_page = $this->last_page;
        $session->current_page = $this->current_page;
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
        return Action::getActionByUrl($this->last_page);
    }
    public function getAction(){
        return Action::getActionByUrl($this->current_page);
    }
}