<?php
require_once("course.php");
class ITCourse extends Course {
    private $location = "health & i.t. building";

    public function __toString() {
        $returnVal = parent::__toString();
        $returnVal .= "location: $this->location <br />";
        return $returnVal;
    }
}
