<?php

$numbers = explode(" ", readline());
$sum = 0;
for ($i = 0; $i < count($numbers); $i++) {
    $sum += intval(strrev($numbers[$i]));
}
echo $sum;
