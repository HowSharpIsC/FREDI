<?php	
require_once "dbInit.php";

function adherentSelection($email)
{
    // Connection to database
    $pdo = connection();

    // User data recovery
    $sql = "call adherentSelection(:email)";
    
    $stmt = $pdo->prepare($sql);

    $stmt->execute(
        ["email" => $email]
    );

    // Method fetch() returns false if there is no line returned by the request
    $result = $stmt->fetch();

    // Closing connection with the database
    $stmt = null;
    $pdo = null;

    return $result;
}

function treasurerSelection($email)
{
    // Connection to database
    $pdo = connection();

    // User data recovery
    $sql = "call tresorierSelection(:email)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute(
        ["email" => $email]
    );

    // Method fetch() returns false if there is no line returned by the request
    $result = $stmt->fetch();

    // Closing connection with the database
    $stmt = null;
    $pdo = null;

    return $result;
}

function clubSelection($id)
{
    $pdo = connection();

    $sql = "call clubSelection(:id)";
    
    $stmt = $pdo->prepare($sql);

    $stmt->execute(
        [
            "id" => $id
        ]
    );

    $result = $stmt->fetch();

    $stmt = null;
    $pdo = null;

    return $result;
}

function expensesSelection($id)
{
    $pdo = connection();

    $sql = "SELECT frs_date, frs_trjt, frs_km, frs_hbg, frs_repas, frs_peage,
                   frs_trjtV, frs_kmV, frs_hbgV, frs_repasV, frs_peageV
            FROM frais
            WHERE adh_id = :id
            ORDER BY frs_date";
    
    $stmt = $pdo->prepare($sql);

    $stmt->execute(
        [
            "id" => $id
        ]
    );

    $result = $stmt->fetchAll();

    $stmt = null;
    $pdo = null;

    return $result;
}

function expensesToDealWith()
{
    $pdo = connection();

    $sql = "SELECT adh_id, frs_date, frs_trjt, frs_km, frs_hbg, frs_repas, frs_peage
            FROM frais NATURAL JOIN adherents
            WHERE frs_peageV = 2 or frs_repasV = 2 or frs_hbgV = 2 or 
                  frs_kmV = 2 or frs_trjtV = 2
            ORDER BY frs_date";
    
    $stmt = $pdo->prepare($sql);

    $stmt->execute();

    $result = $stmt->fetchAll();

    $stmt = null;
    $pdo = null;

    return $result;
}

function expensesDealtWith()
{
    $pdo = connection();

    $sql = "SELECT frs_date, frs_trjt, frs_km, frs_hbg, frs_repas, frs_peage, trs_id,
                   frs_trjtV, frs_kmV, frs_hbgV, frs_repasV, frs_peageV
            FROM frais NATURAL JOIN tresorier
            WHERE frs_peageV is not null or frs_repasV is not null or 
                  frs_hbgV is not null or frs_kmV is not null or 
                  frs_trjtV is not null
            ORDER BY frs_date";
    
    $stmt = $pdo->prepare($sql);

    $stmt->execute();

    $result = $stmt->fetchAll();

    $stmt = null;
    $pdo = null;

    return $result;
}

?>
