<?php

namespace Core;

use Controllers\ErroPagesController;
use Core\Interfaces\Controller as InterfacesController;

class Controller implements InterfacesController{

	/**
	 * Redirecionar para outro controller
	 *
	 * @param string $controller
	 * @param string $method
	 * @param array $parameters
	 * @return void
	 */
	public function redirect(string $controller, string $method = METHOD_DEFAULT, array $parameters = array()): void {
        Action::getActionByController($controller, $method, $parameters)->redirect();
	}
	
	/**
	 * Redireciona para página 404 do sistema;
	 * @return void
	 */
	public function error404(): void {
        $this->redirect(ErroPagesController::class, 'page404');
	}
	
	/**
	 * Redireciona para página de erro 500 do sistema;
	 *
	 * @param mixed $error
	 * @return void
	 */
	public function error500($error = null): void {
        $this->redirect(ErroPagesController::class, 'page500');
	}
    
}