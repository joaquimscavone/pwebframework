<?php

return 
[
    'default' => 
    [
        'class'         =>      '\Core\DataBase\Mysql',
        'database'      =>      'framework',
        'user'          =>      'root',
        'password'      =>      '',
        
    ],
    'administrativo' => 
    [
        'driver'        =>      'mysql',
        'host'           =>      'localhost',
        'database'      =>      'adm',
        'user'          =>      'root',
        'password'      =>      ''
    ],
    'logs' => 
    [
        'driver'        =>      'mongodb',
        'host'           =>      'localhost',
        'database'      =>      'logs',
        'user'          =>      'root',
        'password'      =>      ''
    ]

];