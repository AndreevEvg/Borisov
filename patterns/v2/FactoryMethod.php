<?php

abstract class ApptEncoder
{
    abstract function encode();
}

abstract class CommsManager
{
    abstract public function getHeaderText();  
    abstract public function getApptEncoder();
    abstract public function getTtdEncoder();
    abstract public function getContactEncoder();
    abstract public function getFooterText();
}

class BloggsApptEncoder extends ApptEncoder
{
    public function encode()
    {
        return "Данные о встрече закодированы в формате BloggsCal<br>";
    }
}

class MegaApptEncoder extends ApptEncoder
{
    public function encode()
    {
        return "Данные о встрече закодированы в формате MegaCal<br>";
    }
}

class BloggsCommsManager extends CommsManager
{
    public function getHeaderText(): string
    {
        return "Верхний колонтитул<br>";
    }
    
    public function getApptEncoder(): ApptEncoder
    {
        return new BloggsApptEncoder();
    }
    
    public function getTtdEncoder()
    {
        return new BloggsTtdEncoder();
    }
    
    public function getContactEncoder()
    {
        return new BloggsContactEncoder();
    }
    
    public function getFooterText(): string
    {
        return "Нижний колонтитул<br>";
    }
}

$x = new BloggsCommsManager();
echo $x->getHeaderText();
echo $x->getApptEncoder()->encode();
echo $x->getFooterText();


