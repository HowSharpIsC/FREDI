<?php

    /*
    *   Connection to database
    */
    function connection()
    {
        $user = 'adminfredi';
		$pass = 'iderf';
		$host = 'localhost';
		$port = '3306';
		$base = 'fredi';
        $dsn="mysql:$host;port=$port;dbname=$base";
        
        $pdo = new PDO($dsn,$user,$pass) or die("Attention, problème de connexion serveur.");
        return $pdo;
    }
    
    /*
    *   User connection
    */
    function signIn($email,$pw)
    {
        require ("dbSelection.php");

        $adherentFound = adherentSelection($email);

        $failToConnect = "L'adresse e-mail ou le mot de passe est incorrect.";

        // Wrong email address
        if(!$adherentFound)
        {
            throw new Exception($failToConnect);
        }
        else
        {
            $isPasswordCorrect = password_verify($pw,$adherentFound["adh_mdp"]);

            if ($isPasswordCorrect)
            {
                session_start();
                
                $_SESSION["id"] = $adherentFound["adh_id"];
                $_SESSION["nom"] = $adherentFound["adh_nom"];
                $_SESSION["prenom"] = $adherentFound["adh_prenom"];
                $_SESSION["adresse"] = $adherentFound["adh_adresse"];
                $_SESSION["ville"] = $adherentFound["adh_ville"];
                $_SESSION["cp"] = $adherentFound["adh_cp"];
                $_SESSION["tel"] = $adherentFound["adh_num"];
                $_SESSION["email"] = $adherentFound["adh_email"];
                $_SESSION["ligue"] = $adherentFound["lg_id"];

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