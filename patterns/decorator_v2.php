<?php

class RequestHelper{}

abstract class ProcessRequest
{
    abstract function process(RequestHelper $req);
}

abstract class DecorateProcess extends ProcessRequest
{
    protected $processrequest;

    public function __construct(ProcessRequest $pr)
    {
        $this->processrequest = $pr;
    }

}

class MainProcess extends ProcessRequest
{
    public function process(RequestHelper $req)
    {
        echo __CLASS__ . ": выполнение запроса<br>";
    }

}

class LogRequest extends DecorateProcess
{
    public function process(RequestHelper $req)
    {
        echo __CLASS__ . ": регистрация запроса<br>";
        $this->processrequest->process($req);
    }

}

class AuthenticateRequest extends DecorateProcess
{
    public function process(RequestHelper $req)
    {
        echo __CLASS__ . ": аутентификация запроса<br>";
        $this->processrequest->process($req);
    }

}

class StructureRequest extends DecorateProcess
{
    public function process(RequestHelper $req)
    {
        echo __CLASS__ . ": упорядочивание данных запроса<br>";
        $this->processrequest->process($req);
    }

}

$process = new AuthenticateRequest(new StructureRequest(new LogRequest(new MainProcess())));
$process->process(new RequestHelper());
