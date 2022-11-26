<?php


namespace Controllers;
use Core\Tag;

class Testes{

    public function index(){
        (new Tag('h1'))->show();
    }
}