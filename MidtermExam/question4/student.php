<?php
class Student {
    private $id;
    private $name;
    private $email;

    public function __get($attr) {
        return $this->$attr;
    }
    public function __set($attr, $val) {
        $this->$attr = $val;
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
}
