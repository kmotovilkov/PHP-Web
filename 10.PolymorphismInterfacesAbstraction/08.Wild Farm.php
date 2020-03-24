<?php

abstract class Food
{
    private $quantity;

    protected function __construct(int $quantity)
    {
        $this->setQuantity($quantity);
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }

}

class Vegetable extends Food

{
    public function __construct(int $quantity)
    {
        parent::__construct($quantity);
    }

}

class Meat extends Food
{
    public function __construct(int $quantity)
    {
        parent::__construct($quantity);
    }
}


abstract class Animal
{
    private $name;
    private $type;
    private $weight;
    private $foodEaten;

    /**
     * Animal constructor.
     * @param $name
     * @param $type
     * @param $weight
     */
    public function __construct(string $name, string $type,
                                float $weight)
    {
        $this->setName($name);
        $this->setType($type);
        $this->setWeight($weight);
        $this->setFoodEaten(0);;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    protected function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    protected function setType(string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return float
     */
    public function getWeight(): float
    {
        return $this->weight;
    }

    /**
     * @param float $weight
     */
    private function setWeight(float $weight): void
    {
        $this->weight = $weight;
    }

    /**
     * @return mixed
     */
    public function getFoodEaten()
    {
        return $this->foodEaten;
    }

    /**
     * @param int $quantity
     */
    protected function setFoodEaten(int $quantity): void
    {
        $this->foodEaten += $quantity;
    }

    public abstract function makeSound(): void;

    public abstract function eat(Food $food): void;

}

abstract class Mammal extends Animal
{

    private $livingRegion;

    public function __construct(string $name, string $type, float $weight,
                                string $livingRegion)
    {
        parent::__construct($name, $type, $weight);
        $this->setLivingRegion($livingRegion);
    }

    /**
     * @return mixed
     */
    public function getLivingRegion()
    {
        return $this->livingRegion;
    }

    /**
     * @param mixed $livingRegion
     */
    protected function setLivingRegion($livingRegion): void
    {
        $this->livingRegion = $livingRegion;
    }

    public function __toString()
    {
        return sprintf("%s[%s, %s, %s, %d]\n",
            $this->getType(), $this->getName(), $this->getWeight(),
            $this->getLivingRegion(), $this->getFoodEaten());
    }
}

class Mouse extends Mammal
{
    public function __construct(string $name, string $type,
                                float $weight, string $livingRegion)
    {
        parent::__construct($name, $type, $weight, $livingRegion);
    }

    public function makeSound(): void
    {
        echo "SQUEEEAAAK!" . PHP_EOL;
    }

    public function eat(Food $food): void
    {
        $func = new ReflectionClass($food);
        $foodClassName = $func->getName();
        $class = new ReflectionClass($this);
        $className = $class->getName();
        if ("Vegetable" != $foodClassName) {
            throw new Exception($className . "s are not eating that type of food!".PHP_EOL);
        }

        $this->setFoodEaten($food->getQuantity());
    }
}

class Zebra extends Mammal
{
    public function __construct(string $name, string $type,
                                float $weight, string $livingRegion)
    {
        parent::__construct($name, $type, $weight, $livingRegion);
    }

    public function makeSound(): void
    {
        echo "Zs" . PHP_EOL;
    }

    public function eat(Food $food): void
    {
        $func = new ReflectionClass($food);
        $foodClassName = $func->getName();
        $class = new ReflectionClass($this);
        $className = $class->getName();
        if ("Vegetable" != $foodClassName) {
            throw new Exception($className . "s are not eating that type of food!".PHP_EOL);
        }

        $this->setFoodEaten($food->getQuantity());
    }
}

abstract class Felime extends Mammal
{
    public function __construct(string $name, string $type,
                                float $weight, string $livingRegion)
    {
        parent::__construct($name, $type, $weight, $livingRegion);
    }
}

class Cat extends Felime
{
    private $breed;

    public function __construct(string $name, string $type,
                                float $weight, string $livingRegion
        , string $breed)
    {
        parent::__construct($name, $type, $weight, $livingRegion);
        $this->setBreed($breed);
    }

    /**
     * @return mixed
     */
    public function getBreed()
    {
        return $this->breed;
    }

    /**
     * @param mixed $breed
     */
    private function setBreed($breed): void
    {
        $this->breed = $breed;
    }

    public function makeSound(): void
    {
        echo "Meowwww" . PHP_EOL;
    }

    public function eat(Food $food): void
    {
        $this->setFoodEaten($food->getQuantity());
    }

    public function __toString()
    {
        return sprintf("%s[%s, %s, %s, %s, %d]\n",
            $this->getType(), $this->getName(), $this->getBreed(), $this->getWeight(),
            $this->getLivingRegion(), $this->getFoodEaten());
    }
}

class Tiger extends Felime
{


    public function __construct(string $name, string $type, float $weight,
                                string $livingRegion)
    {
        parent::__construct($name, $type, $weight, $livingRegion);
    }

    public function makeSound(): void
    {
        echo "ROAAR!!!" . PHP_EOL;
    }

    public function eat(Food $food): void
    {
        $func = new ReflectionClass($food);
        $foodClassName = $func->getName();
        $class = new ReflectionClass($this);
        $className = $class->getName();
        if ("Meat" != $foodClassName) {
            throw new Exception($className . "s are not eating that type of food!".PHP_EOL);
        }

        $this->setFoodEaten($food->getQuantity());
    }
}

class Main
{
    const INPUT_END = "End";

    public function run()
    {
        $this->readData();
    }

    private function readData()
    {
        $input = readline();
        while ($input != self::INPUT_END) {
            $animalData = explode(" ", $input);
            $animal = AnimalFactory::create($animalData);
            $foodData = explode(" ", readline());
            $foodType = $foodData[0];
            $foodQuantity = intval($foodData[1]);
            $food = FoodFactory::create($foodType, $foodQuantity);

            $animal->makeSound();
            try {
                $animal->eat($food);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
            echo $animal;
            $input = readline();
        }
    }
}


interface IAnimalFactory
{
    public static function create(array $data): Animal;
}

class AnimalFactory implements IAnimalFactory
{

    public static function create(array $data): Animal
    {
        $type = $data[0];
        $name = $data[1];
        $wight = floatval($data[2]);
        $livingRegion = $data[3];
        switch (strtolower($type)) {
            case "cat":
                $breed = $data[4];
                return new Cat($name, $type, $wight, $livingRegion, $breed);
            case "mouse":
                return new Mouse($name, $type, $wight, $livingRegion);
            case "tiger":
                return new Tiger($name, $type, $wight, $livingRegion);
            case "zebra":
                return new Zebra($name, $type, $wight, $livingRegion);
            default:
                return null;
        }

    }

}

interface IFoodFactory
{
    public static function create(string $type, int $quantity): Food;


}

class FoodFactory implements IFoodFactory
{

    public static function create(string $type, int $quantity): Food
    {
        if (class_exists($type)) {
            return new $type($quantity);
        }
        return null;
    }

}

$main = new Main();
$main->run();
