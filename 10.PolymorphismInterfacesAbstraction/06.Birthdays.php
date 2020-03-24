<?php


interface IName
{
    public function getName(): string;

}

interface IBirthDate
{
    public function getRightBirthDate(string $specificYear): string;

}

class Citizen implements IBirthDate
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
        $this->setBirthDate($birthDate);
    }

    /**
     * @param mixed $name
     */
    private function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $age
     */
    private function setAge($age): void
    {
        $this->age = $age;
    }

    /**
     * @param mixed $id
     */
    private function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $birthDate
     */
    private function setBirthDate($birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param string $specificYear
     * @return string
     */
    public function getRightBirthDate(string $specificYear): string
    {
        if (substr($this->getBirthDate(), -4, 4) == $specificYear) {
            return trim($this->getBirthDate()) . PHP_EOL;
        }
        return "";
    }
}

class Robot
{

    private $model;
    private $id;

    public function __construct(string $model, string $id)
    {
        $this->setModel($model);
        $this->setId($id);
    }

    /**
     * @param mixed $model
     */
    private function setModel($model): void
    {
        $this->model = $model;
    }

    /**
     * @param mixed $id
     */
    private function setId($id): void
    {
        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }
}

class Pet implements IBirthDate, IName
{
    private $name;
    private $birthDate;

    /**
     * Pet constructor.
     * @param $name
     * @param $birthDate
     */
    public function __construct(string $name, string $birthDate)
    {
        $this->setName($name);
        $this->setBirthDate($birthDate);
    }

    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @param mixed $birthDate
     */
    public function setBirthDate($birthDate): void
    {
        $this->birthDate = $birthDate;
    }

    /**
     * @return mixed
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @param string $specificYear
     * @return string
     */
    public function getRightBirthDate(string $specificYear): string
    {
        if (substr($this->getBirthDate(), -4, 4) == $specificYear) {
            return $this->getBirthDate().PHP_EOL;
        }
        return "";

    }


}

$output = [];
$citizensAndPets = [];
$input = readline();


while ($input != "End") {
    $data = explode(" ", $input);
    $input = readline();

    if ($data[0] == "Citizen") {
        $name = $data[1];
        $age = $data[2];
        $id = $data[3];
        $birthDate = $data[4];
        $citizensAndPets [] = new Citizen($name, $age, $id, $birthDate);
    } elseif ($data[0] == "Pet") {
        $name = $data[1];
        $birthDate = $data[2];
        $citizensAndPets[] = new Pet($name, $birthDate);
    }
}
$specificYear = readline();

foreach ($citizensAndPets as $citizensAndPet) {
    $a = $citizensAndPet->getRightBirthDate($specificYear);
    if ($a != "") {
        $output[] = $a;
    }
}

if ($output == null) {
    echo "<no output>";
} else {
    foreach ($output as $item) {
        echo $item;
    }
}

