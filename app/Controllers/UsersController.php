<?php

namespace Controllers;

use Core\Controller;
use Core\Request;
use Core\View;
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

    }
    /**
     * Altera o registro de um usuário e retorna a tela de edição.
     * @param mixed $cod_usuarios
     * @param Request $request
     * @return void
     */
    public function edit($cod_usuarios,Request $request){
        
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
    public function editPassword($cod_usuario,Request $request){

    }
}