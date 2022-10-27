<?php

namespace Controllers;
class Home{
    public function index(){
        echo 'Meu primeiro controller';
    }

    public function user($nome){
        echo "Bem vindo! $nome";
    }
}