<?php
//This class is working
class InvoiceItem {
    // private instance variables
    private $id;
    private $quantity;
    private $price;
    private $description;

    // magic methods
    public function __set($var, $value) {
        $this->$var = $value;
    }
    public function __get($var) {
        return $this->$var;
    }

    public function calculateItemTotal() {
        $total = $this->__get("quantity") * $this->__get("price");
        return $total;
    }

    public function display() {
        return sprintf("Item ID: %s, Quantity: %s, Price: %s, Description: %s, Total Cost: %s<br />",
            $this->__get("id"), $this->__get("quantity"), $this->__get("price"), $this->__get("description"), $this->calculateItemTotal());
    }
}
