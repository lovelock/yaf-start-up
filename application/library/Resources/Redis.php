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
            static::$_instance = new RedisArray($pool);
        }

        return static::$_instance;
    }

    public static function set($key, $value)
    {
        try {
            return static::getInstance()->set($key, $vlaue);
        } catch (RedisException $e) {
            var_dump($e->getMessage());
            exit;
        }
    }

    public static function get($key)
    {
        return static::getInstance()->get($key);
    }
}
