<?php

interface Observable
{
    public function attach(Observer $observer);
    public function detach(Observer $observer);
    public function notify();
}

interface Observer
{
    public function update(Observable $observable);
}

class Login implements Observable
{
    private $observers = [];
    private $storage;
    const LOGIN_USER_UNKNOWN = 1;
    const LOGIN_WRONG_PASS = 2;
    const LOGIN_ACCESS = 3;
    
    public function __construct()
    {
        $this->observers = [];
    }
    
    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }
    
    public function detach(Observer $observer)
    {
        $this->observers = array_filter($this->observers, 
                function($a) use ($observer)
                    { return (! ($a === $observer)); });
    }
    
    public function notify()
    {
        foreach ($this->observers as $obs) {
            $obs->update($this);
        }
    }
    
    public function handleLogin($user, $pass, $ip)
    {
        $isvalid = false;
        switch (rand(1,3)) {
            case 1:
                $this->setStatus(self::LOGIN_ACCESS, $user, $ip);
                $isvalid = true;
                break;
            case 2:
                $this->setStatus(self::LOGIN_WRONG_PASS, $user, $ip);
                $isvalid = false;
                break;
            case 3:
                $this->setStatus(self::LOGIN_USER_UNKNOWN, $user, $ip);
                $isvalid = false;
                break;
        }
        $this->notify();
        return $isvalid;
    }
}

abstract class LoginObserver implements Observer
{
    private $login;
    
    public function __construct(Login $login)
    {
        $this->login = $login;
        $login->attach($this);
    }
    
    public function update(Observable $observable)
    {
        if ($observable === $this->login) {
            $this->doUpdate($observable);
        }
    }
    
    abstract function doUpdate(Login $login);
}


class SecurityMonitor extends LoginObserver
{    
    public function doUpdate(Login $login)
    {
        $status = $login->getStatus();
        
        if ($status[0] == Login::LOGIN_WRONG_PASS) {
            echo __CLASS__ . ": Отправка почты системному администратору<br>";
        }
    }
}

class GeneralLogger extends LoginObserver
{
    public function doUpdate(Login $login)
    {
        $status = $login->getStatus();
        echo __CLASS__ . ": Регистрация в системном журнале<br>";
    }
}

class PartnershipTool extends LoginObserver
{
    public function doUpdate(Login $login)
    {
        $status = $login->getStatus();
        echo __CLASS__ . ": Отправка cookie-файла, если адрес соответсвует списку<br>";
    }
}



$login = new Login();
new SecurityMonitor($login);
new GeneralLogger($login);
new PartnershipTool($login);
