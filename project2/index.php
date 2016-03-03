<?php
require_once('invoiceitem.php');
require_once('invoice.php');
require_once('processinvoice.php');

class InvoiceTestDrive {
    public function main() {
        $test2 = new ProcessInvoice();
        $test2->runProcess();
    }
}

$test = new InvoiceTestDrive();
$test->main();
