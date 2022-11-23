<?php
namespace Core;

use DateTime;

class Date extends DateTime{


    const DATE_MASK_DEFAULT = 'Y-m-d H:i:s';

    public function __toString()
    {
        return $this->format(self::DATE_MASK_DEFAULT);
    }

    public function diffSeconds(DateTime $date = new Date()){
        return $date->getTimestamp() - $this->getTimestamp();
    }

    public function modifySeconds(int $seconds)
    {
        return parent::modify("$seconds second");
    }

    public function getFormat($format){
        return $this->formrt($format);
    }
}