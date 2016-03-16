<?php

namespace Model;

/**
 * Interface: UserRepository
 *
 */
Interface UserRepository
{
    /**
     * getUsers
     *
     */
    public function getUsers();

    /**
     * getUser
     *
     * @param integer $id
     */
    public function getUser($id);
}

