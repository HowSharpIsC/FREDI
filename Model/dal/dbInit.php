<?php
/**
 *  Connection to database
 */
function connection()
{
    $user = 'adminfredi';
    $pass = 'iderf';
    $host = 'localhost';
    $port = '3306';
    $base = 'fredi';
    $dsn="mysql:$host;port=$port;dbname=$base";
    
    $pdo = new PDO($dsn, $user, $pass) or die(
        "Attention, problème de connexion serveur."
    );
    return $pdo;
}

/**
 *   User connection
 */
function signIn($email,$pw)
{
    include "dbSelection.php";

    $adherentFound = adherentSelection($email);
    
    $failToConnect = "L'adresse e-mail ou le mot de passe est incorrect.";

    // Not an adherent
    if (!$adherentFound) {
        $treasurerFound = treasurerSelection($email);

        // Not a treasurer
        if (!$treasurerFound) {
            throw new Exception($failToConnect);
        } else {
            $isPasswordCorrect = password_verify($pw, $treasurerFound["trs_mdp"]);
            if ($isPasswordCorrect) {
                session_start();
                
                $_SESSION["id"] = $adherentFound["adh_id"];
                $_SESSION["LastName"] = $adherentFound["adh_nom"];
                $_SESSION["FirstName"] = $adherentFound["adh_prenom"];
                
                return;
            } else {
                // Wrong password
                throw new Exception($failToConnect);
            }
        }
    } else {
        $isPasswordCorrect = password_verify($pw, $adherentFound["adh_mdp"]);
        if ($isPasswordCorrect) {
            session_start();
            
            $_SESSION["id"] = $adherentFound["adh_id"];
            $_SESSION["LastName"] = $adherentFound["adh_nom"];
            $_SESSION["FirstName"] = $adherentFound["adh_prenom"];
            $_SESSION["Address"] = $adherentFound["adh_adr"];
            $_SESSION["City"] = $adherentFound["adh_ville"];
            $_SESSION["ZipCode"] = $adherentFound["adh_cp"];
            $_SESSION["Tel"] = $adherentFound["adh_num"];
            $_SESSION["Email"] = $adherentFound["adh_email"];
            $_SESSION["League"] = $adherentFound["lg_nom"];
            
            return;
        } else {
            // Wrong password
            throw new Exception($failToConnect);
        }
    }
}

/**
 *   User Disconnection
 */
function signOut()
{
    // Loading actual session
    session_start();

    // Wiping $_SESSION variable data
    session_unset();

    // Ending actual session
    session_destroy();

    // Redirecting user to homepage
    header('location: ../../View/PHP/index.php');
}
?>
