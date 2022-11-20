<?php

namespace Controllers;

use Core\View;
use Models\RecuperarSenhas;
use PHPMailer\PHPMailer\PHPMailer;
class HomeController{
    public function index(){
        $view = new View('login/login');
        $view->setTitle('Dash Board');
        $view->show();
    }

}