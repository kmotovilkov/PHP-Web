<?php

class Person
{
    /**
     * @var string 
     */
    public $name;
    /**
     * @var int
     */
    public $age;
    /**
     * @var string 
     */
    public $occupation;

    /**
     * Person constructor.
     * @param $name
     * @param $age
     * @param $occupation
     */
    public function __construct(string $name, int $age, string $occupation)
    {
        $this->name = $name;
        $this->age = $age;
        $this->occupation = $occupation;

    }
public function __toString()
{
    return $this->name . " - age: " . $this->age . ", occupation: " . $this->occupation . PHP_EOL;
}

}

$input = readline();

$personArr = [];
while ($input != "END") {
    list($name, $age, $occupation) = explode(" ", $input);
    $age = intval($age);

    $person = new Person($name, $age, $occupation);
    $personArr[] = $person;
    $input = readline();
}

usort($personArr, function ($p1, $p2) {
    return $p1->age <=> $p2->age;
});

foreach ($personArr as $people) {
    echo $people;

}
