<?php

require_once "Shape.class.php";

class Circle extends Shape{

	private $radius;

	//Создает новый объект-круг с указанием радиуса
	public function __construct($radius = 100){
		$this->radius = $radius;
		parent::__construct();
	}

	//Отображаем круг на экране
	public function show(){
		list($x, $y) = $this->getCoord();
		$radius = $this->radius * $this->getScale();
		echo "Рисуем круг: ($x, $y, $radius)<br>";
	}

	//Стираем фигуру с экрана
	public function hide(){
		list($x, $y) = $this->getCoord();
		$radius = $this->radius * $this->getScale();
		echo "Стираем круг: ($x, $y, $radius)<br>";
	}
}

