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
        
        // User data recovery
        $sql = "SELECT adh_id,adh_nom,adh_prenom,adh_adr,
                        adh_ville,adh_cp,adh_num,adh_email,
                        adh_mdp,lg_id 
                FROM adherents 
                WHERE adh_email = :email";
        $stmt = $pdo->prepare($sql);
        
        $stmt->execute([
            "email" => $email
        ]);
        
        // Method fetch() returns false if there is no line returned by the request
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

    /*
    *   User Disconnection
    */
    function signOut()
    {
        // Loading actual session
        session_start();

        // Wiping $_SESSION variable data
        $_SESSION = array();

        // Ending actual session
        session_destroy();
    }
?>