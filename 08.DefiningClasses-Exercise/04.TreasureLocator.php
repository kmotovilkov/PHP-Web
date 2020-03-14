<?php
function treasureLocator(float $x, float $y)
{
    if ($x >= 8 && $x <= 9 && $y >= 0 && $y <= 1) {
        return "Tokelau" . PHP_EOL;
    } else if ($x >= 1 && $x <= 3 && $y >= 1 && $y <= 3) {
        return "Tuvalu" . PHP_EOL;
    } else if ($x >= 5 && $x <= 7 && $y >= 3 && $y <= 6) {
        return "Samoa" . PHP_EOL;
    } else if ($x >= 0 && $x <= 2 && $y >= 6 && $y <= 8) {
        return "Tonga" . PHP_EOL;
    } else if ($x >= 4 && $x <= 9 && $y >= 7 && $y <= 8) {
        return "Cook" . PHP_EOL;
    } else {
        return "On the bottom of the ocean" . PHP_EOL;
    }

}

$input = explode(", ", readline());

for ($i = 0; $i < count($input); $i+=2) {
    $x = $input[$i];
    $y = $input[$i + 1];
    echo treasureLocator($x, $y);
}
