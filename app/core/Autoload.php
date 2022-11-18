<?php



spl_autoload_register(
    function($class){
        $frameworkfile = APP_PATH . "/".str_replace("\\","/",$class).".php";
        if(file_exists($frameworkfile)){
            require_once $frameworkfile;
            return;
        }

        $lib = explode("\\", $class);
        $filename = array_pop($lib);
        array_push($lib, 'src');
        array_push($lib, $filename);
        require_once LIBS_PATH . "/" . implode('/', $lib) . ".php";
        
    }
);