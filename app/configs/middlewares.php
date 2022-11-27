<?php

use Core\Interfaces\Middleware;

return [
'auth'=> Middlewares\Authenticate::class,
'noAuth'=> Middlewares\NoAuthenticate::class,
'isAdmin' => Middlewares\IsAdmin::class,
];