<?php

Core\Router::add('',Controllers\Home::class,'index');
Core\Router::add('/login',Controllers\login::class,'index');
