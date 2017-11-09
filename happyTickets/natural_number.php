<?php

/* функция проверяет простое ли число */
function isPrimeNumber($number)
{
    if ($number == 2) return true;
	if ($number % 2 == 0) return false;

	$i = 3;
	$square = (int)sqrt($number);

	while ($i <= $square) {
            if ($number % $i == 0) return false;
            $i += 2;
	}

	return true;
}

function getPrimesNumber($max_number)
{
    $primes = []; /* массив для записи простых чисел */

    for ($i = 1; $i <= $max_number; $i++) {
        if (isPrimeNumber($i)) $primes[] = $i; /* если число простое, записываем в массив */
    }

    foreach ($primes as $key => $val) {
        if ($key == 10001) echo "Искомое простое число: " . $val . "<br>";
    }

    return true;
}

echo "<pre>";
print_r(getPrimesNumber(105000));
echo "</pre>";

// Число под номером 10001 = 104743