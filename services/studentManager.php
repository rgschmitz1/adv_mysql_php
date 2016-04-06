<?php
class StudentManager {
    public function Read() {
        echo "Read";
    }
    public function ReadById($id) {
        echo "Read by ID";
    }
    public function Delete($id) {
        echo "Delete";
        echo "$id";
    }
    public function Create($name, $email) {
        echo "Create";
    }
    public function Update($id, $name, $email) {
        echo "Update";
    }
}
