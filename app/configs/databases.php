<?php

return 
[
    'default' => 
    [
        'driver'        =>      'mysql',
        'url'           =>      'localhost',
        'database'      =>      'framework',
        'user'          =>      'root',
        'password'      =>      ''
    ],
    'administrativo' => 
    [
        'driver'        =>      'mysql',
        'url'           =>      'localhost',
        'database'      =>      'adm',
        'user'          =>      'root',
        'password'      =>      ''
    ],
    'logs' => 
    [
        'driver'        =>      'mongodb',
        'url'           =>      'localhost',
        'database'      =>      'logs',
        'user'          =>      'root',
        'password'      =>      ''
    ]

];