<?php

class Pet{
	public $name;
	public $type = "unknown";

	public function __construct($name, $type){
		$this->name = $name;
		$this->type = $type;
	}

	public function say($word){
		echo "$this->name said $word";
	}

}

$cat = new Pet("Murzik", "Cat");
$dog = new Pet("Tuzik", "Dog");

echo $cat->say("Myau");
echo "<br>";
echo $dog->say("Gav");
echo "<br>";
