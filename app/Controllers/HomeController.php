<?php

namespace Controllers;

use Core\View;
class HomeController{
    public function index(){
        $view = new View('login/login','blank');
        $view->show();
    }

}