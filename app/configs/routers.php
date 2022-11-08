<?php

Core\Router::add('',Controllers\HomeController::class,'index');
Core\Router::add('/login',Controllers\LoginController::class,'index');
Core\Router::add('/cadastro',Controllers\LoginController::class,'cadastro');
//Core\Router::add('/login',Controllers\login::class,'index');
