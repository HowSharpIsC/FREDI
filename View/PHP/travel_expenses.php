<?php

session_start();

if (empty($_SESSION) || !$_SESSION["user"] === 0) {
    redirectPhp("connection_form");
}

?>
<html>
    <div>
        <form id="travelExpenses" name="travel expenses form" action="" method="POST">
            <div class="container">
                <div class="row">
                    <div class="col-auto">
                        <p>Déclarez vos frais de déplacements</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <label for="date">Date de l'événement : </label>
                    </div>
                    <div class="col-auto">
                        <input type="date" id="date" name="date" value=<?php echo date("Y-m-d", time()) ?> 
                                min=<?php echo date("Y", time()) . "-01-01" ?> 
                                max=<?php echo date("Y-m-d", time()) ?>>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <label for="journey">Trajet :</label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="journey" name="journey" placeholder="Metz-Paris" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <label for="fraisKm">Kilomètres : </label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="kilometers" name="km" placeholder=332 size=2>
                        <span>km</span>
                    </div>
                </div>
                <div class="row" id="power" hidden>
                    <div class="col-auto">
                        <label for="power">Puissance administrative du véhicule:</label>
                    </div>
                    <div class="col-auto">
                        <select id="slctPower" name="power">
                            <option value=0>--Choisissez la puissance--</option>
                            <option value=3>3 CV ou moins</option>
                            <option value=4>4 CV</option>
                            <option value=5>5 CV</option>
                            <option value=6>6 CV</option>
                            <option value=7>7 CV ou plus</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <label for="lodging">Hébergement : </label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="lodging" name="lodging" placeholder=50 size=2>
                        <span>€</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <label for="food">Repas : </label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="food" name="food" placeholder=5 size=2>
                        <span>€</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <label for="toll">Péage : </label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="toll" name="toll" placeholder=26 size=2>
                        <span>€</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <input type="submit" id="validation" name="travel_expenses_validation" value="Valider" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>
</html>

<script>

var divPower = document.getElementById("power");
var slctPower = document.getElementById("slctPower");
var km = document.getElementById("kilometers");
var validation = document.getElementById("validation");

validation.addEventListener("click", validatePower);
validation.addEventListener("click", validateKm);

km.addEventListener("keyup", function() {

    if (km.value != "") {
        divPower.hidden = false;
    } else {
        divPower.hidden = true;
    }
});

</script>

<?php

if (!empty($_POST["travel_expenses_validation"])) {
    $date = $_POST["date"];
    $journey = $_POST["journey"];
    $power = $_POST["power"];
    $km = $_POST["km"];
    $lodging = $_POST["lodging"];
    $food = $_POST["food"];
    $toll = $_POST["toll"];

    $_POST = null;

    try {
        include "Model/dal/dbExpenses.php";
        include "Model/functions/PHP/expenses.php";

        $km = kilometerCost($km, $power);

        expenseStatement($date, $journey, $km, $lodging, $food, $toll);

        redirectScript("travel_expenses");

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

?>
