<?php

namespace main;

require_once ("debug.php");

//use useful as uDebug;
use useful;


class Outputter{

   static  public function getName(){
        return __NAMESPACE__;
    }
}

echo Outputter::getName() . "\n";

echo useful\Outputter::getName() . "\n";