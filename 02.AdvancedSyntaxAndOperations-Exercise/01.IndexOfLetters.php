<?php

$input = strtolower(readline());

for ($i = 0; $i < strlen($input); $i++) {
    $index = ord($input[$i]) - 97;
    echo $input[$i] . " -> " . $index . PHP_EOL;
}
