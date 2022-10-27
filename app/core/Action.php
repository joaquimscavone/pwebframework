<?php

namespace Core;


class Action
{
    private $router;
    public function __construct()
    {
    }


    static function getActionByUrl($url)
    {
        $action = new Action;
        $action->router = Router::getRouterByUrl($url);
        return $action;
    }

    public function run()
    {
        if ($this->router) {
            $controller = new ($this->router->getController());
            call_user_func_array(
                [
                    $controller,
                    $this->router->getMethod()
                ]
            , $this->router->getParameters());
            return;
        }
        die("Rota não cadastrada!"); //mudar para página 404;
    }
}
