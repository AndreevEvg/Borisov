<?php

$size = ini_get("post_max_size"); //8M
$number = (int) $size; // 8
$letter = $size{strlen($size) - 1}; // M

switch($letter){
	case "K": $number *= 1024; break;
	case "M": $number *= 1024; break;
	case "G": $number *= 1024; break;
}

echo $number . "\n";

