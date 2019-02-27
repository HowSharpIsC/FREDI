<html>
    <div>
        <form id="creationForm" name="adherent creation form" action="" method="POST">
            <div class="container">
                <div class="row">
                    <div class="col-auto">
                        <p>Informations du nouvel adhérent : </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <label for="LastName">Nom : </label>
                        <input type="text" id="lastName" name="last_name">
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <label for="FirstName">Prénom : </label>
                        <input type="text" id="firstName" name="first_name">
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <label for="Gender">Sexe : </label>

                        <label for="Female">Femme</label>
                        <input type="radio" id="female" name="gender" value = "2">

                        <label for="Male">Homme</label>
                        <input type="radio" id="male" name="gender" value = "1">
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <label for="PostalAddress">Adresse postale : </label>
                        <input type="text" id="address" name="postal_address">
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <label for="City">Ville : </label>
                        <input type="text" id="city" name="city">
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <label for="ZipCode">Code postal : </label>
                        <input type="text" id="zipCode" name="zip_code" minlength="5" maxlength="5">
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <label for="TelephoneNumber">Numéro de téléphone : </label>
                        <input type="tel" id="telNum" name="telephone_number" pattern="[0-9]{10}" minlength="10" maxlength="10">
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <label for="email">Adresse e-mail : </label>
                        <input type="email" id="mail" name="email_address">
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <label for="League">Ligue sportive : </label>
                        <select name="league">
                            <option value="1">Handball</option>
                            <option value="2">Volleyball</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <label for="password">Mot de passe : </label>
                        <input type="password" id="pw" name="password">
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <input type="submit" id="validation" name="creation_Form_Validation" value="Inscription">
                    </div>
                </div>
            </div>
        </form>
    </div>
</html>

<?php
	//test if connection button has been activated
	if(!empty($_POST["creation_Form_Validation"]))
	{
		$_valid = "Formulaire validé";

        $email = $_POST["email_address"];
        $password = $_POST["password"];
        $gender = $_POST["gender"];
        $postalAdress = $_POST["postal_address"];
        $city = $_POST["city"];
        $zipCode = $_POST["zip_code"];
        $league = $_POST["league"];
        $lastName = $_POST["last_name"];
        $firstName = $_POST["first_name"];
        $telephoneNumber = $_POST["telephone_number"];

        $_POST = null;
        
        try {
            require("../../Controller/Classes/adherent.class.php");

            new Adherent($lastName,$firstName,$telephoneNumber,$email,
                            $password,$gender,$postalAdress,$city,
                            $zipCode,$league);

        } catch (exception $th) {
            throw $th;
        }

	}
	else
	{
		$_valid = "";
		echo $_valid;
	}
?>