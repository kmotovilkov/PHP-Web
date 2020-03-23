<?php

interface  Identifiable
{
    public function setId(string $id): void;
}

interface Birthable
{
    public function setBirthdate(string $birthDate): void;
}

interface Person
{
    public function setName(string $name): void;

    public function setAge(int $age): void;


}

class Citizen implements Person, Birthable, Identifiable
{
    private $name;
    private $age;
    private $id;
    private $birthDate;

    public function __construct(string $name, int $age, string $id, string $birthDate)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setId($id);
        $this->setBirthdate($birthDate);
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

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    public function setBirthdate(string $birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    public function setId(string $id): void
    {
        $this->id = $id;
    }

    public function __toString()
    {
        return $this->getName() . PHP_EOL . $this->getAge() .
            PHP_EOL . $this->getId() . PHP_EOL . $this->getBirthDate();
    }
}

$name = readline();
$age = intval(readline());
$id = readline();
$birthDate = readline();
$citizen = new Citizen($name, $age, $id, $birthDate);
echo $citizen;
