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

abstract class ShapeDecorator implements Shape{

	protected $decoratedShape;

	public function __construct(Shape $decoratedShape){

		$this->decoratedShape = $decoratedShape;
	}

	public function draw(){

		$this->decoratedShape->draw();
	}
}

class RedShapeDecorator extends ShapeDecorator{

	public function __construct(Shape $decoratedShape){

		parent::__construct($decoratedShape);
	}

	private function setRedBorder(){

		echo "BORDER COLOR RED\n";
	}

	public function draw(){

		$this->decoratedShape->draw();
		$this->setRedBorder();
	}
}

$c = new Circle;
$rc = new RedShapeDecorator(new Circle);

$c->draw();
$rc->draw();