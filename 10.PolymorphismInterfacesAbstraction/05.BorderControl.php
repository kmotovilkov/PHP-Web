<?php

interface ICityControl
{

    public function getFakeId(string $id): string;


}


class Citizen implements ICityControl
{

    private $name;
    private $age;
    private $id;

    public function __construct(string $name, int $age, string $id)
    {
        $this->setName($name);
        $this->setAge($age);
        $this->setId($id);
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param int $age
     */
    private function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @param string $id
     */
    private function setId(string $id): void
    {

        $this->id = $id;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getFakeId(string $id): string
    {
        $length = strlen($id);
        if (substr($this->getId(), -$length, $length) == $id) {
            return $this->getId() . PHP_EOL;
        }
        return "";
    }
}

class Robot implements ICityControl
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

    public function getFakeId(string $id): string
    {
        $length = strlen($id);
        if (substr($this->getId(), -$length, $length) == $id) {
            return $this->getId() . PHP_EOL;
        }
        return "";

    }
}

$citizensAndRobots = [];
$robots = [];
$input = readline();

while ($input != "End") {
    $data = explode(" ", $input);

    $cityControl = null;
    if (count($data) == 2) {
        $model = $data[0];
        $id = $data[1];
        $cityControl = new Robot($model, $id);
        $citizensAndRobots[] = $cityControl;
    } else {
        $name = $data[0];
        $age = intval($data[1]);
        $id = $data[2];
        $citizensAndRobots[] = new Citizen($name, $age, $id);

    }
    $input = readline();
}

$lastDigitsFakeId = readline();

foreach ($citizensAndRobots as $citizenAndRobot) {
    echo $citizenAndRobot->getFakeId($lastDigitsFakeId);
}

