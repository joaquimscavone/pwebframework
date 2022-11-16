<?php


return [
    'forgot_password' => [
        'timeout' => 3*60*60,// tempo em segundo de duração de uma hash de redefinição de senha;
        'delay' => 5*60,// tempo em segundos para solicitação de uma nova hash de redefinição de senha;
    ]
];