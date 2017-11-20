<?php

class TodoItem
{
    public $todo_id;
    public $title;
    public $description;
    public $due_date;
    public $is_done;
    
    public function save($username, $userpass)
    {
        $userhash = sha1("{$username}_{$userpass}");
        if (is_dir(DATA_PATH . "/{$userhash}") === false) {
            mkdir(DATA_PATH . "/{$userhash}");
        }
        
        if (is_null($this->todo_id) || !is_numeric($this->todo_id)) {
            $this->todo_id = time();
        }
        
        $todo_item_array = $this->toArray();
        $success = file_put_contents(DATA_PATH . "/{$userhash}/{$this->todo_id}.txt", 
                serialize($todo_item_array));
        
        if ($success === false) {
            throw new Exception("Failed to save todo item");
        }
        
        return $todo_item_array;
    }
    
    public function toArray()
    {
        return array(
            "todo_id" => $this->todo_id,
            "title" => $this->title,
            "description" => $this->description,
            "due_date" => $this->due_date,
            "is_done" => $this->is_done
        );
    }
}


