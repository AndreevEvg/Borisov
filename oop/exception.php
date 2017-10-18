<?php

function test($var = false){
	try{
		echo "Start<br>";
		if(!$var)
			throw new Exception('$var is false!');
		echo "Continue<br>";
	}catch(Exception $e){
		echo "Exception: " . $e->getMessage() . "<br>";
		echo "in file: " . $e->getFile() . "<br>";
		echo "on line: " . $e->getLine() . "<br>";
	}

	echo "The End<br>";
}

test();