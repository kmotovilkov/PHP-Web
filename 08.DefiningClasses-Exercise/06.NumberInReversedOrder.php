<?php


class DecimalNumber
{
    private $number;

    public function __construct($number)
    {
        $this->number = $number;
    }

    public function revNumber(): string
    {
        $number = $this->number;
        return strrev($number);
    }
}

$input = readline();
$num = new DecimalNumber($input);
echo $num->revNumber();
