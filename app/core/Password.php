<?php

namespace Core;

class Password{
    protected $password;

    public function __construct($password)
    {
        $this->password = md5($password);
    }

    public function __toString()
    {
        return $this->password;
    }

    public function comparePassword($password){
        return $this->password === (string) (new Password($password));
    }


}