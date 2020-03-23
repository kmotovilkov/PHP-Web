<?php

interface Car
{
    public function getModel();

    public function setDriver(string $driver);

    public function brakes();

    public function gas();
}

class Ferrari implements Car
{

    const MODEL = "488-Spider/";
    const BRAKES = "Brakes!/";
    const GAS = "Zadu6avam sA!/";
    private $driver;

    public function __construct(string $driver)
    {
        $this->setDriver($driver);
    }

    public function getModel()
    {
        return self::MODEL;
    }

    public function getDriver()
    {
        return $this->driver;
    }

    /**
     * @param mixed $driver
     */
    public function setDriver(string $driver): void
    {
        $this->driver = $driver;
    }

    public function brakes()
    {
        return self::BRAKES;
    }

    public function gas()
    {
        return self::GAS;
    }

    public function __toString()
    {
        return $this->getModel() . $this->brakes() . $this->gas() . $this->getDriver();
    }
}

$driver = readline();

$ferrari = new Ferrari($driver);

echo $ferrari;
