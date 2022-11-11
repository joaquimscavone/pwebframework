<?php

namespace Models;
use Core\Model;
use Exception;

class Usuairos extends Model
{
    protected $table = 'usuarios';
    protected $pk = 'cod_usuario';

    protected $columns = ['cod_usuario', 'nome', 'email', 'senha', 'email_verificado', 'criacao_data'];
    
    
    public function save($data = []){
        $data = array_merge($this->data, $data);
        if(isset($data['senha'])){
            $data['senha'] = md5($data['senha']);
        }
        if(isset($data['email'])){
            $id = ($this->isStorage()) ? $data[$this->pk] : null;
            if($this->exists('email', $data['email'],$id))
            {
                throw new Exception('Email já possui cadastro!');
            }
        }
        parent::save($data);
    }
}