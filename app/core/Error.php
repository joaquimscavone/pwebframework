<?php

namespace Core;

use Exception;

class Error{

    public static function exception(Exception $e){
        if(APPLICATION_ENV != 'development'){
            
            if(defined('PAGE_500')){
                header('location: ' . PAGE_500);
            }
            return;
        }
        throw $e;


    }
}