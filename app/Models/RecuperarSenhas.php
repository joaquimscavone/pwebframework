<?php

namespace Models;

use Core\Configs;
use Core\Model;
use DateTime;

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

        parent::__construct();
        
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
            $recuperar = $this->getRegisterFromUser($usuario->cod_usuario);
            if($recuperar){
                echo $recuperar->criacao_data_hora;
            }
          
            // verificar se já existe um recuperar senha funcionando para este e-mail
        }
        
        //inserir essa nova informação
        return false;
    }

    private function getRegisterFromUser($cod_usuario){
        $recuperar = new RecuperarSenhas();
        $recuperar->addWhere('cod_usuario','=',$cod_usuario);
        $recuperar->addWhere('utilizacao_data_hora', 'is', 'null');
        $recuperar->addWhere('expiracao_data_hora', '>', (new DateTime())->format('Y-m-d H:i:s'));
        return $recuperar->get();
    }
}
