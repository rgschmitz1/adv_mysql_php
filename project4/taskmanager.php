<?php

// function create($desc);
// function read($id);
// function readAll();
// function update($id, $newDesc);
// function delete($id);
require_once('itaskmanager.php');

class TaskManager implements ITaskManager {
    // Define database connection constants
    const DB_USER = 'root';
    const DB_PASSWORD = '';

    private $id;
    private $description;

    private function createLog($request) {
        if (!isset($_SESSION))
            session_start();
        if (!empty($_SESSION['username'])) {
            $db = new PDO('mysql:host=localhost;dbname=project4', self::DB_USER, self::DB_PASSWORD);
            $sql = "INSERT INTO transactions(`username`, `request`) VALUES('" . $_SESSION['username'] . "', :request)";
            $query = $db->prepare($sql);
            $query->bindParam(":request", $request);
            $query->execute();
        }
    }

    //given a description, create a new record in the database
    public function create($desc) {
        $this->createLog(1);
        $db = new PDO('mysql:host=localhost;dbname=project4', self::DB_USER, self::DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO tasks(`description`) VALUES(:description)";
        try {
            $query = $db->prepare($sql);
            $query->bindParam(":description", $desc);
            $query->execute();
        } catch(Exception $ex) {
            echo "what the heck<br />";
            echo $ex->getMessage();
        }
        return $db->lastInsertId();
    }

    public function read($id) {
        $this->createLog(2);
        $db = new PDO('mysql:host=localhost;dbname=project4', self::DB_USER, self::DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tasks WHERE id = :id";
        try {
            $query = $db->prepare($sql);
            $query->bindParam(":id", $id);
            $query->execute();
            //PDO::FETCH_OBJ - select all of the sql data into a generic php object 
            //PDO::FETCH_ASSOC - select all of the sql data based on column name (not column index)
            //PDO::FETCH_BOTH - (default) select all of the sql data based on column name AND column index
            //PDO::FETCH_CLASS - select all of the sql data into an array of instances of class (2nd parameter)
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $ex) {
            echo "what the heck<br />";
            echo $ex->getMessage();
        }
        foreach($results as $value) {
            echo 'id: ', $value['id'], '<br />';
            echo 'description: ', $value['description'], '<br />';
            echo '<hr />';
        }
    }

    public function readAll() {
        $this->createLog(3);
        $db = new PDO('mysql:host=localhost;dbname=project4', self::DB_USER, self::DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM tasks";
        try {
            $query = $db->prepare($sql);
            $query->execute();
            //PDO::FETCH_OBJ - select all of the sql data into a generic php object 
            //PDO::FETCH_ASSOC - select all of the sql data based on column name (not column index)
            //PDO::FETCH_BOTH - (default) select all of the sql data based on column name AND column index
            //PDO::FETCH_CLASS - select all of the sql data into an array of instances of class (2nd parameter)
            $results = $query->fetchAll(PDO::FETCH_ASSOC);
        } catch(Exception $ex) {
            echo "what the heck<br />";
            echo $ex->getMessage();
        }
        foreach($results as $value) {
            echo 'id: ', $value['id'], '<br />';
            echo 'description: ', $value['description'], '<br />';
            echo '<hr />';
        }
    }

    //this method is not finished
    public function update($id, $newDesc) {
        $this->createLog(4);
        $db = new PDO('mysql:host=localhost;dbname=project4', self::DB_USER, self::DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE tasks SET description = :newDesc WHERE id=:id";
        try {
            $query = $db->prepare($sql);
            $query->bindParam(":id", $id);
            $query->bindParam(":newDesc", $newDesc);
            $query->execute();
            $rowsAffected = $query->rowCount();
        } catch(Exception $ex) {
            echo "what the heck<br />";
            echo $ex->getMessage();
        }
        return $rowsAffected;
    }

    public function delete($id) {
        $this->createLog(5);
        $db = new PDO('mysql:host=localhost;dbname=project4', self::DB_USER, self::DB_PASSWORD);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM tasks WHERE id=:id";
        try {
            $query = $db->prepare($sql);
            $query->bindParam(":id", $id);
            $query->execute();
            $rowsAffected = $query->rowCount();
        } catch(Exception $ex) {
            echo "what the heck<br />";
            echo $ex->getMessage();
        }
        return $rowsAffected;
    }
}
