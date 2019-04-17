<?php

function kilometerCost($km, $power)
{
    $distanceCost;

    switch ($power) {
    case '3':
        $distanceCost = $km * 0.451;
        break;
    case '4':
        $distanceCost = $km * 0.518;
        break;
    case '5':
        $distanceCost = $km * 0.543;
        break;
    case '6':
        $distanceCost = $km * 0.568;
        break;
    case '7':
        $distanceCost = $km * 0.595;
        break;
    default:
        $distanceCost = 0;
        break;
    }

    return $distanceCost;
}
?>
