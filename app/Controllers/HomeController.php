<?php

namespace Controllers;

use Core\View;
class HomeController{
    public function index(){
        $view = new View('login/login','blank');
        $view->setTitle('Login');
        //$view->show();
        \Components\AlertComponent::addFlashMessage('Deu certo!','Sua conta foi criada','success');
        var_dump($_SESSION);
    }

}