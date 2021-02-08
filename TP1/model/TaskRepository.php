<?php

class TaskRepository
{
    const TABLE = "tasks";

    public function Initialize(){

    }

    public function getAll()
    {
        return Database::getInstance()
            ->query("Select * from " . self::TABLE)
            ->fetchAll();
    }

    public function update($id, $checked = false)
    {

    }

    public function add($description)
    {

    }

    public function delete($id)
    {

    }
}