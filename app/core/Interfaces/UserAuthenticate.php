<?php


namespace Core\Interfaces;

interface UserAuthenticate{

    public static function login(string $user, string $password): UserAuthenticate|false;
    public function logout():bool;

}