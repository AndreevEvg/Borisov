<?php

class Bar
{
    private static $_instance = NULL;
    const FILE = "file.log";

    private function __construct(){}
    private function __clone(){}

    public static function getInstance()
    {
        if (self::$_instance == NULL) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    public function log($msg)
    {
	return file_put_contents(self::FILE, $msg, FILE_APPEND);
    }
} 

Bar::getInstance()->log("Первая строка...\n");
Bar::getInstance()->log("Вторая строка...\n");