<?php

namespace Containers;

use \PDO;
use \PDOException;
use Helper\Conf;

class Dependency
{
    private $_params    = [];
    private $_instances = [];

    public function __construct($params)
    {
        $this->_params = $params;
    }

    public function getDatabase()
    {
        if (null === $this->_instances['db'] || !is_a($this->_instances['db'], '\PDO')) {
            $database_config = Conf::get('database.params');

            try {
                $this->_instances['db'] = new PDO(
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

        return $this->_instances['db'];
    }

    public function getRedis()
    {
        if (null === $this->_instances['redis'] || !is_a($this->_instances['redis'], '\Redis')) {
            $pool = Conf::get('redis');
            $this->_instances['redis'] = new \Redis();
            $this->_instances['redis']->connect('127.0.0.1', 6379, 300);
        }

        return $this->_instances['redis'];
    }

    public function getMemcached()
    {
        if (null === $this->_instances['memcached'] || !is_a($this->_instances['memcached'], '\Memcached')) {
            $this->_instances['memcached'] = new \Memcached();
            $pool = Conf::get('memcached');
            $this->_instances['memcached']->addServers($pool);
        }

        return $this->_instances['memcached'];
    }
}
