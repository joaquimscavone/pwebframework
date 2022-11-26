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
        'icon' => 'fas fa-tachometer-alt',
        'submenu' => [
            [
                'type' => 'item', //item|header
                'label' => 'Usuários',
                'icon' => 'fas fa-users-cog',
                'action' => Action::getActionByController(\Controllers\HomeController::class),
            ],
            [
                'type' => 'item', //item|header
                'label' => 'PHP Info',
                'icon' => 'fas fa-users-cog',
                'action' => Action::getActionByController(\Controllers\HomeController::class),
            ],
            [
                'type' => 'item', //item|header
                'label' => 'Ícones',
                'icon' => 'fas fa-users-cog',
                'action' => 'https://fontawesome.com/v5/search?o=r&m=free',
            ],
        ]
    ],
    [
        'label'=>'CONFIGURAÇÕES'
    ]

];



