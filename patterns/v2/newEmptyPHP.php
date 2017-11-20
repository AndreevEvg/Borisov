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
            case self::TIMED:
                return (5 * $this->duration);
                break;
            case self::FIXED:
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
            case self::TIMED:
                return "Почасовая оплата";
                break;
            case self::FIXED:
                return "Фиксированная ставка";
                break;
            default:
                $this->costtype = self::FIXED;
                return "Фиксированная ставка";
        }
    }
}

class Seminar extends Lesson{}
class Lecture extends Lesson{}

$lecture = new Lecture(5, Lesson::FIXED);
echo "{$lecture->cost()} ({$lecture->chargeType()})";

echo "<br>";

$seminar = new Seminar(3, Lecture::TIMED);
echo "{$seminar->cost()} ({$seminar->chargeType()})";