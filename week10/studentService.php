<?php
require_once('studentManager.php');
$httpVerb = $_SERVER['REQUEST_METHOD']; //POST, PUT, GET, DELETE
$mgr = new StudentManager();

switch($httpVerb) {
    case "PUT":
        //update
        $mgr->Update($id, $name, $email);
        break;
    case "POST":
        //create
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mgr->Create($name, $email);
        break;
    case "DELETE";
        //delete
        $deleteData = fopen("php://input", "r");
        $data = stream_get_contents($deleteData);
        $mgr->Delete($data);
        break;
    case "GET":
        //read
        if(isset($_GET['id'])) {
            $mgr->ReadById($_GET['id']);
        } else {
            $mgr->Read();
        }
        break;
    default:
        throw new Exception("unsupported request");
}
