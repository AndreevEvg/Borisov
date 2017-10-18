<?php

require_once "Circle.class.php";

function moveSize(Circle $obj){
	$obj->moveBy(10,0);
	$obj->resizeBy(10);
}

$shape = new Circle(); //Рисуем круг
moveSize($shape);

// echo "<br>";

// echo "Прошло некоторое время...<br>";
// $shape->moveBy(101, 6);//Стираем круг-Рисуем круг
// echo "<br>";

// echo "Прошло некоторое время...<br>";
// $shape->resizeBy(2.0);//Стираем круг-Рисуем круг
// echo "<br>";

// echo "Прошло некоторое время...<br>";