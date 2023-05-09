<?php


trait Trait1
{
    public function test(): float
    {
        return 1;
    }
}

trait Trait2
{
    public function test(): float
    {
        return 2;
    }
}

trait Trait3
{
    public function test(): float
    {
        return 3;
    }
}

class Test
{
    use Trait1, Trait2, Trait3 {
        Trait1::test insteadof Trait2, Trait3;
        Trait2::test as test2;
        Trait3::test as test3;
    }
    public function getSum(): float
    {
        return $this->test() + $this->test2() + $this->test3();
    }
}


try {
    $test = new Test();
    echo $test->getSum();
} catch (Exception $e) {
    echo $e->getMessage();
}


