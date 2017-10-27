<?php

function straightIncludeWithCase($classname){
    $file = strtolower("{$classname}.php");
    if(file_exists($file)){
        require_once($file);
    }
}

spl_autoload_register('straightIncludeWithCase');

$writer = new Writer();
