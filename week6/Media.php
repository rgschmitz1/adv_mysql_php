<?php
require_once('IProductToSell.php');
abstract class Media implements IProductToSell {
	private $id;
	private $title;
	private $description;
	private $format;

	public function __get($attr) {
		return $this->$attr;
	}
	public function __set($attr, $value) {
		$this->$attr = $value;
	}
	public function __toString() {
		$format = "id: %s<br />title: %s<br />description: %s<br />format: %s<br />";
		return sprintf($format, $this->__get("id"), $this->__get("title"), $this->__get("description"), $this->__get("format"));
	}
}
