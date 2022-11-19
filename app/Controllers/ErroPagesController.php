<?php


namespace Controllers;
use Core\View;

class ErroPagesController{

    public function page404(){
        $view = new View('404', 'blank');
        $view->setTitle('Página não encontrada');
        $view->show();
    }
    public function page500(){
        $view = new View('500', 'blank');
        $view->setTitle('Página não encontrada');
        $view->show();
    }
}