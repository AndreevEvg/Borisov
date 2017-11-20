<?php

$params = $_REQUEST;

echo ucfirst(strtolower($params["action"])) . "Action";

/*
if (isset($_GET["action"])) { 
    $action = $_GET['action'];  
    if ($action == 'select') {
        echo "Выборка данных из базы данных!";
    } elseif ($action == 'insert') {
        echo "Запись данных в базу данных!";
    }
}
*/