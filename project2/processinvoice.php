<?php
require_once('invoiceitem.php');
require_once('invoice.php');

class ProcessInvoice {
    // private instance variables
    private $invoice;

    public function __set($attr, $val) {
        $this->$attr = $val;
    }

    public function __get($attr) {
        return $this->$attr;
    }

    public function createInvoiceItems() {
        $a = new InvoiceItem();
        $a->id = 123;
        $a->quantity = 2;
        $a->price = 9.99;
        $a->description = 'widgets';
        $b = new InvoiceItem();
        $b->id = 4444;
        $b->quantity = 1;
        $b->price = 15.46;
        $b->description = 'doodads';
        $c = new InvoiceItem();
        $c->id = 99;
        $c->quantity = 20;
        $c->price = 1.99;
        $c->description = 'thingies';
        //create and invoice array
        $this->__get('invoice')->items = $a;
        $this->__get('invoice')->items = $b;
        $this->__get('invoice')->items = $c;
    }

    public function runProcess() {
        //instantiate the invoice
        $this->__set('invoice', new Invoice());
        //create invoice items
        $this->createInvoiceItems();
        //calculateInvoice
        $this->__get('invoice')->calculateInvoice();
        $this->__get('invoice')->displayInvoice();
    }
}
