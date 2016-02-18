<?php
require_once("invoiceitem.php");
$temp = new InvoiceItem();
$temp->quantity = '3';
$temp->price = '3.30';
$temp->calculateItemTotal();
