<?php

if (empty($_SESSION) || !$_SESSION["user"] === 0) {
    redirectPhp("connection_form");
}
?>

<html>
    <div class="container">
        <div class="row">
            <div class="col-auto">
                <label for="LastName"> Nom :</label>
            </div>
            <div class="col-auto">
                <label for="LastName" name="actual"> <?php echo $_SESSION["LastName"] ?> </label>
            </div>
            <div class="col-auto" name="modify" hidden>
                <input type="text" id="LastName" value = <?php echo $_SESSION["LastName"] ?>>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <label for="FirstName"> Prénom :</label>
            </div>
            <div class="col-auto">
                <label for="FirstName" name="actual"> <?php echo $_SESSION["FirstName"] ?> </label>
            </div>
            <div class="col-auto" name="modify" hidden>
                <input type="text" id="FirstName" value = <?php echo $_SESSION["FirstName"] ?>>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <label for="Adress"> Adresse :</label>
            </div>
            <div class="col-auto">
                <label for="Adress" name="actual"> <?php echo $_SESSION["Address"] ?> </label>
            </div>
            <div class="col-auto" name="modify" hidden>
                <input type="text" id="Adress" value = <?php echo $_SESSION["Address"] ?>>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <label for="City"> Ville :</label>
            </div>
            <div class="col-auto">
                <label for="City" name="actual"> <?php echo $_SESSION["City"] ?> </label>
            </div>
            <div class="col-auto" name="modify" hidden>
                <input type="text" id="City" value = <?php echo $_SESSION["City"] ?>>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <label for="ZipCode"> Code postal :</label>
            </div>
            <div class="col-auto">
                <label for="ZipCode" name="actual"> <?php echo $_SESSION["ZipCode"] ?> </label>
            </div>
            <div class="col-auto" name="modify" hidden>
                <input type="text" id="ZipCode" value = <?php echo $_SESSION["ZipCode"] ?>>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <label for="Tel"> Téléphone :</label>
            </div>
            <div class="col-auto">
                <label for="Tel" name="actual"> <?php echo $_SESSION["Tel"] ?> </label>
            </div>
            <div class="col-auto" name="modify" hidden>
                <input type="text" id="Telephone" value = <?php echo $_SESSION["Tel"] ?>>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <label for="Email"> Adresse e-mail :</label>
            </div>
            <div class="col-auto">
                <label for="Email" name="actual"> <?php echo $_SESSION["Email"] ?> </label>
            </div>
            <div class="col-auto" name="modify" hidden>
                <input type="text" id="Email" value = <?php echo $_SESSION["Email"] ?>>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <label for="League" name="actual"> Ligue sportive : <?php echo $_SESSION["League"] ?> </label>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <input type="button" id="ModifyUserData" name="actual" value="Modifier" class="btn btn-primary">
            </div>
            <div class="col-auto" name="modify" hidden>
                <input type="button" id="RegisterUserData" value="Enregistrer" class="btn btn-primary">
            </div>
            <div class="col-auto" name="modify" hidden>
                <input type="button" id="cancelModifications" value="Annuler" class="btn btn-primary">
            </div>
            <div class="col-auto" name="cerfa">
                <input type="button" id="cerfa" value="Télécharger CERFA" class="btn btn-primary">
            </div>
            <form id="disconnectionForm" name="user disconnection form" action="" method="POST">
                <div class="col-auto" name="signOut">
                    <input type="submit" id="signOut" name="signOut" value="Déconnexion" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
    <div>
</html>

<?php

if (!empty($_POST["signOut"])) {
    signOut();
}

?>

<script>

var modify = document.getElementById("ModifyUserData");
var register = document.getElementById("RegisterUserData");
var cancel = document.getElementById("cancelModifications");

modify.addEventListener("mouseup", function(){

    var toShow = document.getElementsByName("modify");
    toShow.forEach(elementToShow => {
        elementToShow.hidden = false;
    });

    var toHide = document.getElementsByName("actual");
    toHide.forEach(elementToHide => {
        elementToHide.hidden = true;
    });
});

var lName = document.getElementById("LastName").value;
var fName = document.getElementById("FirstName").value;

register.addEventListener("mouseup", function(){

    var postalAdress = document.getElementById("Adress").value;
    var location = document.getElementById("City").value;
    var zCode = document.getElementById("ZipCode").value;
    var tel = document.getElementById("Telephone").value;
    var mail = document.getElementById("Email").value;

    $.ajax({
        url: "Model/dal/dbAdherentMod.php",
        method: "POST",
        data: { lastName: lName, firstName: fName, adress: postalAdress,
            city: location, zipCode: zCode, telephone: tel, email: mail },
        dataType: "text",
        success: function() {
            var toShow = document.getElementsByName("modify");
            toShow.forEach(elementToHide => {
                elementToHide.hidden = true;
            });

            var toHide = document.getElementsByName("actual");
            toHide.forEach(elementToShow => {
                elementToShow.hidden = false;
            });

            alert("Les modifications ont bien été prises en compte," +
                " vous pourrez les voir lors de votre prochaine connexion.");
        }
    });
});

cancel.addEventListener("mouseup", function(){

    var toShow = document.getElementsByName("modify");
    toShow.forEach(elementToHide => {
        elementToHide.hidden = true;
    });

    var toHide = document.getElementsByName("actual");
    toHide.forEach(elementToShow => {
        elementToShow.hidden = false;
    });
});

var cerfa = document.getElementById("cerfa");
var filledCerfa = "View/Ressources/CERFA/" + lName + "-" + fName + "-" + 
    new Date().getFullYear() + ".pdf";

cerfa.addEventListener("mouseup", function() {
    $.ajax({
        url: "Model/PDF/ghostfly/pdf-forms-filler/example/pdfGeneration.php",
        method: "POST",
        dataType: "text",
        success: function() {
            window.open(filledCerfa, 'Download');
        }
    });
});
</script>
