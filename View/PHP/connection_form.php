<html>
    <div>
        <form id="connectionForm" name="user connection form" action="" method="POST">
            <div class="container">
                <div class="row">
                    <div class="col-auto">
                        <p>Se connecter</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <label for="email">Adresse mail : </label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="mail" name="email_adress" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <label for="password">Mot de passe :</label>
                    </div>
                    <div class="col-auto">
                        <input type="password" id="pw" name="password" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <input type="submit" id="validation" name="connection_Form_Validation" value="Connexion" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>
</html>

<script>

var email = document.getElementById("mail");
var pw = document.getElementById("pw");
var validation = document.getElementById("validation");

email.addEventListener("keyup", validateEmail);
validation.addEventListener("click", validatePw);

</script>

<?php
/**
 * Test if connection button has been activated
 */
if (!empty($_POST["connection_Form_Validation"])) {

    include "Model/functions/PHP/validation.php";

    if (validateSignIn()) {
        $email = $_POST["email_adress"];
        $password = $_POST["password"];
        $_POST = null;
        
        try {
            include "Model/dal/dbInit.php";
    
            signIn($email, $password);
    
            if ($_SESSION["user"]) {
                
            } else {
                redirectScript("profile");
            }
    
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}
?>
