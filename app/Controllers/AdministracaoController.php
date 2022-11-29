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
        //$view->show();
        throw new \Exception('Erro de teste');
    }
    public function icons(){
        $view = new View('administracao/icones');
        $view->setTitle('Ícones do sistema');
        $view->show();
    }
}