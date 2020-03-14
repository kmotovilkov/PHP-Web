<?php
function distance($x1, $y1, $x2, $y2)
{

    $distance = sqrt(pow($x1-$x2,2)+pow($y1-$y2,2));
    if ($distance == intval($distance)) {
        return true;
    }
    return false;
}

list($x1, $y1, $x2, $y2) = explode(", ", readline());


if (distance($x1, $y1, 0, 0)) {
    echo "{{$x1}, {$y1}} to {0, 0} is valid" . PHP_EOL;
} else {
    echo "{{$x1}, {$y1}} to {0, 0} is invalid" . PHP_EOL;
}
if (distance($x2, $y2, 0, 0)) {
    echo "{{$x2}, {$y2}} to {0, 0} is valid" . PHP_EOL;
} else {
    echo "{{$x2}, {$y2}} to {0, 0} is invalid" . PHP_EOL;
}
if (distance($x1, $y1, $x2, $y2)) {
    echo "{{$x1}, {$y1}} to {{$x2}, {$y2}} is valid" . PHP_EOL;
} else {
    echo "{{$x1}, {$y1}} to {{$x2}, {$y2}} is invalid" . PHP_EOL;
}
