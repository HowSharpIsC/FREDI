<?php

    class Adherent extends Person
    {
        private $gender;
        private $postalAdress;
        private $city;
        private $zipCode;

        public function __construct($lastName,$firstName,$telephoneNumber,$emailAdress,$password,$gender,$postalAdress,$city,$zipCode)
        {
            $this->lastName = $lastName;
            $this->firstName = $firstName;
            $this->telephoneNumber = $telephoneNumber;
            $this->emailAdress = $emailAdress;
            $this->password = $password;
            $this->gender = $gender;
            $this->postalAdress = $postalAdress;
            $this->city = $city;
            $this->zipCode = $zipCode;
        }

        public function getPostalAdress()
        {
            return $this->postalAdress;
        }

        public function getCity()
        {
            return $this->city;
        }

        public function getZipCode()
        {
            return $this->zipCode;
        }

        public function setPostalAdress($arg)
        {
            $this->postalAdress = $arg;
        }

        public function setCity($arg)
        {
            $this->city = $arg;
        }

        public function setZipCode($arg)
        {
            $this->zipCode = $arg;
        }
    }

?>