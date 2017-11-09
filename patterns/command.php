<?php

abstract class Command
{
    abstract function execute(CommandContext $context);
}

class CommandContext
{
    private $params = [];
    private $error = "";
    
    public function __construct()
    {
        $this->params = $_REQUEST;
    }
    
    public function addParams($key, $val)
    {
        $this->params[$key] = $val;
    }
    
    public function get($key)
    {
        if (isset($this->params[$key])) {
            return $this->params[$key];
        }
        
        return null;
    }
    
    public function setError($error)
    {
        $this->error = $error;
    }
    
    public function getError()
    {
        return $this->error;
    }
}

class LoginCommand extends Command
{
    public function execute(CommandContext $context)
    {
        $manager = Registry::getAccessManager();
        $user = $context->get('username');
        $pass = $context->get('pass');
        $user_obj = $manager->login($user, $pass);
        
        if (is_null($user_obj)) {
            $context->setError($manager->getError());
            return false;
        }
        
        $context->addParam('user', $user_obj);
        return true;
    }
}

