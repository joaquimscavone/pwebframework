<?php

namespace Controllers;

use Core\Configs;
use Core\View;
class Home{
    public function index(){
        //$view = new View('home');
        //$view->show();
        echo '<pre>';
        var_dump(Configs::getConfig('databases'));
        var_dump(Configs::getConfig('databases'));
    }

    public function user($nome){
        $view = new View('usuario');
        $view->nome = $nome;
        $view->show(['nome'=>"Não informado"]);
    }
}