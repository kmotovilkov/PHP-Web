<?php

$input = (explode(", ", readline()));
$matrix = [];
$sizeMatrix = $input[0];
$pattern = $input[1];
$currentNumber = 1;

if (strtoupper($pattern) == "A") {
    for ($col = 0; $col < $sizeMatrix; $col++) {
        for ($row = 0; $row < $sizeMatrix; $row++) {
            $matrix[$row][$col] = $currentNumber;
            $currentNumber++;
        }
    }
} elseif (strtoupper($pattern) == "B") {
    for ($col = 0; $col < $sizeMatrix; $col++) {
        if ($col % 2 == 0) {
            for ($row = 0; $row < $sizeMatrix; $row++) {
                $matrix[$row][$col] = $currentNumber;
                $currentNumber++;
            }
        } else {
            for ($row = $sizeMatrix - 1; $row >= 0; $row--) {
                $matrix[$row] [$col] = $currentNumber;
                $currentNumber++;
            }
        }
    }
}
for ($row = 0; $row < $sizeMatrix; $row++) {
    for ($col = 0; $col < $sizeMatrix; $col++) {
        echo $matrix[$row][$col] . " ";
    }
    echo PHP_EOL;
}
