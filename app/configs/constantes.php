<?php


//diretorios do sistema

defined('APPLICATION_PATH')         || define('APPLICATION_PATH', realpath(__DIR__ . '/../..'));
defined('APP_PATH')                 || define('APP_PATH', APPLICATION_PATH . '/app');
defined('TEMPLATES_PATH')           || define('TEMPLATES_PATH', APP_PATH . '/Templates');
defined('VIEWS_PATH')               || define('VIEWS_PATH', APP_PATH . '/Views');
defined('CONTROLLERS_PATH')         || define('CONTROLLERS_PATH', APP_PATH . '/Controllers');
defined('MODELS_PATH')              || define('MODELS_PATH', APP_PATH . '/Models');
defined('CONFIGS_PATH')             || define('CONFIGS_PATH', APP_PATH . '/Configs');
defined('LIBS_PATH')                || define('LIBS_PATH', APPLICATION_PATH . '/Libs');



//constantes do framework

defined('TEMPLATE_DEFAULT')         || define('TEMPLATE_DEFAULT', 'main.template.php');
defined('METHOD_DEFAULT')           || define('METHOD_DEFAULT', 'index');
defined('CONNECTION_NAME_DEFAULT')  || define('CONNECTION_NAME_DEFAULT', 'default');
defined('APPLICATION_ENV')          || define('APPLICATION_ENV', 'development'); //production utilizado pelo usuário final e development em fase de desenvolvimento
defined('APPLICATION_URL')          || define('APPLICATION_URL', 'http://framework.localhost');
defined('APPLICATION_LANG')         || define('APPLICATION_LANG', 'pt-br');
defined('APPLICATION_NAME')         || define('APPLICATION_NAME', 'Framework');
defined('APPLICATION_CHARSET')      || define('APPLICATION_CHARSET', 'utf-8');
defined('PAGE_404')                 || define('PAGE_404', APPLICATION_URL.'/notfound');
defined('TIME_ZONE')                || define('TIME_ZONE', 'America/Araguaina');