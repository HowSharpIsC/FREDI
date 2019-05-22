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
?>
