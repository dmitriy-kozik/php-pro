<?php

class Color
{
    private float $red;
    private float $green;
    private float $blue;

    public function __construct(float $red = 0, float $green = 0, float $blue = 0)
    {
        $this->setRed($red);
        $this->setGreen($green);
        $this->setBlue($blue);
    }


    // GET
    public function getRed(): float
    {
        return $this->red;
    }

    public function getGreen(): float
    {
        return $this->green;
    }

    public function getBlue(): float
    {
        return $this->blue;
    }


    // SET
    private function setRed(float $value)
    {
        if (!$this->validateValue($value)) {
            throw new Exception(__METHOD__ . ' is not valid (value must be >=0 && <= 255)');
        }
        $this->red = $value;
    }

    private function setGreen(float $value)
    {
        if (!$this->validateValue($value)) {
            throw new Exception(__METHOD__ . ' is not valid (value must be >=0 && <= 255)');
        }
        $this->green = $value;
    }

    private function setBlue(float $value)
    {
        if (!$this->validateValue($value)) {
            throw new Exception(__METHOD__ . ' is not valid (value must be >=0 && <= 255)');
        }
        $this->blue = $value;
    }

    //
    public function validateValue(float $value): bool
    {
        return !($value < 0 || $value > 255);
    }

    public function equals(object $object1, object $object2): bool
    {
        return $object1 == $object2;
    }

    static public function random(): object
    {
        return new Color(rand(0, 255),rand(0, 255),rand(0, 255));
    }

    public function mixValues(float $value1, float $value2): float
    {
        return round(($value1 + $value2) / 2);
    }

    public function mix(object $newColor): object
    {
        $red = $this->mixValues($newColor->getRed(), $this->getRed());
        $green = $this->mixValues($newColor->getGreen(), $this->getGreen());
        $blue = $this->mixValues($newColor->getBlue(), $this->getBlue());
        return new Color($red, $green, $blue);
    }

}

try {
    $color = new Color(200, 200, 200);
    $mixedColor = $color->mix(new Color(100, 100, 100));

    $resultColor = $mixedColor;
    // $resultColor = $color::random();

    echo '<div style="background: rgb(' . $resultColor->getRed() . ',' . $resultColor->getGreen() . ',' . $resultColor->getBlue() . '); width: 100px; height: 100px; border: #ccc 1px solid"></div>';
    echo 'rgb(' . $resultColor->getRed() . ',' . $resultColor->getGreen() . ',' . $resultColor->getBlue() . ')';

} catch (Exception $e) {
    echo $e->getMessage();
}


