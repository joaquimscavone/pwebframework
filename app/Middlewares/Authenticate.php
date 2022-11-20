<?php


namespace Middlewares;

use Controllers\Login\LoginController;
use Core\Action;
use Core\Interfaces\Middleware;
use Core\Session;

class Authenticate implements Middleware{
    
	/**
	 * Verifica se a condição do middle é verdadeira ou falsa
	 * @return bool
	 */
	public function check(): bool {
        return Session::getSession()->isLogged();
	}
	
	/**
	 * Executa procedimento em middle falso;
	 * @return void
	 */
	public function handle() {
        Action::getActionByController(LoginController::class)->redirect();
	}
}