<?php


interface Person
{
    public function setName(string $name): void;

    public function setAge(int $age): void;


}

class Citizen implements Person
{
    private $name;
    private $age;

    public function __construct(string $name, int $age)
    {
        $this->setName($name);
        $this->setAge($age);
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }


    public function __toString()
    {
        return $this->getName() . PHP_EOL . $this->getAge();
    }

}

$name = readline();
$age = intval(readline());
$citizen = new Citizen($name, $age);
echo $citizen;
