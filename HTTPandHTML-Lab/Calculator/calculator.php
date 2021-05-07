<?php
if (isset($_GET['calculate'])) {
    $operation = $_GET['operation'];
    $numOne = $_GET['number_one'];
    $numTwo = $_GET['number_two'];
    if ($operation == "sum") {
        $output = ($numOne + $numTwo);
    } else if ($operation == "subtract") {
        $output = ($numOne - $numTwo);;
    } else {
        $output = "Invalid operation supplied";
    }

}

include_once "calculator_frontend.php";
