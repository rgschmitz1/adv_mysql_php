<?php

class Student {
	//instance variable
	//public properties are not a good idea for code readability
	private $id;
	private $name;
	private $email;

	//constructor
	public function __construct($id, $name, $email) {
		$this->__set("id", $id);
		$this->__set("name", $name);
		$this->__set("email", $email);
	}

	global $list = new array();

	//magic methods, ($attr, $key, and $value are arbitrary)
	public function __get($attr) {
		//$attr = "id" or "name" or "email" in this class
		$returnVal = "";
		if (("$attr" == "id") && !empty($this->$attr)) {
			//id may be sensitive, DO NOT display
			$returnVal = "*******";
		} else {
			$returnVal = $this->$attr;
		}
		$list[] = $returnVal;
		return $returnVal;
	}

	public function __set($key, $value) {
		if(empty($this->__get("$key"))) {
			echo "__set for $key<br />";
			$this->$key = $value;
		}
	}

	public function __toString() {
        /*
         *Id: ----
         *Name: ----
         *Email: ----
         */
		return sprintf("Id: %s<br />Name: %s<br />Email: %s<br />",
			$this->__get("id"), $this->__get("name"), $this->__get("email"));
	}

	//getters and setters
/*
 *	public function getId() {
 *		return $this->id;
 *	}
 *	public function getName() {
 *		return $this->name;
 *	}
 *	public function getEmail() {
 *		return $this->email;
 *	}
 *	public function setId($id) {
 *		$this->id = $id;
 *	}
 *	public function setName($name) {
 *		$this->name = $name;
 *	}
 *	public function setEmail($email) {
 *		$this->email = $email;
 *	}
 */

	//methods (functions)
	public function registerForClass($classId) {
	}
}

$a = new Student(1, "sue@madisoncollege.edu", "sue");
//magic method set call
$a->id = 1;
//$a->email = "sue@madisoncollege.edu";
//$a->name = "sue";

$b = new Student(2, "joe@madisoncollege.edu", "joe");
//$b->id = 2;
//$b->email = "joe@madisoncollege.edu";
//$b->name = "joe";

$c = new Student(3, "tom@madisoncollege.edu", "tom");
//$c->id = 3;
//$c->email = "tom@madisoncollege.edu";
//$c->name = "tom";

//magic method get call
echo($a);
echo($b);
echo($c);
