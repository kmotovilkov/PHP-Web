<?php

list($row, $col) = array_map("intval", explode(", ", readline()));

$matrix = [];
$sum = 0;

for ($i = 0; $i < $row; $i++) {
    $matrix[$i] = array_map("intval", explode(", ", readline()));
}
for ($j = 0; $j < count($matrix); $j++) {
    for ($k = 0; $k < count($matrix[$j]); $k++) {
        $sum += $matrix[$j][$k];
    }
}

echo $row . PHP_EOL . $col . PHP_EOL.$sum;
