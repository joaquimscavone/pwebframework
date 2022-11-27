<?php

namespace Controllers;

use Core\Controller;
use Core\Request;
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