<?php

namespace Core;

class Hash{

    private $hash;

    public function __construct()
    {
        $hash = openssl_random_pseudo_bytes(20);
        $this->hash = md5(bin2hex($hash));
    }

    public function __toString()
    {
        return $this->hash;
    }
}