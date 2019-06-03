<?php

function kilometerCost($km, $power)
{
    $distanceCost = 0;
    $rate = 0;

    switch ($power) {
    case '3':
        $rate = 0.451;
        $distanceCost = $km * $rate;        
        break;
    case '4':
        $rate = 0.518;
        $distanceCost = $km * $rate;
        break;
    case '5':
        $rate = 0.543;
        $distanceCost = $km * $rate;
        break;
    case '6':
        $rate = 0.568;
        $distanceCost = $km * $rate;
        break;
    case '7':
        $rate = 0.595;
        $distanceCost = $km * $rate;
        break;
    default:
        break;
    }

    $pricingSystem = array($distanceCost, $rate);

    return $pricingSystem;
}

function getAdherentExpenses($id)
{
    $expenses = expensesSelection($id);

    for ($i=0; $i < count($expenses); $i++) { 
        echo "<tr>";

        for ($j=0; $j < 6; $j++) {
            $value = $expenses[$i][$j];

            echo "<td ";

            if ($expenses[$i][6] == 1) {
                echo "class='bg-success'";
            } else {
                echo "class='bg-danger'";
            }
            
            echo "> <span class='text-dark'>$value</span></td>";
        }
        echo "</tr>";
    }
}

function getAllAdherentExpenses()
{    
    include "Model/dal/dbSelection.php";

    $expenses = expensesToDealWith();

    for ($i=0; $i < count($expenses); $i++) { 
        echo "<tr>";
        echo '<form class="text-center" id="travelExpensesManagement" name="travelExpensesManagementForm" action="#" method="POST">';

        for ($j=1; $j < 7; $j++) {
            $value = $expenses[$i][$j];
            echo "<td><label name='". $i ."'> $value </label></td>";
        }
        echo '<td>
                <input type="submit" id="AcceptExpenses" name="'. $i .'" value="Valider" class="btn btn-primary mr-1">
                <input type="submit" id="RefuseExpenses" name="'. $i .'" value="Refuser" class="btn btn-primary mr-1">
             </td>';
        echo "</form>";
        echo "</tr>";
    }
    return $expenses;
}

function getAdherentExpensesDealtWith()
{
    include "Model/dal/dbSelection.php";

    $expenses = expensesDealtWith();

    for ($i=0; $i < count($expenses); $i++) { 
        echo "<tr>";

        for ($j=0; $j < 7; $j++) {
            $value = $expenses[$i][$j];

            echo "<td ";

            if ($expenses[$i][7] == 1) {
                echo "class='bg-success'";
            } else {
                echo "class='bg-danger'";
            }
            
            echo "> <span class='text-dark'>$value</span></td>";
        }
        echo "</tr>";
    }
}

?>
