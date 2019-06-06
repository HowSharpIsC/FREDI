<?php

$file = file("Liste_Licencies.csv");

require "Model/dal/dbInit.php";

$lname = "";
$fname = "";
$date = "";
$gender = "";
$addr = "";
$city = "";
$zipCode = "";
$tel = "";
$email = "";
$pw = "";
$club = "";

$delimitor = ';';

for ($i=0; $i < 40; $i++) {
    $values = explode($delimitor, $file[$i]);

    for ($j=0; $j < 11; $j++) {
        switch ($j) {
        case 0:
            $lname = $values[$j];
            break;
        case 1:
            $fname = $values[$j];
            break;
        case 2:
            $date = $values[$j];
            break;
        case 3:
            $gender = $values[$j];
            break;
        case 4:
            $addr = $values[$j];
            break;
        case 5:
            $city = $values[$j];
            break;
        case 6:
            $zipCode = $values[$j];
            break;
        case 7:
            $tel = $values[$j];
            break;
        case 8:
            $email = $values[$j];
            break;
        case 9:
            $pw = $values[$j];
            break;
        case 10:
            $club = $values[$j];
            break;
        default:
            break;
        }
    }

    $pdo = connection();

    $sql = "INSERT INTO adherents (adh_nom, adh_prenom, adh_date, adh_sexe, adh_adr, 
                        adh_ville, adh_cp, adh_num, adh_email, adh_mdp, club_id)
            VALUES  (:lname, :fname, :bDate, :gender, :addr, :city, :zipCode, 
                    :tel, :email, :pw, :club)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute(
        [
        "lname" => $lname,
        "fname" => $fname,
        "bDate" => $date,
        "gender" => $gender,
        "addr" => $addr,
        "city" => $city,
        "zipCode" => $zipCode,
        "tel" => $tel,
        "email" => $email,
        "pw" => $pw,
        "club" => $club
        ]
    );

}

?>
