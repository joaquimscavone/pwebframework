<?php


namespace Core;

class ViewElement{

    private $view;
   

    private $__data = [];

    public function __construct(String $view)
    {
        $this->view = $view;
    }


    public function __get($name)
    {
        return (array_key_exists($name,$this->__data))?$this->__data[$name]:null;
    }

    public function __set($name, $value)
    {
        $this->__data[$name] = $value;
    }

    public function __toString()
    {
        return $this->view;
    }


    public function show($data = []){
        extract(array_merge($this->__data, $data));
        require $this;
    }

}