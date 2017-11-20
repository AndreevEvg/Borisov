<?php

/*/?controller=todo&action=create&title=test%20title&description=test%20description&due_date=12/08/2011&username=nikko&userpass=test1234*/

define("DATA_PATH", realpath(dirname(__FILE__) . "/data"));
include_once('models/TodoItem.php');

try {
    $params = $_REQUEST;
    echo "<pre>";
    print_r($params);
    echo "</pre>";
    $controller = ucfirst(strtolower($params["controller"])) . "Controller";
    $action = strtolower($params["action"]) . "Action";
    
    if (file_exists("controllers/{$controller}.php")) {
        include_once("controllers/{$controller}.php");
    } else {
        throw new Exception("Controller is invalid!");
    }
    
    $controller = new $controller($params);
    
    
    if (method_exists($controller, $action) === false) {
        throw new Exception("Action is invalid");
    }
    
    $controller->$action();

} catch (Exception $e) {
    $result = array();
    $result["success"] = false;
    $result["errormsg"] = $e->getMessage();
}