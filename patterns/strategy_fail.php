<?php

abstract class Lesson
{
    protected $duration;
    const FIXED = 1;
    const TIMED = 2;
    private $costtype;

    public function __construct($duration, $costtype = 1)
    {
        $this->duration = $duration;
        $this->costtype = $costtype;
    }

    public function cost()
    {
        switch ($this->costtype) {

            CASE self::TIMED:
                return (5 * $this->duration);
                break;
            CASE self::FIXED:
                return 30;
                break;
            default:
                $this->costtype = self::FIXED;
                return 30;
        }
    }

    public function chargeType()
    {
        switch ($this->costtype) {

            CASE self::TIMED:
                return "Почасовая оплата";
                break;
            CASE self::FIXED:
                return "Фиксированная оплата";
                break;
            default:
                $this->costtype = self::FIXED;
                return "Фиксированная ставка";
        }
    }
}

class Lecture extends Lesson
{

}

class Seminar extends Lesson
{

}

$lecture = new Lecture(5, Lesson::FIXED);
echo "{$lecture->cost()} ({$lecture->chargeType()})<br>";

$seminar = new Seminar(3, Lesson::TIMED);
echo "{$seminar->cost()} ({$seminar->chargeType()})<br>";
