<?php

$name = readline();
$age = readline();

class Person
{
    public $name;
    public $age;

    function print()
    {
        echo $this->name . $this->age;
    }
}
$person = new Person();
echo (count(get_object_vars($person)));
