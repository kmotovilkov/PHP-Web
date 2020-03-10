<?php

$name = readline();
$age = readline();

class Person
{
    public $name;
    public $age;

    /**
     * Person constructor.
     * @param $name
     * @param $age
     */
    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
        echo $this->name . " " . $this->age;
    }
}
$person = new Person($name, $age);
