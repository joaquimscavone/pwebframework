<?php


namespace Core;

class View{

    private $view;
    private $template;

    private $__data = [];

    public function __construct($view, $template = TEMPLATE_DEFAULT)
    {
        $this->view = $view;
        $this->template = $template;
    }

    private function createStringRequire($path,$file){
        if(substr($file,-4,4)!==".php"){
            $file .= ".php";
        }
        return $path . "/" . $file;
    }

    public function __get($name)
    {
        return (array_key_exists($name,$this->__data))?$this->__data[$name]:null;
    }

    public function __set($name, $value)
    {
        $this->__data[$name] = $value;
    }


    public function show($data = []){
        extract(array_merge($this->__data, $data));
        $view = $this->createStringRequire(VIEWS_PATH,$this->view);
        require $this->createStringRequire(TEMPLATES_PATH,$this->template);
    }

}