<?php


namespace Controllers\Login;
use Core\View;

class SenhaController{

    /**
     * Chamar a tela de esqueci minha senha
     * @return void
     */
    public function index(){
        $view = new View('login/senha-esquecida', 'blank');
        $view->setTitle('Recuperar Senha');
        $view->show();
    }

    /**
     * vai registrar o pedido de redefinição de senha do usuário
     * @return void
     */
    public function criarRegistroEsqueciMinhaSenha(){
        die('vou te mandar um e-mail');
    }
    /**
     * Chama a tela para redefinir a senha
     * @return void
     */
    public function telaRedefinirSenha()
    {
        $view = new View('login/senha-recuperacao', 'blank');
        $view->setTitle('Recuperar Senha');
        $view->show();
    }
    /**
     * Altera a senha do usuário para a informada;
     * @return void
     */
    public function actionRedefinirSenha(){
        die('senha alterada');
    }
}