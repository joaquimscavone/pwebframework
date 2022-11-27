<?php


namespace Middlewares;

use Controllers\HomeController;
use Core\Action;
use Core\Interfaces\Middleware;
use Core\Session;

class IsAdmin implements Middleware{
    
	/**
	 * Verifica se a condição do middle é verdadeira ou falsa
	 * @return bool
	 */
	public function check(): bool {
        $user = Session::getSession()->getUser();
        if($user){
            return $user->admin === 1;
        }
        return false;
	}
	
	/**
	 * Executa procedimento em middle falso;
	 * @return void
	 */
	public function handle() {
        Action::getActionByController(HomeController::class)->redirect();
	}
}