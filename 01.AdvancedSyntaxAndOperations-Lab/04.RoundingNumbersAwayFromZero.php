<?php
$numbers = explode(" ", readline());

foreach ($numbers as $number) {
    echo $number . " => " . round($number) . PHP_EOL;
}
