<?php
require_once('header.php');
require_once('taskmanager.php');
$httpVerb = $_SERVER['REQUEST_METHOD']; //POST, PUT, GET, DELETE
$mgr = new TaskManager();

echo '<div class="container">';
switch($httpVerb) {
    case "PUT":
        //update
        $file = fopen("php://input", "r");
        $data = stream_get_contents($file);
        $parameters;
        parse_str($data, $parameters);
        $rows = $mgr->update($parameters["id"], $parameters["description"]);
        echo $rows;
        break;
    case "POST":
        //create
        $description = $_POST['description'];
        $id = $mgr->create($description);
        echo $id;
        break;
    case "DELETE";
        //delete
        $deleteData = fopen("php://input", "r");
        $data = stream_get_contents($deleteData);
        $parameters;
        parse_str($data, $parameters);
        $rowsAffected = $mgr->delete($parameters["id"]);
        echo $rowsAffected;
        break;
    case "GET": //browser url -> sends an HTTP GET
        //read
        if(isset($_GET['id'])) {
            echo $mgr->read($_GET['id']);
        } else {
            echo $mgr->readAll();
        }
        break;
    default:
        throw new Exception("unsupported request");
}
echo '</div>';
require_once('footer.php');
