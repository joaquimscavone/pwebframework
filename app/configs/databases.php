<?php

return 
[
    'default' => 
    [
        'driver'        =>      'mysql',
        'host'           =>      'localhost',
        'database'      =>      'framework',
        'user'          =>      'root',
        'password'      =>      '',
        'port'          => 3306
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