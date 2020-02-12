<?php

$arr1 = explode(" ", readline());
$arr2 = explode(" ", readline());

$biggerLength = max(count($arr1), count($arr2));

for ($i = 0; $i < $biggerLength; $i++) {
    $value1 = $arr1[$i % count($arr1)];
    $value2 = $arr2[$i % count($arr2)];
    echo $value1 + $value2 . " ";
}
