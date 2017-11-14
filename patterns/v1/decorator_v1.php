<?php

abstract class Tile
{
	abstract function getWealthFactory();
}

class Plains extends Tile
{
	private $wealthfactory = 2;

	public function getWealthFactory()
	{
		return $this->wealthfactory;
	}
}

abstract class TileDecorator extends Tile
{
	protected $tile;

	public function __construct(Tile $tile)
	{
		$this->tile = $tile;
	}
}

class DiamondDecorator extends TileDecorator
{
	public function getWealthFactory()
	{
		return $this->tile->getWealthFactory() + 2;
	}
}

class PollutionDecorator extends TileDecorator
{
	public function getWealthFactory()
	{
		return $this->tile->getWealthFactory() - 4;
	}
}


$tile = new Plains();
echo $tile->getWealthFactory() . "<br>";

$tile = new DiamondDecorator(new Plains);
echo $tile->getWealthFactory();