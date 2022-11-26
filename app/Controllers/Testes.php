<?php


namespace Controllers;
use Core\Tag;

class Testes{

    public function index(){
        $d = new Tag('div');
        $h1 = new Tag('h1');
        $h1->add('Joaquim Scavone');
        $d->add($h1);
        $h1->class = 'danger';
        $d->add(new Tag('hr'));
        $d->style = "background-color:red;";
        $h1->parentNode()->show();
    }
}