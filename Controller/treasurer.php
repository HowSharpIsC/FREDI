<?php

checkTreasurer();

?>

<html>
    <div class="container">
        <div class="row">
            <div class="col-2">
                <label for="LastName"> Nom :</label>
            </div>
            <div class="col-auto">
                <label for="LastName" name="actual"> <?php echo $_SESSION["LastName"] ?> </label>
            </div>
            <div class="col-auto" name="modify" hidden>
                <input type="text" id="LastName" class="form-control bg-light border-1 small" value = <?php echo $_SESSION["LastName"] ?>>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-2">
                <label for="FirstName"> Prénom :</label>
            </div>
            <div class="col-auto">
                <label for="FirstName" name="actual"> <?php echo $_SESSION["FirstName"] ?> </label>
            </div>
            <div class="col-auto" name="modify" hidden>
                <input type="text" id="FirstName" class="form-control bg-light border-1 small" value = <?php echo $_SESSION["FirstName"] ?>>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-2">
                <label for="Tel"> Téléphone :</label>
            </div>
            <div class="col-auto">
                <label for="Tel" name="actual"> <?php echo $_SESSION["Tel"] ?> </label>
            </div>
            <div class="col-auto" name="modify" hidden>
                <input type="text" id="Telephone" class="form-control bg-light border-1 small" value = <?php echo $_SESSION["Tel"] ?>>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-2">
                <label for="Email"> Adresse e-mail :</label>
            </div>
            <div class="col-auto">
                <label for="Email" name="actual"> <?php echo $_SESSION["Email"] ?> </label>
            </div>
            <div class="col-auto" name="modify" hidden>
                <input type="text" id="Email" class="form-control bg-light border-1 small" value = <?php echo $_SESSION["Email"] ?>>
            </div>
        </div>
        <br>
    </div>
</html>
