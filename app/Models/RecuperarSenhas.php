<?php

namespace Models;

use Core\Configs;
use Core\Model;

class RecuperarSenhas extends Model
{
    protected $table = 'recuperar_senhas';
    protected $pk = 'cod_recuperar_senha';

    protected $columns = [
        'cod_recuperar_senha',
        'cod_usuario', 
        'hash1', 
        'hash2', 
        'criacao_data_hora', 
        'expiracao_data_hora',
        'utilizacao_data_hora'
    ];

    private $delay, $timeout;
    public function __construct()
    {
        $configs = Configs::getConfig('users');
        foreach($configs['forgot_password'] as $config => $value){
            $this->$config = $value;
        }
        
    }

    public function save($data = [])
    {
        return false;
    }
    /**
     * Criar uma recuperação de senha para o e-mail informado.
     * @param mixed $email
     * @return RecuperarSenha | false;
     */
    public function create($email)
    {
        // verificar se o e-mail existe;
        $usuario = Usuairos::getUserByEmail($email);
        if($usuario){
            // verificar se já existe um recuperar senha funcionando para este e-mail
        }
        
        //inserir essa nova informação
        return false;
    }

    private static function getRecuperarSenhaPeloUsuario($cod_usuario){
        $recuperar = new RecuperarSenhas();
        $recuperar->addWhere('cod_usuario','=',$cod_usuario);

    }
}
