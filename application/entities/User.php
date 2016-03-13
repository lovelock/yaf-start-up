<?php

namespace Entity;

use Containers\Dependency;

class User extends Base
{
    public $_db;

    public function __construct(Dependency $container)
    {
        $this->_db = $container->getDatabase();
    }
}
