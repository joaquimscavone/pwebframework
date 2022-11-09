<?php


namespace Components;
use Core\ViewElement;

class AlertComponent extends ViewElement{
    public function __construct()
    {
        
    }
    public function show(array $data = []){
        echo "<div class='alert alert-info alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h5><i class='icon fas fa-info'></i> Alert!</h5>
        Info alert preview. This alert is dismissable.
      </div>";
    }
}