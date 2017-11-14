<?php

abstract class ApptEncoder
{
	abstract function encode();
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

class CommsManager
{
	const BLOGGS = 1;
	const MEGA = 2;
	private $mode = 1;

	public function __construct($mode)
	{
		$this->mode = $mode;
	}

	public function getHeaderText()
	{
		switch ($this->$mode) {

			case (self::MEGA):
				return "MegaCall верхний колонтитул";
			default:
				return "BloggsCal верхний колонтитул";
		}
	}

	public function getApptEncoder()
	{
		switch ($this->mode) {

			case (self::MEGA):
				return new MegaApptEncoder();
			default:
				return new BloggsApptEncoder();
		}
	}
}


$comms = new CommsManager(CommsManager::MEGA);
$apptEncoder = $comms->getApptEncoder();
echo $apptEncoder->encode();