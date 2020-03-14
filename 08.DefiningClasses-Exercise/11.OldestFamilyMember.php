<?php


class Person
{
    private $name;
    private $age;

    public function __construct(string $name, int $age)
    {
        $this->name = $name;
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }
}

class Family
{
    private $members;
    private $oldestMember;

    public function __construct()
    {
        $this->members = [];
        $this->oldestMember = null;
    }

    public function addMember(Person $person)
    {
        if (null == $this->oldestMember || $this->oldestMember->getAge() < $person->getAge()) {
            $this->oldestMember = $person;
        }
        $this->members[] = $person;
    }

    public function getOldestMember(): Person
    {
        return $this->oldestMember;
    }
}
$n = readline();
$family = new Family();
for ($i = 0; $i < $n; $i++) {
    $input = readline();
    list($name, $age) = explode(" ", $input);
    $age = intval($age);
    $person = new Person($name, $age);
    $family->addMember($person);
}

echo $family->getOldestMember()->getName() . " " . $family->getOldestMember()->getAge();
