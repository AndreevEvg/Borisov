<?php

class HeadshotException extends Exception{}

function eatThis(){ throw new HeadshotException("bang-bang!"); }

function action(){
	echo "Все, что имеет начало, ";
	try{
		eatThis();
	}catch(Exception $e){
		echo "имеет и конец.<br>";
		throw $e;
	}
}
try{
	action();
}catch(HeadshotException $e){
	echo "Извините, вы застрелились: {$e->getMessage()}";
}