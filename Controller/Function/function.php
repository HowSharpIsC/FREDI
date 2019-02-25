<?php

    /*
    *   Connection to database
    */
    function connection($bd,$server,$login,$mdp)
    {
        $pdo = new PDO('mysql:host='.$server.';dbname='.$bd,$login,$mdp) or die("Attention, problème de connexion serveur.");
        return $pdo;
    }
    
    //connection("fredi", "localhost", "userfredi", "useriderf");

    

?>