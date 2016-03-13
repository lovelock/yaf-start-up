<?php

namespace Resources;

use Yaf\Config\Ini;
use Resources\Common;
use \PDO;
use \PDOException;
use Helper\Conf;

class Database extends Common
{
    const TABLE_NAME = 'pdo_test';

    protected static $_type = 'mysql';
    private static $_instance;

    protected static function getInstance()
    {
        if (null === static::$_instance) {
            $database_config = Conf::get('database.params');

            try {
                static::$_instance = new PDO(
                    static::$_type.':host='.$database_config['host'].':'.$database_config['port'].';dbname='.$database_config['dbname'],
                    $database_config['username'],
                    $database_config['password'],
                    [
                        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8mb4'",
                        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    ]
                );
            } catch (PDOException $e) {
                //todo log
            }
        }

        return static::$_instance;
    }

    private function __construct()
    {
    }

    private function __wakeup()
    {
    }

    private function __clone()
    {
    }

}
