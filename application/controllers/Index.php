<?php

class IndexController extends \BaseController
{
    private $_repository;

    public function init()
    {
        $this->_repository = new Persistence\DatabaseUserRepository();
    }

    public function indexAction()
    {
        $this->getView()->assign([
            'users' => $this->_repository->getUsers(),
        ]);
    }
}
