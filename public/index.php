<?php

require_once '../app/application.php';
require_once '../app/core/Router.php';

use core\Router;
Router::add('/home', 'Home', 'index');
// Router::add('/profile/{iduser}', 'Profile', 'getUser');
Router::add('/produto/{idproduct}/{description}/{c}/{p}', 'Product', 'getProduct');

echo '<pre>';
var_dump(Router::getRouterByUrl("/produto/1/joaquim/aula/75"));

///prodcut/{idproduct}/{description}

//idproduct description => produtct/15/arcondicionado //string

//produtct/15/arcondicionado => controller e o action dessa rota; // rota

//controller, action, parametres => url // rota