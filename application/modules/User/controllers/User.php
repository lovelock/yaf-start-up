<?php

use Http\Response;
use Http\Context;
use Persistence\DatabaseUserRepository;

class UserController extends \BaseController
{
    private $_repository;

    public function init(UserRepository $repository)
    {
        $this->_repository = $repository;
    }

    public function showAction()
    {
        $id = Context::postInt('id', '1');

        $user = $this->_repository->getUser($id);

        $this->getView()->assign([
            'user' => $user,
        ]);
    }
    public function newAction()
    {
        $name   = Context::postString('name', 'aName');
        $email  = Context::postString('email', 'aMail');
        $age    = Context::postInt('age', 0);
        $gender = Context::postString('gender', 'male');

        $result = \UserModel::addNewUser($name, $email, $age, $gender);

        return new Response($result);
    }

    public function updateAction()
    {
        $id    = Context::postInt('id', '0');
        $email = Context::postString('email', 'aMail');

        $result = \UserModel::updateEmail($id, $email);

        return new Response($result);
    }

    public function listAction()
    {
        $start = Context::queryInt('start', 1);
        $limit = Context::queryInt('limit', 10);

        $result = \UserModel::showAll($start, $limit);

        return new Response($result);
    }
}
