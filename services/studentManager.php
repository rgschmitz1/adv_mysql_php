<?php
class StudentManager {
    public function Read() {
        // This is complete
        echo "Read<br />";
        $db = new PDO("mysql:host=localhost;dbname=matc", "root", "");
        $sql = "SELECT id, name, email, created FROM students";
        $query = $db->prepare($sql);
        $query->execute();
        // Fetch all records into a collection
        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($results, JSON_PRETTY_PRINT);
    }
    public function ReadById($id) {
        echo "Read by ID<br />";
        $db = new PDO("mysql:host=localhost;dbname=matc", "root", "");
        $sql = "SELECT id, name, email, created FROM students WHERE id=:id";
        $query = $db->prepare($sql);
        $query->bindParam(":id", $id);
        $query->execute();
        // Fetch a single record, not in a collection
        $results = $query->fetch(PDO::FETCH_ASSOC);

        return json_encode($results, JSON_PRETTY_PRINT);
    }
    public function Delete($id) {
        echo "Delete<br />";
        $db = new PDO("mysql:host=localhost;dbname=matc", "root", "");
        $sql = "DELETE FROM students WHERE id=:id";
        $query = $db->prepare($sql);
        $query->bindParam(":id", $id);
        $query->execute();

        return $query->rowCount();  //return the # of rows affected
    }
    public function Create($name, $email) {
        echo "Create<br />";
        $db = new PDO("mysql:host=localhost;dbname=matc", "root", "");
        $sql = "INSERT INTO students(`name`, `email`) VALUES(:name, :email)";
        $query = $db->prepare($sql);
        /*
        $query->bindParam(":name", $name);
        $query->bindParam(":email", $email);
        $query->execute();
        */
        // This is an alternative to the above commented code
        $query->execute(array(":name"=>$name, ":email"=>$email));

        return $db->lastInsertId();
    }
    public function Update($id, $name, $email) {
        echo "Update<br />";
        $db = new PDO("mysql:host=localhost;dbname=matc", "root", "");
        $sql = "UPDATE students SET name=:name, email=:email WHERE id=:id";
        $query = $db->prepare($sql);
        $query->bindParam(":id", $id);
        $query->bindParam(":name", $name);
        $query->bindParam(":email", $email);
        $query->execute();

        return $query->rowCount();  //return the # of rows affected
    }
}
