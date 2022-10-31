<?php

namespace Controllers;

use Core\Configs;
use Core\View;
use Models\Usuairos;
class Home{
    public function index(){
        $usuarios = new Usuairos();
    }

    public function user($nome){
        $view = new View('usuario');
        $view->nome = $nome;
        $view->show(['nome'=>"Não informado"]);
    }
}