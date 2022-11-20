<?php


namespace Core;

use Exception;

/**
 * Summary of Router
 */
class Router
{
    private static $routers = [];
    private $url;
    private $controller;
    private $method;

    private $parameters;

    private $middlewares = [];

    private function __construct($url, $controller, $method)
    {
        $this->url = $url;
        $this->controller = $controller;
        $this->method = $method;
        $this->parameters = array_fill_keys($this->getRouterParameters($url),null);
    }

    public function __get($name)
    {
        if(array_key_exists($name,$this->parameters)){
            return $this->parameters[$name];
        }
        return null;
    }

    public function __set($name, $value)
    {
        if (array_key_exists($name, $this->parameters)) {
            $this->parameters[$name] = $value;
        }
    }


    private function getRouterParameters($url){
        if (preg_match_all("(\{[a-z0-9_]{1,}\})", $url, $m)){
            return preg_replace('(\{|\})','',$m[0]);
        }
        return [];
    }

    public static function add($url, $controller, $method)
    {
        if(substr($url,0,1)==='/'){
            $url = substr_replace($url, '', 0, 1);
        }
        if(!file_exists(APP_PATH . "/".str_replace("\\","/",$controller).".php")){
            throw new Exception("Erro ao Adicionar a Rota, o Controller: \"$controller\" não existe ERRO  Arquivo:".__FILE__." Linha:".__LINE__);
        }

        if(!method_exists($controller,$method)){
            throw new Exception("Erro ao Adicionar a Rota, o Método: \"$method\" não existe no Controller: \"$controller\" ERRO Arquivo:".__FILE__." Linha:".__LINE__);
        }

        self::$routers[$url] = new Router($url, $controller, $method);
        return self::$routers[$url];
    }

    /**
     * Retorna a url da rota baseada nos parametros informados
     * @return string
     */
    public function getUrl()
    {
        $url = $this->url;
        foreach ($this->parameters as $key => $param) {
            $url = str_replace('{' . $key . '}', urlencode($param), $url);
        }
        return $url;
    }

    public function getController(){
        return $this->controller;
    }

    public function getMethod(){
        return $this->method;
    
    }
    public function getParameters(){
        return $this->parameters;
    }

    /**
     *  @return Router|false retorna falso caso a rota não exista;
     */
    public static function getRouterByController($controller, $method, $parameters = [])
    {
        foreach(self::$routers as $router_url => $router){
            if($router->controller != $controller || $router->method != $method){
                continue;
            }
            $matchs = preg_match_all("(\{[a-z0-9_]{1,}\})", $router_url);
            if($matchs == count($parameters)){
                foreach($parameters as $key => $value){
                    $router->$key = $value;
                }
                return $router;
            }
        }
        return false;
    }

    /**
     *  @return Router|false retorna falso caso a rota não exista;
     */
    public static function getRouterByUrl($url)
    {
        foreach (self::$routers as $router_url => $router) {
            $expression = preg_replace("(\{[a-z0-9_]{1,}\})", "([a-zA-Z0-9_\-|\s]{1,})", $router_url);
            if(preg_match('#^('.$expression.')*$#i',$url,$matches)===1){
                array_shift($matches);
                array_shift($matches);
                foreach($router->parameters as &$param){
                    $param = urldecode(array_shift($matches));
                }
                return $router;
            }
            ///produto/([a-zA-Z0-9_\-|\s]{1,})/([a-zA-Z0-9_\-|\s]{1,})
        }
        return false;
    }

          /**
           * Summary of addMiddleware
           * @param string|array $middleware apelido do middle ou a classe ou marray com vários deles
           * @return void
           */
    
    public function addMiddleware($middleware){
        $conf_middlewares = Configs::getConfig('middlewares');
        if(is_string($middleware)){
            $middleware = [$middleware];
        }
        foreach($middleware as $mid){
            if(array_key_exists($mid,$conf_middlewares)){
                $this->middlewares[] = $conf_middlewares[$mid];
            }else{
                $this->middlewares[] = $mid;
            }
        }
        return $this;
    }
}


