<?php

namespace Models;

use Core\Interfaces\UserAuthenticate;
use Core\Model;
use Core\Password;
use Core\Session;
use Exception;

class Usuarios extends Model implements UserAuthenticate
{
    protected $table = 'usuarios';
    protected $pk = 'cod_usuario';

    protected $columns = ['cod_usuario', 'nome', 'email', 'senha','admin','excluido', 'email_verificado', 'criacao_data'];

    protected $columns_excluded = ['senha'];
    
    
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
        $session = Session::getSession();
        if($session->isLogged()){
            return false;
        }
        $usuario = new Usuarios;
        $usuario->addWhere('email', '=', $user);
        $usuario->addWhere('senha', '=', new Password($password));
        $usuario = $usuario->get();
        if($usuario){
            $session->createSessionUser($usuario);
            return $usuario;
        }
        return false;
    }
    public function logout(): bool{
        $session = Session::getSession();
        return $session->clearSessionUser();
    }

    public function editPassword($password,$newpassword){
        $user = new Usuarios();
        $user->where('cod_usuario', '=', $this->cod_usuario);
        $user->where('senha', '=', new Password($password));
        $user = $user->get();
        if($user){
            $user->senha = $newpassword;
            $user->save();
            return true;
        }
        throw new \Exception('Senha atual está incorreta!');

    }

    public function get(){
        $this->where('excluido', '=', '0');
        return parent::get();
    }
    public function all(){
        $this->where('excluido', '=', '0');
        return parent::all();
    }
    public function load($id){
        $this->where('excluido', '=', '0');
        return parent::load($id);
    }

    public function delete(){
        parent::save(['excluido' => 1]);
        $this->storage(false);
        return $this;
    }
}