<?php

abstract class CostStrategy
{
    abstract function cost(Lesson $lesson);
    abstract function chargeType();
}

abstract class Lesson
{
    private $duration;
    private $costStrategy;

    public function __construct($duration, CostStrategy $strategy)
    {
        $this->duration = $duration;
        $this->costStrategy = $strategy;
    }

    public function cost()
    {
        return $this->costStrategy->cost($this);
    }

    public function chargeType()
    {
        return $this->costStrategy->chargeType();
    }

    public function getDuration()
    {
        return $this->duration;
    }
}

class Lecture extends Lesson
{

}

class Seminar extends Lesson
{

}


class TimedCostStrategy extends CostStrategy
{
    public function cost(Lesson $lesson)
    {
        return  ($lesson->getDuration() * 5);
    }

    public function chargeType()
    {
        return "Почасовая оплата";
    }
}

class FixedCostStrategy extends CostStrategy
{
    public function cost(Lesson $lesson)
    {
        return 30;
    }

    public function chargeType()
    {
        return "Фиксированная ставка";
    }
}

$lessons[] = new Seminar(4, new TimedCostStrategy());
$lessons[] = new Lecture(4, new FixedCostStrategy());
/*
foreach ($lessons as $lesson) {
    echo "Плата за занятие {$lesson->cost()}. ";
    echo "Тип оплаты: {$lesson->chargeType()}<br>";
}
*/
class RegistrationMgr
{
    public function register(Lesson $lesson)
    {
        $notifier = Notifier::getNotifier();
        $notifier->inform("Новое занятие: стоимость - ({$lesson->cost()})");
    }
}

abstract class Notifier
{
    public static function getNotifier()
    {
        if (rand(1, 2) === 1) {

            return new MailNotifier();
        } else {

            return new TextNotifier();
        }
    }

    abstract function inform($message);

}

class MailNotifier extends Notifier
{
    public function inform($message)
    {
        echo "Уведомление по E-mail: {$message}";
    }
}

class TextNotifier extends Notifier
{
    public function inform($message)
    {
        echo "Текстовое уведомление: {$message}";
    }
}

$lesson1 = new Seminar(4, new TimedCostStrategy());
$lesson2 = new Lecture(4, new FixedCostStrategy());

$mgr = new RegistrationMgr();
$mgr->register($lesson1);
echo "<br>";
$mgr->register($lesson2);