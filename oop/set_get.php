<?php

class MyClass{

	private $name;

	public function __set($property, $value){
		$this->$property = strtoupper($value);		
	}

	public function __get($property){
		return $this->$property;
	}

	public function __toString(){
		return __CLASS__;
	}

}

$obj = new MyClass();
$obj->name = "John";
echo $obj->name . "\n";
echo $obj . "\n";
