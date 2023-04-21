<?php
namespace app\Models;
class SqlStatement {
    public $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    function getTasks(): array {
        $statement = $this->db->prepare("SELECT * FROM TASKS");
        $statement->execute();
        return $statement->fetchAll();
    }
    function addTask($task, $done): bool
    {
        settype($done, 'integer');
        $task = addslashes($task);
        $statement = $this->db->prepare("INSERT INTO TASKS (task, done) VALUES ('$task', '$done')");
        $statement->execute();
        return True;
    }
    function deleteTask($id): bool
    {
        settype($id, 'integer');
        $statement = $this->db->prepare("DELETE FROM TASKS WHERE id = '$id'");
        $statement->execute();
        return True;
    }
    function doTask($id, $done) {
        settype($done, 'integer');
        settype($id, 'integer');
        $statement = $this->db->prepare("UPDATE 'TASKS' SET done =$done WHERE id = $id");
        $statement->execute();
    }
    function updateTask($id, $task) {
        settype($id, 'integer');
        $task = addslashes($task);
        $statement = $this->db->prepare("UPDATE 'TASKS' SET task = '$task' WHERE id = $id");
        $statement->execute();
    }

};




