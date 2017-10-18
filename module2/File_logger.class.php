<?php

class File_Logger{

	static $loggers = [];
	private $time;

	private function __construct($fname){
		$this->time = microtime(true);
	}

	public static function create($fname){
		if(isset(self::$loggers[$fname])){
			return self::$loggers[$fname];
		}

		return self::$loggers[$fname] = new self($fname);
	}

	public function getTime(){
		return $this->time;
	}
}

$logger1 = File_Logger::create("file.log");
sleep(1);
$logger2 = File_Logger::create("file.log");

echo "{$logger1->getTime()}, {$logger2->getTime()}";