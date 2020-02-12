<?php
$input = explode(", ", readline());
$sums = [];
for ($i = 0; $i < count($input); $i += 2) {
    $town = $input[$i];
    $money = $input[$i + 1];

    if (!key_exists($town, $sums)) {
        $sums[$town] = $money;
    } else {
        $sums[$town] += $money;
    }
}
foreach ($sums as $town => $sum) {
    echo $town . " => " . $sum.PHP_EOL;
}
