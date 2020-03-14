<?php

$number = intval(readline());
$operations = explode(", ", readline());

function cookingByNumbers(int $number, array $operations)
{
    $output = [];

    foreach ($operations as $operation) {

        if ($operation == "chop") {
            $number /= 2;

        } else if ($operation == "dice") {
            $number = sqrt($number);
        } else if ($operation == "spice") {
            $number += 1;
        } else if ($operation == "bake") {
            $number *= 3;
        } elseif ($operation == "fillet") {
            $number *= 0.8;
        }
        $output [] = $number;
    }
    return implode(PHP_EOL, $output);
}

echo cookingByNumbers($number, $operations);
