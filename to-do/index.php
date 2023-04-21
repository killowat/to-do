<?php
require __DIR__ . "/bootstrap.php";
use app\Controllers\HomeController;
$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$controller = new HomeController();
if($uri === "/") {
    $controller->loadPage();
}
elseif($uri === "/add") {
    $controller->addTask($_GET['task']);
    $controller->loadTaskList();
}
elseif($uri === "/delete") {
    $controller->deleteTask($_GET['id']);
    $controller->loadTaskList();
}
elseif($uri === "/done") {
    $controller->doTask($_GET['id'], $_GET['done']);
    $controller->loadTaskList();

}
elseif($uri === "/update") {
    $controller->updateTask($_GET['id'], $_GET['task']);
    $controller->loadTaskList();
}

