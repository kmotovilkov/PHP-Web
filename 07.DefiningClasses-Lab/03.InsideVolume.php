<?php

$input = array_map("floatval", explode(", ", readline()));

function isInside(int $x, int $y, int $z)
{
    $x1 = 10;
    $y1 = 20;
    $z1 = 15;
    $x2 = 50;
    $y2 = 80;
    $z2 = 50;

    if ($x >= $x1 && $x <= $x2) {
        if ($y >= $y1 && $y <= $y2) {
            if ($z >= $z1 && $z <= $z2) {
                return true;
            }
        }
    }
    return false;

}

for ($i = 0; $i < count($input); $i += 3) {
    $x = $input[$i];
    $y = $input[$i + 1];
    $z = $input[$i + 2];
    if (isInside($x, $y, $z)) {
        echo "inside".PHP_EOL;
    } else {
        echo "outside".PHP_EOL;
    }

}
