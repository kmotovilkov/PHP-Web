<?php

class Car
{
    private $model;
    private $fuelAmount;
    private $consumption;
    private $distanceTraveled;


    public function __construct(string $model, float $fuelAmount, float $consumption)
    {
        $this->model=$model;
        $this->fuelAmount=$fuelAmount;
        $this->consumption=$consumption;
        $this->distanceTraveled = 0;
    }


    public function getModel():string
    {
        return $this->model;
    }


    public function getFuelAmount():float
    {
        return $this->fuelAmount;
    }


    public function getDistanceTraveled():float
    {
        return $this->distanceTraveled;
    }


    public function drive($amountOfKm):void
    {

        if ($this->fuelAmount >= ($amountOfKm * $this->consumption)) {
            $this->fuelAmount = round($this->fuelAmount - $amountOfKm *
                $this->consumption,2);
            $this->distanceTraveled += $amountOfKm;
        } else {
            echo "Insufficient fuel for the drive" . PHP_EOL;
        }
    }


}


$n = intval(readline());

$carList = [];

for ($i = 0; $i < $n; $i++) {
    $carData = explode(" ", readline());
    $model = $carData[0];
    $fuelAmount = $carData[1];
    $consumption = $carData[2];

    $car = new Car($model, $fuelAmount, $consumption);
    $carList[] = $car;
}

$input = readline();

while ($input != "End") {
    $data = explode(" ", $input);
    $model = $data[1];
    $amountOfKm = $data[2];
    for ($i = 0; $i < count($carList); $i++) {
        $currentCar = $carList[$i];
        if ($model == $currentCar->getModel()) {
            $currentCar->drive($amountOfKm);
            break;
        }
    }
    $input = readline();
}

foreach ($carList as $car) {
    echo $car->getModel() . " " . number_format($car->getFuelAmount(), 2, ".", "") . " " .
        $car->getDistanceTraveled() . PHP_EOL;

}
