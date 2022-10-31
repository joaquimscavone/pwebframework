<?php

namespace Models;
use Core\Model;

class Usuairos extends Model{
    protected $table = 'usuarios';
    protected $pk = 'cod_usuario';

    protected $columns = ['cod_usuario', 'nome', 'email', 'senha', 'email_verificado', 'criacao_data'];
}