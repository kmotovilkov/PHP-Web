<?php

list($row, $col) = array_map("intval", explode(", ", readline()));
$matrix = [];

for ($i = 0; $i < $row; $i++) {
    $matrix[$i] = array_map("intval", explode(", ", readline()));
}
$biggest = PHP_INT_MIN;
$min = PHP_INT_MAX;

for ($j = 0; $j < count($matrix); $j++) {
    for ($k = 0; $k < count($matrix[$j]); $k++) {
        $current = $matrix[$j][$k];
        if ($current > $biggest) {
            $biggest = $current;
        }
        if ($current < $min) {
            $min = $current;

        }
    }
}

echo "Min: " . $min . PHP_EOL;
echo "Max: $biggest";
