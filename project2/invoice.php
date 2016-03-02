<?php
require_once('invoiceitem.php');
//This class is working
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

    private function calculateInvoice($item) {
        //calculate the total cost of all InvoiceItem (i.e. set $total)
        $this->__set('total', $this->__get('total') + $item->calculateItemTotal());
    }

    public function displayInvoice() {
        //loop through each of the invoiceItems and display them
        foreach ($this->__get('items') as $item) {
            echo $item->display();
            $this->calculateInvoice($item);
        }
        //print the total (call calculateInvoice)
        echo "Invoice Total: ", $this->__get('total');
    }
}
