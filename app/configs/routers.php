<?php

Core\Router::add('',Controllers\HomeController::class,'index');
Core\Router::add('/notfound',Controllers\ErroPagesController::class,'page404');
Core\Router::add('/error',Controllers\ErroPagesController::class,'page500');

Core\Router::add('/login',Controllers\Login\LoginController::class,'index');
Core\Router::add('/cadastro',Controllers\Login\LoginController::class,'cadastro');
Core\Router::add('/login/logar',Controllers\Login\LoginController::class,'logar');
Core\Router::add('/cadastro/cadastrar',Controllers\Login\LoginController::class,'cadastrar');

Core\Router::add('/termos-de-servico',Controllers\TermosController::class,'index');
//Core\Router::add('/login',Controllers\login::class,'index');


//rotas de redefinição de senha
Core\Router::add('/esqueici-minha-senha',Controllers\Login\SenhaController::class,'index');
Core\Router::add('/senha/registrar',Controllers\Login\SenhaController::class,'criarRegistroEsqueciMinhaSenha');
Core\Router::add('/senha/redefinir/{hash1}/{hash2}',Controllers\Login\SenhaController::class,'telaRedefinirSenha');
Core\Router::add('/senha/alterar/{hash1}/{hash2}',Controllers\Login\SenhaController::class,'actionRedefinirSenha');