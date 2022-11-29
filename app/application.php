<?php


require_once 'configs/constantes.php';
date_default_timezone_set(TIME_ZONE);
require_once 'Core/Autoload.php';
set_exception_handler([\Core\Error::class, 'exception']);
require_once 'configs/routers.php';