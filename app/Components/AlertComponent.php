<?php


namespace Components;

use Core\Session;
use Core\ViewElement;

class AlertComponent extends ViewElement{
    const ALERT_DANGER = 'danger';
    const ALERT_INFO = 'info';
    const ALERT_WARNING = 'warning';
    const ALERT_SUCCESS = 'success';
    private $title,$text,$type;

    private static $message_session_name = '__FLASH_MESSAGE__';
    public function __construct($title="",$text="",$type = self::ALERT_INFO)
    {
        $this->title = $title;
        $this->text = $text;
        $this->type = $type;
    }
    
    private function typeValidate($type):array{
        $array = [self::ALERT_INFO,'fas fa-info'];
        switch($type){
            case self::ALERT_DANGER: 
                $array = [self::ALERT_DANGER,'fas fa-ban'];
                break;
            case self::ALERT_WARNING: 
                $array = [self::ALERT_WARNING,'fas fa-exclamation-triangle'];
                break;
            case self::ALERT_SUCCESS: 
                $array = [self::ALERT_SUCCESS,'fas fa-check'];
                break;
        }
        return $array;
    }

    public function show(array $data = []){
        $title = (array_key_exists('title', $data)) ? $data['title'] : $this->title;
        $text = (array_key_exists('text', $data)) ? $data['text'] : $this->text;
        [$type,$icon] = $this->typeValidate((array_key_exists('type', $data)) ? $data['type'] : $this->type);

        echo "<div class='alert alert-$type alert-dismissible'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h5><i class='icon $icon'></i> $title</h5>
        $text
      </div>";
    }

    public static function addFlashMessage($title,$text,$type = self::ALERT_INFO){
        $session = Session::getSession();
        $msn = self::$message_session_name;
        if(!isset($session->$msn)){
            $session->$msn = [];
        }
        $alerts = $session->$msn;
        $alerts[] = ['title'=>$title, 'text'=>$text, 'type'=>$type];
        $session->$msn = $alerts;
    }

    public static function flushMessage(){
        $session = Session::getSession();
        $msn = self::$message_session_name;
        if (isset($session->$msn)) {
            foreach ($session->$msn as $alert) {
                $obj = new AlertComponent($alert['title'], $alert['text'], $alert['type']);
                $obj->show();
            }
        }
        $session->$msn = [];
    }
}

