<?php


namespace Core;

use Core\Interfaces\Mail as InterfacesMail;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

class Mail implements InterfacesMail
{


    private $host, $username, $password, $port_smtp, $port_imap, $signature, $address = [];
    private $subject, $body_type, $body, $charset, $phpmailler, $security;

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
        $this->address[] = ['email' => $email, 'name' => $name];
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


    private function phpMaillerSererverSettings()
    {
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = (APPLICATION_ENV === 'development') ? SMTP::DEBUG_SERVER : SMTP::DEBUG_OFF;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $this->host;                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $this->username;                     //SMTP username
        $mail->Password   = $this->password;                               //SMTP password
        $mail->SMTPSecure = ($this->security)?$this->security:PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = $this->port_smtp;                                    //TCP port to connect to; use 587 if you have 
        $mail->CharSet = $this->charset;
        $this->phpmailler = $mail;
    }

    private function phpMaillerRecipients()
    {
        $this->phpmailler->setFrom($this->username, $this->signature);
        foreach ($this->address as $address) {
            $this->phpmailler->addAddress($address['email'], $address['name']);     //Add a recipient
        }
    }

    private function phpMaillerContent()
    {
        //Content
        if ($this->body_type === 'html') {
            $this->phpmailler->isHTML(true);
            $this->phpmailler->Body    = $this->body;                                 //Set ethis->phpmailler format to HTML
        } elseif ($this->body_type === 'viewElement') {
            $this->phpmailler->isHTML(true);
            ob_start();
            $this->body->show();
            $result = ob_get_contents();
            ob_end_clean();
            $this->phpmailler->Body = $result;
        } else {
            $this->phpmailler->isHTML(false);
            $this->phpmailler->Body = $this->body;
        }                             //Set ethis->phpmailler format to HTML
        $this->phpmailler->Subject = $this->subject;
    }


    /**
     * envia o e-mail
     * @return bool
     */
    public function send()
    {
        $this->phpMaillerSererverSettings();
        $this->phpMaillerRecipients();
        $this->phpMaillerContent();
        try {
            $this->phpmailler->send();
            return true;
        } catch (\Exception $e) {
           throw new Exception("Message could not be sent. Mailer Error: {$this->phpmailler->ErrorInfo}");
        }
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
