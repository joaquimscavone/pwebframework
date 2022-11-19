<?php

namespace Controllers\Login;

use \Components\AlertComponent;
use \Core\Action;
use \Core\Request;
use \Core\View;
use \Models\Usuarios;
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
            //caso tenha uma falhar enviar o feedback;
            AlertComponent::addFlashMessage('Erros de preechimento!', $erros, AlertComponent::ALERT_WARNING);
            $request->getLastAction()->redirect();
        }


        //validar integridade da dabse de dados;
        $usuario = new Usuarios();
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->senha = $request->senha;
        try{
         //inserir na base;
            $usuario->save();
        }catch(\Exception $e){
            AlertComponent::addFlashMessage('Erros de preechimento!', $e->getMessage(), AlertComponent::ALERT_WARNING);
            $request->getLastAction()->redirect();
        }
        //feedback de falha de integridade;

        
        //feedback de sucesso;
        AlertComponent::addFlashMessage('Usuário Cadastrado', "{$usuario->nome} foi cadastrado com sucesso!", AlertComponent::ALERT_SUCCESS);
        Action::getActionByController(self::class)->redirect();

    }

}