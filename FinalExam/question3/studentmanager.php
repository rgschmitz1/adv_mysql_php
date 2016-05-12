<?php

class StudentManager {
    //public function ReadById($id) {
    public function getData($id) {
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
}
