<?php	
require_once "dbInit.php";

function adherentSelection($email)
{
    // Connection to database
    $pdo = connection();

    // User data recovery
    $sql = "SELECT adh_id,adh_nom,adh_prenom,adh_adr,
    				adh_ville,adh_cp,adh_num,adh_email,
    				adh_mdp,lg_nom
    		FROM adherents NATURAL JOIN ligue_sportive
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
    $sql = "SELECT trs_id,trs_nom,trs_prenom,trs_mdp
            FROM tresoriers
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
?>
