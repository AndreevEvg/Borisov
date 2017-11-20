<?php

class Preferences
{
    private $props = [];
    private static $instance = null;
    
    private function __construct(){}
    
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        
        return self::$instance;
    }
    
    public function setProperty($key, $val)
    {
        $this->props[$key] = $val;
    }
    
    public function getProperty($key)
    {
        return $this->props[$key];
    }
}


Preferences::getInstance()->setProperty("name", "Иван");
echo Preferences::getInstance()->getProperty("name");
