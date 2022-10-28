<?php

namespace Controllers;
use Core\View;
class Home{
    public function index(){
        $view = new View('home');
        $view->show();
    }

    public function user($nome){
        $view = new View('usuario');
        $view->nome = $nome;
        $view->show(['nome'=>"Não informado"]);
    }
}