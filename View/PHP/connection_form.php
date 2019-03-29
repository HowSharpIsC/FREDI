<html>
    <div>
        <form id="connectionForm" name="user connection form" action="" method="POST">
            <div class="container">
                <div class="row">
                    <div class="col-auto">
                        <p>Se connecter : </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <label for="email">Adresse mail : </label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="mail" name="email_adress">
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <label for="password">Mot de passe : </label>
                    </div>
                    <div class="col-auto">
                        <input type="password" id="pw" name="password">
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <input type="submit" id="validation" name="connection_Form_Validation" value="Connexion">
                    </div>
                </div>
            </div>
        </form>
    </div>
</html>

<?php
	//test if connection button has been activated
	if(!empty($_POST["connection_Form_Validation"]))
	{
        $email = $_POST["email_adress"];
		$password = $_POST["password"];
        $_POST = null;
        
        try {
            require("../../Controller/dal/dbInit.php");

            echo signIn($email,$password);

            header("Location: index.php?page=profile");

        } catch (Exception $e) {
            echo $e->getMessage();
        }
	}
?>