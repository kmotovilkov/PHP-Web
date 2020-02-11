<?php
$num = intval(readline());
$monthArr = ['January', 'February', 'March', 'April', 'May', 'June',
    'July', 'August', 'September', 'October', 'November', 'December'];

if ($num > 0 && $num < 13) {
    echo $monthArr[$num - 1];
} else {
    echo "Invalid Month!";
}
