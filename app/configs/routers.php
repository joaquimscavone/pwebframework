<?php

Core\Router::add('',Controllers\Home::class,'index');
Core\Router::add('/users/{nome}',Controllers\Home::class,'user');
//Core\Router::add('/login',Controllers\login::class,'index');
