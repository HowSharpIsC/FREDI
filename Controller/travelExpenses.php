<?php

checkAdherent();

?>

<html>
    <form id="travelExpenses" name="travel expenses form" action="" method="POST">
        <div class="row" id="reason">
            <div class="col-4">
                <label for="reason">Motif</label>
            </div>
            <div class="col-auto">
                <select id="slctReason" name="reason" class="bg-light py-2 rounded">
                    <option value=0>--Choisissez le motif--</option>
                    <option value=1>Réunion</option>
                    <option value=2>Compétition régionale</option>
                    <option value=3>Compétition nationale</option>
                    <option value=4>Compétition internationale</option>
                    <option value=5>Stage</option>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4">
                <label for="date">Date de l'événement </label>
            </div>
            <div class="col-auto">
                <input type="date" id="date" name="date" class="form-control bg-light border-1 small" value=<?php echo date("Y-m-d", time()) ?> 
                        min=<?php echo date("Y", time()) . "-01-01" ?> 
                        max=<?php echo date("Y-m-d", time()) ?>>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4">
                <label for="journey">Trajet </label>
            </div>
            <div class="col-auto">
                <input type="text" id="journey" name="journey" class="form-control bg-light border-1 small" placeholder="ex: Metz-Paris" required>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4">
                <label for="fraisKm">Distance </label>
            </div>
            <div class="col-auto">
                <input type="text" id="kilometers" name="km" class="form-control bg-light border-1 small" placeholder="ex: 332" size=5>
            </div>
            <div class="col-auto">
                <span>km</span>
            </div>
        </div>
        <div class="row" id="power" hidden>
            <div class="col-4">
                <label for="power">Puissance administrative du véhicule </label>
            </div>
            <div class="col-auto">
                <select id="slctPower" name="power" class="bg-light py-2 collapse-inner rounded">
                    <option value=0>--Choisissez la puissance--</option>
                    <option value=3>3 CV ou moins</option>
                    <option value=4>4 CV</option>
                    <option value=5>5 CV</option>
                    <option value=6>6 CV</option>
                    <option value=7>7 CV ou plus</option>
                </select>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4">
                <label for="lodging">Hébergement </label>
            </div>
            <div class="col-auto">
                <input type="text" id="lodging" name="lodging" class="form-control bg-light border-1 small" placeholder="ex: 50" size=2>
            </div>
            <div class="col-auto">
                <span>€</span>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4">
                <label for="food">Repas </label>
            </div>
            <div class="col-auto">
                <input type="text" id="food" name="food" class="form-control bg-light border-1 small" placeholder="ex: 5" size=2>
            </div>
            <div class="col-auto">
                <span>€</span>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-4">
                <label for="toll">Péage </label>
            </div>
            <div class="col-auto">
                <input type="text" id="toll" name="toll" class="form-control bg-light border-1 small" placeholder="ex: 26" size=2>
            </div>
            <div class="col-auto">
                <span>€</span>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-auto">
                <input type="submit" id="validation" name="travel_expenses_validation" value="Valider" class="btn btn-primary">
            </div>
        </div>
    </form>
</html>

<script src="Model/functions/JS/formTravelExpenses.js"></script>

<?php

require "Model/functions/PHP/formTravelExpenses.php";

?>
