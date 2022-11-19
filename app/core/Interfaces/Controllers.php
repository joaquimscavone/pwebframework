<?php

namespace Core\Interfaces;


interface Controller{

      /**
       * Redirecionar para outro controller
       * @param string $controller
       * @param string $method
       * @param array $parameters
       * @return void
       */

    public function redirect(string $controller, string $method = METHOD_DEFAULT, array $parameters = []):void;

    /**
     * Redireciona para página 404 do sistema;
     * @return void
     */
    public function error404():void;

    /**
     * Redireciona para página de erro 500 do sistema;
     * @return void
     */
    public function error500($error = null): void;


}