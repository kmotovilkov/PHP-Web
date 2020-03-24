<?php


interface  IVehicles
{

    public function drive(float $distance);

    public function refuel(float $litres);
}

abstract class AVehicles implements IVehicles
{
    private $fuelQuantity;
    private $fuelConsumption;
    private $modifier;


    public function __construct(float $fuelQuantity, float $fuelConsumption, float $modifier)
    {
        $this->fuelQuantity = $fuelQuantity;
        $this->modifier = $modifier;
        $this->fuelConsumption = $fuelConsumption + $this->modifier;

    }

    public function drive(float $distance): string
    {
        if ($this->fuelQuantity >= $this->fuelConsumption * $distance) {
            $this->fuelQuantity -= $this->fuelConsumption * $distance;
            return get_class($this) . " travelled " . $distance . " km" . PHP_EOL;
        }
        return get_class($this) . " needs refueling" . PHP_EOL;
    }

    public function refuel(float $litres)
    {
        $this->fuelQuantity += $litres;
    }

    public function __toString()
    {
        return get_class($this) . ": " . number_format($this->fuelQuantity, 2, ".", "");
    }
}

class Car extends AVehicles
{
    const FUEL_MODIFIER = 0.9;

    public function __construct(float $fuelQuantity, float $fuelConsumption)
    {
        parent::__construct($fuelQuantity, $fuelConsumption, self::FUEL_MODIFIER);
    }

}

class Truck extends AVehicles


{
    const FUEL_MODIFIER = 1.6;
    const REFUEL_MODIFIER = 0.95;

    public function __construct(float $fuelQuantity, float $fuelConsumption)
    {
        parent::__construct($fuelQuantity, $fuelConsumption, self::FUEL_MODIFIER);
    }

    public function refuel(float $litres)
    {

        parent::refuel($litres * self::REFUEL_MODIFIER);
    }
}

class Bus extends AVehicles
{

}

interface IVehiclesFactory
{

    public function create(string $type, float $quantity, float $consumption);

}

class VehiclesFactory implements IVehiclesFactory
{

    public function create(string $type, float $quantity, float $consumption)
    {
        $className = $type;
        $vehicle = new $className($quantity, $consumption);
        return $vehicle;
    }
}


$vehicles = [];
$factory = new VehiclesFactory();

for ($i = 0; $i < 2; $i++) {
    list($type, $quantity, $consumption) = explode(" ", readline());

    $vehicle = $factory->create($type, $quantity, $consumption);
    $vehicles[$type] = $vehicle;
}
$n = readline();
for ($i = 0; $i < $n; $i++) {
    list($action, $type, $param) = explode(" ", readline());
    $vehicle = $vehicles[$type];
    echo $vehicle->$action($param);
}
foreach ($vehicles as $vehicle) {
    echo $vehicle . PHP_EOL;
}


