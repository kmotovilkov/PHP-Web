<?php
$numbers = explode(" ", readline());
$sum = 0;
foreach ($numbers as $num) {
    $sum += intval(strrev($num));
}
echo $sum;
