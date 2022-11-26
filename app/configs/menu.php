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
        'type'=>"header",
        'label'=>'header teste'
    ]

];



/*
         <li class="nav-header">MULTI LEVEL EXAMPLE</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i>
              <p>
                Level 1
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>
                    Level 2
                    <i class="right fas fa-angle-left"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="far fa-dot-circle nav-icon"></i>
                      <p>Level 3</p>
                    </a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Level 2</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="fas fa-circle nav-icon"></i>
              <p>Level 1</p>
            </a>
          </li>
          */