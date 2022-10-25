<?php


//diretorios do sistema

defined('APPLICATION_PATH')         || define('APPLICATION_PATH', realpath(__DIR__ . '/../..'));
defined('APP_PATH')                 || define('APP_PATH', APPLICATION_PATH . '/app');
defined('TEMPLATES_PATH')           || define('TEMPLATES_PATH', APP_PATH . '/templates');
defined('VIEWS_PATH')               || define('VIEWS_PATH', APP_PATH . '/views');
defined('CONTROLLERS_PATH')         || define('CONTROLLERS_PATH', APP_PATH . '/controllers');
defined('MODELS_PATH')              || define('MODELS_PATH', APP_PATH . '/models');
