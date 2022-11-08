<?php

Core\Router::add('',Controllers\HomeController::class,'index');
Core\Router::add('/login',Controllers\LoginController::class,'index');
Core\Router::add('/cadastro',Controllers\LoginController::class,'cadastro');
Core\Router::add('/login/logar',Controllers\LoginController::class,'logar');
Core\Router::add('/cadastro/cadastrar',Controllers\LoginController::class,'cadastrar');
Core\Router::add('/esqueici-minha-senha',Controllers\LoginController::class,'redefinirSenha');
Core\Router::add('/termos-de-servico',Controllers\TermosController::class,'index');
//Core\Router::add('/login',Controllers\login::class,'index');
