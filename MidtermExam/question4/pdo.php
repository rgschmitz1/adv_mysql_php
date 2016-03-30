<?php
require_once('student.php');
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
        foreach($results as $student) {
            echo($student);
        }
    }
}
$displaystudent = new StudentManager();
$displaystudent->ReadAll();
