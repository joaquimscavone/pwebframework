<?php

namespace Models;

use Core\Interfaces\UserAuthenticate;
use Core\Model;
use Core\Password;
use Exception;

class Usuarios extends Model implements UserAuthenticate
{
    protected $table = 'usuarios';
    protected $pk = 'cod_usuario';

    protected $columns = ['cod_usuario', 'nome', 'email', 'senha', 'email_verificado', 'criacao_data'];
    
    
    public function save($data = []){
        $data = array_merge($this->data, $data);
        if(isset($data['senha'])){
            $data['senha'] = new Password($data['senha']);
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

    public static function  getUserByEmail($email){
        $user = new Usuarios;
        $user->addWhere('email', '=', $email);
        return $user->get();
    }

    public static function login(string $user, string $password):UserAuthenticate|false{
        $usuario = new Usuarios;
        $usuario->addWhere('email', '=', $user);
        $usuario->addWhere('senha', '=', new Password($password));
        return $usuario->get();
    }
    public function logout(): UserAuthenticate|false{
        return new Usuarios();
    }
}