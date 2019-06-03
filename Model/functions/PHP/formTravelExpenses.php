<?php

if (!empty($_POST["travel_expenses_validation"])) {

    if (validateExpenses()) {
        $reason = $_POST["reason"];
        $date = $_POST["date"];
        $journey = $_POST["journey"];
        $power = $_POST["power"];
        $km = $_POST["km"];
        $lodging = $_POST["lodging"];
        $food = $_POST["food"];
        $toll = $_POST["toll"];

        $_POST = null;

        include "Model/dal/dbExpenses.php";
        include "Model/functions/PHP/expenses.php";

        $pricingSystem = kilometerCost($km, $power);
        $kmCost = $pricingSystem[0];
        $rate = $pricingSystem[1];

        try {
            expenseStatement(
                $reason, $date, $journey, $km, $kmCost,
                $rate, $lodging, $food, $toll
            );

            redirectScript("index.php?page=travelExpenses");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}

?>
