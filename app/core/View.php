<?php


namespace Core;
use stdClass;

class View extends ViewElement{

   
    private $template;

  

    public function __construct($view, $template = TEMPLATE_DEFAULT)
    {
        parent::__construct($this->createStringRequireView($view));
        $this->template = new ViewElement($this->createStringRequireTemplate($template));
        $this->template->mergeData(Configs::getConfig('views'));
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

   
    public function setTitle($title){
        $this->template->sample_title = $title;
        $fix = $this->template->title_prefix;
        if(!empty($fix)){
            $title = $fix . $title;
        }
        $fix = $this->template->title_prosfix;
        if(!empty($fix)){
            $title = $title.$fix;
        }
        $this->template->title = $title;
    }

    private function getUser(){
        $session = Session::getSession();
        if($session->isLogged()){
            return $session->getUser();
        }

        return new stdClass;
    }


    public function show(array $data = []){
        $template = $this->template;
        $user = $this->getUser();
        $view = new ViewElement((string) $this);
        $view->mergeData($this->getData());
        $view->mergeData($data);
        require $this->template;
    }

}