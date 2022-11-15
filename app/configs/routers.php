<?php

Core\Router::add('',Controllers\HomeController::class,'index');
Core\Router::add('/login',Controllers\Login\LoginController::class,'index');
Core\Router::add('/cadastro',Controllers\Login\LoginController::class,'cadastro');
Core\Router::add('/login/logar',Controllers\Login\LoginController::class,'logar');
Core\Router::add('/cadastro/cadastrar',Controllers\Login\LoginController::class,'cadastrar');
Core\Router::add('/esqueici-minha-senha',Controllers\Login\LoginController::class,'redefinirSenha');
Core\Router::add('/termos-de-servico',Controllers\TermosController::class,'index');
//Core\Router::add('/login',Controllers\login::class,'index');
