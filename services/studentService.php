<?php
require_once('studentManager.php');
$httpVerb = $_SERVER['REQUEST_METHOD']; //POST, PUT, GET, DELETE
$mgr = new StudentManager();

switch($httpVerb) {
    case "PUT":
        //update
        $file = fopen("php://input", "r");
        $data = stream_get_contents($file);
        $parameters;
        parse_str($data, $parameters);
        $rows = $mgr->Update($parameters["id"], $parameters["name"], $parameters["email"]);
        echo $rows;
        break;
    case "POST":
        //create
        $name = $_POST['name'];
        $email = $_POST['email'];
        $id = $mgr->Create($name, $email);
        echo $id;
        break;
    case "DELETE";
        //delete
        $deleteData = fopen("php://input", "r");
        $data = stream_get_contents($deleteData);
        $parameters;
        parse_str($data, $parameters);
        /*
        echo '<pre>';
        print_r($parameters);
        echo '</pre>';
        */
        $rowsAffected = $mgr->Delete($parameters["id"]);
        echo $rowsAffected;
        break;
    case "GET": //browser url -> sends an HTTP GET
        //read
        header("Content-Type: application/json");
        if(isset($_GET['id'])) {
            echo $mgr->ReadById($_GET['id']);
        } else {
            echo $mgr->Read();
        }
        break;
    default:
        throw new Exception("unsupported request");
}
