<?php

class Hooker{

	public $opened = 'opened';
	private $vars = []; 

	public function method(){
		echo "Whoa, deja vu.<br>";
	}

	public function __get($name){
		echo "Перехват: получаем значение $name.<br>";
		return isset($this->vars[$name]) ? $this->vars[$name] : null;
	}

	public function __set($name, $value){
		echo "Перехват: устанавливаем значение $name, равным '$value'.<br>";
		return $this->vars[$name] = trim($value);
	}

	public function __call($name, $args){
		echo "Перехват: вызываем $name с аргументами: ";
		var_dump($args);
		return $args[0];
	}
}

$obj = new Hooker();
echo "<b>Получаем значение обычного свойства.</b><br>";
echo "Значение: {$obj->opened}<br>";
echo "<b>Вызываем обычный метод.</b><br>";
$obj->method();
echo "<b>Присваивание несуществующему свойству.</b><br>";
$obj->nonExistent = 101;
echo "<b>Получение значения несуществующего свойства.</b><br>";
echo "Значение: {$obj->nonExistent}<br>";
echo "<b>Обращение к несуществующему методу.</b><br>";
$obj->nonExistent(6);