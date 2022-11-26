<?php

namespace Components;

use Core\Components;
use Core\Configs;
use Core\Tag;

class SideBarComponent extends Components{
    private static $instance;
    private $menu;
    private function __construct(){
        $this->menu = Configs::getConfig('menu');
    }

    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new SideBarComponent;
        }
        return self::$instance;

    }

    public function show(array $data = [])
    {
        $menu = $this->createMenuTags($this->menu);
        foreach($menu as $item){
            $item->show();
        }
    }

    public function createMenuTags(array $menu){
        $menutags = [];
        foreach ($menu as $item){
            if(isset($item['type']) && $item['type']=='item'){
                $icon = (isset($item['icon'])) ? $item['icon'] : 'fas fa-circle';
                $action = (isset($item['action'])) ? $item['action'] : '#';
                $submenu = (isset($item['submenu'])) ? $item['submenu'] :[];

                

                continue;
            }
            $menutags[] = Tag::create('li','nav-header',$item['label']);
        }
        return $menutags;
            
    }

    private function createItem($label,$icon,$href,$submenus=[]){

    }

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
}