<?php

class Person{

    public $name;
    public $age;

    public function getName(){}
    public function getAge(){}
}

$prod_class = new ReflectionClass('Person');
$methods = $prod_class->getMethods();

foreach($methods as $method){
    
    echo methodData($method);
    echo "\n----\n";
}

function methodData(ReflectionMethod $method){

    $details = "";
    $name = $method->getName();

    if($method->isUserDefined()){

        $details .= "$name - метод определен пользователем\n";
    }

    if($method->isInternal()){

        $details .= "$name - внутренний метод\n";
    }

    if($method->isAbstract()){

        $details .= "$name - абстрактный метод\n";
    }

    if($method->isPublic()){

        $details .= "$name - общедоступный метод\n";
    }

    if($method->isProtected()){

        $details .= "$name - защищенный метод\n";
    }

    if($method->isPrivate()){

        $details .= "$name - закрытый метод\n";
    }

    if($method->isStatic()){

        $details .= "$name - статический метод\n";
    }

    if($method->isFinal()){

        $details .= "$name - завершенный метод\n";
    }

    if($method->isConstructor()){

        $details .= "$name - метод конструктора\n";
    }

    if($method->returnsReference()){

        $details .= "$name - метод возвращает ссылку, а не значение\n";
    }

    return $details;
}



