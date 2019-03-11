<?php

    /*
    *   Connection to database
    */
    function connection($bd,$server,$login,$mdp)
    {
        $pdo = new PDO('mysql:host='.$server.';dbname='.$bd,$login,$mdp) or die("Attention, problème de connexion serveur.");
        return $pdo;
    }
    
    /*
    *   User connection
    */
    function signIn($email,$pw)
    {
        // Connection to database
        $pdo = connection("fredi", "localhost", "userfredi", "useriderf");
        
        // User id and password recovery
        $sql = "SELECT adh_id, adh_mdp FROM adherents WHERE adh_email = :email";
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([
            "email" => $email
        ]);
        
        $result = $stmt->fetch();

        // Closing connection with the database
        $stmt = null;
        $pdo = null;

        // Message if connection fails
        $failToConnect = "L'adresse e-mail ou le mot de passe est incorrect.";

        // Wrong email address
        if(!$result)
        {
            throw new Exception($failToConnect);
        }
        else
        {
            $isPasswordCorrect = password_verify($pw,$result["adh_mdp"]);

            if ($isPasswordCorrect)
            {
                session_start();
                $_SESSION["id"] = $result["adh_id"];
                return;
            }
            else
            {
                // Wrong password
                throw new Exception($failToConnect);
            }
        }
    }
?>