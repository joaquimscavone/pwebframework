<?php

namespace Controllers;

use Core\View;
class HomeController{
    public function index(){
        $view = new View('login/login','blank');
        $view->setTitle('Login');
        //$view->show();
        echo \Core\Action::getActionByController(LoginController::class)->getUrl();
    }

}