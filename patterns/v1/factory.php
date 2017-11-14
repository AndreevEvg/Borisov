<?php

interface Shape{

	public function draw();
}

class Rectange implements Shape{

	public function draw(){
		echo __METHOD__ . "\n";
	}
}

class Square implements Shape{
	
	public function draw(){
		echo __METHOD__ . "\n";
	}
}

class Circle implements Shape{
	
	public function draw(){
		echo __METHOD__ . "\n";
	}
}



class ShapeFactory{

	public function getShape($type){

		$type = strtoupper($type);

		switch($type){
			case "R": return new Rectange();
			case "S": return new Square();
			case "C": return new Circle();
			default: throw new Exception("Wrong type!");
		}
	}
}

$factory = new ShapeFactory();
$rectangle = $factory->getShape("r");
$square = $factory->getShape("s");
$circle = $factory->getShape("c");

$rectangle->draw();
$square->draw();
$circle->draw();