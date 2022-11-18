<?php

namespace Core\Interfaces;

use Core\ViewElement;

interface Mail{

    /**
     * Adiciona um destinatário ao e-mail;
     * @param string $email // email do destinatário
     * @param string $name // nome do destinatário opcional;
     * @return self
     */
    public function addAddress(string $email, string $name = '');

    /**
     * Cria um título para o e-mail
     * @param string $title o titulo
     * @return self
     */
    public function setSubject(string $title);
    /**
     * Atribui um texto a mensagem
     * @param string $text
     * @return self
     */
    public function setMessage(string $text);
    /**
     * @param string $HTML
     * @return self
     */
    public function setHTML(string $HTML);

    /**
     * Transforma um ViewElement no corpo do texto;
     * @param ViewElement $view
     * @return self
     */
    public function setViewBody(ViewElement $view);

    /**
     * Salva o e-mail após o envi-o
     * @return bool
     */
    public function save();

    /**
     * envia o e-mail
     * @return bool
     */
    public function send();

    /**
     * alterar a codificação padrão do e-mail;
     * @param string $chaset ex; UFT-8;
     * @return self
     */
    public function setCharSet(string $charset);


}