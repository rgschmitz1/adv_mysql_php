<?php

//CRUD - Create, Read, Update, Delete
class Student {
    public $id;
    public $name;
    public $email;
    public $created;

    public function display() {
        printf("id: %s<br />name: %s<br />email: %s<br />created: %s<br /><hr />",
                $this->id, $this->name, $this->email, $this->created);
    }
}

class StudentManager {
    public function ReadAll() {
        $db = new PDO('mysql:host=localhost;dbname=matc', 'root', ''); //server, database, credentials
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "select * from students";
        try {
            $query = $db->prepare($sql);
            $query->execute();
            //PDO::FETCH_OBJ - select all of the sql data into a generic php object 
            //PDO::FETCH_ASSOC - select all of the sql data based on column name (not column index)
            //PDO::FETCH_BOTH - (default) select all of the sql data based on column name AND column index
            //PDO::FETCH_CLASS - select all of the sql data into an array of instances of class (2nd parameter)
            $results = $query->fetchAll(PDO::FETCH_CLASS, "Student");
        } catch(Exception $ex) {
            echo $ex->getMessage();
        }
/*
        echo "<pre>";
        print_r($results);
        echo "</pre>";
*/
        foreach($results as $student) {
            $student->display();
        }
    }

    //this method is not finished
    public function Update($id, $newName, $newEmail) {
    }

    public function Delete($id) {
        $db = new PDO('mysql:host=localhost;dbname=matc', 'root', ''); //server, database, credentials
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "delete from students where id=:id";
        try {
            $query = $db->prepare($sql);
            $query->bindParam(":id", $id);
            $query->execute();
            $rowsAffected = $query->rowCount();
        } catch(Exception $ex) {
            echo $ex->getMessage();
        }
        return $rowsAffected;
    }

    //given a name and email, create a new record in the database
    public function Create($name, $email) {
        $db = new PDO('mysql:host=localhost;dbname=matc', 'root', ''); //server, database, credentials
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "";
        //$sql = "insert into students(`name`, `email`) values(:name, :emailAddress)";
        try {
            $query = $db->prepare($sql);
            $query->bindParam(":name", $name);
            $query->bindParam(":emailAddress", $email);
            $query->execute();
            echo "i am here<br />";
        } catch(Exception $ex) {
            echo "what the heck<br />";
            echo $ex->getMessage();
        }
        return $db->lastInsertId();
    }
}

$manager = new StudentManager();
/*
$student_id = $manager->Create('aaron', 'rogers@packers.com');
echo "student id: $studnet_id", "<br />";
$rows = $manager->Delete(100);
echo "rows deleted: $rows";
*/
$manager->ReadAll();
