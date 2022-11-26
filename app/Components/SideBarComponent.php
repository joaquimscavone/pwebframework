<?php

namespace Components;

use Core\Components;

class SideBarComponent extends Components{
    private static $instance;
    private function __construct(){

    }

    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new SideBarComponent;
        }
        return self::$instance;

    }

    public function show(array $data = [])
    {
        
    }
}