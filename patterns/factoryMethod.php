<?php

abstract class ApptEncoder
{
	abstract function encode();
}

abstract class CommsManager
{
	abstract function getHeaderText();
	abstract function getApptEncoder();
	abstract function getFooterText();
}

class BlogsApptEncoder extends ApptEncoder
{
	public function encode()
	{
		return "Данные о встрече закодированы в формате BloggsCal<br>";
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

	public function getFooterText()
	{
		return "BloggsCal нижний колонтитул<br>";
	}
}

$mgr = new BloggsCommsManager();
echo $mgr->getHeaderText();
echo $mgr->getApptEncoder()->encode();
echo $mgr->getFooterText();