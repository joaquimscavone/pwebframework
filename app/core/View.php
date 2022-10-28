<?php


namespace Core;

class View{

    private $view;
    private $template;

    public function __construct($view, $template = TEMPLATE_DEFAULT)
    {
        $this->view = $view;
        $this->template = $template;
    }


    public function show(){
        $view = $this->view;
        require TEMPLATES_PATH . "/" . $this->template;
    }

}