<?php

function happyTickets($start, $end)
{
    if (strlen($start) <= 6 and strlen($end) <= 6) {
        $numbers = '';
        $countTickets = []; /* массив для подсчета количество счастливых билетов */

        for ($number = $start; $number <= $end; $number++) {
            //добавляем нули впереди, если число не шестизначное
            $number = addZero($number);
            //вынимаем обе тройки
            $first_number = substr($number, 0, 3);
            $second_number = substr($number, 3, 3);
            //если сумма цифр первой тройки и сумма цифр второй тройки равны
            if (sumNumber($first_number) == sumNumber($second_number)) {
                $numbers .= $number . " - это счастливый билет!<br>";
                /* записываем в массив все счастливые билеты для подсчета их количества*/
                $countTickets[] = $number;
            }
        }

        $numbers .= "Всего счастливых билетов: " . count($countTickets);

        return $numbers;

    } else {
        return "Максимальное число должно быть: 999999";
    }
}

//добавляем к числу нули впереди до шести знаков
function addZero($number)
{
    $symbols_count = strlen($number);

    if ($symbols_count < 6) {
        $zeros_count = 6 - $symbols_count;
        $result_number = '';

        for ($i = 1; $i <= $zeros_count; $i++) {
            $result_number .= 0;
        }

        $result_number .= $number;

    } else {
        $result_number = $number;
    }

    return $result_number;
}

//находим сумму цифр заданного числа
function sumNumber($number)
{
    $number = strval($number);
    $digits_count = strlen($number);
    $sum = 0;
    for ($i = 1; $i <= $digits_count; $i++) {
        $sum += $number[$i - 1];
    }

    return $sum;
}

echo happyTickets(000000, 999999);