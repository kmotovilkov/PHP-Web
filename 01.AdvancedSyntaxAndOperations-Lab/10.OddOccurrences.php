<?php
$arr = explode(" ", strtolower(readline()));

$countArr = [];
$output = [];
for ($i = 0; $i < count($arr); $i++) {
    $el = $arr[$i] . "";
    if (!array_key_exists($el, $countArr)) {
        $countArr[$el] = 1;
    } else {
        $countArr[$el]++;
    }
}
foreach ($countArr as $name => $count) {
    if ($count % 2 == 1) {
        $output[] = $name;
    }
}
echo implode(", ", $output);
