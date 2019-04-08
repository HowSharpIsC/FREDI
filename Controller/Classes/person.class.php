<?php

class Person
{
    protected $lastName;
    protected $firstName;
    protected $telephoneNumber;
    protected $emailAdress;
    protected $password;

    //No constructor

    public function getLastName()
    {
        return $this->lastName;
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function getTelNum()
    {
        return $this->telephoneNumber;
    }

    public function getEmailAdress()
    {
        return $this->emailAdress;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setLastName($arg)
    {
        return $this->lastName = $arg;
    }

    public function setFirstName($arg)
    {
        return $this->firstName = $arg;
    }

    public function setTelNum($arg)
    {
        return $this->telephoneNumber = $arg;
    }

    public function setEmailAdress($arg)
    {
        return $this->emailAdress = $arg;
    }

    public function setPassword($arg)
    {
        return $this->password = $arg;
    }
}
?>
