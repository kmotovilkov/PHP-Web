<?php

class Box
{
    private $length;
    private $width;
    private $height;

    /**
     * @return mixed
     */
    public function getLength()
    {
        return $this->length;
    }

    /**
     * @param mixed $length
     */
    public function setLength($length): void
    {
        $this->length = $length;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param mixed $width
     */
    public function setWidth($width): void
    {
        $this->width = $width;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param mixed $height
     */
    public function setHeight($height): void
    {
        $this->height = $height;
    }

    public function __construct($length, $width, $height)
    {
        $this->setLength($length);
        $this->setWidth($width);
        $this->setHeight($height);

    }

    public function getVolume(): float
    {
        return $this->getLength() * $this->getWidth() * $this->getHeight();
    }

    public function getLateralSurfaceArea(): float
    {
        return (2 * $this->getLength() * $this->getHeight()) + (2 * $this->getWidth() * $this->getHeight());
    }

    public function getSurfaceArea(): float
    {

        return (2 * $this->getLength() * $this->getWidth()) + (2 * $this->getLength() * $this->getHeight()) +
            (2 * $this->getWidth() * $this->getHeight());
    }


    public function __toString()
    {
        $getVolume = number_format($this->getVolume(), 2, ".", "");
        $getLateralSurfaceArea = number_format($this->getLateralSurfaceArea(), 2, ".", "");
        $getSurfaceArea = number_format($this->getSurfaceArea(), 2, ".", "");
        return "Surface Area - " . $getSurfaceArea . PHP_EOL . "Lateral Surface Area - " . $getLateralSurfaceArea . PHP_EOL .
            "Volume - " . $getVolume;
    }
}

$length = floatval(readline());
$width = floatval(readline());
$height = floatval(readline());

$box = new Box($length, $width, $height);
echo $box;
