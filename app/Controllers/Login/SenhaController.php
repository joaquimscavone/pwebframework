<?php


namespace Controllers\Login;

use Components\AlertComponent;
use Core\Action;
use Core\Request;
use Core\View;
use Models\RecuperarSenhas;

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
    public function criarRegistroEsqueciMinhaSenha(Request $request){
        if($request->isEmpty('email')){
            AlertComponent::addFlashMessage(
                'Email inválido',
                'O e-mail informado não é válido. Tente novamente.',
                AlertComponent::ALERT_WARNING
            );
            Action::getActionByController(self::class)->redirect();
        }

        $recuperar = new RecuperarSenhas();
        $recuperar = $recuperar->create($request->email);
        if($recuperar){
            //enviar e-mail;
        }
        AlertComponent::addFlashMessage(
            'Email enviado!',
            'Caso seu e-mail esteja cadastrado em nosso sistema, em instantes você receberá um e-mail de redefinição de senha.',
            AlertComponent::ALERT_SUCCESS
        );
        Action::getActionByController(LoginController::class)->redirect();
       
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