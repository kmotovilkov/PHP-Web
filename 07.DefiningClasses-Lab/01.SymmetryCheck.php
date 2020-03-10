<?php
$input = readline();

function isPalindrome(string $input)
{
    $length = strlen($input);
    for ($i = 0; $i < $length; $i++) {
        if ($input[$i] != $input[$length - 1 - $i]) {
            return "false";
        }
        return "true";
    }
}
echo isPalindrome($input);
