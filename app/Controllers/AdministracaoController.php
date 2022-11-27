<?php

namespace Controllers;
use Core\Controller;
use Core\View;

class AdministracaoController extends Controller{

    public function phpinfo(){
        phpinfo();
    }
    public function testes(){
        $view = new View('blank');
        $view->setTitle('Testes');
        $view->show();
    }
}