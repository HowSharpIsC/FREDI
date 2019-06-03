<?php	
require_once "dbInit.php";

function adherentSelection($email)
{
    // Connection to database
    $pdo = connection();

    // User data recovery
    $sql = "SELECT adh_id, adh_nom, adh_prenom, adh_adr,
    			   adh_ville, adh_cp, adh_num, adh_email,
    			   adh_mdp, club_nom
    		FROM adherents NATURAL JOIN club
    		WHERE adh_email = :email";
    
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
    $sql = "SELECT trs_id, trs_nom, trs_prenom, trs_num, trs_email, trs_mdp
            FROM tresoriers
            WHERE trs_email = :email";

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

    $sql = "SELECT club_nom, club_adresse, club_codePostal, club_ville
            FROM club NATURAL JOIN adherents
            WHERE adh_id = :id";
    
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
            WHERE frs_peageV is null or frs_repasV is null or frs_hbgV is null or 
                  frs_kmV is null or frs_trjtV is null
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
            FROM frais NATURAL JOIN tresoriers
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
