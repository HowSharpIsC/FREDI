<?php

function expenseStatement($date, $journey, $km, $lodging, $food, $toll)
{
    include_once "dbInit.php";
    
    $id = $_SESSION["id"];

    $pdo = connection();

    $sql = "INSERT INTO frais (frs_date, frs_trjt, frs_km, frs_hbg, frs_repas, 
                                frs_peage,adh_id)
            VALUES  (:expDate, :journey, :km, :lodging, :food, :toll, :id)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute(
        [
        "expDate" => $date,
        "journey" => $journey,
        "km" => $km,
        "lodging" => $lodging,
        "food" => $food,
        "toll" => $toll,
        "id" => $id
        ]
    );

    $stmt = null;
    $pdo = null;
}

?>
