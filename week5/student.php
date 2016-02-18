<?php

class Student {
    private $name;
    private $email;

    public function __get($attr) {
        return $this->$attr;
    }
    public function __set($attr, $val) {
        $this->$attr = $val;
    }
    public function __toString() {
        return sprinf("name: %s<br />email: %s<br />", $this->__get("name"), $this->__get("email"));
    }
}
