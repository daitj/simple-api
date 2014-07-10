<?php
class MyController{
    function __construct() {
        session_start();
    }
    public function getAction($request){
        return ("Nothing");
    }
    public function postAction($request){
        return ("Nothing");
    }
    public function error($text){
        echo $text;
        getAction();
    }
    public function db_connect(){
        $connect = new PDO("mysql:host=localhost;dbname=database","db_user","db_password");
        if (!$connect) 
            error("mysql connection error");
        else 
            return $connect;
    }
}
?>