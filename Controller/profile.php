<html>
    <div class="container">
        <div class="row">
            <div class="col-auto">
                <label for="LastName"> Nom :</label>
            </div>
            <div class="col-auto">
                <label for="LastName" name="register"> <?php echo $_SESSION["LastName"] ?> </label>
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
                <label for="FirstName" name="register"> <?php echo $_SESSION["FirstName"] ?> </label>
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
                <label for="Adress" name="register"> <?php echo $_SESSION["Adress"] ?> </label>
            </div>
            <div class="col-auto" name="modify" hidden>
                <input type="text" id="Adress" value = <?php echo $_SESSION["Adress"] ?>>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <label for="City"> Ville :</label>
            </div>
            <div class="col-auto">
                <label for="City" name="register"> <?php echo $_SESSION["City"] ?> </label>
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
                <label for="ZipCode" name="register"> <?php echo $_SESSION["ZipCode"] ?> </label>
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
                <label for="Tel" name="register"> <?php echo $_SESSION["Tel"] ?> </label>
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
                <label for="Email" name="register"> <?php echo $_SESSION["Email"] ?> </label>
            </div>
            <div class="col-auto" name="modify" hidden>
                <input type="text" id="Email" value = <?php echo $_SESSION["Email"] ?>>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <label for="League" name="register"> Ligue sportive :<?php echo $_SESSION["League"] ?> </label>
            </div>
        </div>
        <div class="row">
            <div class="col-auto">
                <input type="button" id="ModifyUserData" name="register" value="Modifier" class="btn btn-primary">
            </div>
            <div class="col-auto" name="modify" hidden>
                <input type="button" id="RegisterUserData" value="Enregistrer" class="btn btn-primary">
            </div>
        </div>
    </div>
    <div>
</html>

<script>

var modify = document.getElementById("ModifyUserData");
var register = document.getElementById("RegisterUserData");

modify.addEventListener("mouseup", function(){

    var toShow = document.getElementsByName("modify");
    toShow.forEach(elementToShow => {
        elementToShow.hidden = false;
    });

    var toHide = document.getElementsByName("register");
    toHide.forEach(elementToHide => {
        elementToHide.hidden = true;
    });
});

</script>
