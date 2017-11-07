<?php

abstract class ParamHandler
{
    protected $source;
    protected $params = array();

    public function __construct($source)
    {
        $this->source = $source;
    }

    public function addParam($key, $val)
    {
        $this->params[$key] = $val;
    }

    public function getAllParams()
    {
        return $this->params;
    }

    public static function getInstance($filename)
    {
        if (preg_match("/\.xml$/i", $filename)) {
            return new XmlParamHandler($filename);
        }

        return new TextParamHandler($filename);
    }

    abstract function write();
    abstract function read();
}

class XmlParamHandler extends ParamHandler
{
    public function write()
    {
        //Запись в формате XML
        //массива параметров $this->params
    }

    public function read()
    {
        //Чтение из XML-файла и
        //запись значений в массив $this->params
    }
}

class TextParamHandler extends ParamHandler
{
    public function write()
    {
        //Запись в текстовый файл
        //массива параметров $this->params
    }

    public function read()
    {
        //Чтение из текстового файла и
        //запись значений в массив $this->params
    }
}