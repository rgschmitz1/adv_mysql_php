<?php

class Person {
    public $name;
    public $email;
    public function __get($attr) {
        return $this->$attr;
    }
    public function __set($attr, $val) {
        $this->$attr = $val;
    }
}

class Ninja extends Person {
    public function JumpingSpinKick() {
        echo $this->__get('name'), '<br />', $this->__get('email');
    }
}

$OONinja = new Ninja;
$OONinja->name = 'bob';
$OONinja->email = 'test@gmail.com';
$OONinja->JumpingSpinKick();
