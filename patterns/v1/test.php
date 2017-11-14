<?php

class Setting
{
	static $COMMSTYPE = "Mega";
}

class AppConfig
{
    private static $instance;
    private $commsManager = "";

    public function __construct()
    {
        $this->init();
    }

    private function init()
    {
        switch (Setting::$COMMSTYPE) {
            case "Mega":
                    $this->commsManager = "Создание класса MegaCommsManager";
                    break;
            case "Blogs":
                    $this->commsManager = "Создание класса BloggsCommsManager";
                    break;
            default:
                    $this->commsManager = "Класс не найден!";
        }
    }

    public static function getInstance()
    {
        if (empty(self::$instance)) {
                self::$instance = new self();
        }

        return self::$instance;
    }
}

print_r(AppConfig::getInstance());