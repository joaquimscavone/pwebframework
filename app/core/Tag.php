<?php

namespace Core;

use Core\Interfaces\ViewElement;

class Tag implements ViewElement{


    private $tagname;
    const VOID_ELEMENTS = array("area","base","br","col","embed","hr","img","input","keygen","link",
    "meta","param","source","track","wbr");

    public function __construct($tagname)
    {
        $this->tagname = $tagname;
    }
    
    
    public function show(){
        if(in_array($this->tagname,self::VOID_ELEMENTS)){
            echo "<{$this->tagname}/>";
            return;
        }
        echo "<{$this->tagname}></{$this->tagname}>";
    }
}