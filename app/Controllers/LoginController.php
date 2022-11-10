<?php

namespace Controllers;

use Components\AlertComponent;
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
        //validar os dados recebidos
        $erros = [];
        if($request->isEmpty('nome')){
            $erros[] = '*Nome é um campo obrigatório';
        }
        if($request->isEmpty('email')){
            $erros[] = '*Email é um campo obrigatório';
        }
        
        if ($request->isEmpty('senha') || $request->senha != $request->confirmacao) {
            $erros[] = '*A Senha e a Confirmação são campos obrigatórios e devem ser iguais';
        }
        if($request->isEmpty('termo')){
            $erros[] = '*Você deve aceitar os termos de serviço para se cadastrar';
        }
        if(count($erros)){
            AlertComponent::addFlashMessage('Erros de preechimento!', $erros, AlertComponent::ALERT_WARNING);
            $request->getLastAction()->redirect();
        }
        //caso tenha uma falhar enviar o feedback;

        //validar integridade da dabse de dados;
        //feedback de falha de integridade;

        //inserir na base;
        //feedback de sucesso;

    }

    public function redefinirSenha(){
        
    }

}