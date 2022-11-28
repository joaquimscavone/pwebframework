<?php

namespace Controllers;

use Components\AlertComponent;
use Core\Controller;
use Core\Request;
use Core\View;
use Exception;
use Models\Usuarios;

class UsersController extends Controller{

    /**
     * Cria uma listagem de todos os Usuários do sitema
     * @return void
     */
    public function index(){
        $view = new View('administracao/users');
        $view->setTitle('Usuários');
        $usuarios = new Usuarios();
        $view->usuarios = $usuarios->all();
        $view->show();
    }
    /**
     * abrir o cadastro de um usuário;
     * @param mixed $cod_usuario
     * @return void
     */
    public function user($cod_usuario){
        $usuario = new Usuarios($cod_usuario);
        if(is_null($usuario->cod_usuario)){
            $this->error404();
        }
        $view = new View('administracao/user-edit');
        $view->setTitle('Editar Usuário');
        $view->usuario = $usuario;
        $view->show();

    }
    /**
     * Altera o registro de um usuário e retorna a tela de edição.
     * @param mixed $cod_usuarios
     * @param Request $request
     * @return void
     */
    public function edit($cod_usuario,Request $request){
        $usuario = new Usuarios($cod_usuario);
        if(is_null($usuario->cod_usuario)){
            $this->error404();
        }
        if($request->isEmpty('nome') || $request->isEmpty('email')){
            AlertComponent::addFlashMessage(
                'Dados incompletos',
                'O nome e o e-mail são dados obrigatórios', AlertComponent::ALERT_WARNING
            );
            $request->getLastAction()->redirect();
        }
        $usuario->nome = $request->nome;
        $usuario->email = $request->email;
        $usuario->admin = ($request->isEmpty('admin')) ? 0 : 1;
        try{
            $usuario->save();
        }catch(Exception $e){
            AlertComponent::addFlashMessage(
                'Erro!',
                $e->getMessage(), AlertComponent::ALERT_DANGER
            );
            $request->getLastAction()->redirect();
        }
        AlertComponent::addFlashMessage(
            'Sucesso!',
            'Seus dados foram atualizados', AlertComponent::ALERT_SUCCESS
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
        $usuario = new Usuarios($cod_usuario);
        if($cod_usuario == $request->cod_usuario && $cod_usuario == $usuario->cod_usuario){
            AlertComponent::addFlashMessage(
                'Sucesso!',
                "Registro de {$usuario->nome} foi excluido com sucesso!", AlertComponent::ALERT_SUCCESS
            );
            $this->redirect(self::class);
        }
        $this->error404();
    }
    /**
     * Altera a senha de um usuário;
     * @param mixed $cod_usuario
     * @param Request $request
     * @return void
     */
    public function editPassword($cod_usuario,Request $request){

    }
}