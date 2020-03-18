<?php

class Person
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var float
     */
    private $money;
    /**
     * @var Product[]
     */
    private $products;

    /**
     *
     * Person constructor.
     * @param string $name
     * @param float $money
     * @throws Exception
     */
    public function __construct(string $name, float $money)
    {
        $this->setName($name);
        $this->setMoney($money);
        $this->products = [];
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
     * @throws Exception
     */
    private function setName(string $name): void
    {
        if (empty($name)) {
            throw new Exception("Name cannot be empty");
        }
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getMoney(): float
    {
        return $this->money;
    }

    /**
     * @param float $money
     * @throws Exception
     */
    private function setMoney(float $money): void
    {
        if ($money < 0) {
            throw  new Exception("Money cannot be negative" . PHP_EOL);
        }
        $this->money = $money;
    }

    /**
     * @return array
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    /**
     * @param Product $product
     */
    public function addProduct(Product $product): void
    {
        $this->products[] = $product;
    }

    public function canAffordAProduct(Product $product): bool
    {
        return $product->getCost() > $this->getMoney();
    }

    /**
     * @param Product $product
     * @throws Exception
     */
    public function buyProduct(Product $product)
    {
        if ($this->canAffordAProduct($product)) {
            throw new Exception("{$this->getName()} can't afford {$product->getName()}" . PHP_EOL);
        }
        $this->setMoney($this->getMoney() - $product->getCost());
        $this->addProduct($product);
        echo "{$this->getName()} bought {$product->getName()}" . PHP_EOL;
    }

    public function __toString()
    {
        if (count($this->getProducts()) == 0) {
            return $this->getName() . " - Nothing bought" . PHP_EOL;
        }
        $output = $this->getName() . " - ";
        $output .= implode(",", array_map(function (Product $product) {
            return $product->getName();
        }, $this->getProducts()));
        return $output . PHP_EOL;
    }
}

class Product
{
    private $name;
    private $cost;

    /**
     * Product constructor.
     * @param string $name
     * @param float $cost
     * @throws Exception
     */
    public function __construct(string $name, float $cost)
    {
        $this->setName($name);
        $this->setCost($cost);

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
     * @throws Exception
     */
    private function setName(string $name): void
    {

        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getCost(): float
    {
        return $this->cost;
    }

    /**
     * @param float $cost
     */
    private function setCost(float $cost): void
    {
        $this->cost = $cost;
    }


}


$personsData = preg_split("/[=;]/", readline());
$people = [];


for ($i = 0; $i < count($personsData) - 1; $i += 2) {
    $personName = $personsData[$i];
    $personMoney = floatval($personsData[$i + 1]);
    try {
        $people[$personName] = new Person($personName, $personMoney);
    } catch (Exception $e) {
        echo $e->getMessage();
        return;
    }
}

$productsData = preg_split("/[=;]/", readline(), -1, PREG_SPLIT_NO_EMPTY);

$products = [];

for ($j = 0; $j < count($productsData); $j += 2) {
    $productName = $productsData[$j];
    $productCost = $productsData[$j + 1];
    try {
        $products[$productName] = new Product($productName, $productCost);
    } catch (Exception $e) {
    }
}

$input = readline();
while (true) {
    if ($input === "END") {
        break;
    }
    $data = explode(" ", $input);
    $personName = $data[0];
    $productName = $data[1];


    if (array_key_exists($personName, $people) && array_key_exists($productName, $products)) {
        /**@var Person $person
         */

        $person = $people[$personName];
        try {
            $person->buyProduct($products[$productName]);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    $input = readline();

}

foreach ($people as $person) {
    echo $person;
}
