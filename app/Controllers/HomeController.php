<?php

namespace Controllers;

use Core\View;
use Models\RecuperarSenhas;
use PHPMailer\PHPMailer\PHPMailer;
class HomeController{
    public function index(){
        $view = new View('emails/redefinir-senha','email');
        $view->setTitle('Redefinir senha');
        $view->usuario = 'Joaquim Scavone';
        //$view->show();
        new PHPMailer();
    }

}