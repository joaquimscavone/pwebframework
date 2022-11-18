<?php

namespace Models;

use Core\Configs;
use Core\Date;
use Core\Hash;
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
    private $usuario;
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
     * @return RecuperarSenha|false;
     */
    public function create($email)
    {
        // verificar se o e-mail existe;
        $usuario = Usuairos::getUserByEmail($email);
        if($usuario){
            $recuperar = $this->getRegisterFromUser($usuario->cod_usuario);
            if($recuperar){
                $data_criacao = new Date($recuperar->criacao_data_hora);
                if($data_criacao->diffSeconds()<$this->delay){
                    //cancelar requisição pois existe uma que ainda está em delay;
                    return false;
                }
                $recuperar->expire();
            }
            $this->cod_usuario = $usuario->cod_usuario; 
            $this->hash1 = new Hash;
            $this->hash2 = new Hash;
            $this->expiracao_data_hora = new Date();
            $this->expiracao_data_hora->modifySeconds($this->timeout);
            parent::save();
            $this->usuario = $usuario;
            return $this;
        }
        
        //inserir essa nova informação
        return false;
    }

    public function expire(){
        return parent::save(['expiracao_data_hora' => new Date]);
    }

    private function getRegisterFromUser($cod_usuario){
        $recuperar = new RecuperarSenhas();
        $recuperar->addWhere('cod_usuario','=',$cod_usuario);
        $recuperar->addWhere('utilizacao_data_hora', 'is', 'null');
        $recuperar->addWhere('expiracao_data_hora', '>', new Date);
        return $recuperar->get();
    }

    public function getUser(){
        return $this->usuario;
    }
}
