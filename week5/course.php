<?php

class Course {
    private $title;
    private $description;
    private $tutor;  //an instance of a Student


    public function __construct($title) {
        $this->__set("title", $title);
    }


    public function __get($attr) {
        if($attr == "tutor") {
            if(!isset($this->tutor)) {
                $this->__set("tutor", new Student()); //lazy loading when getting tutor
            }
        }
        return $this->$attr;
    }
    public function __set($attr, $val) {
        $this->$attr = $val;
    }

    public function __toString() {
        //echo "" should not echo details
        return sprintf("title: %s<br />descriptoin: %s<br />tutor: %s<br />",
            $this->__get("title"), $this->__get("description"), $this->__get("tutor")->name);
    }
}
