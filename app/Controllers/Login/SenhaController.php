<?php


namespace Controllers\Login;

use Components\AlertComponent;
use Core\Action;
use Core\Controller;
use Core\Mail;
use Core\Request;
use Core\View;
use Core\ViewElement;
use Models\RecuperarSenhas;

class SenhaController extends Controller
{

    /**
     * Chamar a tela de esqueci minha senha
     * @return void
     */
    public function index()
    {
        $view = new View('login/senha-esquecida', 'blank');
        $view->setTitle('Recuperar Senha');
        $view->show();
    }

    /**
     * vai registrar o pedido de redefinição de senha do usuário
     * @return void
     */
    public function criarRegistroEsqueciMinhaSenha(Request $request)
    {
        if ($request->isEmpty('email')) {
            AlertComponent::addFlashMessage(
                'Email inválido',
                'O e-mail informado não é válido. Tente novamente.',
                AlertComponent::ALERT_WARNING
            );
            Action::getActionByController(self::class)->redirect();
        }

        $recuperar = new RecuperarSenhas();
        $recuperar = $recuperar->create($request->email);
        if ($recuperar) {
            $view = $this->getViewRecuperarSenha($recuperar->getUser()->nome, $recuperar->hash1, $recuperar->hash2);
            if(APPLICATION_ENV === 'development'){
                $view->show();
                return;
            }
            $this->sendEmailRecuperarSenha($recuperar, $view);
            return;
        }
        AlertComponent::addFlashMessage(
            'Email enviado!',
            'Caso seu e-mail esteja cadastrado em nosso sistema, em instantes você receberá um e-mail de redefinição de senha.',
            AlertComponent::ALERT_SUCCESS
        );
        Action::getActionByController(LoginController::class)->redirect();
    }

    /**
     * Summary of getViewRecuperarSenha
     * @param string $usuario nome do usuário
     * @param string $hash1
     * @param string $hash2
     * @return View
     */
    private function getViewRecuperarSenha(string $usuario, string $hash1, string $hash2)
    {
        $view = new View('emails/redefinir-senha', 'email');
        $view->setTitle("Redefinir Senha $usuario");
        $view->usuario = $usuario;
        $view->hash1 = $hash1;
        $view->hash2 = $hash2;
        return $view;
    }

    private function sendEmailRecuperarSenha($recuperar, ViewElement $view){
        $email = new Mail();
        $email->setSubject(APPLICATION_NAME . ' Recuperação de senha');
        $email->addAddress($recuperar->getUser()->email, $recuperar->getUser()->nome);
        $email->setViewBody($view);
        $email->send();
    }

    /**
     * Chama a tela para redefinir a senha
     * @return void
     */
    public function telaRedefinirSenha($hash1,$hash2)
    {
        $recupera = RecuperarSenhas::checkHashs($hash1, $hash2);
        if($recupera === false){
            $this->error404();
        }

        $view = new View('login/senha-recuperacao', 'blank');
        $view->setTitle('Recuperar Senha');
        $view->hash1 = $hash1;
        $view->hash2 = $hash2;
        $view->show();
    }
    /**
     * Altera a senha do usuário para a informada;
     * @return void
     */
    public function actionRedefinirSenha($hash1,$hash2,Request $request)
    {
        $recupera = RecuperarSenhas::checkHashs($hash1, $hash2);
        if($recupera === false){
            $this->error404();
        }
        if ($request->isEmpty('senha') || $request->senha != $request->confirmar) {
            $msg = 'A Senha e a Confirmação são campos obrigatórios e devem ser iguais';
            AlertComponent::addFlashMessage('Erro de preechimento.', $msg, AlertComponent::ALERT_WARNING);
            $this->redirect(self::class, 'telaRedefinirSenha', ['hash1' => $hash1, 'hash2' => $hash2,]);
        }

        $recupera->storagePassword($request->senha);
        AlertComponent::addFlashMessage('Sucesso!', 'Senha redefinida.', AlertComponent::ALERT_SUCCESS);
        $this->redirect(LoginController::class);
        

    }
}
