<?php
class InvoiceItem {
    private $id;
    private $quantity;
    private $price;
    private $description;

    public function __set($var, $value) {
        $this->$var = $value;
    }
    public function __get($var) {
        return $this->$var;
    }

    public function calculateItemTotal() {
        $total = $this->__get("quantity") * $this->__get("price");
        echo $total;
    }
}
