<?php

namespace Controllers;

use Core\Configs;
use Core\View;
use Models\Usuairos;
class Home{
    public function index(){
        $user = new Usuairos(1);
        $user->senha = md5('abc123');
        $user->save();
        echo $user->nome . " - " . $user->email . "<hr>";
    }


    private function insert($nome,$email,$senha){
        $usuarios = new Usuairos();
        $usuarios->nome = $nome;
        $usuarios->email = $email;
        $usuarios->save(['senha' => md5($senha)]);
        echo '<pre>';
        var_dump($usuarios);
    }

    public function user($nome){
        $view = new View('usuario');
        $view->nome = $nome;
        $view->show(['nome'=>"Não informado"]);
    }
}