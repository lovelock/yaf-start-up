<?php

namespace Persistence;

use Model\UserRepository;
use Containers\Dependency;

class DatabaseUserRepository implements UserRepository
{
    const TABLE_NAME = 'yaf_user';

    private $_db;
    private $_users;

    public function __construct(Dependency $dependency)
    {
        $this->_db    = $dependency->getDatabase();
        $this->_users = $this->fetchAll();
    }

    public function getUsers()
    {
        return $this->_users;
    }

    public function getUser($id)
    {
        return $this->_users[$id];
    }

    private function fetchAll()
    {
        $sql = "SELECT * FROM `".static::TABLE_NAME."` ORDER BY `id`";
        return static::getInstance()->query($sql)->fetchAll(PDO::FETCH_OBJ, 'User');
    }
}
