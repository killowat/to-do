<?php
namespace app\Controllers;
use app\Models\SqlStatement;
use app\Models\TaskList;
require_once "app/Models/connect.php";

class HomeController {
    public $db, $statement;
    public function __construct()
    {
        $this->db = connect();
        $this->statement = new SqlStatement($this->db);
    }

    function loadPage(): bool {
        require 'templates/header.php';
        require 'templates/to_do_section.php';
        require 'templates/footer.php';
        return true;
    }
    function loadTaskList(): bool {
        $tasks = $this->statement->getTasks();
        $taskList = new TaskList($tasks);
        $currentTasks = $taskList->currentTasks;
        $doneTasks = $taskList->doneTasks;
        require "templates/list.php";
        return true;
    }
    function addTask($task) {
        $this->statement->addTask($task, 0);
    }
    function deleteTask($id) {
        $this->statement->deleteTask($id);
    }

    function doTask($id, $done) {
        $this->statement->doTask($id, $done);
    }

    function updateTask($id, $task) {
        $this->statement->updateTask($id, $task);
    }
}
