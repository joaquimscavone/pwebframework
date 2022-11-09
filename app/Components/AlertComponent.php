<?php


namespace Components;
use Core\ViewElement;

class AlertComponent extends ViewElement{
    const ALERT_DANGER = 'danger';
    const ALERT_INFO = 'info';
    const ALERT_WARNING = 'warning';
    const ALERT_SUCCESS = 'success';
    private $title,$text,$type;
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
}

// <div class="alert alert-danger alert-dismissible">
// <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
// <h5><i class="icon fas fa-ban"></i> Alert!</h5>
// Danger alert preview. This alert is dismissable. A wonderful serenity has taken possession of my
// entire
// soul, like these sweet mornings of spring which I enjoy with my whole heart.
// </div>


// <div class="alert alert-info alert-dismissible">
// <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
// <h5><i class="icon fas fa-info"></i> Alert!</h5>
// Info alert preview. This alert is dismissable.
// </div>
// <div class="alert alert-warning alert-dismissible">
// <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
// <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
// Warning alert preview. This alert is dismissable.
// </div>
// <div class="alert alert-success alert-dismissible">
// <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
// <h5><i class="icon fas fa-check"></i> Alert!</h5>
// Success alert preview. This alert is dismissable.
// </div>