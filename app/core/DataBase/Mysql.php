<?php


namespace Core\DataBase;


class Mysql extends DataBaseDriver{
    protected $connection_parameters_default = [
        'driver'        =>      'mysql',
        'host'          =>      'localhost',
        'port'          => 3306,
        'options'       => [\PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'],

    ];
}