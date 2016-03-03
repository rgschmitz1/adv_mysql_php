<?php
require_once('invoiceitem.php');

class Invoice {
    private $items = array(); // invoiceItem
    private $total;

    public function __set($attr, $val) {
        if ($attr == 'items') {
            $this->items[] = $val;
        } else {
            $this->$attr = $val;
        }
    }

    public function __get($attr) {
        return $this->$attr;
    }

    public function calculateInvoice() {
        //calculate the total cost of all InvoiceItem (i.e. set $total)
        foreach ($this->__get('items') as $item) {
            $this->__set('total', $this->__get('total') + $item->calculateItemTotal());
        }
    }

    public function displayInvoice() {
        //loop through each of the invoiceItems and display them
        foreach ($this->__get('items') as $item) {
            echo $item->display();
        }
        //print the total (call calculateInvoice)
        //$this->calculateInvoice();
        echo "Invoice Total: ", $this->__get('total');
    }
}
