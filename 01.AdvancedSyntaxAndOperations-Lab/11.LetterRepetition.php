<?php

$input = readline();
$arr = [];
for ($i = 0; $i < strlen($input); $i++) {
    $arr[] = $input[$i];
}
$countArr = [];

for ($i = 0; $i < count($arr); $i++) {
    $el = $arr[$i] . "";
    if (!array_key_exists($el, $countArr)) {
        $countArr[$el] = 1;
    } else {
        $countArr[$el]++;
    }
}
foreach ($countArr as $num => $count) {
    echo $num . " -> " . $count . PHP_EOL;
}
