<?php

namespace Resources;

use Resources\Common;
use Helper\Conf;
use \RedisArray;
use \RedisException;

class Redis extends Common
{
    protected static $_type = 'reids';
    private static $_instance;

    public static function getInstance()
    {
        if (null === static::$_instance) {
            $pool = Conf::get('redis');
            //static::$_instance = new RedisArray($pool);
            static::$_instance = new \Redis();
            static::$_instance->connect('127.0.0.1', 6379, 300);
        }

        return static::$_instance;
    }

    public static function set($key, $value, $expires = 0)
    {
        try {
            return static::getInstance()->set($key, $vlaue, $expires);
        } catch (RedisException $e) {
            var_dump($e->getMessage());
            exit;
        }
    }

    public static function get($key)
    {
        return static::getInstance()->get($key);
    }

    public static function getVersion()
    {
        return static::getInstance()->getVersion();
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
