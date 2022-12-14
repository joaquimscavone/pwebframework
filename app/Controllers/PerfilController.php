<?php

namespace Controllers;

use Components\AlertComponent;
use Core\Controller;
use Core\Request;
use Core\Session;
use Core\View;

class PerfilController extends Controller{

    /**
     * Apresentar a sua tela de cadastro
     * @return void
     */
    public function index(){
        $view = new View('perfil');
        $view->setTitle('Meu Cadastro');
        $view->show();
    }
   
    /**
     * Altera o registro de um usuário e retorna a tela de edição.
     * @param mixed $cod_usuarios
     * @param Request $request
     * @return void
     */
    public function edit(Request $request){
        if($request->isEmpty('nome') || $request->isEmpty('email')){
            AlertComponent::addFlashMessage(
                'Dados incompletos',
                'O nome e o e-mail são dados obrigatórios', AlertComponent::ALERT_WARNING
            );
            $request->getLastAction()->redirect();
        }
        $usuario = Session::getSession()->getUser();
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        try{
            $usuario->save();
        }catch(\Exception $e){
            AlertComponent::addFlashMessage(
                'Erro de alteração!',
                $e->getMessage(), AlertComponent::ALERT_DANGER
            );
            $request->getLastAction()->redirect();
        }
        AlertComponent::addFlashMessage(
            'Alteração realizada!',
            "Dados Atualizados com sucesso.", AlertComponent::ALERT_SUCCESS
        );
        $request->getLastAction()->redirect();
        
    }
    /**
     * Remove um usuário do sistema;
     * @param mixed $cod_usuario
     * @param Request $request
     * @return void
     */
    public function remove($cod_usuario,Request $request){

    }
    /**
     * Altera a senha de um usuário;
     * @param mixed $cod_usuario
     * @param Request $request
     * @return void
     */
    public function editPassword(Request $request){
        if($request->isEmpty('senha') || $request->isEmpty('novasenha')){
            AlertComponent::addFlashMessage(
                'Dados incompletos',
                'Informe a senha atual e a nova senha para alterar a senha', AlertComponent::ALERT_WARNING
            );
            $request->getLastAction()->redirect();
        }
        if($request->novasenha !== $request->confirmacao){
            AlertComponent::addFlashMessage(
                'Dados incorretos',
                'A senha e a confirmação não são iguais', AlertComponent::ALERT_WARNING
            );
            $request->getLastAction()->redirect();
        }

        $usuario = Session::getSession()->getUser();
        try{
            $usuario->editPassword($request->senha,$request->novasenha);
        }catch(\Exception $e){
            AlertComponent::addFlashMessage(
                'Erro de alteração!',
                $e->getMessage(), AlertComponent::ALERT_DANGER
            );
            $request->getLastAction()->redirect();
        }
        AlertComponent::addFlashMessage(
            'Alteração realizada!',
            "senha atualizada com sucesso!.", AlertComponent::ALERT_SUCCESS
        );
        $request->getLastAction()->redirect();

    }
}