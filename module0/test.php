<?php

class Foo{

	private $vars = [];

	public function __set($name, $value){

		return $this->vars[$name] = $value;
	}

	public function __get($name){

		return isset($this->vars[$name]) ? $this->vars[$name] : "null";
	}
}

$x = new Foo();

$x->name = "John";
echo $x->name . "\n";
