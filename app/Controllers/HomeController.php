<?php

namespace Controllers;

use Core\View;
use Models\RecuperarSenhas;
class HomeController{
    public function index(){
        $view = new View('emails/redefinir-senha','email');
        $view->setTitle('Redefinir senha');
        $view->usuario = 'Joaquim Scavone';
        //$view->show();
        $recuperar = new RecuperarSenhas();
        $recuperar->create('joaquim.scavone@ifto.edu.br');
    }

}