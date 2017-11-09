<?php

$i = 0;
$countTickets = []; /* массив для подсчета количество счастливых билетов */

while ($i <= 999999) {
    $result = "";
    $zero = 6 - strlen($i);
    /* Пишем количество нулей в переменную result. */
    for ($zero; $zero > 0; $zero--) {
        $result .= 0;
    }
    /* Дописываем вконце переменной result переменную i. */
    $result .= $i;
    /* Сумируем первые три числа и последний три числа в переменные firstNumber и secondNumber */
    $firstNumber = $result[0] + $result[1] + $result[2];
    $secondNumber = $result[3] + $result[4] + $result[5];
    /* Сравниваем значения в переменных выше, если ровно - это счастливый билет */
    if ($firstNumber == $secondNumber) {
        echo $result." - это счастливый билет! <br>\n";
        /* записываем в массив все счастливые билеты для подсчета их количества*/
        $countTickets[] = $result;
    }
    /* Инкрементируем счетчик, чтобы не получить зацикленную функцию */
    $i++;
}

echo "Всего счастливых билетов: " . count($countTickets) . "<br>\n";