<?php
interface IStudent {
    public function Create($name, $email); 
    public function Read(); 
    public function ReadByID($id); 
    public function Update($id, $name, $email);
    public function Delete($id); 
}
