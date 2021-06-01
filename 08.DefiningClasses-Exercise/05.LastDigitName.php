<?php
class Number
{
    private $value;
    public function __construct(int $name)
    {
        $this->value = $name;
    }
    /**
     * @return string
     */
    public function getLastDigit(): string
    {
        $lastDigit = $this->value % 10;
        if ($lastDigit == 0) {
            return "zero";
        } else if ($lastDigit == 1) {
            return "one";
        } else if ($lastDigit == 2) {
            return "two";
        } else if ($lastDigit == 3) {
            return "three";
        } else if ($lastDigit == 4) {
            return "four";
        } else if ($lastDigit == 5) {
            return "five";
        } else if ($lastDigit == 6) {
            return "six";
        } else if ($lastDigit == 7) {
            return "seven";
        } else if ($lastDigit == 8) {
            return "eight";
        } else if ($lastDigit == 9) {
            return "nine";
        }
    }
}
$input=readline();
$number = new Number($input);
echo $number->getLastDigit();


