<?php

namespace Controllers;

use Core\View;
class LoginController{
    public function index(){
        $view = new View('login/login','blank');
        $view->setTitle('Login');
        $view->show();
        
    }

    public function cadastro(){
        $view = new View('login/cadastro','blank');
        $view->setTitle('Cadastre-se');
        $view->show();
    }
    public function logar(){
        
    }
    public function cadastrar()
    {
    }

    public function redefinirSenha(){
        
    }

}