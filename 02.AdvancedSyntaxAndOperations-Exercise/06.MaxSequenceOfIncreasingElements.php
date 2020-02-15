<?php
$numbers = explode(" ", readline());

$bestCount = 0;
$firstIndex = 0;

for ($i = 0; $i < count($numbers); $i++) {
    $count = 0;
    for ($j = $i; $j < count($numbers) - 1; $j++) {
        $current = $numbers[$j];
        $next = $numbers[$j + 1];
        if ($current < $next) {
            $count++;
            if ($count > $bestCount) {
                $bestCount = $count;
                $firstIndex = $i;
            }
        } else {
            break;
        }
    }
}
for ($k = 0; $k <= $bestCount; $k++) {
    echo $numbers[$firstIndex + $k] . " ";
}
