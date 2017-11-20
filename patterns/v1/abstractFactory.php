<?php

abstract class ApptEncoder
{
    abstract function encode();
}

abstract class CommsManager
{
    abstract function getHeaderText();
    abstract function getApptEncoder();
    abstract function getTtdEncoder();
    abstract function getContactEncoder();
    abstract function getFooterText();
}

class BlogsApptEncoder extends ApptEncoder
{
    public function encode()
    {
        return "Данные о встрече закодированы в формате BloggsCal<br>";
    }
}

class BloggsTtdEncoder extends ApptEncoder
{
    public function encode()
    {
        return "Что делать...?<br>";
    }
}

class BloggsContactEncoder extends ApptEncoder
{
    public function encode()
    {
        return "Контакты...<br>";
    }
}

class BloggsCommsManager extends CommsManager
{
    public function getHeaderText()
    {
        return "BloggsCal верхний колонтитул<br>";
    }

    public function getApptEncoder()
    {
        return new BlogsApptEncoder();
    }

    public function getTtdEncoder()
    {
        return new BloggsTtdEncoder();
    }

    public function getContactEncoder()
    {
        return new BloggsContactEncoder();
    }

    public function getFooterText()
    {
        return "BloggsCal нижний колонтитул<br>";
    }
}

$mgr = new BloggsCommsManager();
echo $mgr->getHeaderText();
echo $mgr->getApptEncoder()->encode();
echo $mgr->getTtdEncoder()->encode();
echo $mgr->getContactEncoder()->encode();
echo $mgr->getFooterText();