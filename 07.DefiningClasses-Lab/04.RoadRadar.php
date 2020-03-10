<?php

$speed = intval(readline());
$area = readline();


function getLimit(string $area): int
{
    if ($area == "city") {
        return 50;
    } else if ($area == "interstate") {
        return 90;
    } else if ($area == "motorway") {
        return 130;
    } else if ($area == "residential") {
        return 20;
    }
}

$limit = getLimit($area);

function roadRadar($speed, $limit):string
{
    $overSpeed = $speed - $limit;
    if ($overSpeed < 0) {
        return "";
    } else if ($overSpeed >= 0 && $overSpeed <= 20) {
        return "speeding";
    } else if ($overSpeed > 20 && $overSpeed <= 40) {
        return "excessive speeding";
    } else {
        return "reckless driving";
    }
}


    echo roadRadar($speed, $limit);
