<?php

namespace Core;


class Action
{
    private $router;
    public function __construct($controller=null,$action=METHOD_DEFAULT,$parameters = [])
    {
        if($controller){
            $this->router = Router::getRouterByController($controller,$action,$parameters);
        }
        
    }

    static function getActionByUrl($url)
    {
        $action = new Action;
        $action->router = Router::getRouterByUrl($url);
        return $action;
    }

    static function getActionByController($controller,$action=METHOD_DEFAULT,$parameters = []){
        return new Action($controller, $action, $parameters);
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
            , array_merge($this->router->getParameters(),[Request::getRequest()]));
            return;
        }
        die("Rota não cadastrada!"); //mudar para página 404;
    }

    public function getUrl(){
        return APPLICATION_URL.'/'.$this->router->getUrl();
    }

    public function redirect(){
        header('location:' . $this->getUrl());
        die();
    }
}
