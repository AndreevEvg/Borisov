<?php

namespace woo\controller;

class Controller
{
    private $applicationHelper;
    
    private function __construct(){}
    
    public static function run()
    {
        $instance = new Controller();
        $instance->init();
        $instance->handleRequest();
    }
    
    public function init()
    {
        $applicationHelper = ApplicationHelper::instance();
        $applicationHelper->init();
    }
    
    public function handleRequest()
    {
        $request = \woo\base\ApplicationRegistry::getRequest();
        $cmd_r = new woo\command\CommandResolver();
        $cmd = $cmd_r->getCommand($request);
        $cmd->execute($request);
    }
}

class ApplicationHelper
{
    private static $instance = null;
    private $config = 'data/woo_options.xml';
    
    private function __construct(){}
    
    public static function instance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        
        return self::$instance;
    }
    
    public function init()
    {
        $dsn = \woo\base\ApplicationRegistry::getDSN();
        if (!is_null($dsn)) {
            return;
        }
        
        $this->getOptions();
    }
    
    private function getOptions()
    {
        $this->ensure(file_exists($this->config), 'Файл конфигурации не найден');
        $options = @Simple_load_file($this->config);
        $dsn = (string)$options->dsn;
        $this->ensure($options instanceof SimpleXMLElement, 'Файл конфигурации запорчен');
        $this->ensure($dsn, 'DSN не найден');
        \woo\base\ApplicationRegistry::setDSN($dsn);
    }
    
    private function ensure($expr, $message)
    {
        if (!$expr) {
            throw new \woo\base\AppExeption($message);
        }
    }
}

class CommandResolver
{
    private static $base_cmd = null;
    private static $default_cmd = null;
    
    public function __construct()
    {
        if (is_null(self::$base_cmd)) {
            self::$base_cmd = new \ReflectionClass("\woo\command\Command");
            self::$default_cmd = new DefaultCommand();
        }
    }
    
    public function getCommand(\woo\controller\Request $request)
    {
        $cmd = $request->getProperty("cmd");
        $sep = DIRECTORY_SEPARATOR;
        if (!$cmd) {
            return self::$default_cmd;
        }
        $cmd = str_replace(array(".", $sep), "", $cmd);
        $filepath = "woo{$sep}command{$sep}{$cmd}.php";
        $classname = "woo\\command\\$cmd";
        if (file_exists($filepath)) {
            @require_once($filepath);
            if (class_exists($classname)) {
                $cmd_class = new ReflectionClass($classname);
                if ($cmd_class->isSubClassOf(self::$base_cmd)) {
                    return $cmd_class->newInstance();
                } else {
                    $request->addFeedback("Объект Command команды '$cmd' не найден");
                }
            }
        }
        $request->addFeedback("Команда '$cmd' не найдена");
        return clone self::$default_cmd;
    }
}

class Request
{
    private $properties;
    private $feedback = [];
    
    public function __construct()
    {
        $this->init();
    }
    
    public function init()
    {
        if (isset($_SERVER["REQUEST_METHOD"])) {
            $this->properties = $_REQUEST;
            return;
        }
        foreach ($_SERVER["argv"] as $arg) {
            if (strpos($arv, "=")) {
                list($key, $val) = explode("=", $arg);
                $this->setProperty($key, $val);
            }
        }
    }
    
    public function getProperty($key)
    {
        if (isset($this->properties[$key])) {
            return $this->properties[$key];
        }
        return null;
    }
    
    public function setProperty($key, $val)
    {
        $this->properties[$key] = $val;
    }
    
    public function addFeedback($msg)
    {
        array_push($this->feedback, $msg);
    }
    
    public function getFeedback()
    {
        return $this->feedback;
    }
    
    public function getFeedbackString($separator = "\n")
    {
        return implode($separator, $this->feedback);
    }
}