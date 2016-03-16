<?php

namespace Model;

class User
{
    private $_name;
    private $_email;
    private $_age;
    private $_gender;

    public function __construct($name, $email, $age, $gender)
    {
        $this->_name   = $name;
        $this->_email  = $email;
        $this->_age    = $age;
        $this->_gender = $gender;
    }

    public function getName()
    {
        return $this->_name;
    }

    public function setName($name)
    {
        $this->_name = $name;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    public function setEmail($email)
    {
        $this->_email = $email;
    }

    public function getAge()
    {
        return $this->_age;
    }

    public function setAge($age)
    {
        $this->_age = $age;
    }

    public function getGender()
    {
        return $this->_gender;
    }

    public function setGender($gender)
    {
        $this->_gender = $gender;
    }
}
