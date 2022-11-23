<?php

namespace Controllers;

use Core\View;
use Models\RecuperarSenhas;
use PHPMailer\PHPMailer\PHPMailer;
class HomeController{
    public function index(){
        $view = new View('dashboard');
        $view->setTitle('Dashboard');
        $view->show();
    }

}