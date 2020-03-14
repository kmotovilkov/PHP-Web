<?php

class Number
{
    private $number;

    public function __construct(  $number)
    {
        $this->number = $number;
    }

    public function  lastD():string
    {
        $lastDigit = 0;
$number=$this->number;
        $length = strlen($number);
        for ($i = 0; $i < $length-1; $i++) {
            $lastDigit = intval($number[$length-1]);
        }
        switch ($lastDigit){
            case 0:
                return "zero";
            case 1:
                return "one";
            case 2:
                return "two";
            case 3:
                return "three";
            case 4:
                return "four";
            case 5:
                return "five";
            case 6:
                return "six";
            case 7:
                return "seven";
            case 8:
                return "eight";
            default:
                return "nine";
        }
    }
}
$input = readline();
$num = new Number($input);

echo $num->lastD();
