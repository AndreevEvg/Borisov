<?php

interface FlyBehavior
{
    public function fly();
}

class FlyWithWings implements FlyBehavior
{
    public function fly()
    {
        return "Я умею летать!";
    }
}

class FlyNoWay implements FlyBehavior
{
    public function fly()
    {
        
    }
}

class Duck
{
    public $flyBehavior;

    public function __construct(FlyBehavior $flyBehavior)
    {
        $this->flyBehavior = $flyBehavior;
    }

    public function performFly()
    {
        return $this->flyBehavior->fly();
    }
}

class MallardDuck extends Duck
{
    public function __construct()
    {
        $this->flyBrehavior = new FlyWithWings();
        parent::__construct($flyBehavior);
    }
}


$x = new MallardDuck();
echo $x->fly();


