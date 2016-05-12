<?php
require_once('istudent.php');

class StudentManager implements IStudent {
    public function Read() {
        throw new Exception("unsupported request");
        echo "Read<br />";
        $db = new PDO("mysql:host=localhost;dbname=MATC", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT id, name, email FROM students";
        try {
            $query = $db->prepare($sql);
            $query->execute();
        } catch(Exception $ex) {
            echo "what the heck<br />";
            echo $ex->getMessage();
        }
        // Fetch all records into a collection
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach($results as $value) {
            echo 'id: ', $value['id'], '<br />';
            echo 'name: ', $value['name'], '<br />';
            echo 'email: ', $value['email'], '<br />';
            echo '<hr />';
        }
    }
    public function ReadById($id) {
        throw new Exception("unsupported request");
        echo "Read by ID<br />";
        $db = new PDO("mysql:host=localhost;dbname=MATC", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT id, name, email FROM students WHERE id=:id";
        try {
            $query = $db->prepare($sql);
            $query->bindParam(":id", $id);
            $query->execute();
        } catch(Exception $ex) {
            echo "what the heck<br />";
            echo $ex->getMessage();
        }
        // Fetch a single record, not in a collection
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach($results as $value) {
            echo 'id: ', $value['id'], '<br />';
            echo 'name: ', $value['name'], '<br />';
            echo 'email: ', $value['email'], '<br />';
            echo '<hr />';
        }
    }
    public function Delete($id) {
        echo "Delete<br />";
        $db = new PDO("mysql:host=localhost;dbname=MATC", "root", "");
        $sql = "DELETE FROM students WHERE id=:id";
        $query = $db->prepare($sql);
        $query->bindParam(":id", $id);
        $query->execute();

        return $query->rowCount();  //return the # of rows affected
    }
    public function Create($name, $email) {
        throw new Exception("unsupported request");
        echo "Create<br />";
        $db = new PDO("mysql:host=localhost;dbname=MATC", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "INSERT INTO students(`name`, `email`) VALUES(:name, :email)";
        try {
            $query = $db->prepare($sql);
            $query->bindParam(":name", $name);
            $query->bindParam(":email", $email);
            $query->execute();
        } catch(Exception $ex) {
            echo "what the heck<br />";
            echo $ex->getMessage();
        }

        return $db->lastInsertId();
    }
    public function Update($id, $name, $email) {
        throw new Exception("unsupported request");
        echo "Update<br />";
        $db = new PDO("mysql:host=localhost;dbname=MATC", "root", "");
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE students SET name=:name, email=:email WHERE id=:id";
        try {
            $query = $db->prepare($sql);
            $query->bindParam(":id", $id);
            $query->bindParam(":name", $name);
            $query->bindParam(":email", $email);
            $query->execute();
        } catch(Exception $ex) {
            echo "what the heck<br />";
            echo $ex->getMessage();
        }

        return $query->rowCount();  //return the # of rows affected
    }
}

$studentman = new StudentManager();
//$studentman->Create("joe", "joe@matc.edu");
//$studentman->Update(2, "bill", "bill@matc.edu");
//$rows = $studentman->Delete(1);
//echo "Rows affected = $rows<br />";
//$studentman->Read();
//$studentman->ReadById(2);
