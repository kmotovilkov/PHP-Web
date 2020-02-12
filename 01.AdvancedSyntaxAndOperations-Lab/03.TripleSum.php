<?php

$numbers = explode(" ", readline());

$containTriples = false;

for ($i = 0; $i < count($numbers); $i++) {

    for ($j = $i + 1; $j < count($numbers); $j++) {

        for ($k = 0; $k < count($numbers); $k++) {

            if ($numbers[$i] + $numbers[$j] == $numbers[$k]) {

                echo "$numbers[$i] + $numbers[$j] == $numbers[$k]" . PHP_EOL;
                $containTriples = true;

            }
        }
    }
}
if (!$containTriples) {
    echo "No";
}
