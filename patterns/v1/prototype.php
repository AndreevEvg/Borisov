<?php

class Sea
{
	private $navigability = 0;

	public function __construct($navigability)
	{
		$this->navigability = $navigability;
	}
}
class EarthSea extends Sea{}
class MarsSea extends Sea{}

class Plains{}
class EarthPlains extends Plains{}
class MarsPlains extends Plains{}

class Forest{}
class EatrhForest extends Forest{}
class MarsForest extends Forest{}

class TerrainFactory
{
	private $sea;
	private $forest;
	private $plains;

	public function __construct(Sea $sea, Plains $plains, Forest $forest)
	{
		$this->sea = $sea;
		$this->plains = $plains;
		$this->forest = $forest;
	}

	public function getSea()
	{
		return clone $this->sea;
	}

	public function getPlains()
	{
		return clone $this->plains;
	}

	public function getForest()
	{
		return $this->forest;
	}
}

$factory = new TerrainFactory(
	new EarthSea(-1),
	new MarsPlains(),
	new EatrhForest()
);

print_r($factory->getSea());
echo "<br>";
print_r($factory->getPlains());
echo "<br>";
print_r($factory->getForest());
