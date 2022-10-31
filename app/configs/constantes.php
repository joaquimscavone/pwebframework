<?php


//diretorios do sistema

defined('APPLICATION_PATH')         || define('APPLICATION_PATH', realpath(__DIR__ . '/../..'));
defined('APP_PATH')                 || define('APP_PATH', APPLICATION_PATH . '/app');
defined('TEMPLATES_PATH')           || define('TEMPLATES_PATH', APP_PATH . '/Templates');
defined('VIEWS_PATH')               || define('VIEWS_PATH', APP_PATH . '/Views');
defined('CONTROLLERS_PATH')         || define('CONTROLLERS_PATH', APP_PATH . '/Controllers');
defined('MODELS_PATH')              || define('MODELS_PATH', APP_PATH . '/Models');
defined('CONFIGS_PATH')             || define('CONFIGS_PATH', APP_PATH . '/Configs');



//constantes do framework

defined('TEMPLATE_DEFAULT')         || define('TEMPLATE_DEFAULT', 'sistema.php');
defined('CONNECTION_NAME_DEFAULT')  || define('CONNECTION_NAME_DEFAULT', 'default');