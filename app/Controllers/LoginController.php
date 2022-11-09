<?php

namespace Controllers;

use Core\Request;
use Core\Session;
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
    public function cadastrar(Request $request)
    {
        $erros = [];
        if(!isset($request->nome)){
            $erros[] = 'Nome é um campo obrigatório';
        }
        if(!isset($request->email)){
            $erros[] = 'email é um campo obrigatório';
        }
        if(!isset($request->senha) || !isset($request->confirmacao)){
            $erros[] = 'A Senha e a Confirmação são campos obrigatórios';
        }
    }

    public function redefinirSenha(){
        
    }

}