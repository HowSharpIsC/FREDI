<?php
session_start();
        
if (!empty($_SESSION)) {
    if ($_SESSION["user"] === 1) {

    } elseif ($_SESSION["user"] === 2) {
        echo '
        <nav class="navbar navbar-expand-lg navbar-expand-md navbar-expand-sm navbar-light bg-transparent">
            <a class="navbar-brand" href="#">Espace personnel</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="index.php?page=profile">Profile<span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="index.php?page=travel_expenses">Déclarer frais</a>
                    <a class="nav-item nav-link" href="#">Consulter frais</a>
                    <a class="nav-item nav-link" href="Model/functions/PHP/signOut.php">Déconnexion</a>
                </div>
            </div>
        </nav>'
        ;
    } else {
    
    }
}
?>
