<?php

checkAdherent();

if (Date("Y-m-d") > (Date("Y") . '-12-24')) {
    include "Model/PDF/ghostfly/pdf-forms-filler/example/pdfGeneration.php";
}

?>

<html>
    <div class="col-lg-12">
        <form role="form" id="modificationForm" name="user data modification form" action="" method="POST">
            <div class="form-group row">
                <label class="col-md-2" for="LastName"> Nom :</label>
                <label for="LastName" name="actual"> <?php echo $_SESSION["LastName"] ?> </label>
                <input type="text" id="LastName" name="lastName" class="form-control col-md-3 bg-light border-1 small" value = <?php echo $_SESSION["LastName"] ?> hidden>
            </div>
            <div class="form-group row">
                <label class="col-md-2" for="FirstName"> Prénom :</label>
                <label for="FirstName" name="actual"> <?php echo $_SESSION["FirstName"] ?> </label>
                <input type="text" id="FirstName" name="firstName" class="form-control col-md-3 bg-light border-1 small" value = <?php echo $_SESSION["FirstName"] ?> hidden>
            </div>
            <div class="form-group row">
                <label class="col-md-2" for="Address"> Adresse :</label>
                <label for="Address" name="actual"> <?php echo $_SESSION["Address"] ?> </label>
                <input type="text" id="Address" name="address" class="form-control col-md-3 bg-light border-1 small" value = <?php echo $_SESSION["Address"] ?> hidden>
            </div>
            <div class="form-group row">
                <label class="col-md-2" for="City"> Ville :</label>
                <label for="City" name="actual"> <?php echo $_SESSION["City"] ?> </label>
                <input type="text" id="City" name="city" class="form-control col-md-3 bg-light border-1 small" value = <?php echo $_SESSION["City"] ?> hidden>
            </div>
            <div class="form-group row">
                <label class="col-md-2" for="ZipCode"> Code postal :</label>
                <label for="ZipCode" name="actual"> <?php echo $_SESSION["ZipCode"] ?> </label>
                <input type="text" id="ZipCode" name="zipCode" class="form-control col-md-3 bg-light border-1 small" value = <?php echo $_SESSION["ZipCode"] ?> hidden>
            </div>
            <div class="form-group row">
                <label class="col-md-2" for="Tel"> Téléphone :</label>
                <label for="Tel" name="actual"> <?php echo $_SESSION["Tel"] ?> </label>
                <input type="text" id="Telephone" name="telephone" class="form-control col-md-3 bg-light border-1 small" value = <?php echo $_SESSION["Tel"] ?> hidden>
            </div>
            <div class="form-group row">
                <label class="col-md-2" for="Email"> Adresse e-mail :</label>
                <label for="Email" name="actual"> <?php echo $_SESSION["Email"] ?> </label>
                <input type="text" id="Email" name="email" class="form-control col-md-3 bg-light border-1 small" value = <?php echo $_SESSION["Email"] ?> hidden>
            </div>
            <div class="form-group row">
                <label class="col-md-2" for="League" name="actual"> Club :  </label>
                <label for="League" name="actual"> <?php echo $_SESSION["Club"] ?> </label>
            </div>
            <br>
            <div class="form-group row">
                <input type="button" id="ModifyUserData" name="actual" value="Modifier" class="btn btn-primary mr-3">
                <input type="submit" id="RegisterUserData" name="RegisterUserData" value="Enregistrer" class="btn btn-primary mr-3" hidden>
                <input type="button" id="cancelModifications" value="Annuler" class="btn btn-primary mr-3" hidden>

                <div name="cerfa" <?php if (Date("Y-m-d") < (Date("Y") . '-12-24')) {echo "hidden";} ?>>
                    <a href='<?php echo "View/Ressources/CERFA/" . $_SESSION["LastName"] . $_SESSION["FirstName"] . Date("Y") . ".pdf" ?>' 
                        class="btn btn-primary">Télécharger CERFA</a> 
                </div>
            </div>
        </form>
    </div>
</html>

<?php

if (!empty($_POST["RegisterUserData"])) {
    include "Model/dal/dbAdherentMod.php";
    include "Model/functions/PHP/update.php";
    
    modifyAdherentData();
    updateAdherent();
}

?>

<script src="Model/functions/JS/modification.js"></script>
