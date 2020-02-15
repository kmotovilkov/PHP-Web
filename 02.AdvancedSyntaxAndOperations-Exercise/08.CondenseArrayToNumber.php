<?php
$numbers = explode(" ", readline());

$countNum = count($numbers);

while ($countNum > 1) {
    for ($i = 0; $i < $countNum-1; $i++) {
        $numbers[$i] += $numbers[$i + 1];
    }
    $countNum--;
}
echo $numbers[0];
