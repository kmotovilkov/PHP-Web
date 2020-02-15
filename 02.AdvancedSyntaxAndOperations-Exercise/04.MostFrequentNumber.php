<?php
$numbers = explode(" ", readline());
$count = 0;
$bestCount = 0;
$num = "";
for ($i = 0; $i < count($numbers); $i++) {
    $count = 0;
    for ($j = $i; $j < count($numbers); $j++) {
        $current = $numbers[$i];
        $next = $numbers[$j];
        if ($current == $next) {
            $count++;
            if ($count > $bestCount) {
                $bestCount = $count;
                $num = $current;
            }
        }
    }
}
echo $num;
