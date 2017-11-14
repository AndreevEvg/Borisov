<?php

abstract class FormatWrite
{
    abstract function write();
}

class Html extends FormatWrite
{
    public function write()
    {
        echo "Write HTML";
    }
}

class Xml extends FormatWrite
{
    public function write()
    {
        echo "Write XML";
    }
}

class Writer
{
    private static $instance = null;
    
    private function __construct(){}
    
    public function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function getWrite(FormatWrite $write)
    {
        return new $write;
    }
}

$xml = Writer::getInstance()->getWrite(new Xml());
$xml->write();

echo "<br>";

$html = Writer::getInstance()->getWrite(new Html());
$html->write();

