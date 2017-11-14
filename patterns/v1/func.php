<?php

function number(){
	$arr = [];
	
	for($i = 1; $i <= 20; $i++){

		$arr[$i] = rand(1, 40);
	}

	return array_unique($arr);
}

print_r(number()) . "\n";
