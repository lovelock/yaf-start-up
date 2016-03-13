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

    public static function getInstance()
    {
        if (static::$_instance === null) {
            $database_config = Conf::get('database.params');

            try {
                static::$_instance = new PDO(
                    $dns = static::$_type.':host='.$database_config['host'].':'.$database_config['port'].';dbname='.$database_config['dbname'],
                    $database_config['username'],
                    $database_config['password'],
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    ]
                );
            } catch (PDOException $e) {
                //todo log
            }
        }

        return static::$_instance;
    }

    public static function fetchAll()
    {
        try {
            $stmt = static::getInstance()->query('select * from '.static::TABLE_NAME);
            $result = $stmt->fetchAll();
        } catch (PDOException $e) {
            //todo log
        }

        return $result;
    }

    public static function findById($id)
    {
        try {
            $stmt = static::getInstance()->prepare('select * from '.static::TABLE_NAME.' where `id` = :id');
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetch();
        } catch (PDOException $e) {
            //todo log
        }

        return $result;
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
