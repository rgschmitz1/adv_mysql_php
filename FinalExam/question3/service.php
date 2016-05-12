<?php
require_once('studentmanager.php');
$httpVerb = $_SERVER['REQUEST_METHOD']; //POST, PUT, GET, DELETE
$DataService = new StudentManager();

switch($httpVerb) {
    case "GET": //browser url -> sends an HTTP GET
        //read
//        header("Content-Type: application/json");
        if((isset($_GET['id']) && !empty($_GET['id']))) {
            echo $DataService->getData($_GET['id']);
        }
        break;
    default:
        header('HTTP/1.1 405 Method Not Allowed');
        throw new Exception("unsupported request");
}
