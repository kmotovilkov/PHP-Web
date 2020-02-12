<?php
$row = readline();
$matrix = [];

for ($i = 0; $i < $row; $i++) {
    $matrix[$i] = explode(" ", readline());

}

$rightD = 0;
$leftD = 0;
$col = count($matrix) - 1;
for ($i = 0; $i < count($matrix); $i++) {
    $rightD += $matrix[$i][$i];
    $leftD += $matrix[$i][$col];
    $col--;
}

echo abs($leftD-$rightD);
