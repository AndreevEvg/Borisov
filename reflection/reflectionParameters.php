<?php

class Person
{
    public $name;
    public $age;
    public $foo;
    public $bar;

    public function __construct($name, $age, $foo, $bar = "number")
    {
    	$this->name = $name;
    	$this->age = $age;
        $this->foo = $foo;
        $this->bar = $bar;
    }

    public function getName($x, $y){}
    public function getAge(){}
}

$prod_class = new ReflectionClass('Person');
$method = $prod_class->getMethod("__construct");
$params = $method->getParameters();

foreach ($params as $param) {
    
	echo argData($param);
}


function argData(ReflectionParameter $arg): string
{
	$details = "";

	$declaringclass = $arg->getDeclaringClass();
	$name = $arg->getName(); // параметры конструктора
    $class = $arg->getClass();
    $position = $arg->getPosition();

    $details .= "\$$name находится в позиции $position<br>";

    if (!empty($class)) {

        $classname = $class->getName();
        $details .= "\$$name должен быть объектом типа $classname<br>";
    }

    if ($arg->isPassedByReference()) {

        $def = $arg->getDefaultValue();
        $details .= "\$$name по умолчанию равно: $def<br>";
    }

    return $details;
}
