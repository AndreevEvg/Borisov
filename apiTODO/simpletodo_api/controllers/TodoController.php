<?php

class TodoController
{
    private $params = [];
    
    public function __construct($params)
    {
        $this->params = $params;
    }
    
    public function createAction()
    {
        $todo = new TodoItem();
        $todo->title = $this->params["title"];
        $todo->description = $this->params["description"];
        $todo->due_date = $this->params["due_date"];
        $todo->is_done = "false";
        
        $todo->save($this->params["username"], $this->params["userpass"]);
        
        return $todo->toArray();
    }
    
    /*
    public function readAction()
    {
        
    }
    
    public function updateAction()
    {
        
    }
    
    public function deleteAction()
    {
        
    }
    */
}

