<?php

namespace Core;

use Core\Interfaces\ViewElement;

class Tag implements ViewElement{


    private $tagname;
    const VOID_ELEMENTS = array("area","base","br","col","embed","hr","img","input","keygen","link",
    "meta","param","source","track","wbr");
    private $children = array();
    private $properties = array();
    private $void;
    public function __construct($tagname)
    {
        $this->tagname = $tagname;
        $this->void = in_array($this->tagname,self::VOID_ELEMENTS);
    }


    public function add($element){
        if($this->void){
            throw new \Exception('Elementos Void não podem ter filhos!');
        }
        $this->children[] = $element;
        return $this;
    }

    public function __set($name, $value){
        $this->properties[$name] = $value;
    }

    public function __get($name)
    {
        return (array_key_exists($name, $this->properties))
            ? $this->properties[$name] : "";
    }
    
    private function renderProperties(){
        $prop = "";
        foreach($this->properties as $key => $property){
            $prop .= " {$key}='$property'";
        }
        return $prop;
    }

    
    public function show(){
        if($this->void){
            echo "<{$this->tagname}{$this->renderProperties()}/>";
            return;
        }
        echo "<{$this->tagname}{$this->renderProperties()}>";
        foreach($this->children as $child){
            if($child instanceof ViewElement){
                $child->show();
                continue;
            }
            echo $child;
        }
        echo "</{$this->tagname}>";
    }

    public function isVoid(){
      return $this->void;
    }
}