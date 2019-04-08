<?php

require "dbInit.php";
session_start();

$lName = $_POST["lastName"];
$fName = $_POST["firstName"];
$postalAdress = $_POST["adress"];
$city = $_POST["city"];
$zCode = $_POST["zipCode"];
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
        "lastName" => $lName,
        "firstName" => $fName,
        "adress" => $postalAdress,
        "city" => $city,
        "zipCode" => $zCode,
        "telephone" => $tel,
        "email" => $email,
        "id" => $id
        ]
    );
} catch (Exception $e) {
    throw $e;
} finally {
    $stmt = null;
    $pdo = null;
    $_POST = null;
}

?>
