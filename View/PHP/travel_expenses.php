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
                        <label for="journey">Trajet : </label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="journey" name="journey" value=0>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <label for="fraisKm">Kilomètres : </label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="Kilometers" name="Km" value=0>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <label for="lodging">Hébergement : </label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="lodging" name="lodging" value=0>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <label for="food">Repas : </label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="food" name="food" value=0>
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto">
                        <label for="toll">Péage : </label>
                    </div>
                    <div class="col-auto">
                        <input type="text" id="toll" name="toll" value=0>
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

<?php

if (!empty($_POST["travel_expenses_validation"])) {
    $date = $_POST["date"];
    $journey = $_POST["journey"];
    $km = $_POST["Km"];
    $lodging = $_POST["lodging"];
    $food = $_POST["food"];
    $toll = $_POST["toll"];

    $_POST = null;

    try {
        include "Model/dal/dbExpenses.php";

        expenseStatement($date, $journey, $km, $lodging, $food, $toll);

        redirectScript("travel_expenses");

    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

?>
