<?php

function expenseStatement($reason, $date, $journey, $km, $kmCost, $rate,
    $lodging, $food, $toll
) {
    include_once "dbInit.php";
    
    $id = $_SESSION["id"];

    $pdo = connection();

    $sql = "INSERT INTO frais (frs_date, frs_trjt, frs_km, frs_hbg, frs_repas, 
                                frs_peage,adh_id, mtf_id, frs_distance, frs_tauxKm)
            VALUES  (:expDate, :journey, :kmCost, :lodging, :food, :toll, :adhId, 
                    :mtfId, :distance, :rate)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute(
        [
        "expDate" => $date,
        "journey" => $journey,
        "kmCost" => $kmCost,
        "lodging" => $lodging,
        "food" => $food,
        "toll" => $toll,
        "adhId" => $id,
        "mtfId" => $reason,
        "distance" => $km,
        "rate" => $rate
        ]
    );

    $stmt = null;
    $pdo = null;
}

function getExpenses()
{
    include_once "dbInit.php";
    
    $id = $_SESSION["id"];

    $pdo = connection();

    $sql = "SELECT frs_date, mtf_libelle, frs_trjt, frs_distance, frs_tauxKm, 
                frs_km, frs_hbg, frs_repas, frs_peage
            FROM frais NATURAL JOIN motifs
            WHERE adh_id = :id";

    $stmt = $pdo->prepare($sql);

    $stmt->execute(
        [
        "id" => $id
        ]
    );

    $expenses = $stmt->fetchAll();

    $stmt = null;
    $pdo = null;

    return $expenses;
}

function acceptExpenses($id, $date, $journey)
{
    include_once "dbInit.php";

    $trsId = $_SESSION["id"];

    $pdo = connection();

    $sql = "UPDATE frais
            SET frs_trjtV = :journeyV, frs_kmV = :km, frs_hbgV = :lodging, 
                frs_repasV = :food, frs_peageV = :toll, trs_id = :trsId
            WHERE adh_id = :id AND frs_date = :expDate AND frs_trjt = :journey";

    $stmt = $pdo->prepare($sql);

    $stmt->execute(
        [
        "journeyV" => 1,
        "km" => 1,
        "lodging" => 1,
        "food" => 1,
        "toll" => 1,
        "trsId" => $trsId,
        "id" => $id,
        "expDate" => $date,
        "journey" => $journey
        ]
    );

    $stmt = null;
    $pdo = null;
}

function refuseExpenses($id, $date, $journey)
{
    include_once "dbInit.php";

    $trsId = $_SESSION["id"];

    $pdo = connection();

    $sql = "UPDATE frais
            SET frs_trjtV = :journeyV, frs_kmV = :km, frs_hbgV = :lodging, 
                frs_repasV = :food, frs_peageV = :toll, trs_id = :trsId
            Where adh_id = :id AND frs_date = :expDate AND frs_trjt = :journey";

    $stmt = $pdo->prepare($sql);

    $stmt->execute(
        [
        "journeyV" => 0,
        "km" => 0,
        "lodging" => 0,
        "food" => 0,
        "toll" => 0,
        "trsId" => $trsId,
        "id" => $id,
        "expDate" => $date,
        "journey" => $journey
        ]
    );

    $stmt = null;
    $pdo = null;
}

?>
