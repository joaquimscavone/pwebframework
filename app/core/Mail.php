<?php


namespace Core;

use Core\Interfaces\Mail as InterfacesMail;
use PHPMailer\PHPMailer\PHPMailer;

class Mail implements InterfacesMail
{


    private $host, $username, $password, $port_smtp, $port_imap, $signature,$address = [];
    private $subject, $body_type, $body, $charset;

    public function __construct()
    {
        $configs = Configs::getConfig('email');
        foreach ($configs as $config => $value) {
            $this->$config = $value;
        }
        $this->charset = APPLICATION_CHARSET;
    }
    /**
     * Adiciona um destinatário ao e-mail;
     *
     * @param string $email // email do destinatário
     * @param string $name // nome do destinatário opcional;
     * @return InterfacesMail
     */
    public function addAddress(string $email, string $name = "")
    {
        $this->address[] = ['email'=>$email, 'name' => $name];
        return $this;
    }

    /**
     * Cria um título para o e-mail
     *
     * @param string $title o titulo
     * @return InterfacesMail
     */
    public function setSubject(string $title)
    {
        $this->subject = $title;
        return $this;
    }

    /**
     * Atribui um texto a mensagem
     *
     * @param string $text
     * @return self
     */
    public function setMessage(string $text)
    {
        $this->body = $text;
        $this->body_type = 'text';
        return $this;
    }

    /**
     *
     * @param string $HTML
     * @return InterfacesMail
     */
    public function setHTML(string $HTML)
    {

        $this->body = $HTML;
        $this->body_type = 'html';
        return $this;
    }

    /**
     * Transforma um ViewElement no corpo do texto;
     *
     * @param ViewElement $view
     * @return InterfacesMail
     */
    public function setViewBody(ViewElement $view)
    {
        
        $this->body = $view;
        $this->body_type = 'viewElement';
        return $this;
    }

    /**
     * Salva o e-mail após o envi-o
     * @return bool
     */
    public function save()
    {
        return false;
    }

    /**
     * envia o e-mail
     * @return bool
     */
    public function send()
    {
       
    }

    /**
     * alterar a codificação padrão do e-mail;
     *
     * @param string $chaset ex; UFT-8;
     * @return InterfacesMail
     */
    public function setCharSet(string $charset)
    {
        $this->charset = $charset;
        return $this;
    }
}
