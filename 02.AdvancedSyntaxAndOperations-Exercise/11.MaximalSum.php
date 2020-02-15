<?php

list($row, $col) = array_map("intval", explode(" ", readline()));
$matrix = [];

for ($i = 0; $i < $row; $i++) {
    $matrix[$i] = array_map("intval", explode(" ", readline()));
}
$maxSum = 0;
$outRow = 0;
$outCal = 0;

for ($j = 0; $j < count($matrix) - 2; $j++) {
    for ($k = 0; $k < count($matrix[$j]) - 2; $k++) {
        $sum = $matrix[$j][$k]
            + $matrix[$j][$k + 1]
            + $matrix[$j][$k + 2]
            + $matrix[$j + 1][$k]
            + $matrix[$j + 1][$k + 1]
            + $matrix[$j + 1][$k + 2]
            + $matrix[$j + 2][$k]
            + $matrix[$j + 2][$k + 1]
            + $matrix[$j + 2][$k + 2];


        if ($sum > $maxSum) {
            $maxSum = $sum;
            $outRow = $j;
            $outCal = $k;
        }
    }
}

echo "Sum = " . $maxSum . PHP_EOL;
for ($j = $outRow; $j < $outRow + 3; $j++) {
    for ($k = $outCal; $k < $outCal + 3; $k++) {
        echo $matrix[$j][$k] . " ";
    }
    echo PHP_EOL;
}


