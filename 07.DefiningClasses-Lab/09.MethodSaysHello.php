<?php

class Person
{
    /**
     * @var string
     */
    public $name;

    /**
     * Person constructor.
     * @param $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return $this->name . " " . 'says "Hello"!';
    }
}

$name = trim(readline());
$person = new Person($name);

echo $person;
