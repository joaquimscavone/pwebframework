<?php

namespace Controllers;

use Core\View;
class HomeController{
    public function index(){
        $view = new View('emails/redefinir-senha','email');
        $view->setTitle('Redefinir senha');
        $view->usuario = 'Joaquim Scavone';
        $view->show();
    }

}