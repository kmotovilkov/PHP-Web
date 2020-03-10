<?php

$input = explode(", ", readline());

function quiz(array $input)
{
    $html = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
    $html .= "<quiz>" . PHP_EOL;

    for ($i = 0; $i < count($input); $i += 2) {
        $question = $input[$i];
        $answer = $input[$i + 1];
        $html .= "  <question>\n   $question   \n</question>\n";
        $html .= "  <answer>\n  $answer   \n  </answer>\n";

    }
    $html .= "</quiz>\n";
    return $html;
}

echo quiz($input);
