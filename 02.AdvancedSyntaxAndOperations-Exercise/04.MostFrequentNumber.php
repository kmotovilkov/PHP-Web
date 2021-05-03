<?php
$numbers = explode(" ", readline());
$maxCount = 0;
$maxCountNum = 0;
for ($i = 0; $i < count($numbers); $i++) {
    $count = 0;
    for ($j = $i; $j < count($numbers); $j++) {
        if ($numbers[$i] == $numbers[$j]) {
            $count++;
            if ($count > $maxCount) {
                $maxCount = $count;
                $maxCountNum = $numbers[$i];
            }
        }
    }
}
echo $maxCountNum;
