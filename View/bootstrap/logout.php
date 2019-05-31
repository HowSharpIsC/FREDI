<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Souhaitez-vous vous déconnecter?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Cliquez sur "Se déconnecter" si vous êtes sûr(e) de vouloir mettre fin à votre session.</div>
            <div class="modal-footer">
                <form id="disconnectionForm" name="user disconnection form" action="" method="POST">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Annuler</button>
                    <input type="submit" id="signOut" name="signOut" value="Déconnexion" class="btn btn-primary">
                </form>
            </div>
        </div>
    </div>
</div>

<?php

if (!empty($_POST["signOut"])) {
    include "../../Model/functions/PHP/signOut.php";
    signOut();
}

?>
