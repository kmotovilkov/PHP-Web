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
     * @throws Exception
     */
    private function setLength($length): void
    {
        if ($length <= 0) {
            throw new Exception("Length cannot be zero or negative.");
        }
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
     * @throws Exception
     */
    private function setWidth($width): void
    {
        if ($width <= 0) {
            throw new Exception("Width cannot be zero or negative.");
        }
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
     * @throws Exception
     */
    private function setHeight($height): void
    {
        if ($height <= 0) {
            throw new Exception("Height cannot be zero or negative.");
        }
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

try {
    $box = new Box($length, $width, $height);
    echo $box;
} catch (Exception $e) {
    echo $e->getMessage();
}
