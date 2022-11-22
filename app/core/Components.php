<?php

namespace Core;

class Components extends ViewElement{
    public function __construct(String $view = null)
    {
        if(!empty($view)){
            $view = $this->createStringRequireComponent($view);
            parent::__construct($view);
        }
        
    }

    private function createStringRequireComponent($file){
        if(substr($file,-9,9)!==".view.php"){
            $file .= ".view.php";
        }
        return VIEWS_PATH . "/Components/" . $file;
    }
}