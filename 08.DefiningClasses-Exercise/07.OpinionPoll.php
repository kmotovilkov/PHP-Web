<?php

class Person
{
    public $name;
    public $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
    public function __toString()
    {
        return $this->name . " - " . $this->age . PHP_EOL;
    }
}
$n = readline();
$personArr = [];
for ($i = 0; $i < $n; $i++) {
    $input = readline();
    list($name, $age) = explode(" ", $input);
    $age = intval($age);
    $person = new Person($name, $age);
    if ($age > 30) {
        $personArr[] = $person;
    }
}
usort($personArr, function ($p1, $p2) {
    return $p1->name <=> $p2->name;
});
foreach ($personArr as $people) {
    echo $people;
}
