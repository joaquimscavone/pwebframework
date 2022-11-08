<?php


namespace Core;

class View extends ViewElement{

   
    private $template;

  

    public function __construct($view, $template = TEMPLATE_DEFAULT)
    {
        parent::__construct($this->createStringRequireView($view));
        $this->template = new ViewElement($this->createStringRequireTemplate($template));
    }

    private function createStringRequireView($file){
        if(substr($file,-9,9)!==".view.php"){
            $file .= ".view.php";
        }
        return VIEWS_PATH . "/" . $file;
    }
    private function createStringRequireTemplate($file){
        if(substr($file,-13,13)!==".template.php"){
            $file .= ".template.php";
        }
        return TEMPLATES_PATH . "/" . $file;
    }

   

    public function show($data = []){
        require $this->template;
    }

}