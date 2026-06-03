<?php
session_start();
require_once 'config/database.php';

$controller = isset($_GET['controller']) ? $_GET['controller'] : 'auth';
$action = isset($_GET['action']) ? $_GET['action'] : 'login';

$controllerName = ucfirst($controller) . 'Controller';
$controllerFile = "controllers/$controllerName.php";

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $ctrl = new $controllerName();
    if (method_exists($ctrl, $action)) {
        $ctrl->$action();
    } else {
        echo "Action not found!";
    }
} else {
    echo "Controller not found! Please check the URL.";
}
?>