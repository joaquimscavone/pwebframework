<?php

use Core\Action;

return [
    [
        'type' => 'item', //item|header
        'label' => 'Dashboard',
        'icon' => 'fas fa-tachometer-alt',
        'action' => Action::getActionByController(\Controllers\HomeController::class),
    ],
    [
        'type' => 'item', //item|header
        'label' => 'Administração',
        'icon' => 'fas fa-cogs',
        'submenu' => [
            [
                'type' => 'item', //item|header
                'label' => 'Usuários',
                'icon' => 'fas fa-users-cog',
                'action' => Action::getActionByController(\Controllers\UsersController::class),
            ],
            [
                'type' => 'item', //item|header
                'label' => 'PHP Info',
                'icon' => 'fab fa-php',
                'action' => Action::getActionByController(\Controllers\AdministracaoController::class,'phpinfo'),
            ],
            [
                'type' => 'item', //item|header
                'label' => 'Testes',
                'icon' => 'fas fa-bug',
                'action' => Action::getActionByController(\Controllers\AdministracaoController::class,'testes'),
            ],
            [
                'type' => 'item', //item|header
                'label' => 'Ícones',
                'icon' => 'fas fa-users-cog',
                'action' => Action::getActionByController(\Controllers\AdministracaoController::class,'icons'),
            ],

        ],

    ],
    [
        'type' => 'item', //item|header
        'label' => 'Perfil',
        'icon' => 'fas fa-user',
        'action' => Action::getActionByController(\Controllers\PerfilController::class),
    ],
  

];
