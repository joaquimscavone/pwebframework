<?php

namespace Controllers;
use Core\View;
class Home{
    public function index(){
        $view = new View('home');
        $view->show();
    }

    public function user($nome){
        echo "Bem vindo! $nome";
    }
}