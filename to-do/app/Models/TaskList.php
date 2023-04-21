<?php
namespace app\Models;
class TaskList
{
    public array $doneTasks;
    public array $currentTasks;

    public function __construct($taskArray) {
        $this->doneTasks = [];
        $this->currentTasks = [];
        foreach ($taskArray as $row) {
            if ($row['done'] == 0)
                $this->currentTasks[] = $row;
            else
                $this->doneTasks[] = $row;
        }
    }
}
