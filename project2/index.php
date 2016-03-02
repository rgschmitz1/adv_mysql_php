<?php
require_once("invoiceitem.php");
require_once("invoice.php");
//require_once("processinvoice.php");

$temp = new InvoiceItem();
$temp->id = 1;
$temp->quantity = 3;
$temp->price = '3.30';
$temp->description = 'a good book';
$temp2 = new InvoiceItem();
$temp2->id = 2;
$temp2->quantity = 3;
$temp2->price = '3.30';
$temp2->description = 'a good book';
//echo $temp->display();
$invoice = new Invoice();
$invoice->items = $temp;
$invoice->items = $temp2;
//print_r($invoice->items);
$invoice->displayInvoice();


//do I need a InvoiceTestDrive class here?
// below is untested code
//$invoice = new ProcessInvoice();
//$invoice->runProcess();
