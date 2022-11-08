<?php

namespace Controllers;

use Core\View;
class TermosController{
    public function index(){
        $view = new View('termos','blank');
        $view->setTitle('Termos de Serviço');
        $view->show();
        
    }


}