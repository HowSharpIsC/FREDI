<?php

function modifyAdherentData()
{
    include "dbInit.php";
    
    $lastName = $_POST["lastName"];
    $firstName = $_POST["firstName"];
    $postalAddress = $_POST["address"];
    $city = $_POST["city"];
    $zipCode = $_POST["zipCode"];
    $tel = $_POST["telephone"];
    $email = $_POST["email"];
    $id = $_SESSION["id"];
    
    try {
        $pdo = connection();
    
        $sql = "UPDATE adherents
                SET adh_nom = :lastName, adh_prenom = :firstName, adh_adr = :adress,
                    adh_ville = :city, adh_cp = :zipCode, adh_num = :telephone,
                    adh_email = :email
                WHERE adh_id = :id";
    
        $stmt = $pdo->prepare($sql);
    
        $stmt->execute(
            [
            "lastName" => $lastName,
            "firstName" => $firstName,
            "adress" => $postalAddress,
            "city" => $city,
            "zipCode" => $zipCode,
            "telephone" => $tel,
            "email" => $email,
            "id" => $id
            ]
        );
    } catch (Exception $e) {
        throw $e;
    }
}

?>
