<?php
//error_reporting(0);
spl_autoload_register('apiAutoload');
(!defined('__DIR__')) ? define('__DIR__',dirname(__FILE__)) : null ;
function apiAutoload($classname)
{
    //print_r(debug_backtrace());
    if (preg_match('/[a-zA-Z]+Controller$/', $classname)) {
        if(file_exists(__DIR__ . '/controllers/' . $classname . '.php')){
            include __DIR__ . '/controllers/' . $classname . '.php';
            return true;
        }
        else{
            header("HTTP/1.0 404 Not Found");
            echo "<title>404 Function Not Found</title><h1>Function not found</h1>";
        }
    } elseif (preg_match('/[a-zA-Z]+Model$/', $classname)) {
        if(file_exists(__DIR__ . '/models/' . $classname . '.php')){
            include __DIR__ . '/models/' . $classname . '.php';
            return true;
        }
    } elseif (preg_match('/[a-zA-Z]+View$/', $classname)) {
        if(file_exists(__DIR__ . '/views/' . $classname . '.php')){
            include __DIR__ . '/views/' . $classname . '.php';
            return true;
        }
    } else {
        if(file_exists(__DIR__ . '/library/' . $classname . '.php')){
            include __DIR__ . '/library/' . $classname . '.php';
            return true;
        }
        else{
            
        }
    }
    return false;
}
require_once("library/Request.php");
$request = new Request();

// route the request to the right place
$controller_name = ucfirst($request->url[1]) . 'Controller';
if (class_exists($controller_name)) {
    $controller = new $controller_name();
    $action_name = strtolower($request->verb) . 'Action';
    $result = $controller->$action_name($request);

    $view_name = ucfirst($request->format) . 'View';
    if(class_exists($view_name)) {
        $view = new $view_name();
        $view->render($result);
    }
}

