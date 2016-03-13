<?php

namespace Resources;

use Resources\Common;
use \Memcached;
use Helper\Conf;

class Memcached extends Common
{
    protected static $_type = 'memcached';
    private static $_instance;

    public static function getInstance()
    {
        if (null === static::$_instance) {
            static::$_instance = new Memcached();
            $pool = Conf::get('memcached');
            static::$_instance->addServers($pool);
        }

        return static::$_instance;
    }

    public static function set($key, $value)
    {
        return static::getInstance()->set($key, $value);
    }

    public static function get($key)
    {
        return static::getInstance()->get($key);
    }

    private function hashKey($key)
    {
    }


    public static function getServerList()
    {
        return static::getInstance()->getServerList();
    }
}
