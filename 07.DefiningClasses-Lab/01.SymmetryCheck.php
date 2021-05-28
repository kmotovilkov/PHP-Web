<?php
function isPalindrom(string $input): string
{
    if ($input != strrev($input)) {
        return "false";
    }
    return "true";
}
$input = readline();
echo isPalindrom($input);
