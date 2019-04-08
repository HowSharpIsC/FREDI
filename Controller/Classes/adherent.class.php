<?php

require "person.class.php";
require "../../Model/dal/dbInit.php";

class Adherent extends Person
{
    private $_gender;
    private $_postalAdress;
    private $_city;
    private $_zipCode;
    private $_subscriptionDate;
    private $_league;

    public function __construct(
        $lastName, $firstName, $telephoneNumber, $emailAdress,
        $password, $gender, $postalAdress, $city,
        $zipCode, $league
    ) {
        $this->setLastName($lastName);
        $this->setFirstName($firstName);
        $this->setTelNum($telephoneNumber);
        $this->setEmailAdress($emailAdress);
        $this->setPassword(password_hash($password, PASSWORD_BCRYPT));
        $this->gender = $gender;
        $this->postalAdress = $postalAdress;
        $this->city = $city;
        $this->zipCode = $zipCode;
        $this->league = $league;
        $this->subscriptionDate = date("Y-m-d");
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

    public function newAdherent()
    {
        try {
            $pdo = connection();
        
            $sql = "INSERT INTO adherents (adh_nom,adh_prenom,adh_sexe,adh_date,
                                            adh_adr,adh_ville,adh_cp,adh_num,
                                            adh_email,adh_mdp,lg_id)
                                VALUES (:lastName,:firstName,:gender,
                                        :subscriptionDate,:postalAdress,
                                        :city,:zipCode,:telephoneNumber,
                                        :emailAdress,:pw,:league)";        
            $stmt = $pdo->prepare($sql);
            $stmt->execute(
                [
                "lastName" => $this->lastName,
                "firstName" => $this->firstName,
                "gender" => $this->gender,
                "subscriptionDate" => $this->subscriptionDate,
                "postalAdress" => $this->postalAdress,
                "city" => $this->city,
                "zipCode" => $this->zipCode,
                "telephoneNumber" => $this->telephoneNumber,
                "emailAdress" => $this->emailAdress,
                "pw" => $this->password,
                "league" => $this->league
                ]
            );
        } catch (Exception $e) {
            throw $e;
        } finally {
            $pdo = null;
            $stmt = null;
        }
    }
}

?>
