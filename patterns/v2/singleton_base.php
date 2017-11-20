<?php

abstract class Employee
{
    protected $name;
    private static $types = ["Minion", "CluedUp", "WellConnected"];
    
    public function __construct($name)
    {
        $this->name = $name;
    }
    
    public static function recruit($name)
    {
        $num = rand(1, count(self::$types)) - 1;
        $class = self::$types[$num];
        return new $class($name);
    }
    
    abstract function fire();
}

class Minion extends Employee
{
    public function fire()
    {
        echo "{$this->name}: убери со стола!<br>";
    }
}

class CluedUp extends Employee
{
    public function fire()
    {
        echo "{$this->name}: вызови адвоката!<br>";
    }
}

class WellConnected extends Employee
{
    public function fire()
    {
        echo "{$this->name}: позвони папику!<br>";
    }
}

class NastyBoss
{
    private $employees = [];
    
    public function addEmployee(Employee $employee)
    {
        $this->employees[] = $employee;
    }
    
    public function projectFails()
    {
        if (count($this->employees) > 0) {
            $emp = array_pop($this->employees);
            $emp->fire();
        }
    }
}

$boss = new NastyBoss();
$boss->addEmployee(Employee::recruit("Игорь"));
$boss->addEmployee(Employee::recruit("Владимир"));
$boss->addEmployee(Employee::recruit("Мария"));
$boss->projectFails();
$boss->projectFails();
$boss->projectFails();
